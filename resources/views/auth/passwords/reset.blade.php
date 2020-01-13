@extends('layouts.app')

@section('content')
    <div class="login-container">
        <h1>Reset Password</h1>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror

            <div class="input-group">
                <label for="email" >Email</label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
            </div>

            <div class="input-group">
                <label for="password" >Password</label>
                <input id="password" type="password"  name="password" required autocomplete="new-password" placeholder="Enter New Password">
            </div>
            <div class="input-group">
                <label for="password-confirm" >Confirm Password</label>
                <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Enter New Password">
            </div>
            <button type="submit" class="btn "> Reset Password </button>
        </form>

    </div>

@endsection
