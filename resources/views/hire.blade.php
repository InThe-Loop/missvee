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
        <div class="col-md-2 mt-3">
            <h4 class="text-dark">
                By Category
            </h4>
            <ul class="filter-ul">
                <li><a class="active-cat">Women</a></li>
                <li><a>Men</a></li>
            </ul>
            <h4 class="text-dark">
                Availability
            </h4>
            <ul class="filter-ul">
                <li><a class="active-cat">Yes</a></li>
                <li><a>No</a></li>
            </ul>
        </div>
        <!-- end filter section -->
        <!-- start products section -->
        <div class="col-md-10 mt-3">
            <div class="head row">
                <div class="col-md-12 text-center">
                    <span class="sorter">
                        <a href="" class="{{ 'sort' == 'low_high' ? 'active-sort' : '' }}">
                            <img src="{{ asset('images/icons/low-high.png') }}" alt="Low to High" />
                        </a>
                    </span>
                    <span class="sorter">
                        <a href="" class="'sort' == 'high_low' ? 'active-sort' : '' }}">
                            <img src="{{ asset('images/icons/high-low.png') }}" alt="High to Low" />
                        </a>
                    </span>
                </div>
            </div>
            <!-- start products row -->
            <div class="row">
                @foreach ($products as $product)
                    <!-- start single product -->
                    <div class="col-md-6 col-sm-12 col-lg-4 product">
                        <a href="#" data-toggle="modal" data-target="#hireModal" class="custom-card">
                            <div class="card view overlay zoom">
                                <img src="{{ productImage($product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}" height="200px" width="200px">
                                <div class="card-body">
                                    <h5 class="text-dark">{{ $product->name }}</h5>
                                    <span class="price">R{{ format($product->price) }}</span>
                                    <span class="sizes">Sizes: {{ $product->sizes }}</span>
                                    <div class="hire-actions">
                                        @if($product->available === 1)
                                            <i class="fa fa-check yes"></i>
                                        @else
                                            <i class="fa fa-cross no"></i>
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
            <!-- end products row -->
        </div>
        <!-- end products section -->
    </div>
</div>
<!-- end page content -->

@endsection
