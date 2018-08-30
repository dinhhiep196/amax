@extends('layouts.admin')

@section('header')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
@endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-picture-o"></i> Slide (Các ảnh nên có cùng một tỷ lệ)</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active">Slide</li>
        </ul>
    </div>
    <div class="tile">
        <div class="row">
            @foreach( $slides as $number =>$slide)
            <div class="col-sm-10 offset-sm-1">
                <form method="POST" action="{{ route('slide.update',['id'=>$slide->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div id="slide{{$number+1}}" class="row">
                        <label class="col-sm-1" for="thumbnail{{$number+1}}"><h4>Slide {{$number+1}}</h4></label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm{{$number+1}}" data-input="thumbnail{{$number+1}}" data-preview="holder{{$number+1}}" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh
                                    </a>
                                </span>
                                <input id="thumbnail{{$number+1}}" class="form-control" type="text" name="link" value="{{ $slide->link }}">
                            </div>
                            <img class="w-100" id="holder{{$number+1}}" src="{{ $slide->link ? url($slide->link): '' }}" style="margin-top:15px;margin-bottom: 15px;">
                            <script type="text/javascript">
                                var domain = '{{ asset('/laravel-filemanager') }}';
                                $('#lfm{{$number+1}}').filemanager('image', {prefix: domain});
                            </script>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">

                            <button class="btn btn-primary float-left" type="submit" onclick="return confirm('Cập nhật?');">CẬP NHẬT ẢNH</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
            @endforeach
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $('#slide').addClass('active');
    </script>
@endsection