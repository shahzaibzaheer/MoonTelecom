@extends('layouts.app')

@section('content')
    

    <div class="login-container">
        <div class="logo"><img src="{{ asset('images/logo.png') }}" alt=""></div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror

            
            
            <div class="input-group">
                <label for="email" >Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
            </div>    
            <div class="input-group">
                <label for="password" >Password</label>
                <input id="password" type="password"  name="password" required autocomplete="current-password" placeholder="Enter Password">
            </div>
            <input type="hidden" name="remember" value="1" checked>
            <button type="submit" class="btn">Login</button>
            @if (Route::has('password.request'))
                <div class="link">
                        <a href="{{ route('password.request') }}"> Forgot Your Password ?</a>
                </div>
            @endif
        </form>

    </div>
@endsection
