@extends('user.layouts.template2')
@section('main-content')
    <main>

        <!-- Breadcrumb area start  -->
        <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
            <div class="breadcrumb__thumb" data-background="{{ asset('homeV2/assets/imgs/g2.jpg') }}"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper text-center">
                            <h2 class="breadcrumb__title">Product Details</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Product Details</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area start  -->

        <!-- Product details area start -->
        <div class="product__details-area section-space-medium">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-lg-6">
                        <div class="product__details-thumb-wrapper d-sm-flex align-items-start mr-50">
                            <div class="product__details-thumb-tab-content">
                                <div class="tab-content" id="productthumbcontent">
                                    <div class="tab-pane fade show active" id="img-1" role="tabpanel"
                                        aria-labelledby="img-1-tab">
                                        <div>
                                            <img src="{{ asset($product->product_img) }}" alt=""
                                                style="width: 500em">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="product__details-content pr-80">
                            <div class="product__details-top d-sm-flex align-items-center mb-15">
                                <div class="fs-rating mr-10">
                                    @php
                                        $total = 0;
                                        $stars = 0;
                                    @endphp
                                    @foreach ($review as $r)
                                        @php
                                            $total++;
                                            $stars += $r->stars_rated;
                                        @endphp
                                    @endforeach
                                    @php
                                        $averageRating = $total > 0 ? $stars / $total : 0;
                                    @endphp
                                    <i class="fa-solid fa-star"></i>
                                    <i href="#">{{ $averageRating }}</i>
                                </div>
                                <div class="product__details-review-count">
                                    <a href="#">{{ $total }} Reviews</a>
                                </div>
                            </div>
                            <h3 class="product__details-title text-capitalize">{{ $product->product_name }}</h3>
                            <div class="product__details-price">
                                <span class="old-price">$1500</span>
                                <span class="new-price">${{ $product->price }}</span>
                            </div>
                            <p>{{ $product->product_short_des }}</p>
                            <form action="{{ route('addproducttocart') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <div class="product__details-action mb-35">
                                    <div class="product__quantity">
                                        <div class="product-quantity-wrapper">
                                            <button class="cart-minus" onclick="decrementValue()"><i
                                                    class="fa-light fa-minus"></i></button>
                                            <input class="cart-input" type="text" value="1" name="quantity"
                                                id="quantity">
                                            <button class="cart-plus" onclick="incrementValue()"><i
                                                    class="fa-light fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="product__add-cart">
                                        <button class="fill-btn cart-btn" type="submit">
                                            <span class="fill-btn-inner">
                                                <span class="fill-btn-normal">Add To Cart<i
                                                        class="fa-solid fa-basket-shopping"></i></span>
                                                <span class="fill-btn-hover">Add To Cart<i
                                                        class="fa-solid fa-basket-shopping"></i></span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="product__add-wish">
                                        <a href="#" class="product__add-wish-btn"><i
                                                class="fa-solid fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="product__details-meta mb-20">
                                    <div class="sku">
                                        <span>SKU:</span>
                                        <a href="#">BO1D0MX8SJ</a>
                                    </div>
                                    <div class="categories">
                                        <span>Categories:</span> <a
                                            href="#">{{ $product->product_category_name }}</a>
                                    </div>
                                    <div class="tag">
                                        <span>Tags:</span> <a href="#"> <a
                                                href="#">{{ $product->product_subcategory_name }}</a>
                                    </div>
                                </div>
                            </form>
                            <div class="product__details-share">
                                <span>Share:</span>
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-behance"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__details-additional-info section-space-medium-top">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-4 col-lg-4">
                            <div class="product__details-more-tab mr-15">
                                <nav>
                                    <div class="nav nav-tabs flex-column " id="productmoretab" role="tablist">
                                        <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-description" type="button" role="tab"
                                            aria-controls="nav-description" aria-selected="true">Description</button>
                                        <button class="nav-link" id="nav-additional-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-additional" type="button" role="tab"
                                            aria-controls="nav-additional" aria-selected="false">Additional Information
                                        </button>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($review as $totals)
                                            @php
                                                $total++;
                                            @endphp
                                        @endforeach
                                        <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-review" type="button" role="tab"
                                            aria-controls="nav-review" aria-selected="false">Reviews
                                            ({{ $total }})</button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xxl-9 col-xl-8 col-lg-8">
                            <div class="product__details-more-tab-content">
                                <div class="tab-content" id="productmorecontent">
                                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                        aria-labelledby="nav-description-tab">
                                        <div class="product__details-des">
                                            <p>{{ $product->product_long_des }}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-additional" role="tabpanel"
                                        aria-labelledby="nav-additional-tab">
                                        <div class="product__details-info">
                                            <ul>
                                                <li>
                                                    <h4>Weight</h4>
                                                    <span>2 lbs</span>
                                                </li>
                                                <li>
                                                    <h4>Dimensions</h4>
                                                    <span>12 × 16 × 19 in</span>
                                                </li>
                                                <li>
                                                    <h4>Product</h4>
                                                    <span>Purchase this product on rag-bone.com</span>
                                                </li>
                                                <li>
                                                    <h4>Color</h4>
                                                    <span>Gray, Black</span>
                                                </li>
                                                <li>
                                                    <h4>Size</h4>
                                                    <span>S, M, L, XL</span>
                                                </li>
                                                <li>
                                                    <h4>Model</h4>
                                                    <span>Model </span>
                                                </li>
                                                <li>
                                                    <h4>Shipping</h4>
                                                    <span>Standard shipping: $5,95</span>
                                                </li>
                                                <li>
                                                    <h4>Care Info</h4>
                                                    <span>Machine Wash up to 40ºC/86ºF Gentle Cycle</span>
                                                </li>
                                                <li>
                                                    <h4>Brand</h4>
                                                    <span>Kazen</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-review" role="tabpanel"
                                        aria-labelledby="nav-review-tab">
                                        <div class="product__details-review">
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($review as $totals)
                                                @php
                                                    $total++;
                                                @endphp
                                            @endforeach
                                            <h3 class="comments-title">{{ $total }} reviews for
                                                “{{ $product->product_name }}”
                                            </h3>
                                            <div class="latest-comments mb-50">
                                                <ul>
                                                    @foreach ($review as $rev)
                                                        <li>
                                                            @php
                                                                $user_name = App\Models\User::where(
                                                                    'id',
                                                                    $rev->user_id,
                                                                )->value('name');

                                                            @endphp
                                                            <div class="comments-box d-flex">
                                                                <div class="comments-avatar mr-10">
                                                                    <img src="assets/imgs/user/user-01.png"
                                                                        alt="">
                                                                </div>
                                                                <div class="comments-text">
                                                                    <div
                                                                        class="comments-top d-sm-flex align-items-start justify-content-between mb-5">
                                                                        <div class="avatar-name">
                                                                            <h5>{{ $user_name }}</h5>
                                                                            <div class="comments-date">
                                                                                <span>{{ $rev->created_at }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-rating">
                                                                            <ul>
                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                    @if ($i <= $rev->stars_rated)
                                                                                        <li>
                                                                                            <a href="#"><i
                                                                                                    class="fas fa-star"></i></a>
                                                                                        </li>
                                                                                    @else
                                                                                        <li>
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-star"></i></a>
                                                                                        </li>
                                                                                    @endif
                                                                                @endfor
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <p>{{ $rev->comment }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                            <div class="product__details-comment section-space-medium-bottom">
                                                <div class="comment-title mb-20">
                                                    <h3>Add a review</h3>
                                                </div>
                                                <form action="{{ route('singleproduct', [$product->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                    <div class="comment-rating mb-20">
                                                        <span>Overall ratings</span>
                                                        <div class="rate">
                                                            <input type="radio" id="star5" name="stars_rated"
                                                                value="5" />
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" id="star4" name="stars_rated"
                                                                value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" name="stars_rated"
                                                                value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" name="stars_rated"
                                                                value="2" />
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" name="stars_rated"
                                                                value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>

                                                    </div>
                                                    <div class="comment-input-box">
                                                        <div class="row">
                                                            <div class="col-xxl-12">
                                                                <div class="comment-input">
                                                                    <textarea placeholder="Your review" name="comment"></textarea>
                                                                </div>
                                                            </div>
                                                            {{-- @if ($review->count() > 0)
                                                            @else --}}
                                                            <div class="col-xxl-12">
                                                                <div class="comment-submit">
                                                                    <button type="submit" class="fill-btn">
                                                                        <span class="fill-btn-inner">
                                                                            <span class="fill-btn-normal">submit
                                                                                now</span>
                                                                            <span class="fill-btn-hover">submit
                                                                                now</span>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            {{-- @endif --}}
                                                        </div>
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
        </div>
        </div>
        <!-- Product details area end -->
    </main>

    <section class="discount-area p-relative section-space pt-0">
        <div class="container">
            <div class="section-title-wrapper-4 mb-40 text-center">
                <h2 class="section-title-4">Related Product</h2>
            </div>

            <div class="row g-4">
                @foreach ($related_products as $product)
                    <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                                <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}"><img
                                        src="{{ asset($product->product_img) }}" alt=""></a>
                                <div class="product-action-item">
                                    <form action="{{ route('addproducttocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="1" name="quantity">
                                        <button type="submit" class="product-action-btn">
                                            <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.0768 10.1416C13.0768 11.9228 11.648 13.3666 9.88542 13.3666C8.1228 13.3666 6.69401 11.9228 6.69401 10.1416M1.375 5.84163H18.3958M1.375 5.84163V12.2916C1.375 19.1359 2.57494 20.3541 9.88542 20.3541C17.1959 20.3541 18.3958 19.1359 18.3958 12.2916V5.84163M1.375 5.84163L2.91454 2.73011C3.27495 2.00173 4.01165 1.54163 4.81754 1.54163H14.9533C15.7592 1.54163 16.4959 2.00173 16.8563 2.73011L18.3958 5.84163"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span class="product-tooltip">Add to Cart</span>
                                        </button>
                                    </form>

                                    <button type="button" class="product-action-btn" data-bs-toggle="modal"
                                        data-bs-target="#producQuickViewModal">

                                        <svg width="26" height="18" viewBox="0 0 26 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.092 4.55026C10.5878 4.55026 8.55683 6.58125 8.55683 9.08541C8.55683 11.5896 10.5878 13.6206 13.092 13.6206C15.5961 13.6206 17.6271 11.5903 17.6271 9.08541C17.6271 6.5805 15.5969 4.55026 13.092 4.55026ZM13.092 12.1089C11.4246 12.1089 10.0338 10.7196 10.0338 9.05216C10.0338 7.38473 11.3898 6.02872 13.0572 6.02872C14.7246 6.02872 16.0807 7.38473 16.0807 9.05216C16.0807 10.7196 14.7594 12.1089 13.092 12.1089ZM25.0965 8.8768C25.0875 8.839 25.092 8.79819 25.0807 8.76115C25.0761 8.74528 25.0655 8.73621 25.0603 8.7226C25.0519 8.70144 25.0542 8.67574 25.0429 8.65533C22.8441 3.62131 18.1064 0.724854 13.0572 0.724854C8.00807 0.724854 3.17511 3.61677 0.975559 8.65079C0.966488 8.67196 0.968 8.69388 0.959686 8.71806C0.954395 8.73318 0.943812 8.74074 0.938521 8.7551C0.927184 8.7929 0.931719 8.83296 0.92416 8.8715C0.910555 8.93953 0.897705 9.00605 0.897705 9.07483C0.897705 9.14361 0.910555 9.20862 0.92416 9.2774C0.931719 9.31519 0.926428 9.35677 0.938521 9.39229C0.943057 9.40968 0.954395 9.41648 0.959686 9.4316C0.967244 9.45201 0.965732 9.4777 0.975559 9.49887C3.17511 14.5314 7.96121 17.381 13.0104 17.381C18.0595 17.381 22.8448 14.5374 25.0436 9.5034C25.055 9.48148 25.0527 9.45956 25.061 9.43538C25.0663 9.42253 25.0761 9.4127 25.0807 9.39758C25.092 9.36055 25.089 9.32049 25.0965 9.28118C25.1101 9.21315 25.1222 9.14739 25.1222 9.0771C25.1222 9.01058 25.1094 8.94482 25.0958 8.87604L25.0965 8.8768ZM13.0104 15.8692C8.72841 15.8692 4.51298 13.6123 2.44193 9.07407C4.49333 4.55177 8.76469 2.23582 13.0572 2.23582C17.349 2.23582 21.5251 4.55404 23.5773 9.07861C21.5266 13.6002 17.3036 15.8692 13.0104 15.8692Z"
                                                fill="white" />
                                        </svg>
                                        <span class="product-tooltip">Quick View</span>
                                    </button>
                                    <button type="button" class="product-action-btn">

                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                                fill="white" />
                                        </svg>
                                        <span class="product-tooltip">Add To Wishlist</span>
                                    </button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4 class="product-title"><a href="product-details.html">{{ $product->product_name }}</a>
                                </h4>
                                <div class="user-rating mb-1">
                                    @php
                                        $averageRating = isset($averageRatings[$product->id])
                                            ? $averageRatings[$product->id]
                                            : 0;
                                    @endphp
                                    <i class="fas fa-star"></i> <i href="#">{{ $averageRating }}</i>
                                </div>
                                <div class="product-price">
                                    <span class="product-new-price">USD {{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>

    <script>
        function incrementValue() {
            var input = document.getElementById('quantity');
            var currentValue = parseInt(input.value); // Convert value to integer
            input.value = currentValue;
        }

        function decrementValue() {
            var input = document.getElementById('quantity');
            var currentValue = parseInt(input.value); // Convert value to integer
            if (currentValue > 1) {
                input.value = currentValue;
            }
        }

        <
        script >
            document.addEventListener("DOMContentLoaded", function() {
                const stars = document.querySelectorAll(".rate input[type='radio']");

                stars.forEach(star => {
                    star.addEventListener("click", function(event) {
                        event.preventDefault(); // Prevent default behavior

                        // Update the checked state of the clicked radio input
                        this.checked = true;

                        // Uncheck other radio inputs
                        stars.forEach(s => {
                            if (s !== this) {
                                s.checked = false;
                            }
                        });
                    });
                });
            });
    </script>

    </script>
@endsection
