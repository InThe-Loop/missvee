@extends('layouts.app')
@section('title', 'Welcome to My World!')
@section('content')

<!-- Page content -->
<div id="wrapper">
    <div class="content">
        <div class="inner">
            <div class="ad-announce">
                <div class="left">
                    <h3>Free Door-2-Door delivery on ALL purchases</h3>
                </div>
                <div class="right">
                    <h3>Save 30% on cart purchases over R5,000</h3>
                </div>
            </div>
            <!-- Carousel Banner -->
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <div class="fill" style="background-image:url({{ asset('images/banners/blue_dress.jpg') }});"></div>
                        <div class="carousel-caption">
                            <h2 class="slideUp">Exclusive evening wear</h2>
                            <p class="animated fadeInRight">TV Apparel | Award ceremonies</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="fill" style="background-image:url({{ asset('images/banners/models.jpg') }});"></div>
                        <div class="carousel-caption">
                            <h2 class="slideUp">Grand entrance uniquely</h2>
                            <p class="animated fadeInRight">Corporate events | Gala events</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="fill" style="background-image:url({{ asset('images/banners/red_dress.jpg') }});"></div>
                        <div class="carousel-caption">
                            <h2 class="slideUp">Style has no limits</h2>
                            <p class="animated fadeInRight">Matric farewell | Graduation ceremonies</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="fill" style="background-image:url({{ asset('images/banners/man_banner.png') }});"></div>
                        <div class="carousel-caption">
                            <h2 class="slideUp">Man's perfection</h2>
                            <p class="animated fadeInRight" style="color: #d9d9d9;">"One man's style must not be the rule of another's" - Vanessa N Tsotetsi</p>
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="carousel-control-prev" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></li>
                </ol>
            </div>
            <!-- Catalogue -->
            <div class="catalogue w-100">
                <!-- Products -->
                <div class="row">
                    <div class="product-info-tabs container-fluid">
                        <ul class="nav nav-tabs" id="catTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="women-tab" data-toggle="tab" href="#women" role="tab" aria-controls="women" aria-selected="true">Women</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab" aria-controls="men" aria-selected="true">Men</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="hair-tab" data-toggle="tab" href="#hair" role="tab" aria-controls="hair" aria-selected="false">Hair</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="hire-tab" data-toggle="tab" href="#hire" role="tab" aria-controls="hire" aria-selected="false">Hire</a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-md-12 mt-5" id="search">
                                <form id="search-form" class="w-100 pl-3 pr-3">
                                    <div class="form-group w-25 dis-grid">
                                        <div id="range-slider" class="m-auto">
                                            <div id="slider-range"></div>
                                            <p id="amount"></p>
                                        </div>
                                    </div>
                                    <div class="form-group w-25 dis-grid">
                                        <input class="form-control" type="text" placeholder="Know what you're looking for?" />
                                    </div>
                                    <div class="form-group w-25 dis-grid">
                                        <button type="submit" class="btn btn-secondary w-100">Search</button>
                                    </div>
                                    <div class="form-group w-25 dis-grid text-center">
                                        <span class="advanced-filters">Advanced filters</span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <form class="hide" id="filter">
                                    <div class="form-group w-25 dis-grid">
                                        <select class="form-control sort">
                                            <option value="">Sort by price</option>
                                            <option value="">Show All</option>
                                            <option value="asc">Price Low to High</option>
                                            <option value="desc">Price High to Low</option>
                                        </select>	
                                    </div>
                                    <div class="form-group w-25 dis-grid">
                                        <select data-filter="fabric" class="filter-fabric filter form-control">
                                            <option value="">Filter by Fabric</option>
                                            <option value="">Show All</option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="form-group w-25 dis-grid">
                                        <select data-filter="color" class="filter-color filter form-control">
                                            <option value="">Filter by Color</option>
                                            <option value="">Show All</option>
                                            @foreach ($colors as $item)
                                                <option value="{{ $item->color }}">{{ ucfirst($item->color) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group w-25 dis-grid">
                                        <select data-filter="category" class="filter-category filter form-control">
                                            <option value="">Filter by category</option>
                                            <option value="">Show All</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-content" id="categories">
                            <div class="tab-pane fade show active" id="women" role="tabpanel" aria-labelledby="women-tab">
                                <div id="women-products">
                                    <div class="row">
                                        <div class="col">
                                            @if(count($women) > 0)
                                                @foreach ($women as $product)
                                                    @php $stockLevel = getStockLevel($product->quantity) @endphp
                                                    @if(strtolower($product->category->name) == "women")
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
                                                    @endif
                                                @endforeach
                                            @else
                                                <p class="text-center text-dark">Sorry, there are no products in stock yet!</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row default-paginator">
                                        <div class="col mt-3">
                                            {!! $women->links('vendor.pagination.custom') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="men" role="tabpanel" aria-labelledby="men-tab">
                                <div id="men-products">
                                    <div class="row">
                                        <div class="col">
                                            @if(is_array($men))
                                                @php $men = 0 @endphp
                                                @foreach ($men as $product)
                                                    @if(strtolower($product->category->name) == "men")
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
                                                    @endif
                                                @endforeach
                                            @else
                                                <p class="text-center text-dark">Sorry, there are no products in stock yet!</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row default-paginator">
                                        <div class="col mt-3">
                                            {!! $men->links('vendor.pagination.custom') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hair" role="tabpanel" aria-labelledby="hair-tab">
                                <div id="hair-products">
                                    <div class="row">
                                        <div class="col">
                                            @if(count($hair) > 0)
                                                @foreach ($hair as $product)
                                                    @if(strtolower($product->category->name) == "hair")
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
                                                    @endif
                                                @endforeach
                                            @else
                                                <p class="text-center text-dark">Sorry, there are no products in stock yet!</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row default-paginator">
                                        <div class="col mt-3">
                                            {!! $hair->links('vendor.pagination.custom') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="hire" role="tabpanel" aria-labelledby="hire-tab">
                                <div id="hire-products">
                                    <div class="row">
                                        <div class="col">
                                            @if(count($hires) > 0)
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
                                            @else
                                                <p class="text-center text-dark">Sorry, there are no products for hire in stock yet!</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row default-paginator">
                                        <div class="col mt-3">
                                            {!! $hires->links('vendor.pagination.custom') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Catalogue -->
        </div>
    </div>
</div>
<!-- //Page content -->
@endsection
