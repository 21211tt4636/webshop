@extends('frontend/layout/dashboard')
 @section('content')
    <div class="form-tt">
        <h2>Đăng nhập</h2>
        <form action="{{ route('login.custom') }}" method="post" name="dangnhap">
            @csrf
            <input type="text" name="name" placeholder="Name" required autofocus>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
            <input type="text" name="email" placeholder="Email" required autofocus>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            <input type="password" name="password" placeholder="Password" />
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <input type="checkbox" id="remember" name="remember"><label class="checkbox-text">Nhớ đăng nhập lần sau</label>
            <input type="submit" name="submit" value="Đăng nhập" />
            <div style = " display: flex; justify-content: flex-end;">
                <a href="{{ route('forget.password') }}" class="psw-text" >Quên mật khẩu</a>
                <a href="{{ route('register-user') }}" class="psw-text" style="color: pink;">Đăng Ký</a>

            </div>
        </form>
    </div>
    <!-- Hiển thị Thông báo khi đăng nhập sai -->
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
     @endif
    @if ($errors->any())
        <div class="alert alert-danger m-0-auto">
            <i class="fa-regular fa-circle-exclamation"></i>
            {{ $errors->first('error') }}
        </div>
        @endif
@endsection