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
            <div class="form-group p-2">
                <div id="range-slider" class="m-auto">
                    <div id="slider-range"></div>
                    <p id="amount"></p>
                </div>
            </div>
            <h4 class="text-dark m-0">
                Availability
            </h4>
            <select class="form-control" id="sort">
                <option value="">Sort by Availability</option>
                <option value="">Show All</option>
                <option value="asc">Yes</option>
                <option value="desc">No</option>
            </select>
            <h4 class="text-dark m-0">
                By Category
            </h4>
            <select data-filter="category" class="filter-category filter form-control">
                <option value="">Filter by category</option>
                <option value="">Show All</option>
                <option value="Women">Women</option>
                <option value="Men">Men</option>
            </select>
            <h4 class="text-dark m-0">
                Price
            </h4>
            <select class="form-control" id="sort">
                <option value="">Sort by price</option>
                <option value="">Show All</option>
                <option value="asc">Price Low to High</option>
                <option value="desc">Price High to Low</option>
            </select>
            <h4 class="text-dark m-0">
                Fabric
            </h4>
            <select data-filter="fabric" class="filter-fabric filter form-control">
                <option value="">Filter by Fabric</option>
                <option value="">Show All</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
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
        </div>
        <!-- end filter section -->
        <!-- start products section -->
        <div class="col-md-10 mt-3">
            @if(!empty($products))
                <!-- start products row -->
                <div class="row products">
                    @foreach ($products as $product)
                        <!-- start single product -->
                        <div class="col-md-4 col-sm-6 product searchable" data-title="{{ $product->name }}" data-fabric="{{ $product->fabric }}" data-color="{{ $product->color }}" data-category="{{ $product->category }}" data-price="{{ $product->price }}">
                            <a href="#" data-id="{{ $product->id }}" data-toggle="modal" data-target="#hireModal" class="custom-card hires-window">
                                <div class="card view overlay zoom">
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
