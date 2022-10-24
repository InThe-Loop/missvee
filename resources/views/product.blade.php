@extends('layouts.app')
@section('title', $product->name)
@section('content')

<div id="wrapper">
    <div class="content">
        <div class="inner">
            <div class="container">
                <a class="go-back" href="#">
                    <div class="arrow pl-1"> Back</div>
                </a>
                <h3 class="lead text-dark mt-2">Product Details</h3>
                <div class="row mb-5">
                    <div class="col-md-4">
                        <!-- card left -->
                        <div class="img-display">
                            <div class="img-showcase zoom-img">
                                @if ($images)
                                    @foreach ($images as $image)
                                        <img src="{{ productImage($image) }}" alt="{{ $product->name }}" />
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="img-select">
                            @if ($images)
                                @foreach ($images as $image)
                                    <div class="img-item">
                                        <a href="#" data-id="{{ $loop->iteration }}">
                                            <img src="{{ productImage($image) }}" alt = "{{ $product->name }}" />
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="product-dtl">
                            <div class="product-info">
                                <div class="product-name">
                                    {{ $product->name }}
                                    <span class="badge badge-success">{{ $stockLevel }}</span>
                                </div>
                                <div class="reviews-counter">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <span>0 Reviews</span>
                                </div>
                                <div class="product-price-discount"><span>R{{ format($product->price) }}</span><span class="line-through">R200.00</span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 m-0">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf()
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <button type="submit" class="btn btn-secondary no-border mt-3 w-100">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="product-info-tabs">
                            <ul class="nav nav-tabs" id="infoTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="w-100">
                                        <p>{!! $product->description !!}</p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="size">Available size(s)</label>
                                                @foreach(explode(",", $product->size) as $size)
                                                    <span class="product-sizes">{{ $size }}</span> @if(!$loop->last)|@endif
                                                @endforeach
                                            </div>
                                            <div class="col-md-3">
                                                <label for="color">Available color(s)</label>
                                                @foreach(explode(",", $product->color) as $color)
                                                    <span class="product-color" style="background-color: {{ $color }};"></span>
                                                @endforeach
                                            </div>
                                            <div class="col-md-3">
                                                <label for="color">Size chart</label>
                                                <i class="fa fa-bar-chart" data-toggle="modal" data-target="#sizesModal"></i>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="color">Share on FB</label>
                                                <i class="fa fa-share fb-product-share"
                                                data-title="{{ $product->name }}"
                                                data-desc="{{ $product->description }}"
                                                data-price="{{ $product->price }}"
                                                data-slug="{{ $product->slug }}"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <label for="size">Model size (<span>{{ $product->model_size }}</span>)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="review-heading">REVIEWS</div>
                                    <p class="mb-20">There are no reviews yet. Be the first to rate this product.</p>
                                    <form class="review-form" method="POST">
                                        <div class="form-group">
                                            <label>Your rating</label>
                                            <div class="reviews-counter">
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="rate" value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Your name</label>
                                                    <input type="text" id="name" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Your email address</label>
                                                    <input type="text" id="email" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="message">Your message</label>
                                                    <textarea id="message" class="form-control" rows="4"></textarea>
                                                </div> 
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary no-border mt-4 w-100">Submit Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- sizes modal -->
<div class="modal fade" id="sizesModal" tabindex="-1" role="dialog" aria-labelledby="sizesModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-dark" id="myModalLabel">Size Chart</h4>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Waist</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>XS</td>
                            <td>28</td>
                        </tr>
                        <tr>
                            <td>S</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>M</td>
                            <td>32</td>
                        </tr>
                        <tr>
                            <td>L</td>
                            <td>34 - 36</td>
                        </tr>
                    </tbody>
                    <tfoot class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Waist</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default text-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@include('partials.might-like')
<!-- end page content -->

@endsection
