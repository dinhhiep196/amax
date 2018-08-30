@extends('layouts.admin')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-envelope"></i> Thông tin liên hệ</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active">Thông tin liên hệ</li>
        </ul>
    </div>
    <div class="tile">
        <div class="row">
            <div class="col-sm-10 offset-1">
                <form method="POST" action="{{ route('info') }}">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="logo"><b>Logo</b></label>
                            <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn ảnh
                            </a>
                        </span>
                                <input id="logo" class="form-control" type="text" name="logo" value="{{ $logo }}" required>
                            </div>
                            <img id="holder" src="{{ $logo ? url($logo) : '' }}" style="margin-top:15px;margin-bottom: 15px;max-height:150px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="phone"><b>Số điện thoại</b></label>
                            <input class="form-control" id="phone" name="phone" type="text" value="{{ $phone }}" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="email"><b>Email</b></label>
                            <input class="form-control" id="email" name="email" type="email" value="{{ $email }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="companyName"><b>Tên công ty</b></label>
                            <input class="form-control" id="companyName" name="companyName" type="text" value="{{ $companyName }}" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="address"><b>Địa chỉ</b></label>
                            <input class="form-control" id="address" name="address" type="text" value="{{ $address }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="facebook"><b>Link Facebook</b></label>
                            <input class="form-control" id="facebook" name="facebook" type="text" value="{{ $facebook }}">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="youtube"><b>Link Youtube</b></label>
                            <input class="form-control" id="youtube" name="youtube" type="text" value="{{ $youtube }}">
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary float-left" type="submit" onclick="return confirm('Cập nhật?');">CẬP NHẬT</button>
                    <a class="btn btn-warning float-right" href="javascript:window.history.back();">TRỞ VỀ</a>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $('#info').addClass('active');
        var domain = '{{ asset('/laravel-filemanager') }}';
        $('#lfm').filemanager('image', {prefix: domain});
    </script>
@endsection