<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    @stack('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    {{-- @vite(['resources/js/app.js']) --}}
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- script
  ================================================== -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
</head>

<body>

    <div id="header-wrap">

        <div class="top-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-youtube-play"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                </li>
                            </ul>
                        </div><!--social-links-->
                    </div>
                    <div class="col-md-6">

                        <div class="right-element flex">
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="user-account for-buy"><i
                                            class="icon icon-user"></i><span>Login</span></a>
                                @endif
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="user-account for-buy"><i
                                            class="icon icon-user"></i><span>Resister</span></a>
                                @endif
                            @else
                                <a class="user-account for-buy" href="#">
                                    {{ Auth::user()->name }}
                                </a>
                                <a class="user-account for-buy" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form style="display: none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                                <a href="/cartt" class="cart for-buy"><i
                                        class="icon icon-clipboard"></i><span>Cart:({{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}
                                        $)</span></a>
                            @endguest

                            <div class="action-menu">

                                <div class="search-bar">
                                    <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                        <i class="icon icon-search"></i>
                                    </a>
                                    <form role="search" method="get" class="search-box">
                                        <input class="search-field text search-input" placeholder="Search"
                                            type="search">
                                    </form>
                                </div>
                            </div>

                        </div><!--top-right-->
                    </div>

                </div>
            </div>
        </div><!--top-content-->

        <header id="header">
            <div class="container">
                <div class="row">

                    <div class="col-md-2">
                        <div class="main-logo">
                            <a href="/index"><img src="{{ asset('images/main-logo.png') }}" alt="logo"></a>
                        </div>

                    </div>

                    <div class="col-md-10">

                        <nav id="navbar">
                            <div class="main-menu stellarnav">
                                <ul class="menu-list">
                                    <li class="menu-item active"><a href="/index" data-effect="Home">Home</a></li>
                                    <li class="menu-item"><a href="/about" class="nav-link"
                                            data-effect="About">About</a></li>
                                    <li class="menu-item has-sub">
                                        <a href="#pages" class="nav-link" data-effect="Pages">Pages</a>

                                        <ul>
                                            <li class="active"><a href="/index">Home</a></li>
                                            <li><a href="/about">About</a></li>
                                            <li><a href="styles.html">Styles</a></li>
                                            <li><a href="blog">Blog</a></li>
                                            <li><a href="single-post.html">Post Single</a></li>
                                            <li><a href="shop">Our Store</a></li>
                                            <li><a href="book_detail">Product Single</a></li>
                                            <li><a href="/contact">Contact</a></li>
                                            <li><a href="thank-you.html">Thank You</a></li>
                                        </ul>

                                    </li>
                                    <li class="menu-item"><a href="/shop" class="nav-link"
                                            data-effect="Shop">Shop</a></li>
                                    <li class="menu-item"><a href="#latest-blog" class="nav-link"
                                            data-effect="Articles">Articles</a></li>
                                    <li class="menu-item"><a href="/contact" class="nav-link"
                                            data-effect="Contact">Contact</a></li>
                                </ul>

                                <div class="hamburger">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </div>

                            </div>
                        </nav>

                    </div>

                </div>
            </div>
        </header>

    </div><!--header-wrap-->
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif


    {{-- ======================================================================================================== --}}
    {{-- ======================================================================================================== --}}
    {{-- ======================================================================================================== --}}
    {{-- ======================================================================================================== --}}
    @yield('content')
    {{-- ======================================================================================================== --}}
    {{-- ======================================================================================================== --}}
    {{-- ======================================================================================================== --}}
    {{-- ======================================================================================================== --}}


    <footer id="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4">

                    <div class="footer-item">
                        <div class="company-brand">
                            <img src="{{ asset('images/main-logo.png') }}" alt="logo" class="footer-logo">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus
                                nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames
                                semper erat ac in suspendisse iaculis.</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>About Us</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">vision</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">articles </a>
                            </li>
                            <li class="menu-item">
                                <a href="#">careers</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">service terms</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">donate</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>Discover</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Books</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Authors</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Subjects</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Advanced Search</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>My account</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Sign In</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">View Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">My Wishtlist</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Track My Order</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>Help</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Help center</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Report a problem</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Suggesting edits</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Contact us</a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- / row -->

        </div>
    </footer>

    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="copyright">
                        <div class="row">

                            <div class="col-md-6">
                                <p>© 2022 All rights reserved. Free HTML Template by <a
                                        href="://www.templatesjungle.com/" target="_blank">TemplatesJungle</a></p>
                            </div>

                            <div class="col-md-6">
                                <div class="social-links align-right">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon icon-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-youtube-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-behance-square"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div><!--grid-->

                </div><!--footer-bottom-content-->
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')
</body>

</html>
