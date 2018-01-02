@extends('layouts.templates')

@section('content')
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-up">
                <h1>Create an account</h1>
                <p class="creating">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, rerum sapiente fuga voluptatum? Corporis ad iste consequuntur debitis odio, minus odit pariatur tenetur vero, quis quod provident asperiores nihil, dicta.
                </p>
                <h2>Personal Information</h2>
                <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="sign-up1">
                            <h4>Username* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="clearfix"> </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="sign-up1">
                            <h4>Email Address* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="sign-up1">
                            <h4>Password* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input id="password" type="password" class="form-control" name="password" required>
                            
                            @if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="form-group">
                        <div class="sign-up1">
                            <h4>Confirm Password* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="sub_home">
                        <div class="sub_home_left">
                            <input type="submit" value="Create">
                        </div>
                        <div class="sub_home_right">
                            <p>Go Back to <a href="/">Home</a></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
