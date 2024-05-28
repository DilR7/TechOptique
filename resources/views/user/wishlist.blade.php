@extends('user.layouts.template2')
@section('main-content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <main>
        <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
            <div class="breadcrumb__thumb" data-background="{{ asset('homeV2/assets/imgs/g2.jpg') }}"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper text-center">
                            <h2 class="breadcrumb__title">Wishlist</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Wishlist</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cart-area section-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Quantity</th>
                                        <th class="product-quantity">Unit Price</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($wishlist_items as $item)
                                        <tr>
                                            @php
                                                $product_name = App\Models\Product::where(
                                                    'id',
                                                    $item->product_id,
                                                )->value('product_name');
                                                $img = App\Models\Product::where('id', $item->product_id)->value(
                                                    'product_img',
                                                );
                                            @endphp
                                            <td class="product-thumbnail"><a href="product-details.html"><img
                                                        src="{{ asset($img) }}" alt="img"></a>
                                            </td>
                                            <td class="product-name"><a href="product-details.html">{{ $product_name }}</a>
                                            </td>
                                            <td class="product-price"><span class="amount">{{ $item->quantity }}</span></td>
                                            <td class="product-subtotal">{{ $item->price }}</td>
                                            @php
                                                $unittotal = $item->quantity * $item->price;
                                            @endphp
                                            <td class="product-subtotal"><span class="amount">{{ $unittotal }}</span>
                                            </td>
                                            <td class="product-remove"><a
                                                    href="{{ route('removewishlistitem', $item->id) }}"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @php
                                            $total += $unittotal;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
