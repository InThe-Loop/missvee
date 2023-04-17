@if(count($women) > 0)
<div class="women-products hide">
    <div class="row">
        <div class="col">
            @foreach ($women as $product)
                @php $stockLevel = getStockLevel($product->quantity) @endphp
                @if($product->black_friday_price === 0)
                    @php $price = $product->price @endphp
                @else
                    @php $price = $product->black_friday_price @endphp
                @endif
                <!-- Single product -->
                <div class="product searchable" data-title="{{ $product->name }}" data-fabric="{{ $product->tags[0]->name }}" data-color="{{ $product->color }}" data-category="{{ $product->category->name }}" data-price="{{ $price }}">
                    <div class="product-inner">
                        <figure>
                            <a href="{{ route('shop.show', $product->slug) }}">
                                <img src="{{ productImage($product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
                            </a>
                            @if($product->black_friday_price > 0)
                                <img src="{{ asset('images/icons/black_fri.jpg') }}" class="black-fri" alt="Black Friday Deal" />
                            @endif
                            <figcaption>
                                <span class="product-name">{{ $product->name }}</span>
                                @if($product->black_friday_price === 0)
                                    <span class="price">R{{ format($product->price) }}</span>
                                @else
                                    <span class="now-price">R{{ format($product->black_friday_price) }}</span>
                                    <span class="line-through">was R{{ format($product->price) }}</span>
                                @endif
                            </figcaption>
                        </figure>
                        <div class="product-actions text-center">
                            @if ($product->quantity > 0)
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf()
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $price }}">
                                    <button title="Add item to cart" type="submit" class="fas fa-cart-plus btn btn-secondary"></button>
                                    <button title="Share on Facebook" type="button" class="fa fa-share btn btn-secondary fb-product-share"
                                    data-title="{{ $product->name }}"
                                    data-desc="{{ $product->description }}"
                                    data-price="{{ $price }}"
                                    data-slug="{{ $product->slug }}"></button>
                                </form>
                            @else
                                <span class="badge @if ($stockLevel == 'In Stock')badge-success @else badge-danger @endif">{{ $stockLevel }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- //Single product -->
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            {!! $women->links('vendor.pagination.custom') !!}
        </div>
    </div>
</div>
@endif
@if(count($men) > 0)
<div class="men-products hide">
    <div class="row">
        <div class="col">
            @php $men = 0 @endphp
            @foreach ($men as $product)
                @php $men++ @endphp
                @if($product->black_friday_price === 0)
                    @php $price = $product->price @endphp
                @else
                    @php $price = $product->black_friday_price @endphp
                @endif
                <!-- Single product -->
                <div class="product searchable" data-title="{{ $product->name }}" data-fabric="{{ $product->tags[0]->name }}" data-color="{{ $product->color }}" data-category="{{ $product->category->name }}" data-price="{{ $price }}">
                    <div class="product-inner">
                        <figure>
                            <a href="{{ route('shop.show', $product->slug) }}">
                                <img src="{{ productImage($product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
                            </a>
                            @if($product->black_friday_price > 0)
                                <img src="{{ asset('images/icons/black_fri.jpg') }}" class="black-fri" alt="Black Friday Deal" />
                            @endif
                            <figcaption>
                                <span class="product-name">{{ $product->name }}</span>
                                @if($product->black_friday_price === 0)
                                    <span class="price">R{{ format($product->price) }}</span>
                                @else
                                    <span class="now-price">R{{ format($product->black_friday_price) }}</span>
                                    <span class="line-through">was R{{ format($product->price) }}</span>
                                @endif
                            </figcaption>
                        </figure>
                        <div class="product-actions text-center">
                            @if ($product->quantity > 0)
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf()
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $price }}">
                                    <button title="Add item to cart" type="submit" class="fas fa-cart-plus btn btn-secondary"></button>
                                    <button title="Share on Facebook" type="button" class="fa fa-share btn btn-secondary fb-product-share"
                                    data-title="{{ $product->name }}"
                                    data-desc="{{ $product->description }}"
                                    data-price="{{ $price }}"
                                    data-slug="{{ $product->slug }}"></button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- //Single product -->
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            {!! $men->links('vendor.pagination.custom') !!}
        </div>
    </div>
</div>
@endif
@if(count($hair) > 0)
<div class="hair-products hide">
    <div class="row">
        <div class="col">
            @foreach ($hair as $product)
                <!-- Single product -->
                <div class="product searchable" data-title="{{ $product->name }}" data-fabric="{{ $product->tags[0]->name }}" data-color="{{ $product->color }}" data-category="{{ $product->category->name }}" data-price="{{ $product->price }}">
                    <div class="product-inner">
                        <figure class="hair">
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
                <!-- //Single product -->
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            {!! $hair->links('vendor.pagination.custom') !!}
        </div>
    </div>
</div>
@endif
@if(count($hires) > 0)
<div class="hire-products hide">
    <div class="row">
        <div class="col">
            @foreach ($hires as $product)
                <!-- start single product -->
                <div class="product searchable" data-title="{{ $product->name }}" data-fabric="{{ $product->fabric }}" data-color="{{ $product->color }}" data-category="{{ $product->category }}" data-price="{{ $product->price }}">
                    <div class="product-inner overlay zoom p-3">
                        <a href="#" data-id="{{ $product->id }}" data-toggle="modal" data-target="#hireModal" class="custom-card hires-window">
                            <img src="{{ productImage($product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}" />
                        
                            <span class="product-name">{{ $product->name }}</span>
                            <span class="price"><strong>R{{ format($product->price) }}</strong></span>
                            <br />
                            <span class="sizes">Sizes: <strong>{{ $product->sizes }}</strong></span>

                            <div class="hire-actions">
                                @if($product->available === 1)
                                    <button class="btn btn-success no-border">Hire</button>
                                @else
                                    <i class="fa fa-times no"></i>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                <!-- end single product -->
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            {!! $hires->links('vendor.pagination.custom') !!}
        </div>
    </div>
</div>
@endif
