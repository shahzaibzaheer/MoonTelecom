@extends('layouts.app')

@section('content')
    <div class="login-container">
        <h1>Reset Password</h1>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            @if (session('status'))
                <span class="success"> {{ session('status') }}</span>
            @endif
            @error('email')
            <span class="error">{{ $message }}</span>
            @enderror

            <div class="input-group">
                <label for="email" >Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
            </div>
            <button type="submit" class="btn">
                Send Password Reset Link
            </button>
        </form>

    </div>
@endsection
