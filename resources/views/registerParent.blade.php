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
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="{{ url('/') }}" role="tab" aria-controls="home" aria-selected="true">Parent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="{{ url('/register/children') }}" role="tab" aria-controls="profile" aria-selected="false">Children</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @include('partials.errors')
                        <form action="{{ route('registerParent') }}" method="POST" >
                            {{ csrf_field() }}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Register as a Parent</h3>
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
                                        <input type="text" class="form-control" name="phone" placeholder="Your Phone *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password *" value="" />
                                    </div>

                                    <input type="submit" name="submit" class="btnRegister"  value="Register"/>
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