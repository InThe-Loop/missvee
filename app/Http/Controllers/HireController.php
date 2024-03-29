<?php

namespace App\Http\Controllers;

use Mail;
use App\Tag;
use App\Hire;
use App\Category;
use Illuminate\Http\Request;
use App\Mail\ReservationMailer;

class HireController extends Controller
{
    public function index() {
        $pagination = 10;
        $hires = Hire::all();
        $allHires = null;
        $colors = Hire::select('color')->distinct()->get();
        $fabrics = Hire::select('fabric')->distinct()->get();
        // $categories = Hire::select('category')->distinct()->get();
        if (!$hires->isEmpty()) {
            $allHires = $hires->random()->paginate($pagination);
        }
        return view('hire')->with([
            'products' => $allHires,
            'fabrics' => $fabrics,
            'colors' => $colors,
        ]);
    }

    /**
     * Fetches customer details
     * 
     * @return \Illuminate\Http\Response
     */
    public function fetchItem($id) {
        $user = Hire::find($id);
        return response()->json($user);
    }

    /**
     * Sends a booking email
     *
     * @return \Illuminate\Http\Response
     */
    public function reservation(Request $request) {
        $details['name'] = $request->name;
        $details['email'] = $request->email;
        $details['phone'] = $request->phone;
        $details['address'] = $request->address;
        $details['dates'] = $request->dates;
        $details['pname'] = $request->pname;
        $details['price'] = $request->price;
        $details['total'] = $request->total;
        $details['days'] = $request->days;
        $code = "MV-BOOKING-" . random_int(100000, 999999);
        $details['code'] = $code;
        $details['to_email'] = "reservations@missveefamouslook.store";
        $details['to_name'] = "MissVee Reservations";
        $details['subject'] = "New reservation for [{$request->pname}]";
        Mail::to($details['email'], $details['name'])
            ->bcc($details['to_email'], $details['to_name'])
            ->send(new ReservationMailer($details));
        $response = [
            "success", 
            $code,
        ];
        return response()->json($response);
    }
}
