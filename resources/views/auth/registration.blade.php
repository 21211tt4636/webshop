@extends('frontend/layout/dashboard')

@section('content')
<div class="form-tt">
        <h2>Đăng Ký</h2>
        <form action="{{ route('register.custom') }}" method="post" name="dangnhap">
            @csrf
            <input type="text" name="name" placeholder="Name" required autofocus>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
            <input type="text" name="email" placeholder="Email" required >
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            <input type="password" name="password" placeholder="Password" require/>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <input type="submit" name="submit" value="Đăng Ký" />
        </form>
    </div>
@endsection