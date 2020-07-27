@extends('layouts.master')


@section('content')
    <div class="register">
        <div class="container">
            <div class="loginform">
                <div class="logincard">
                    <h2 class="text-center text-secondary ">Admin Login</h2>
                    @include('partials.errors')
                    <form class="form-group" action="{{ route('admin.login') }}" method="POST">
                        {{ csrf_field() }}
                        <input class="form-control" type="text" name="username" placeholder="Enter Username"><br>
                        <input class="form-control" type="password" name="password" placeholder="password"><br>
                        <input type="submit" name="submit" value="login" class="btn btn-success pl-4 pr-4"
                               style="margin-left: 40%">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection