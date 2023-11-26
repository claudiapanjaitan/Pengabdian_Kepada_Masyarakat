<header id="home" class="welcome-hero">

    @if(request()->is('home'))
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!--/.carousel-indicator -->
        <ol class="carousel-indicators">
            <li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>
        </ol><!-- /ol-->
        <!--/.carousel-indicator -->

        <!--/.carousel-inner -->
        <div class="carousel-inner" role="listbox">
            <!-- .item -->
            <div class="item active">
                <div class="single-slide-item slide1">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt">
                                            <h2>Produk Kerajinan Toba yang berkualitas</h2>
                                            <p>
                                                Produk Kerajinan Toba yang berkualitas dan diproduksi oleh oleh pengrajin yang handal.
                                            </p>
                                            <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
                                                Beli Sekarang
                                            </button>
                                            <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
                                                more info
                                            </button>
                                        </div>
                                        <!--/.welcome-hero-txt-->
                                    </div>
                                    <!--/.single-welcome-hero-->
                                </div>
                                <!--/.col-->
                                <div class="col-sm-5">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img-1">
                                            <img src="assets/images/Produk/imgslider1.png" alt="slider image">
                                        </div>
                                        <!--/.welcome-hero-txt-->
                                    </div>
                                    <!--/.single-welcome-hero-->
                                </div>
                                <!--/.col-->
                            </div>
                            <!--/.row-->
                        </div>
                        <!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->

            </div><!-- /.item .active-->
            <div class="item">
                <div class="single-slide-item slide2">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt">
                                            <h2>Produk Kerajinan Toba yang berkualitas</h2>
                                            <p>
                                                Produk Kerajinan Toba yang berkualitas dan diproduksi oleh oleh pengrajin yang handal.
                                            </p>
                                            <div class="packages-price">
                                                <p>
                                                    $ 199.00
                                                    <del>$ 299.00</del>
                                                </p>
                                            </div>
                                            <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
                                                <span class="lnr lnr-plus-circle"></span>
                                                add <span>to</span> cart
                                            </button>
                                            <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
                                                more info
                                            </button>
                                        </div>
                                        <!--/.welcome-hero-txt-->
                                    </div>
                                    <!--/.single-welcome-hero-->
                                </div>
                                <!--/.col-->
                                <div class="col-sm-5">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img">
                                            <img src="assets/images/slider/slider2.png" alt="slider image">
                                        </div>
                                        <!--/.welcome-hero-txt-->
                                    </div>
                                    <!--/.single-welcome-hero-->
                                </div>
                                <!--/.col-->
                            </div>
                            <!--/.row-->
                        </div>
                        <!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->

            </div><!-- /.item .active-->

            <div class="item">
                <div class="single-slide-item slide3">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt">
                                            <h2>Produk Kerajinan Toba yang berkualitas</h2>
                                            <p>
                                                Produk Kerajinan Toba yang berkualitas dan diproduksi oleh oleh pengrajin yang handal.
                                            </p>
                                            <div class="packages-price">
                                                <p>
                                                    $ 199.00
                                                    <del>$ 299.00</del>
                                                </p>
                                            </div>
                                            <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
                                                <span class="lnr lnr-plus-circle"></span>
                                                add <span>to</span> cart
                                            </button>
                                            <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
                                                more info
                                            </button>
                                        </div>
                                        <!--/.welcome-hero-txt-->
                                    </div>
                                    <!--/.single-welcome-hero-->
                                </div>
                                <!--/.col-->
                                <div class="col-sm-5">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img">
                                            <img src="assets/images/slider/slider3.png" alt="slider image">
                                        </div>
                                        <!--/.welcome-hero-txt-->
                                    </div>
                                    <!--/.single-welcome-hero-->
                                </div>
                                <!--/.col-->
                            </div>
                            <!--/.row-->
                        </div>
                        <!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->

            </div><!-- /.item .active-->
        </div><!-- /.carousel-inner-->

    </div>
    <!--/#header-carousel-->
    @else
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>{{$title}}</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> {{$title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- top-area Start -->
    <div class="top-area">
        <div class="header-area">
            <!-- Start Navigation -->
            <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

                <div class="container">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            @auth
                            <li class="dropdown">
                                <a href="{{route('cart.list')}}" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="fa fa-shopping-cart"></span>
                                    @php
                                       $total_items = \Cart::getContent()->count();
                                    @endphp
                                    <span class="badge badge-bg-1">{{$total_items}}</span>
                                </a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, {{Auth::check() ? Auth::user()->username : ''}}<span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu menu">
                                    <li class="nav-item"><a class="nav-link" href="{{route('user.akun')}}"><span class="lnr lnr-user"> Akun Saya</span> </a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('auth.logout')}}"><span class="lnr lnr-exit"> Logout</span></a></li>
                                </ul>
                            </li>
                            @endauth
                            @guest
                            @if(Auth::guard('penjual')->user())
                                <li class="dropdown">
                                    <a href="('produk/cart')" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="fa fa-shopping-cart"></span>
                                        @php
                                        $total_items = \Cart::getContent()->count();
                                        @endphp
                                        <span class="badge badge-bg-1">{{$total_items}}</span>
                                    </a>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, {{Auth::guard('penjual')->user()->nama}}<span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu menu">
                                        <li class="nav-item"><a class="nav-link" href="{{route('user.akun')}}"><span class="lnr lnr-user"> Akun Saya</span> </a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{route('penjual.auth.logout')}}"><span class="lnr lnr-exit"> Logout</span></a></li>
                                    </ul>
                                </li>
                            @else
                                <div class="attr-nav">
                                    <button class="btn-login">
                                        <a href="{{route('auth.index')}}">
                                            Login
                                        </a>
                                    </button>
                                </div>
                            @endif
                            @endguest
                        </ul>

                    </div>
                    <!--/.attr-nav-->
                    <div class="navbar-header">
                        <a href="{{route('home')}}">
                        <div class="logo-navigasi">
                            <img src="{{asset('assets/images/Logo/logo1.png')}}" alt="" class="img1">
                            <img src="{{asset('assets/images/Logo/logo.png')}}" alt="" class="img2">
                        </div>
                        </a>
                    </div>
                    <!--/.navbar-header-->
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                        @auth
                        <ul class="nav navbar-nav navbar-center">
                            <li class="{{request()->is('home') ? 'active' : ''}}"><a href="{{route('home')}}">Beranda</a></li>
                            <li class="scroll {{request()->is('produk/*') ? 'active' : ''}}"><a href="#new-arrivals" >Produk</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#">Layanan<span class="fa fa-angle-down"></span>
                                </a>

                                <ul class="dropdown-menu menu">
                                    <li class="nav-item"><a class="nav-link" href="{{route('user.ulos')}}">Custom Ulos</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Buka Toko</span></a>

                                </ul>
                            </li>
                            <li class="scroll"><a href="#newsletter">Tentang</a></li>
                        </ul>
                        @endauth
                        @guest
                        <ul class="nav navbar-nav navbar-center">
                            <li class=" {{request()->is('home') ? 'active' : ''}}"><a href="{{route('home')}}">Beranda</a></li>
                            <li class="scroll {{request()->is('produk/*') ? 'active' : ''}}"><a href="{{('user/profile')}}">Produk</a></li>
                            <li class="scroll"><a href="{{('user/daftarproduk');}}">Layanan</a></li>
                            <li class="scroll"><a href="{{('user/daftarproduk');}}">Tentang</a></li>
                        </ul>
                        @endguest
                        <!--/.nav -->
                    </div>

                </div>
            </nav>
            <!--/nav-->
            <!-- End Navigation -->
        </div>
    </div><!-- /.top-area-->
    <!-- top-area End -->

</header>