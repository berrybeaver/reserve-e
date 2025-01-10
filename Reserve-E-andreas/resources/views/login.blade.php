@extends('layout_login_logout')
@section('title')
    Login Page
@endsection
@section('massage')
    <span>{{$error}}<br></span>
@endsection
@section('form-login-out')
    <form method="get" action="/login-verification" >
        <br>
        <label for="email">E-Mail:</label>
        <input type="text" name="email">
        <br><br>
        <label for="password">Password:</label>
        <input type="text" name="password">
        <br><br>
        <button type="submit">Login</button>
        <br><br>
    </form>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
