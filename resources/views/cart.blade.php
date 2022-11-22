@extends('layouts.app')
@section('title', 'Shopping cart')
@section('content')

<!-- start page content -->
<div class="container">
    <div class="row justify-content-center catalogue">
        <div class="col-md-12 mt-2">
            <a class="go-back" href="#">
                <div class="arrow pl-1"> Back</div>
            </a>
            @if (Cart::instance('default')->count() > 0)
                <h3 class="lead mt-4 text-dark">{{ Cart::instance('default')->count() }} @if (Cart::instance('default')->count() === 1)item @else items @endif in the shopping cart</h3>
                <table class="table table-responsive table-striped table-light">
                    <tbody>
                        @foreach (Cart::instance('default')->content() as $item)
                            @if($item->model)
                                <tr>
                                    <td>
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <img src="{{ productImage($item->model->image) }}" class="cart-image" alt="{{ $item->model->name }}" />
                                        </a>
                                    </td>
                                    <td class="col w-50">
                                        <a href="{{ route('shop.show', $item->model->slug) }}" class="text-decoration-none">
                                            <h3 class="lead text-dark">{{ $item->model->name }}</h3>
                                            <p class="light-text">{{ $item->model->details }}</p>
                                        </a>
                                    </td>
                                    <td class="col w-20">
                                        <select class="quantity form-control" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                                            <option>Select quantity</option>
                                            @for ($i = 1; $i < 6; $i++)
                                                <option class="option" value="{{ $i }}" {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="col w-25">
                                        <form action="{{ route('cart.destroy', [$item->rowId, 'default']) }}" method="POST">
                                            @csrf()
                                            @method('DELETE')
                                            <button type="submit" class="cart-option btn btn-danger btn-sm">
                                                Remove
                                            </button>
                                        </form>
                                        <form action="{{ route('cart.save-later', $item->rowId) }}" method="POST">
                                            @csrf()
                                            <button type="submit" class="cart-option btn btn-success btn-sm">
                                                Save for later
                                            </button>
                                        </form>
                                    </td>
                                    <td class="col w-25">R{{ format($item->subtotal) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="summary">
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3 text-end">
                            <p class="text-right light-text">Subtotal &nbsp; &nbsp;R{{ format(Cart::subtotal()) }}</p>
                            <p class="text-right">Total &nbsp; &nbsp; R{{ format(Cart::total()) }}</p>
                        </div>
                    </div>
                </div>
                <div class="cart-actions text-end mt-3 mb-5">
                    <a href="{{ route('welcome') }}" class="btn btn-secondary">Continue Shopping</a>
                    <a href="{{ route('checkout.index') }}" class="btn btn-success float-right">
                        Proceed to checkout
                    </a>
                </div>
            @else
                <div class="alert alert-secondary text-center">
                    <h4 class="lead text-dark">No items in the cart <a href="{{ route('welcome') }}">Continue shopping</a></h4>
                </div>
            @endif
            <hr />
            @if (Cart::instance('saveForLater')->count() > 0)
                <h3 class="lead mt-4 text-dark">{{ Cart::instance('saveForLater')->count() }} @if (Cart::instance('default')->count() === 1)item @else items @endif in your wishlist</h3>
                <table class="table table-responsive table-striped table-light">
                    <tbody>
                        @foreach (Cart::instance('saveForLater')->content() as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('shop.show', $item->model->slug) }}">
                                        <img src="{{ productImage($item->model->image) }}" class="cart-image" alt="{{ $item->model->name }}" />
                                    </a>
                                </td>
                                <td class="col w-75">
                                    <a href="{{ route('shop.show', $item->model->slug) }}" class="text-decoration-none">
                                        <h3 class="lead text-dark">{{ $item->model->name }}</h3>
                                        <p class="light-text">{{ $item->model->details }}</p>
                                    </a>
                                </td>
                                <td class="col w-25">
                                    <form action="{{ route('cart.destroy', [$item->rowId, 'saveForLater']) }}" method="POST">
                                        @csrf()
                                        @method('DELETE')
                                        <button type="submit" class="cart-option btn btn-danger btn-sm">
                                            Remove
                                        </button>
                                    </form>
                                    <form action="{{ route('cart.add-to-cart', $item->rowId) }}" method="POST">
                                        @csrf()
                                        <button type="submit" class="cart-option btn btn-success btn-sm">
                                            Add to cart
                                        </button>
                                    </form>
                                </td>
                                <td class="col w-25">
                                    @if($item->model->black_friday_price)
                                        R{{ format($item->model->black_friday_price) }}
                                    @else
                                        R{{ format($item->model->price) }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-secondary text-center">
                    <h4 class="text-dark">No items in your wishlist</h4>
                </div>
            @endif
        </div>
    </div>
</div>

@include('partials.might-like')
<!-- end page content -->

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function () {
        $('.quantity').on('change', function() {
            const id = this.getAttribute('data-id');
            const productQuantity = this.getAttribute('data-productQuantity');
            axios.patch('/cart/' + id, {quantity: this.value, productQuantity: productQuantity})
            .then(response => {
                console.log(response);
                window.location.href = '{{ route('cart.index') }}';
            }).catch(error => {
                window.location.href = '{{ route('cart.index') }}';
            })
        });
    });
</script>

@endsection