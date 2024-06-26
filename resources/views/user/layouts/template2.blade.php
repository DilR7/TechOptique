@php
    $categories = App\Models\Category::latest()->get();
    $user = Auth::id();
    $cart = App\Models\Cart::where('user_id', $user)->latest()->get();
    $wish = App\Models\Wishlist::where('user_id', $user)->latest()->get();
@endphp



<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TechOptique</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboardV2/assets/images/slogo.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('homeV2/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homeV2/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homeV2/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('homeV2/assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homeV2/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('homeV2/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('homeV2/assets/css/fontawesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('homeV2/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('homeV2/assets/css/main.css') }}">

    <style>
        .rate {
            float: right;
            height: 46px;
            padding: 0 10px;
        }

        .rate input[type="radio"] {
            position: absolute;
            left: -9999px;
            /* Move the input off-screen */
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
</head>

<body>

    <!-- preloader start -->
    <div id="preloader">
        <div class="bd-loader-inner">
            <div class="bd-loader">
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
            </div>
        </div>
    </div>
    <!-- preloader start -->

    <!-- Back to top start -->
    <div class="backtotop-wrap cursor-pointer">
        <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to top end -->

    <!-- search area start -->
    <div class="df-search-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="df-search-form">
                        <div class="df-search-close text-center mb-20">
                            <button class="df-search-close-btn df-search-close-btn"></button>
                        </div>
                        <form action="#">
                            <div class="df-search-input mb-10">
                                <input type="text" placeholder="Search for product...">
                                <button type="submit"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="df-search-category">
                                <span>Search by : </span>
                                <a href="#">Healthline, </a>
                                <a href="#">COVID-19, </a>
                                <a href="#">Surgery, </a>
                                <a href="#">Surgeon, </a>
                                <a href="#">Medical research</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- search area end -->

    <!-- Offcanvas area start -->
    <div class="fix">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.html">
                                <img src="assets/imgs/furniture/logo/logo-light.svg" alt="logo not found">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fal fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="offcanvas__search mb-25">
                        <form action="#">
                            <input type="text" placeholder="What are you searching for?">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu fix mb-40"></div>
                    <div class="offcanvas__contact mt-30 mb-20">
                        <h4>Contact Info</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank"
                                        href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A,
                                        A Tower, Indonesia</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+621383839232">+621383839232</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+012-345-6789"><span
                                            class="mailto:support@mail.com">support@mail.com</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="offcanvas__social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>
    <div class="offcanvas__overlay-white"></div>
    <!-- Offcanvas area start -->

    <!-- Header area start -->
    <header>
        <div class="header">
            <div class="header-layout-4 header-bottom">
                <div id="header-sticky" class="header-4">
                    <div class="mega-menu-wrapper">
                        <div class="header-main-4">
                            <div class="header-left">
                                <div class="header-logo">
                                    <a href="{{ route('Home') }}">
                                        <img src="{{ asset('dashboardV2/assets/images/logo.png') }}"
                                            alt="logo not found">
                                    </a>
                                </div>
                                <div class="mean__menu-wrapper furniture__menu d-none d-lg-block">
                                    <div class="main-menu">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <li class="has-dropdown">
                                                    <a href="{{ route('Home') }}">Home</a>
                                                </li>
                                                <li class="has-dropdown">
                                                    <a href="#">Category</a>
                                                    <ul class="submenu">
                                                        @foreach ($categories as $category)
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('categorypage', [$category->id, $category->slug]) }}">{{ $category->category_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li class="has-dropdown">
                                                    <a href="#">Account</a>
                                                    <ul class="submenu">
                                                        <li><a href="blog-grid.html">Profile</a></li>
                                                        <li>
                                                            <form method="POST" action="{{ route('logout') }}">
                                                                @csrf
                                                                <x-dropdown-link
                                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                                    {{ __('Log Out') }}
                                                                </x-dropdown-link>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{ route('contactus') }}">Contact</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="header-right d-inline-flex align-items-center justify-content-end">
                                <div class="header-search d-none d-xxl-block">
                                    <form action="{{ route('categorypage', [$category->id, $category->slug]) }}">
                                        <input type="text" placeholder="Search..." name="search">
                                        <button type="submit">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.4443 13.4445L16.9999 17" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M15.2222 8.11111C15.2222 12.0385 12.0385 15.2222 8.11111 15.2222C4.18375 15.2222 1 12.0385 1 8.11111C1 4.18375 4.18375 1 8.11111 1C12.0385 1 15.2222 4.18375 15.2222 8.11111Z"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                                <div class="header-action d-flex align-items-center pl-70">
                                    @if (Auth::check())
                                        <div class="header-action-item">
                                            <a href="{{ route('addtowishlist') }}" class="header-action-btn">
                                                <svg width="23" height="21" viewBox="0 0 23 21"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M21.2743 2.33413C20.6448 1.60193 19.8543 1.01306 18.9596 0.609951C18.0649 0.206838 17.0883 -0.0004864 16.1002 0.00291444C14.4096 -0.0462975 12.7637 0.529279 11.5011 1.61122C10.2385 0.529279 8.59252 -0.0462975 6.90191 0.00291444C5.91383 -0.0004864 4.93727 0.206838 4.04257 0.609951C3.14788 1.01306 2.35732 1.60193 1.72785 2.33413C0.632101 3.61193 -0.514239 5.92547 0.245772 9.69587C1.4588 15.7168 10.5548 20.6578 10.9388 20.8601C11.11 20.9518 11.3028 21 11.4988 21C11.6948 21 11.8875 20.9518 12.0587 20.8601C12.445 20.6534 21.541 15.7124 22.7518 9.69587C23.5164 5.92547 22.37 3.61193 21.2743 2.33413ZM20.4993 9.27583C19.6416 13.5326 13.4074 17.492 11.5011 18.6173C8.81516 17.0587 3.28927 13.1457 2.50856 9.27583C1.91872 6.35103 2.72587 4.65208 3.50773 3.74126C3.9212 3.26166 4.43995 2.87596 5.02678 2.61185C5.6136 2.34774 6.25396 2.21175 6.90191 2.21365C7.59396 2.16375 8.28765 2.2871 8.91534 2.57168C9.54304 2.85626 10.0833 3.29235 10.4835 3.83743C10.5822 4.012 10.7278 4.15794 10.9051 4.26003C11.0824 4.36212 11.2849 4.41662 11.4916 4.41787C11.6983 4.41911 11.9015 4.36704 12.0801 4.26709C12.2587 4.16714 12.4062 4.02296 12.5071 3.84959C12.9065 3.30026 13.448 2.86048 14.0781 2.57361C14.7081 2.28674 15.4051 2.16267 16.1002 2.21365C16.7495 2.21061 17.3915 2.34604 17.9798 2.6102C18.5681 2.87435 19.0881 3.26065 19.5025 3.74126C20.282 4.65208 21.0892 6.35103 20.4993 9.27583Z"
                                                        fill="black" />
                                                </svg>
                                                @php
                                                    $wtotal = 0;
                                                @endphp
                                                @foreach ($wish as $item)
                                                    @php
                                                        $wtotal += $item->quantity;
                                                    @endphp
                                                @endforeach
                                                <span
                                                    class="header-action-badge bg-furniture">{{ $wtotal }}</span>
                                            </a>
                                        </div>
                                        <div class="header-action-item ml-20">
                                            <a href="{{ route('addtocart') }}"
                                                class="header-action-btn cartmini-open-btn">
                                                <svg width="21" height="23" viewBox="0 0 21 23"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.0625 10.6C14.0625 12.5883 12.4676 14.2 10.5 14.2C8.53243 14.2 6.9375 12.5883 6.9375 10.6M1 5.8H20M1 5.8V13C1 20.6402 2.33946 22 10.5 22C18.6605 22 20 20.6402 20 13V5.8M1 5.8L2.71856 2.32668C3.12087 1.5136 3.94324 1 4.84283 1H16.1571C17.0568 1 17.8791 1.5136 18.2814 2.32668L20 5.8"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                @php
                                                    $stotal = 0;
                                                @endphp
                                                @foreach ($cart as $item)
                                                    @php
                                                        $stotal += $item->quantity;
                                                    @endphp
                                                @endforeach
                                                <span
                                                    class="header-action-badge bg-furniture">{{ $stotal }}</span>
                                            </a>
                                        </div>
                                        <div class="header-humbager ml-30">
                                            <a class="sidebar__toggle" href="javascript:void(0)">
                                                <div class="bar-icon-2">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                            </a>
                                            <!-- for wp -->
                                            <div class="header__hamburger ml-50 d-none">
                                                <button type="button" class="hamburger-btn offcanvas-open-btn">
                                                    <span>01</span>
                                                    <span>01</span>
                                                    <span>01</span>
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <div class="banner-btn-wrapper furniture__btn-group">
                                            <a class="solid-btn" href="{{ route('login') }}">Login</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header area end -->

    <!-- Body main wrapper start -->


    @yield('main-content')



    <!-- Body main wrapper end -->

    <!-- Footer area start -->
    <footer class="footer-bg">
        <div class="footer-area pt-100 pb-20">
            <div class="footer-style-4">
                <div class="container">
                    <div class="footer-grid-3">
                        <div class="footer-widget-4">
                            <div class="footer-logo mb-35">
                                <a href="index.html"><img src="assets/imgs/furniture/logo/logo-light.svg"
                                        alt="image bnot found"></a>
                            </div>
                            <div class="theme-social">
                                <a class="furniture-bg-hover" href="#"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                                <a class="furniture-bg-hover" href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a class="furniture-bg-hover" href="#"><i
                                        class="fa-brands fa-linkedin-in"></i></a>
                                <a class="furniture-bg-hover" href="#"><i
                                        class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="footer-widget-4">
                            <div class="footer-widget-title">
                                <h4>Services</h4>
                            </div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="error.html">Log In</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="error.html">Return Policy</a></li>
                                    <li><a href="error.html">Privacy policy</a></li>
                                    <li><a href="faq.html">Shopping FAQs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-widget-4">
                            <div class="footer-widget-title">
                                <h4>Company</h4>
                            </div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{ route('Home') }}">Home</a></li>
                                    <li><a href="about.html">Pages</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-widget footer-col-4">
                            <div class="footer-widget-title">
                                <h4>Contact</h4>
                            </div>
                            <div class="footer-info mb-35">
                                <p class="w-75">1234 Tower A Tangerang, Indonesia 20393</p>
                                <div class="footer-info-item d-flex align-items-start pb-15 pt-15">
                                    <div class="footer-info-icon mr-20">
                                        <span> <i class="fa-solid fa-location-dot furniture-icon"></i></span>
                                    </div>
                                    <div class="footer-info-text">
                                        <a class="furniture-clr-hover" target="_blank"
                                            href="https://www.google.com/maps/place/Orville+St,+La+Presa,+CA+91977,+USA/@32.7092048,-117.0082772,17z/data=!3m1!4b1!4m5!3m4!1s0x80d9508a9aec8cd1:0x72d1ac1c9527b705!8m2!3d32.7092003!4d-117.0060885">123-1023
                                            Tangerang Ct.</a>
                                    </div>
                                </div>
                                <div class="footer-info-item d-flex align-items-start">
                                    <div class="footer-info-icon mr-20">
                                        <span><i class="fa-solid fa-phone furniture-icon"></i></span>
                                    </div>
                                    <div class="footer-info-text">
                                        <a class="furniture-clr-hover" href="tel:021-1234-1222">+021-1234-1222</a>
                                        <p>Mon - Sat: 9 AM - 5 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-copyright-area b-t">
                <div class="footer-copyright-wrapper">
                    <div class="footer-copyright-text">
                        <p class="mb-0">© All Copyright 2024 by <a target="_blank" class="furniture-clr-hover"
                                href="#">TechOptique</a></p>
                    </div>
                    <div class="footer-payment d-flex align-items-center gap-2">
                        <div class="footer-payment-item mb-0">
                            <div class="footer-payment-thumb">
                                <img src="assets/imgs/icons/payoneer.png" alt="">
                            </div>
                        </div>
                        <div class="footer-payment-item mb-0">
                            <div class="footer-payment-thumb">
                                <img src="assets/imgs/icons/maser.png" alt="">
                            </div>
                        </div>
                        <div class="footer-payment-item">
                            <div class="footer-payment-thumb">
                                <img src="assets/imgs/icons/paypal.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="footer-conditions">
                        <ul>
                            <li><a class="furniture-clr-hover" href="#">Terms & Condition</a></li>
                            <li><a class="furniture-clr-hover" href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer area end -->

    <!-- JS here -->
    <script src="{{ asset('homeV2/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/meanmenu.min.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/counterup.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/wow.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/beforeafter.jquery-1.0.0.min.js') }}"></script>
    <script src="{{ asset('homeV2/assets/js/main.js') }}"></script>
</body>

</html>
