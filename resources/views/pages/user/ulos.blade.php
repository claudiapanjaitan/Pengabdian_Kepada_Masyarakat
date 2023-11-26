<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link href="{{asset('assets/images/Logo/logo1.png')}}" rel="icon">
    <title>{{config('app.name')}}</title>
    <link href="{{asset('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{asset('assets/css/linearicons.css')}}" rel="stylesheet">
    <!-- General CSS Files -->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/components.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootsnav.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style1.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/style6.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/tambahan.css')}}" rel="stylesheet">
</head>

<body class="layout-3" style="background-color: white;">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            <nav class="navbar navbar-expand-lg main-navbar">
                <div class=" nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="navbar-header">
                        <div class="logo-navigasi">
                            <img src="{{asset('assets/images/Logo/logo1.png')}}" alt="" class="img1">
                            <img src="{{asset('assets/images/Logo/logo.png')}}" alt="" class="img2">
                        </div>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{route('home')}}" class="nav-link home">Beranda</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Produk</a></li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link">Layanan<span class="fa fa-angle-down" style="margin-left:7px"></span></a>
                            <ul class="dropdown-menu menu">
                                <li class="nav-item"><a class="nav-link" href="">Custom Ulos</a></li>
                                <li class="nav-item"><a class="nav-link" href="">Buka Toko</span></a>

                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
                    </ul>
                </div>
                <div class="attr-nav">
                    <ul>
                        <li class="dropdown">
                            <a href="<?php // base_url('produk/cart') ?>" class="dropdown" style="margin-left: 170px;" data-toggle="dropdown">
                                <span class="fa fa-shopping-cart"></span>
                                <span class="badge badge-bg-1"><?php // $this->cart->total_items(); ?></span>
                            </a>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Hi, {{Auth::user()->username}}
                                <span class="lnr lnr-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu menu">
                                <li class="nav-item"><a class="nav-link" href="{{route('user.akun')}}"><span class="lnr lnr-user"> Akun Saya</span> </a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('auth.logout')}}"><span class="lnr lnr-exit"> Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>

        </div>
    </div>
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1></h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!--new-arrivals start -->
    <section id="new-arrivals" class="new-arrivals">
        <div class="container">
            <div class="section-header" style="margin-top:100px;">
                <h2>Daftar Ulos</h2>
            </div>
            <!--/.section-header-->
            <div class="new-arrivals-content">
                <div class="row">
                    @foreach ($list_ulos as $list_ulos)
                        <div class="col-md-3 col-sm-4">

                            <div class="single-new-arrival">
                                <div class="single-new-arrival-bg">
                                    <img src="{{$list_ulos->image}}" alt="new-arrivals images">
                                    <div class="single-new-arrival-bg-overlay"></div>
                                    <div class="new-arrival-cart">
                                        <p>
                                            <span class="lnr lnr-cart"></span>
                                            <a href="#">add <span>to </span> cart</a>
                                        </p>
                                        <p class="arrival-review pull-right">
                                            <span class="lnr lnr-heart"></span>
                                            <span class="lnr lnr-frame-expand"></span>
                                        </p>
                                    </div>

                                </div>
                                <h4><a href="{{route('produk.show',$list_ulos->id)}}">{{$list_ulos->nama}}</a></h4>
                                <p class="arrival-product-price">Rp.{{number_format($list_ulos->harga)}}</p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--/.container-->
    </section>

    <!--newsletter strat -->
    <section id="newsletter" class="newsletter">
        <div class="container">
            <div class="hm-footer-details">
                <div class="row">
                    <div class=" col-md-3 col-sm-6 col-xs-12">
                        <div class="hm-footer-widget">
                            <div class="hm-foot-title">
                                <h4>information</h4>
                            </div>
                            <!--/.hm-foot-title-->
                            <div class="hm-foot-menu">
                                <ul>
                                    <li><a href="#">Beranda</a></li>
                                    <!--/li-->
                                    <li><a href="#">Produk</a></li>
                                    <!--/li-->
                                    <li><a href="#">Tentang</a></li>
                                    <!--/li-->
                                    <li><a href="#">Kontak Kami</a></li>
                                    <!--/li-->
                                </ul>
                                <!--/ul-->
                            </div>
                            <!--/.hm-foot-menu-->
                        </div>
                        <!--/.hm-footer-widget-->
                    </div>
                    <!--/.col-->
                    <div class=" col-md-3 col-sm-6 col-xs-12">
                        <div class="hm-footer-widget">
                            <div class="hm-foot-title">
                                <h4>Kategori Produk</h4>
                            </div>
                            <!--/.hm-foot-title-->
                            <div class="hm-foot-menu">
                                <ul>
                                    <li><a href="#">Aksesoris</a></li>
                                    <!--/li-->
                                    <li><a href="#">Busana</a></li>
                                    <!--/li-->
                                    <li><a href="#">Perlengkapan Rumah</a></li>
                                    <!--/li-->
                                    <li><a href="#">Sepatu</a></li>
                                    <!--/li-->
                                    <li><a href="#">Ulos</a></li>
                                    <!--/li-->
                                    <li><a href="#">Souvenir</a></li>
                                </ul>
                                <!--/ul-->
                            </div>
                            <!--/.hm-foot-menu-->
                        </div>
                        <!--/.hm-footer-widget-->
                    </div>
                    <!--/.col-->
                    <div class=" col-md-3 col-sm-6 col-xs-12">
                        <div class="hm-footer-widget">
                            <div class="hm-foot-title">
                                <h4>Layanan</h4>
                            </div>
                            <!--/.hm-foot-title-->
                            <div class="hm-foot-menu">
                                <ul>
                                    <li><a href="#">Custom Ulos</a></li>
                                    <!--/li-->
                                    <li><a href="#">Buka Toko</a></li>
                                    <!--/li-->
                                </ul>
                                <!--/ul-->
                            </div>
                            <!--/.hm-foot-menu-->
                        </div>
                        <!--/.hm-footer-widget-->
                    </div>
                    <!--/.col-->
                    <div class=" col-md-3 col-sm-6  col-xs-12">
                        <div class="hm-footer-widget">
                            <div class="hm-foot-title">
                                <h4>Contact Us</h4>
                            </div>
                            <!--/.hm-foot-title-->
                            <div class="hm-foot-para">
                                <p>
                                    Daftarkan Email Anda
                                </p>
                            </div>
                            <!--/.hm-foot-para-->
                            <div class="hm-foot-email">
                                <div class="foot-email-box">
                                    <input type="text" class="form-control" placeholder="Masukkan Email Disini...">
                                </div>
                                <!--/.foot-email-box-->
                                <div class="foot-email-subscribe">
                                    <span><i class="fa fa-location-arrow"></i></span>
                                </div>
                                <!--/.foot-email-icon-->
                            </div>
                            <!--/.hm-foot-email-->
                        </div>
                        <!--/.hm-footer-widget-->
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
            </div>
            <!--/.hm-footer-details-->

        </div>
        <!--/.container-->

    </section>
    <!--/newsletter-->
    <!--newsletter end -->

    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2022 <div class="bullet"></div> Develop By <a href="#">Kelompok 15
                TA</a>
        </div>
        <div class="footer-right">
            2.3.0
        </div>
    </footer>
    </div>

</body>

<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/user/js/popper.min.js')}}"></script>
<script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/bootsnav.js')}}"></script>
<script src="{{asset('assets/user/js/moment.min.js')}}"></script>
<script src="{{asset('assets/user/js/stisla.min.js')}}"></script>
<script src="{{asset('assets/user/js/sticky-kit.min.js')}}"></script>
<script src="{{asset('assets/user/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>