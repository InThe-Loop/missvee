<!-- privacy modal -->
<div class="modal modal-fullscreen fade" id="hireModal" tabindex="-1" role="dialog" aria-labelledby="hireModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-dark" id="myModalLabel">Hire this dress</h4>
                <button type="button" class="close text-dark close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                @if(isset($product))
                    <div class="row mb-5">
                        <div class="col-md-5">
                            <!-- card left -->
                            <div class="img-display">
                                <div class="img-showcase zoom-img">
                                    <img src="" alt="{{ $product->name }}" />
                                </div>
                            </div>
                            <div class="img-select">
                                <div class="img-item">
                                    <a href="#" data-id="">
                                        <img src="" alt = "{{ $product->name }}" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-dtl">
                                <div class="product-info">
                                    <div class="product-name">
                                        {{ $product->name }}
                                        <span class="badge badge-success"></span>
                                    </div>
                                    <div class="col p-0">
                                        <span class="now-price">R{{ format($product->price) }}</span><span class="line-through">was R{{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info-tabs">
                                <ul class="nav nav-tabs" id="infoTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Hire</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                        <div class="w-100">
                                            <p>{!! $product->description !!}</p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="size">Available size(s)</label>
                                                    <strong class="product-sizes">{{ $product->sizes }}</strong>
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
                                            @if($product->black_friday_price !== 0)
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="size">Black Friday Deal (Special ends 30 November 2022)</label>
                                                        <img class="product-details-black-friday" src="{{ asset('images/icons/black_fri.jpg') }}" alt="Black Friday Deal" />
                                                    </div>
                                                </div>
                                            @endif
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
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default text-dark close-modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
