<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') Quảng Cáo AMAX | Làm Biển Quảng Cáo Chất Lượng Cao, Uy Tín Nhất</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Quảng cáo AMAX">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('seo')
    <link rel="shortcut icon" href="{{ asset('/photos/1/logo/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles/blog_single_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles/blog_single_responsive.css') }}">
    @yield('header')

</head>

<body>
@yield('facebook_plugin')
@include('guest.facebook_messenger')

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 d-flex flex-row">
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('photos/1/logo/phone.png') }}" alt=""></div><b>{{ \DB::table('infos')->where('name','phone')->first()->info }}</b></div>
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('photos/1/logo/mail.png') }}" alt=""></div>
                            <a href="mailto:{{ \DB::table('infos')->where('name','phone')->first()->info }}"><b>{{ \DB::table('infos')->where('name','email')->first()->info }}</b></a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="main_nav_content d-flex flex-row">

                            <!-- Categories Menu -->
                            <div class="cat_menu_container">
                                <a href="{{ url('/') }}" ><img height="100%" style="background-color: #fff;"
                                                  src="{{ \DB::table('infos')->where('name','logo')->first()->info ? asset(\DB::table('infos')->where('name','logo')->first()->info): asset('photos/1/logo/logo.png') }}">
                                </a>
                            </div>

                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu ml-auto">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="{{ route('home') }}">TRANG CHỦ<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{ route('postIntro') }}">GIỚI THIỆU<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{ route('listPost','dich-vu') }}">DỊCH VỤ<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{ route('listPost','du-an') }}">DỰ ÁN<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{ route('listPost','doi-tac') }}">ĐỐI TÁC<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{ route('listPost','tuyen-dung') }}">TUYỂN DỤNG<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{ route('listPost','tin-tuc') }}">TIN TỨC<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{ route('postContact') }}">LIÊN HỆ<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </div>

                            <!-- Menu Trigger -->

                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Menu -->

        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="page_menu_content">

                            <ul class="page_menu_nav">
                                <li class="page_menu_item"><a href="{{ route('home') }}">TRANG CHỦ</a></li>
                                <li class="page_menu_item"><a href="{{ route('postIntro') }}">GIỚI THIỆU</a></li>
                                <li class="page_menu_item"><a href="{{ route('listPost','dich-vu') }}">DỊCH VỤ</a></li>
                                <li class="page_menu_item"><a href="{{ route('listPost','du-an') }}">DỰ ÁN</a></li>
                                <li class="page_menu_item"><a href="{{ route('listPost','doi-tac') }}">ĐỐI TÁC</a></li>
                                <li class="page_menu_item"><a href="{{ route('listPost','tuyen-dung') }}">TUYỂN DỤNG</a></li>
                                <li class="page_menu_item"><a href="{{ route('listPost','tin-tuc') }}">TIN TỨC</a></li>
                                <li class="page_menu_item"><a href="{{ route('postContact') }}">LIÊN HỆ</a></li>
                            </ul>

                            <div class="menu_contact">
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('photos/1/logo/phone_white.png') }}" alt=""></div>{{ \DB::table('infos')->where('name','phone')->first()->info }}</div>
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('photos/1/logo/mail_white.png') }}" alt=""></div><a href="mailto:{{ \DB::table('infos')->where('name','email')->first()->info }}">{{ \DB::table('infos')->where('name','email')->first()->info }}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    @yield('content')

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer_contact">
                        <div class="footer_title">
                            <h4><b>{{ \DB::table('infos')->where('name','companyName')->first()->info }}</b></h4>
                            <h4><strong>Địa chỉ :</strong> {{ \DB::table('infos')->where('name','address')->first()->info }}</h4>
                            <h4><strong>Hotline :</strong> {{ \DB::table('infos')->where('name','phone')->first()->info }}</h4>
                            <h4><strong>Email:</strong> <a href="mailto:{{ \DB::table('infos')->where('name','email')->first()->info }}">{{ \DB::table('infos')->where('name','email')->first()->info }}</a></h4>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="{{ \DB::table('infos')->where('name','facebook')->first()->info }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ \DB::table('infos')->where('name','youtube')->first()->info }}"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="copyright_container text-center">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Bản quyền thuộc về {{ \DB::table('infos')->where('name','companyName')->first()->info }}</p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('css/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('css/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/slick/slick.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('scripts')
</body>

</html>