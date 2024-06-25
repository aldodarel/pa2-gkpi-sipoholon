@extends('layouts.boostrap')

@section('style', asset('css/style/login.css'))
@section('title', 'Login')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="login-holder shadow p-5 rounded">
    <div class="login-logo d-flex justify-content-center">
        <a href="{{ route('home.index') }}"><img src="{{ asset('img/icon.png') }}" alt=""></a>
    </div>
    <div class="login-form mt-5">
        <div class="col-12">
            @error("message")
                <p class="text-danger">{{$message}}</p>
            @enderror
            <form action="{{ route('auth.registersubmit', [$no_reg]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrasi</button>
            </form>
            <div class="mt-3">
                <p>Sudah memiliki akun? <a href="{{ route('auth.login') }}">Masuk di sini</a></p>
            </div>
        </div>
    </div>
</div>
@endsection