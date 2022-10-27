<?php

namespace App\Http\Controllers;

use Cart;
use Mail;
use Config;
use App\Order;
use App\Product;
use Yoco\YocoClient;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yoco\Exceptions\ApiKeyException;
use Yoco\Exceptions\DeclinedException;
use Yoco\Exceptions\InternalException;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller {
    public function index()
    {
        if (Cart::instance('default')->count() > 0) {
            $subtotal = Cart::instance('default')->subtotal() ?? 0;
            $discount = session('coupon')['discount'] ?? 0;
            $newSubtotal = $subtotal - $discount > 0 ? $subtotal - $discount : 0;
            $tax = $newSubtotal * (config('cart.tax') / 100);
            $total = $tax + $newSubtotal;
            return view('checkout')->with([
                'subtotal' => $subtotal,
                'discount' => $discount,
                'newSubtotal' => $newSubtotal,
                'total' => $total,
                'tax' => $tax
            ]);
        }
        return redirect()->route('cart.index')->withError('You have nothing in your shopping cart, please add some products first!');
    }

    public function store(CheckoutRequest $request)
    {
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withError('Sorry, one of the items in your shopping cart is no longer available!');
        }
        $contents = Cart::instance('default')->content()->map(function ($item) {
            return $item->model->slug . ', ' . $item->qty;
        })->values()->toJson();

        try {
            // Let's charge the customer
            $payment_status = $this->chargePayment();
            $details = json_decode($payment_status->content());
            if (!empty($payment_status)) {
                if ($payment_status->status() === 200 && strtolower($payment_status->statusText()) === "ok") {
                    if (strtolower($details->status) === "successful") {
                        Log::error("Yoco success: " . $payment_status->content());
                        // Place order and send the notification email
                        // TO DO: log this somwhere
                        $order = $this->insertIntoOrdersTable($request, null);
                        return $this->sendNotification($details->status, $order);
                    }
                }
            }
            // dd($details);
            // Payment failure, notify customer on screen
            Log::error("Yoco error: " . $payment_status->content());
            return back()->withError('Payment error: ' . $details->charge_error->displayMessage);
        }
        catch (Exception $e) {
            $this->insertIntoOrdersTable($request, $e->getMessage());
            return back()->withError('Error ' . $e->getMessage());
        }
    }

    private function chargePayment()
    {
        $this->validate(request(), [
            'token' => 'required',
            'amountInCents' => 'required|int',
            'currency' => 'required'
        ], [
            'token.required' => 'Token E001: payment could not be processed. Please contact our help and support or ensure you have entered the correct card details!'
        ]);

        $token = request()->input('token');
        $amountInCents = request()->input('amountInCents');
        $currency = request()->input('currency');
        $metadata = request()->input('metadata') ?? [];
        
        // Create new yoco client object
        $client = new YocoClient(Config::get('app.yoco.secret_key'), Config::get('app.yoco.public_key'));

        // Note the keys in use
        $env = $client->keyEnvironment();
        Log::error("Using $env keys for payment");

        try {
            return response()->json($client->charge($token, $amountInCents, $currency, $metadata));
        } 
        catch (ApiKeyException $e) {
            Log::error("Failed to charge card with token $token, amount $currency $amountInCents : " . $e->getMessage());
            return response()->json(['charge_error' => $e], 400);
        } 
        catch (DeclinedException $e) {
            Log::error("Failed to charge card with token $token, amount $currency $amountInCents : " . $e->getMessage());
            return response()->json(['charge_error' => $e], 400);
        } 
        catch (InternalException $e) {
            Log::error("Failed to charge card with token $token, amount $currency $amountInCents : " . $e->getMessage());
            return response()->json(['charge_error' => $e], 400);
        }
    }

    private function sendNotification($status, $order = null) {
        // Success
        if (strtolower($status) === "successful") {
            $this->decreaseQuantities();
            Mail::to($order->billing_email, $order->billing_name)
                ->bcc(Config::get('app.payments_bcc.address'), Config::get('app.payments_bcc.name'))
                ->send(new OrderPlaced($order));
            
            Cart::instance('default')->destroy();
            session()->forget('coupon');
            return redirect()->route('welcome')->with('success', 'Your order is on its way! Please check your emails for more details.');
        }
        // Error message
        return back()->withError('The system encountered an error processing your card payment! Please try again.');
    }

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['code'] ?? null;
        $newSubtotal = Cart::instance('default')->subtotal() - $discount;
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + $newTax;
        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'code' => $code,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal
        ]);
    }

    private function insertIntoOrdersTable($request, $error)
    {
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postal_code,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->name_on_card,
            'billing_discount' => $this->getNumbers()->get('discount'),
            'billing_discount_code' => $this->getNumbers()->get('code'),
            'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
            'billing_tax' => $this->getNumbers()->get('newTax'),
            'billing_total' => $this->getNumbers()->get('newTotal'),
            'error' => $error
        ]);

        foreach (Cart::instance('default')->content() as $item) {
            OrderProduct::create([
                'product_id' => $item->model->id,
                'order_id' => $order->id,
                'quantity' => $item->qty
            ]);
        }
        return $order;
    }

    private function decreaseQuantities()
    {
        foreach (Cart::instance('default')->content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    private function productsAreNoLongerAvailable()
    {
        foreach (Cart::instance('default')->content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }
        return false;
    }
}
