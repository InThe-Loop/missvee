<!-- privacy modal -->
<div class="modal modal-fullscreen fade" id="hireModal" tabindex="-1" role="dialog" aria-labelledby="hireModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-dark" id="myModalLabel">Reserve this item</h4>
                <button type="button" class="close text-dark close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                @if(isset($product))
                    <div class="row mb-5">
                        <div class="col-md-7">
                            <div class="product-dtl">
                                <div class="product-info">
                                    <div class="product-name">
                                        {{ $product->name }}
                                        <span class="badge badge-success"></span>
                                    </div>
                                    <div class="col p-0">
                                        <span class="now-price">R{{ format($product->price) }}</span> for 1 day
                                    </div>
                                </div>
                                <div class="w-100">
                                    <p>{!! $product->description !!}</p>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="size">Available size(s)</label>
                                            <strong class="product-sizes">{{ $product->sizes }}</strong>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="color">Size chart</label>
                                            <i class="fa fa-bar-chart" data-toggle="modal" data-target="#sizesModal"></i>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="color">Share on FB</label>
                                            <i class="fa fa-share fb-product-share"
                                            data-title="For hire: {{ $product->name }}"
                                            data-desc="{{ $product->description }}"
                                            data-price="{{ $product->price }}"
                                            data-slug="www.missveefamouslook.store/hire"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0">
                                    <div class="review-heading mt-5">Terms and conditions of hire</div>
                                    <p>
                                        <li>All items carry a 100% refundable deposit.</li>
                                        <li>Drop-offs by no later than 10h00 Mon to Sat.</li>
                                        <li>A R100.00 late fee will be deducted from the deposit for every 1 hour after 10h00.</li>
                                        <li>Item to be returned in the same condition as they were picked up. Fair wear and tear excepted.</li>
                                        <li>Copy of identity documentation (ID/Passport/Driver's Licence) and proof of residence required upon pickup.</li>
                                        <li>Failure to return the garment will constitute theft and as such a case will be reported to the SAPS and deposit forfeited.</p>
                                    </p>
                                    <form id="reservation-form" class="review-form mt-5" method="POST">
                                        @csrf
                                        <input type="hidden" id="hire-name" value="{{ $product->name }}" />
                                        <input type="hidden" id="hire-price" value="{{ $product->price }}" />
                                        <input type="hidden" id="hire-days" value="" />

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Your fullname</label>
                                                    <input type="text" id="name" name="name" class="form-control mt-2" maxlength="50" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Your email address</label>
                                                    <input type="email" id="email" name="email" class="form-control mt-2" maxlength="100" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Your telephone</label>
                                                    <input type="number" id="phone" name="phone" class="form-control mt-2" maxlength="10" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Your residential address</label>
                                                    <i class="fa fa-question proof-address" data-toggle="tooltip" data-placement="top" title="Please note that you will need to provide proof of this address (e.g. electricity bill, retail account statement, bank statement)"></i>
                                                    <textarea class="form-control mt-2" id="address" name="address" rows="4" maxlength="500" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="range">Hire duration</label>
                                                    <input class="form-control mt-2" name="range" id="range" maxlength="100" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="total-hire">
                                            <h6 class="lead text-dark mt-2">Total due at pickup: R<span id="hire-total">{{ format($product->price * 2) }}</span> (inc. deposit of R{{ format($product->price) }})</h6>
                                        </div>
                                        <button id="make-reservation" type="submit" class="btn btn-secondary no-border mt-2 w-100">Reserve item now</button>
                                        <div class="success-msg p-2 alert-success hide">
                                            <h3 class="text-dark">Successful</h3>
                                            <p>Your reservation has been placed successfully.</p>
                                            <p>Please produce this booking reference number on your arrival: <strong id="reference"></strong></p>
                                            <p>We've also emailed the details of this reservation to your email address for your reference.</p>
                                            <p>Thank you.</p>
                                        </div>
                                        @php
                                            $whatsText = str_replace(" ", "%20", "I would like to make a booking for: " . $product->name . " at R" . ($product->price * 2))
                                        @endphp
                                        <a class="btn btn-success no-border mt-2 w-100" target="_blank" href="https://wa.me/0681037459?text={{ $whatsText }}"><i class="fab fa-whatsapp" aria-hidden="true"></i> Book on WhatsApp</a>
                                        <div class="stage hide">
                                            <div class="dot"></div>
                                            <div class="ping"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            @php
                                $images = json_decode($product->images)
                            @endphp
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
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default text-dark close-modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
