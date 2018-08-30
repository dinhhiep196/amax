@extends('layouts.admin')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('intro.index') }}" class="amax_thumbnail widget-small primary coloured-icon"><i class="icon fa fa-hand-paper-o fa-3x"></i>
                <div class="info">
                    <h4>Giới thiệu</h4>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('service.index') }}" class="amax_thumbnail widget-small primary coloured-icon"><i class="icon fa fa-cogs fa-3x"></i>
                <div class="info">
                    <h4>Dịch vụ</h4>
                    <p><b>{{ \App\Post::where('type','dich-vu')->count() }}</b></p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('project.index') }}" class="amax_thumbnail widget-small info coloured-icon"><i class="icon fa fa-book fa-3x"></i>
                <div class="info">
                    <h4>Dự án</h4>
                    <p><b>{{ \App\Post::where('type','du-an')->count() }}</b></p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('partner.index') }}" class="amax_thumbnail widget-small warning coloured-icon"><i class="icon fa fa-handshake-o fa-3x"></i>
                <div class="info">
                    <h4>Đối tác</h4>
                    <p><b>{{ \App\Post::where('type','doi-tac')->count() }}</b></p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('recruitment.index') }}" class="amax_thumbnail widget-small danger coloured-icon"><i class="icon fa fa-user-plus fa-3x"></i>
                <div class="info">
                    <h4>Tuyển dụng</h4>
                    <p><b>{{ \App\Post::where('type','tuyen-dung')->count() }}</b></p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('news.index') }}" class="amax_thumbnail widget-small info coloured-icon"><i class="icon fa fa-newspaper-o fa-3x"></i>
                <div class="info">
                    <h4>Tin tức</h4>
                    <p><b>{{ \App\Post::where('type','tin-tuc')->count() }}</b></p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('contacts.index') }}" class="amax_thumbnail widget-small danger coloured-icon"><i class="icon fa fa-info fa-3x"></i>
                <div class="info">
                    <h4>Liên hệ</h4>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('info') }}" class="amax_thumbnail widget-small primary coloured-icon"><i class="icon fa fa-envelope fa-3x"></i>
                <div class="info">
                    <h4>Thông tin liên hệ</h4>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('slide.index') }}" class="amax_thumbnail widget-small warning coloured-icon"><i class="icon fa fa-picture-o fa-3x"></i>
                <div class="info">
                    <h4>Ảnh slide</h4>
                    <p><b>{{ \DB::table('slides')->whereNotNull('link')->count() }}</b></p>
                </div>
            </a>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#dashboard').addClass('active');
    </script>
@endsection