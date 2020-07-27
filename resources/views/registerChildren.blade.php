@extends('layouts.master')

@section('content')

    <div class=" register">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    <h3>Welcome</h3>
                    <p>Already have an account!</p>
                    <a href="{{ route('user.login.show') }}" class="nav-link input" style="padding: 2% 20% 2% 20%;margin-left: 20%" >Login</a><br/>
                </div>
                <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link " id="home-tab" data-toggle="tab" href="{{ url('/') }}" role="tab" aria-controls="home" aria-selected="true">Parent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="{{ url('/register/children') }}" role="tab" aria-controls="profile" aria-selected="false">Children</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @include('partials.errors')
                        <form action="{{ route('registerChildren') }}" method="POST" >
                            {{ csrf_field() }}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Register as a Children</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *" name="fname" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name *" name="lname" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username *" name="username" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" name="email" value="" />
                                    </div>


                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Parent's Phone *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" name="password" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  placeholder="Confirm Password *" name="password_confirmation" value="" />
                                    </div>

                                    <input type="submit" class="btnRegister" name="submit"  value="Register"/>
                                </div>
                            </div>
                        </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection