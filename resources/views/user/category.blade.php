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
                            <h2 class="breadcrumb__title">{{ $category->category_name }}</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>{{ $category->category_name }}</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area start  -->

        <!-- Product area start -->
        <section class="bd-product__area section-space">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="bd-product__result mb-30">
                            @php
                                $total = 0;
                            @endphp
                            @if (isset($products))
                                @foreach ($products as $pds)
                                    @php
                                        $total++;
                                    @endphp
                                @endforeach
                                <h4>{{ $total }} Item(s) On List</h4>
                            @else
                                <h4>{{ $category->product_count }} Item On List</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6">
                        <div
                            class="product__filter-wrapper d-flex flex-wrap gap-3 align-items-center justify-content-md-end mb-30">
                            <div class="product__filter-count d-flex align-items-center">
                                <div class="bd-product__filter-style nav nav-tabs" role="tablist">
                                    <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-grid" type="button" role="tab" aria-selected="false"><i
                                            class="fa-solid fa-grid"></i></button>
                                    <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-list" type="button" role="tab" aria-selected="true"><i
                                            class="fa-solid fa-bars"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="product__filter-tab">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="nav-grid" role="tabpanel"
                                    aria-labelledby="nav-grid-tab">
                                    @if (isset($products))
                                        <div class="row g-5">
                                            @foreach ($products as $pd)
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                    <div class="product-item">
                                                        <div class="product-thumb">
                                                            <a href="{{ route('singleproduct', [$pd->id, $pd->slug]) }}"><img
                                                                    src="{{ asset($pd->product_img) }}" alt=""></a>
                                                        </div>
                                                        <div class="product-action-item">
                                                            <form action="{{ route('addproducttocart') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $pd->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $pd->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <button type="submit" class="product-action-btn">
                                                                    <svg width="20" height="22" viewBox="0 0 20 22"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M13.0768 10.1416C13.0768 11.9228 11.648 13.3666 9.88542 13.3666C8.1228 13.3666 6.69401 11.9228 6.69401 10.1416M1.375 5.84163H18.3958M1.375 5.84163V12.2916C1.375 19.1359 2.57494 20.3541 9.88542 20.3541C17.1959 20.3541 18.3958 19.1359 18.3958 12.2916V5.84163M1.375 5.84163L2.91454 2.73011C3.27495 2.00173 4.01165 1.54163 4.81754 1.54163H14.9533C15.7592 1.54163 16.4959 2.00173 16.8563 2.73011L18.3958 5.84163"
                                                                            stroke="white" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                    <span class="product-tooltip">Add to Cart</span>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('addproducttowishlist') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $pd->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $pd->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <button type="submit" class="product-action-btn">

                                                                    <svg width="21" height="20" viewBox="0 0 21 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                    <span class="product-tooltip">Add To Wishlist</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="product-content">
                                                            <div class="product-tag">
                                                                <span>{{ $pd->product_subcategory_name }}</span>
                                                            </div>
                                                            <h4 class="product-title"><a
                                                                    href="{{ route('singleproduct', [$pd->id, $pd->slug]) }}">{{ $pd->product_name }}</a>
                                                            </h4>
                                                            <div class="product-price">
                                                                <span
                                                                    class="product-new-price">${{ $pd->price }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="row g-5">
                                            @foreach ($products as $product)
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                    <div class="product-item">
                                                        <div class="product-thumb">
                                                            <a
                                                                href="{{ route('singleproduct', [$product->id, $product->slug]) }}"><img
                                                                    src="{{ asset($product->product_img) }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="product-action-item">
                                                            <form action="{{ route('addproducttocart') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $product->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $product->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <button type="submit" class="product-action-btn">
                                                                    <svg width="20" height="22"
                                                                        viewBox="0 0 20 22" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M13.0768 10.1416C13.0768 11.9228 11.648 13.3666 9.88542 13.3666C8.1228 13.3666 6.69401 11.9228 6.69401 10.1416M1.375 5.84163H18.3958M1.375 5.84163V12.2916C1.375 19.1359 2.57494 20.3541 9.88542 20.3541C17.1959 20.3541 18.3958 19.1359 18.3958 12.2916V5.84163M1.375 5.84163L2.91454 2.73011C3.27495 2.00173 4.01165 1.54163 4.81754 1.54163H14.9533C15.7592 1.54163 16.4959 2.00173 16.8563 2.73011L18.3958 5.84163"
                                                                            stroke="white" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                    <span class="product-tooltip">Add to Cart</span>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('addproducttowishlist') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $product->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $product->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <button type="submit" class="product-action-btn">

                                                                    <svg width="21" height="20"
                                                                        viewBox="0 0 21 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                    <span class="product-tooltip">Add To Wishlist</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="product-content">
                                                            <div class="product-tag">
                                                                <span>{{ $product->product_subcategory_name }}</span>
                                                            </div>
                                                            <h4 class="product-title"><a
                                                                    href="{{ route('singleproduct', [$product->id, $product->slug]) }}">{{ $product->product_name }}</a>
                                                            </h4>
                                                            <div class="product-price">
                                                                <span
                                                                    class="product-new-price">${{ $product->price }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-list" role="tabpanel"
                                    aria-labelledby="nav-list-tab">
                                    @if (isset($products))
                                        <div class="row g-5">
                                            @foreach ($products as $pd)
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                    <div class="product-item">
                                                        <div class="product-thumb">
                                                            <a href="{{ route('singleproduct', [$pd->id, $pd->slug]) }}"><img
                                                                    src="{{ asset($pd->product_img) }}" alt=""></a>
                                                        </div>
                                                        <div class="product-action-item">
                                                            <form action="{{ route('addproducttocart') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $pd->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $pd->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <button type="submit" class="product-action-btn">
                                                                    <svg width="20" height="22" viewBox="0 0 20 22"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M13.0768 10.1416C13.0768 11.9228 11.648 13.3666 9.88542 13.3666C8.1228 13.3666 6.69401 11.9228 6.69401 10.1416M1.375 5.84163H18.3958M1.375 5.84163V12.2916C1.375 19.1359 2.57494 20.3541 9.88542 20.3541C17.1959 20.3541 18.3958 19.1359 18.3958 12.2916V5.84163M1.375 5.84163L2.91454 2.73011C3.27495 2.00173 4.01165 1.54163 4.81754 1.54163H14.9533C15.7592 1.54163 16.4959 2.00173 16.8563 2.73011L18.3958 5.84163"
                                                                            stroke="white" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                    <span class="product-tooltip">Add to Cart</span>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('addproducttowishlist') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $pd->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $pd->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <button type="submit" class="product-action-btn">

                                                                    <svg width="21" height="20" viewBox="0 0 21 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                    <span class="product-tooltip">Add To Wishlist</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="product-content">
                                                            <div class="product-tag">
                                                                <span>{{ $pd->product_subcategory_name }}</span>
                                                            </div>
                                                            <h4 class="product-title"><a
                                                                    href="{{ route('singleproduct', [$pd->id, $pd->slug]) }}">{{ $pd->product_name }}</a>
                                                            </h4>
                                                            <div class="product-price">
                                                                <span
                                                                    class="product-new-price">${{ $pd->price }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                    <div class="row g-5">
                                        @foreach ($products as $product)
                                            <div class="col-xxl-12 col-xl-12 col-md-6 col-sm-6">
                                                <div class="product-item">
                                                    <div class="product-thumb">
                                                        <a
                                                            href="{{ route('singleproduct', [$product->id, $product->slug]) }}"><img
                                                                src="{{ asset($product->product_img) }}"
                                                                alt=""></a>
                                                    </div>
                                                    <div class="product-action-item">
                                                        <form action="{{ route('addproducttocart') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $product->id }}"
                                                                name="product_id">
                                                            <input type="hidden" value="{{ $product->price }}"
                                                                name="price">
                                                            <input type="hidden" value="1" name="quantity">
                                                            <button type="submit" class="product-action-btn">
                                                                <svg width="20" height="22" viewBox="0 0 20 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M13.0768 10.1416C13.0768 11.9228 11.648 13.3666 9.88542 13.3666C8.1228 13.3666 6.69401 11.9228 6.69401 10.1416M1.375 5.84163H18.3958M1.375 5.84163V12.2916C1.375 19.1359 2.57494 20.3541 9.88542 20.3541C17.1959 20.3541 18.3958 19.1359 18.3958 12.2916V5.84163M1.375 5.84163L2.91454 2.73011C3.27495 2.00173 4.01165 1.54163 4.81754 1.54163H14.9533C15.7592 1.54163 16.4959 2.00173 16.8563 2.73011L18.3958 5.84163"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                <span class="product-tooltip">Add to Cart</span>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('addproducttowishlist') }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $product->id }}"
                                                                name="product_id">
                                                            <input type="hidden" value="{{ $product->price }}"
                                                                name="price">
                                                            <input type="hidden" value="1" name="quantity">
                                                            <button type="submit" class="product-action-btn">

                                                                <svg width="21" height="20" viewBox="0 0 21 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                                                        fill="white" />
                                                                </svg>
                                                                <span class="product-tooltip">Add To Wishlist</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="product-content" style="text-align: center">
                                                        <div class="product-tag">
                                                            <span>{{ $product->product_subcategory_name }}</span>
                                                        </div>
                                                        <h4 class="product-title"><a
                                                                href="{{ route('singleproduct', [$product->id, $product->slug]) }}">{{ $product->product_name }}</a>
                                                        </h4>
                                                        <div class="product-price">
                                                            <span class="product-new-price">${{ $product->price }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="bd-basic__pagination mt-50 d-flex align-items-center justify-content-center">
                        <nav>
                            <ul>
                                <li>
                                    <span class="current">1</span>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-regular fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product area end -->
    </main>
@endsection
