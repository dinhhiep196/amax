@extends('layouts.guest')

@section('title','Trang chủ | ')

@section('seo')
    <meta property="og:url" content="http://quangcaoamax.vn"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Quảng Cáo AMAX | Làm Biển Quảng Cáo Chất Lượng Cao, Uy Tín Nhất"/>
    <meta property="og:description" content="Làm biển quảng cáo giá rẻ tại Hà Nội"/>
    <meta property="og:image" content="http://quangcaoamax.vn//photos/1/logo/logo.png"/>
@endsection

@section('content')
    {{-- Slider --}}
    <div class="slider">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($slides as $key => $slide)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ ($key == 0) ? 'active':'' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($slides as $key => $slide)
                    <div class="carousel-item text-center {{ ($key == 0) ? 'active':'' }}">
                        <img class="d-block w-100" style="margin: auto" src="{{ $slide->link ? url($slide->link):'https://via.placeholder.com/1440x580' }}" alt="slide {{ $key }}">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Reviews -->

    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if(\App\Post::where('type','dich-vu')->where('showHomePage',true)->count() >0)
                        <div class="category">
                            <div class="reviews_title_container" style="margin-bottom: 10px;">
                                <a href="{{ url('/c/dich-vu') }}"><h3 class="reviews_title">DỊCH VỤ</h3></a>
                                <div class="reviews_all ml-auto"><a href="{{ url('/c/dich-vu') }}"><h5><b>XEM TẤT CẢ</b></h5></a></div>
                            </div>
                            <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                            @foreach( \App\Post::where('type','dich-vu')->where('showHomePage',true)->get() as $post)
                                <!-- Blog post -->
                                    <div class="blog_post">
                                        <a href="{{ route('post', $post->slug) }}">
                                            <div class="blog_image" style="background-image:url('{{ $post->thumbnailImage ? url($post->thumbnailImage) : asset('/photos/1/logo/logo.png') }}')"></div>
                                            <div class="blog_text">{{ \Str::words($post->title,10,'....') }}</div>
                                        </a>
                                        <div class="blog_button"><a href="{{ route('post', $post->slug) }}">Chi tiết</a></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(\App\Post::where('type','du-an')->where('showHomePage',true)->count() >0)
                        <div class="category">
                            <div class="reviews_title_container" style="margin-bottom: 10px;">
                                <a href="{{ url('/c/du-an') }}"><h3 class="reviews_title">DỰ ÁN</h3></a>
                                <div class="reviews_all ml-auto"><a href="{{ url('/c/du-an') }}"><h5><b>XEM TẤT CẢ</b></h5></a></div>
                            </div>
                            <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                            @foreach( \App\Post::where('type','du-an')->where('showHomePage',true)->get() as $post)
                            <!-- Blog post -->
                                <div class="blog_post">
                                    <a href="{{ route('post', $post->slug) }}">
                                        <div class="blog_image" style="background-image:url('{{ $post->thumbnailImage ? url($post->thumbnailImage) : asset('/photos/1/logo/logo.png') }}')"></div>
                                        <div class="blog_text">{{ \Str::words($post->title,10,'....') }}</div>
                                    </a>
                                    <div class="blog_button"><a href="{{ route('post', $post->slug) }}">Chi tiết</a></div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    @endif
                    @if(\App\Post::where('type','tin-tuc')->where('showHomePage',true)->count() >0)
                        <div class="category">
                            <div class="reviews_title_container" style="margin-bottom: 10px;">
                                <a href="{{ url('/c/tin-tuc') }}"><h3 class="reviews_title">TIN TỨC</h3></a>
                                <div class="reviews_all ml-auto"><a href="{{ url('/c/tin-tuc') }}"><h5><b>XEM TẤT CẢ</b></h5></a></div>
                            </div>
                            <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                            @foreach( \App\Post::where('type','tin-tuc')->where('showHomePage',true)->get() as $post)
                            <!-- Blog post -->
                                <div class="blog_post">
                                    <a href="{{ route('post', $post->slug) }}">
                                        <div class="blog_image" style="background-image:url('{{ $post->thumbnailImage ? url($post->thumbnailImage) : asset('/photos/1/logo/logo.png') }}')"></div>
                                        <div class="blog_text">{{ \Str::words($post->title,10,'....') }}</div>
                                    </a>
                                    <div class="blog_button"><a href="{{ route('post', $post->slug) }}">Chi tiết</a></div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    @endif
                    @if(\App\Post::where('type','doi-tac')->count() >0)
                        <div class="category">
                            <div class="reviews_title_container" style="margin-bottom: 10px;">
                                <a href="{{ url('/c/doi-tac') }}"><h3 class="reviews_title">ĐỐI TÁC</h3></a>
                                <div class="reviews_all ml-auto"><a href="{{ url('/c/doi-tac')}}"><h5><b>XEM TẤT CẢ</b></h5></a></div>
                            </div>
                            <div class="slick-slider partner-slick">
                                @foreach( \App\Post::where('type','doi-tac')->get() as $post)
                                    <div>
                                        <a href="{{ route('post', $post->slug) }}">
                                            <img height="150" src="{{ $post->thumbnailImage ? url($post->thumbnailImage) : asset('/photos/1/logo/logo.png') }}" alt="Slide">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.main_nav_dropdown li').each(function () {
                if($(this).text() === 'TRANG CHỦ'){
                    $(this).addClass('active')
                }
            });
            $('.partner-slick').slick({
                dots: true,
                infinite: true,
                speed: 500,
                autoplay:true,
                slidesToShow: 3,
                slidesToScroll:1,
                centerMode: true,
                variableWidth: true
            })
        })
    </script>
@endsection