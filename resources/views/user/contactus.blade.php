@extends('user.layouts.template2')
@section('main-content')
    <main>
        <!-- Breadcrumb area start  -->
        <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
            <div class="breadcrumb__thumb" data-background="{{ asset('HomeV2/assets/imgs/g2.jpg') }}"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper text-center">
                            <h2 class="breadcrumb__title">Contact</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Contact</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area start  -->

        <!-- Contact area start -->
        <div class="contact-area section-space">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xxl-4 col-xl-4 col-lg-6">
                        <div class="contact-info-item text-center">
                            <div class="contact-info-icon">
                                <span><i class="fa-light fa-location-dot"></i></span>
                            </div>
                            <div class="contact-info-content">
                                <h4>Our Location</h4>
                                <p><a href="#">House #5, Street Number #98, brasilia- 70000-000, Indonesia.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-6">
                        <div class="contact-info-item text-center">
                            <div class="contact-info-icon">
                                <span><i class="fa-light fa-envelope"></i></span>
                            </div>
                            <div class="contact-info-content">
                                <h4>Our Email Address</h4>
                                <span><a href="mailto:contact@TechOptique.com">contact@TechOptique.com</a></span>
                                <span><a href="mailto:support@TechOptique.com">support@TechOptique.com</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-6">
                        <div class="contact-info-item text-center">
                            <div class="contact-info-icon">
                                <span><i class="fa-thin fa-phone"></i></span>
                            </div>
                            <div class="contact-info-content">
                                <h4>Contact Phone Number</h4>
                                <span><a href="mailto:+628531234555">+628531234555</a></span>
                                <span><a href="mailto:+629121213323">+629121213323</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-wrapper pt-80">
                    <div class="row gy-50">
                        <div class="col-xxl-6 col-xl-6">
                            <div class="contact-map">
                                <iframe
                                    src="https://www.google.com/maps/d/embed?mid=1COwR4P6MHVszeem4Szb7moVbfJc&hl=en_US&ehbc=2E312F"></iframe>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6">
                            <div class="contact-from">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact__from-input">
                                                <input type="text" placeholder="Full Name*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact__from-input">
                                                <input type="text" placeholder="Email Address*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact__from-input">
                                                <input type="tel" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact__from-input">
                                                <input type="date">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact__from-input">
                                                <textarea name="Message" placeholder="Your Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="appointment__btn">
                                                <button class="fill-btn" type="submit">
                                                    <span class="fill-btn-inner">
                                                        <span class="fill-btn-normal">send now<i
                                                                class="fa-regular fa-angle-right"></i></span>
                                                        <span class="fill-btn-hover">send now<i
                                                                class="fa-regular fa-angle-right"></i></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact area end -->

    </main>
@endsection
