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
                            <p class="animated fadeInRight">TV Apparel | Award ceremonies | Corporate events</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="fill" style="background-image:url({{ asset('images/banners/red_dress.jpg') }});"></div>
                        <div class="carousel-caption">
                            <h2 class="slideUp">Grand entrance uniquely</h2>
                            <p class="animated fadeInRight">Matric farewell | Graduation ceremonies</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="fill" style="background-image:url({{ asset('images/banners/man_banner.jpg') }});"></div>
                        <div class="carousel-caption">
                            <h2 class="slideUp">Man's perfection</h2>
                            <p class="animated fadeInRight">"One man's style must not be the rule of another's" - Vanessa NT.SA</p>
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
                </ol>
            </div>

            <!-- <div class="Modern-Slider">  -->
                <!-- Item -->
                <!-- <div class="item"> 
                    <div class="img-fill"> 
                        <img src="{{ asset('images/banners/red_dress.jpg') }}" alt="TV Aparel" /> 
                        <div class="info">
                            <div class="text-anim">
                                <span>T</span><span>V</span>
                                <span>Apparel</span><span>&nbsp;|&nbsp;</span>
                                <span>A</span><span>w</span><span>a</span><span>r</span><span>d</span>
                                <span>Ceremonies</span><span>&nbsp;|&nbsp;</span>
                                <span>R</span><span>e</span><span>d</span>
                                <span>Carpet</span><span>&nbsp;|&nbsp;</span>
                                <span>Corporate</span>
                                <span>E</span><span>v</span><span>e</span><span>n</span><span>ts</span>
                            </div>
                        </div>
                    </div>
                </div>  -->
                <!-- // Item -->
                <!-- Item --> 
                <!-- <div class="item">
                    <div class="img-fill"> 
                        <img src="{{ asset('images/banners/blue_dress.jpg') }}" alt=""> 
                        <div class="info">
                            <div class="text-anim">
                                <span>M</span><span>a</span><span>t</span><span>ric</span>
                                <span>F</span><span>ar</span><span>ewell</span><span>&nbsp;|&nbsp;</span>
                                <span>G</span><span>r</span><span>a</span><span>d</span><span>u</span><span>a</span><span>tion</span>
                                <span>C</span><span>e</span><span>rem</span><span>o</span><span>nies</span>
                            </div>
                        </div> 
                    </div> 
                </div>  -->
                <!-- // Item -->
                <!-- Item --> 
                <!-- <div class="item">
                    <div class="img-fill"> 
                        <img src="{{ asset('images/banners/white_dress.jpg') }}" alt=""> 
                        <div class="info">
                            <div class="text-anim">
                                <span>B</span><span>ir</span><span>th</span><span>d</span><span>a</span><span>y</span>
                                <span>P</span><span>ar</span><span>ti</span><span>es</span><span>&nbsp;|&nbsp;</span>
                                <span>W</span><span>edd</span><span>ing</span><span></span><span> Re</span><span>cep</span><span>ti</span><span>ons</span>
                            </div>
                        </div> 
                    </div> 
                </div>  -->
                <!-- // Item -->
            <!-- </div> -->
            
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
                                        <select class="form-control" id="sort">
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
                                                <option value="{{ $item->color }}">{{ $item->color }}</option>
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
                                <div class="row">
                                    <div class="col" id="products">
                                        @if(count($products) > 0)
                                            @foreach ($products as $product)
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
                            </div>
                            <div class="tab-pane fade" id="men" role="tabpanel" aria-labelledby="men-tab">
                                <div class="row">
                                    <div class="col" id="men-products">
                                        @if(count($products) > 0)
                                            @foreach ($products as $product)
                                                @if(strtolower($product->category->name) == "men")
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
                            </div>
                            <div class="tab-pane fade" id="hair" role="tabpanel" aria-labelledby="hair-tab">
                                <div class="row">
                                    <div class="col" id="hair-products">
                                        @if(count($products) > 0)
                                            @foreach ($products as $product)
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
                            </div>
                            <div class="tab-pane fade show" id="hire" role="tabpanel" aria-labelledby="hire-tab">
                                <div class="row">
                                    <div class="col mt-3" id="hire-products">
                                        @if(count($hires) > 0)
                                            @foreach ($hires as $product)
                                                <!-- start single product -->
                                                <div class="col-md-4 col-sm-6 product m-2">
                                                    <a href="#" data-id="{{ $product->id }}" data-toggle="modal" data-target="#hireModal" class="custom-card">
                                                        <div class="card view overlay zoom p-3">
                                                            <img src="{{ productImage($product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}" height="200px" width="200px">
                                                            <div class="card-body">
                                                                <h5 class="text-dark">{{ $product->name }}</h5>
                                                                <span class="price">R{{ format($product->price) }}</span>
                                                                <span class="sizes">Sizes: {{ $product->sizes }}</span>
                                                                <div class="hire-actions">
                                                                    @if($product->available === 1)
                                                                        <button class="btn btn-success no-border">Hire</button>
                                                                    @else
                                                                        <i class="fa fa-times no"></i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!-- end single product -->
                                            @endforeach
                                        @else
                                            <p class="text-center text-dark">Sorry, there are no products in stock yet!</p>
                                        @endif
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
