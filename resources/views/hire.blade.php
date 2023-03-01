@extends('layouts.app')
@section('title', 'Hire')
@section('content')

<!-- start page content -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-12">
            <a class="go-back" href="#">
                <div class="arrow"> Back</div>
            </a>
        </div>
    </div>
    <div class="row">
        <!-- start filter section -->
        <div class="col-md-2 mt-3 catalogue">
            <h2 class="text-dark">Filters</h2>
            <h4 class="text-dark m-0">
                Price range
            </h4>
            <div class="form-group">
                <div id="range-slider" class="m-auto">
                    <div id="slider-range"></div>
                    <p id="amount"></p>
                </div>
            </div>
            <h4 class="text-dark m-0">
                Availability
            </h4>
            <select data-filter="available" class="filter-available filter form-control mb-3">
                <option value="">Filter by Availability</option>
                <option value="">Show All</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <h4 class="text-dark m-0">
                Category
            </h4>
            <select data-filter="category" class="filter-category filter form-control mb-3">
                <option value="">Filter by category</option>
                <option value="">Show All</option>
                <option value="Women">Women</option>
                <option value="Men">Men</option>
            </select>
            <h4 class="text-dark m-0">
                Fabric
            </h4>
            <select data-filter="fabric" class="filter-fabric filter form-control mb-3">
                <option value="">Filter by Fabric</option>
                <option value="">Show All</option>
                @foreach ($fabrics as $fabric)
                    <option value="{{ $fabric->fabric }}">{{ $fabric->fabric }}</option>
                @endforeach
            </select>
            <h4 class="text-dark m-0">
                Colour
            </h4>
            <select data-filter="color" class="filter-color filter form-control">
                <option value="">Filter by Color</option>
                <option value="">Show All</option>
                @foreach ($colors as $item)
                    <option value="{{ $item->color }}">{{ ucfirst($item->color) }}</option>
                @endforeach
            </select>
            <h2 class="text-dark mt-3">Sort</h2>
            <h4 class="text-dark m-0">
                Price
            </h4>
            <select class="form-control sort">
                <option value="">Sort by price</option>
                <option value="">Show All</option>
                <option value="asc">Price Low to High</option>
                <option value="desc">Price High to Low</option>
            </select>
        </div>
        <!-- end filter section -->
        <!-- start products section -->
        <div class="catalogue col-md-10 mt-3">
            @if(!empty($products))
                <!-- start products row -->
                <div class="row" id="products">
                    @foreach ($products as $product)
                        <!-- start single product -->
                        <div class="col-md-4 col-sm-6 product searchable" data-title="{{ $product->name }}" data-available="{{ $product->available }}" data-fabric="{{ $product->fabric }}" data-color="{{ $product->color }}" data-category="{{ $product->category }}" data-price="{{ $product->price }}">
                            <a href="#" data-id="{{ $product->id }}" data-toggle="modal" data-target="#hireModal" class="custom-card hires-window">
                                <div class="card product-inner overlay zoom p-3">
                                    <img src="{{ productImage($product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}" height="200px" width="200px" />
                                    
                                    <span class="product-name mt-3">{{ $product->name }}</span>
                                    <span class="price"><strong>R{{ format($product->price) }}</strong></span>
                                    <span class="sizes">Sizes: <strong>{{ $product->sizes }}</strong></span>
                                    
                                    <div class="hire-actions">
                                        @if($product->available === 1)
                                            <button class="btn btn-success green">Hire</button>
                                        @else
                                            <i class="fa fa-times no"></i> <span class="red">Currently unavailable</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single product -->
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $products->appends(request()->input())->links() }}
                </div>
            @else
                <p class="text-center mt-5">There are no garments to hire at the moment.</p>
            @endif
            <!-- end products row -->
        </div>
        <!-- end products section -->
    </div>
</div>
<!-- end page content -->

@endsection
