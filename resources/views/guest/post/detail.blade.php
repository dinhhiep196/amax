@extends('layouts.guest')
@section('title')
    @if($post->type == 'gioi-thieu' || $post->type == 'lien-he')
        {{ $post->typeName.' | ' }}
    @else
        {{ $post->title.' | ' }}
    @endif
@endsection
@section('seo')
@endsection
@section('header')
    <meta property="fb:app_id" content="2101868153408438"/>
    <link rel="stylesheet" href="{{ asset('css/styles/post_detail_styles.css') }}">
@endsection
@section('facebook_plugin')
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=2101868153408438&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection
@section('content')
    <div class="single_post">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-12 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/c').'/'.$post->type }}">{{ $post->typeName }}</a></li>
                            @if($post->type != 'gioi-thieu' && $post->type != 'lien-he')
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                            @endif
                        </ol>
                    </nav>
                    <div class="card" style="background-color: rgb(250, 250, 250); border: none">
                        <div class="card-body">
                            <div class="single_post_title">{{ $post->title }}</div>
                            @if($post->type != 'gioi-thieu' && $post->type != 'lien-he')
                                <p><i class="far fa-clock"></i> {{ date('H:i d/m/Y', strtotime($post->updated_at)) }}</p>
                            @endif
                            <div class="single_post_text">
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>

                    <div class="fb-comments" data-href="{{ route('post', $post->slug) }}"  data-width="100%" data-numposts="5" data-order-by="reverse_time"></div>
                </div>
                <div class="col-lg-3 col-sm-12 justify-content-center">
                    <div class="fb-page" data-height="600" data-href="https://www.facebook.com/QCAMAX/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/QCAMAX/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/QCAMAX/">Công ty TNHH Quảng Cáo và Thương Mại AMAX</a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var pageName = '{{ $post->typeName }}';
        pageName = pageName.toUpperCase();
        $(document).ready(function () {
            $('.main_nav_dropdown li').each(function () {
                if($(this).text() === pageName){
                    $(this).addClass('active')
                }
            });
        })
    </script>
@endsection