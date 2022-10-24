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
        
            <div class="Modern-Slider"> 
                <!-- Item -->
                <div class="item"> 
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
                </div> 
                <!-- // Item -->
                <!-- Item --> 
                <div class="item">
                    <div class="img-fill"> 
                        <img src="{{ asset('images/banners/blue_dress.jpg') }}" alt=""> 
                        <div class="info">
                            <div class="text-anim">
                                <span>M</span><span>a</span><span>t</span><span>r</span><span>i</span><span>c</span>
                                <span>F</span><span>a</span><span>r</span><span>e</span><span>w</span><span>ell</span><span>&nbsp;|&nbsp;</span>
                                <span>Graduation</span>
                                <span>Ceremonies</span><span>&nbsp;|&nbsp;</span>
                            </div>
                        </div> 
                    </div> 
                </div> 
                <!-- // Item -->
                <!-- Item --> 
                <div class="item">
                    <div class="img-fill"> 
                        <img src="{{ asset('images/banners/white_dress.jpg') }}" alt=""> 
                        <div class="info">
                            <div class="text-anim">
                                <span>Birthday Parties</span><span>&nbsp;|&nbsp;</span>
                                <span>Wedding Reception</span>
                            </div>
                        </div> 
                    </div> 
                </div> 
                <!-- // Item -->
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
                                        <button type="submit" class="btn btn-secondary w-100">Filter</button>
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
                                                    <!-- Single product -->
                                                    <div class="product searchable" data-title="{{ $product->name }}" data-fabric="{{ $product->tags[0]->name }}" data-color="{{ $product->color }}" data-category="{{ $product->category->name }}" data-price="{{ $product->price }}">
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
                                                    <!-- Single product -->
                                                    <div class="product searchable" data-title="{{ $product->name }}" data-fabric="{{ $product->tags[0]->name }}" data-color="{{ $product->color }}" data-category="{{ $product->category->name }}" data-price="{{ $product->price }}">
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
