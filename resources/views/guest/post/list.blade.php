@extends('layouts.guest')
@section('title', $typeName.' | ')
@section('content')
<div class="list_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-sm-12 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $typeName }}</a></li>
                    </ol>
                </nav>
                <div class="main-section border">
                    @foreach( $posts as $post)
                    <div class="_post">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3 col-5">
                                <a href="{{ route('post', $post->slug) }}"><img src="{{ $post->thumbnailImage ? url($post->thumbnailImage) : asset('photos/1/logo/logo.png') }}" class="img-thumbnail"></a>
                            </div>
                            <div class="col-lg-9 col-sm-9 col-7 post_list_content">
                                <h4 class="text-black"><a style="color: #6c6c6c" href="{{ route('post', $post->slug) }}">{{ $post->title }}</a></h4>
                                <p>
                                    <i class="far fa-clock"></i> {{ date('H:i d/m/Y', strtotime($post->updated_at)) }}
                                </p>
                                <p> <a class="btn btn-sm btn-outline-primary" href="{{ route('post', $post->slug) }}">Xem chi tiết</a></p>

                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div>
                        {{ $posts -> links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var pageName = '{{ $typeName }}';
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