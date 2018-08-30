@extends('layouts.auth')

@section('content')
<section class="login-content">
    <div class="logo">
        <h1>AMAX</h1>
    </div>
    <div class="login-box">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ĐĂNG NHẬP</h3>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label">Mật khẩu</label>
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       type="password" name="password" placeholder="Mật khẩu" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox"><span class="label-text">Nhớ mật khẩu</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="{{ route('password.request') }}" data-toggle="flip">Quên mật khẩu ?</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>ĐĂNG NHẬP</button>
            </div>
        </form>
    </div>
</section>
@endsection
