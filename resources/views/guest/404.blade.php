@extends('layouts.guest')

@section('content')
    <div class="page-error">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12 col-12 text-center">
                    <h2><i class="fa fa-exclamation-circle"></i> Error 404: Page not found</h2>
                    <h4>Trang web bạn yêu cầu không tìm thấy!</h4>
                    <p><a class="btn btn-primary" href="javascript:window.history.back();">Trở về</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection