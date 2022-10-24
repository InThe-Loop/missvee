<div class="container">
    <div class="catalogue">
        <div class="col m-2">
            <div class="row">
                <h3 class="lead text-dark m-0 pl-2">You might also like</h3>
            </div>
            <!-- start products row -->
            <div class="row">
                @foreach ($mightLike as $product)
                    <!-- start single product -->
                    <div class="product" data-fabric="" data-model="" data-type="" data-price="">
                        <div class="product-inner">
                            <figure>
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    <img src="{{ productImage($product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
                                </a>
                                <figcaption>
                                    {{ $product->name }}
                                    <span class="price">R{{ format($product->price) }}</span>
                                </figcaption>
                            </figure>
                            <div class="product-actions text-center">
                                @if ($product->quantity > 0)
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf()
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <button title="Add item to cart" type="submit" class="fas fa-cart-plus btn btn-secondary"></button>
                                        <button title="Share on Facebook" type="button" class="fa fa-share btn btn-secondary fb-product-share"
                                        data-title="{{ $product->name }}"
                                        data-desc="{{ $product->description }}"
                                        data-price="{{ $product->price }}"
                                        data-slug="{{ $product->slug }}"></button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end single product -->
                @endforeach
            </div>
            <!-- end products row -->
        </div>
    </div>
</div>
<!--  end suggestions -->