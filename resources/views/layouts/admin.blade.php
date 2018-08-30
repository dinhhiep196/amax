<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Open Graph Meta-->
    <title>Quản trị website</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/photos/1/logo/favicon.ico') }}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("css/main.css") }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset("js/jquery-3.2.1.min.js") }}"></script>
    @yield('header')
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{ url('/admin') }}">AMAX</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item txtdeno" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;<i class="fa fa-angle-down fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="#"><i class="fa fa-key fa-lg"></i> Đổi mật khẩu</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i>Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="48px" src="{{ asset('photos/1/logo/avatar.png') }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
            <p class="app-sidebar__user-designation">Administrator</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a id="dashboard" class="app-menu__item" href="{{ route('dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a id="intro" class="app-menu__item" href="{{ route('intro.index') }}"><i class="app-menu__icon fa fa-hand-paper-o"></i><span class="app-menu__label">Giới thiệu</span></a></li>
        <li><a id="service" class="app-menu__item" href="{{ route('service.index') }}"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Dịch vụ</span></a></li>
        <li><a id="project" class="app-menu__item" href="{{ route('project.index') }}"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Dự án</span></a></li>
        <li><a id="partner" class="app-menu__item" href="{{ route('partner.index') }}"><i class="app-menu__icon fa fa-handshake-o"></i><span class="app-menu__label">Đối tác</span></a></li>
        <li><a id="recruitment" class="app-menu__item" href="{{ route('recruitment.index') }}"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Tuyển dụng</span></a></li>
        <li><a id="news" class="app-menu__item" href="{{ route('news.index') }}"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label">Tin tức</span></a></li>
        <li><a id="contacts" class="app-menu__item" href="{{ route('contacts.index') }}"><i class="app-menu__icon fa fa-info-circle"></i><span class="app-menu__label">Liên hệ</span></a></li>
        <li><a id="info" class="app-menu__item" href="{{ route('info')}}"><i class="app-menu__icon fa fa-envelope"></i><span class="app-menu__label">Thông tin liên hệ</span></a></li>
        <li><a id="slide" class="app-menu__item" href="{{ route('slide.index') }}"><i class="app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">Slide</span></a></li>
    </ul>
</aside>
<main class="app-content">
    @yield('content')
</main>
<!-- Essential javascripts for application to work-->
<script src="{{ asset("js/popper.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/main.js") }}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{ asset("js/plugins/pace.min.js") }}"></script>
@yield('scripts')
</body>
</html>