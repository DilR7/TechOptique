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
                            <h2 class="breadcrumb__title">Checkout</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>checkout</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area start  -->

        <!-- checkout-area start -->
        <section class="checkout-area section-space">
            <div class="container">
                <form action="{{ route('placeorder') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3 class="mb-15">Billing Details</h3>
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label for="first_name">First Name <span class="required">*</span></label>
                                            <input type="text" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label for="last_name">Last Name <span class="required">*</span></label>
                                            <input type="text" name="last_name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label for="address">Address <span class="required">*</span></label>
                                            <input type="text" placeholder="Street address" name="address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label for="city"> Town / City <span class="required">*</span></label>
                                            <input type="text" placeholder="Town / City" name="city">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label for="country">State / County <span class="required">*</span></label>
                                            <input type="text" placeholder="" name="country">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label for="postal_code">Postcode / Zip <span class="required">*</span></label>
                                            <input type="text" placeholder="Postcode / Zip" name="postal_code">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label for="email">Email Address <span class="required">*</span></label>
                                            <input type="email" placeholder="" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label for="phone_number">Phone <span class="required">*</span></label>
                                            <input type="text" placeholder="Phone Number" name="phone_number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($cart_items as $item)
                                                <tr class="cart_item">
                                                    @php
                                                        $product_name = App\Models\Product::where(
                                                            'id',
                                                            $item->product_id,
                                                        )->value('product_name');
                                                    @endphp
                                                    <td class="product-name">
                                                        {{ $product_name }}<strong class="product-quantity"> x
                                                            {{ $item->quantity }}</strong>
                                                    </td>
                                                    @php
                                                        $unittotal = $item->quantity * $item->price;
                                                    @endphp
                                                    <td class="product-total">
                                                        <span class="amount">{{ $unittotal }}</span>
                                                    </td>
                                                </tr>
                                                @php
                                                    $total += $unittotal;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">{{ $total }}</span></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <input type="radio">
                                                            <label>
                                                                Flat Rate: <span class="amount">$7.00</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input type="radio">
                                                            <label>Free Shipping:</label>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">$85.00</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">
                                    <div class="accordion" id="checkoutAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="checkoutOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                                                    Direct Bank Transfer
                                                </button>
                                            </h2>
                                            <div id="bankOne" class="accordion-collapse collapse show"
                                                aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                                <div class="accordion-body">
                                                    Make your payment directly into our bank account. Please use your
                                                    Order ID
                                                    as the payment reference. Your order won’t be shipped until the
                                                    funds have
                                                    cleared in our account.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="paymentTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#payment"
                                                    aria-expanded="false" aria-controls="payment">
                                                    Cheque Payment
                                                </button>
                                            </h2>
                                            <div id="payment" class="accordion-collapse collapse"
                                                aria-labelledby="paymentTwo" data-bs-parent="#checkoutAccordion">
                                                <div class="accordion-body">
                                                    Please send your cheque to Store Name, Store Street, Store Town,
                                                    Store
                                                    State / County, Store
                                                    Postcode.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="paypalThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#paypal"
                                                    aria-expanded="false" aria-controls="paypal">
                                                    PayPal
                                                </button>
                                            </h2>
                                            <div id="paypal" class="accordion-collapse collapse"
                                                aria-labelledby="paypalThree" data-bs-parent="#checkoutAccordion">
                                                <div class="accordion-body">
                                                    Pay via PayPal; you can pay with your credit card if you don’t have
                                                    a
                                                    PayPal account.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment mt-20">
                                        <button class="fill-btn" type="submit">
                                            <span class="fill-btn-inner">
                                                <span class="fill-btn-normal">Place order</span>
                                                <span class="fill-btn-hover">Place order</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- checkout-area end -->
    </main>
@endsection
