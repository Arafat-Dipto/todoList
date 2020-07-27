@extends('layouts.master')


@section('content')
<div class="register">
    <div class="container">
        <div class="loginform">
            <div class="logincard">
                @if(session('regSuccess'))
                    <p class="alert alert-success">{{ session('regSuccess') }}</p>
                @endif
                <h2 class="text-center text-secondary ">Login</h2>
                @include('partials.errors')
                <form class="form-group" action="{{ route('user.login') }}" method="POST">
                    {{ csrf_field() }}
                    <input class="form-control" type="email" name="email" placeholder="Enter Email"><br>
                    <input class="form-control" type="password" name="password" placeholder="password"><br>
                    <input type="submit" name="submit" value="login" class="btn btn-success pl-4 pr-4"
                    style="margin-left: 40%">
                </form>
                <p class="text-center">Register for an account <a href="{{ url('/') }}">Register</a></p>
            </div>
        </div>
    </div>
</div>

@endsection