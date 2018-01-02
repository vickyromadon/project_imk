@extends('layouts.templates')

@section('content')
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-in-form">
                <div class="signin">
                    <h1>Log in</h1>
                    <br>
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="log-input-left">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email" required>
                                
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="log-input-left">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="clearfix"> </div>
                        </div>
                        <input type="submit" value="Log in">
                    </form>  
                </div>
                <div class="new_people">
                    <h2>For New People</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet magni quisquam cum. Voluptates tempore quisquam quo sint perspiciatis, architecto quasi corporis, placeat harum dolores qui consequuntur ea repellendus tempora suscipit.</p>
                    <a href="/register">Register Now!</a>
                </div>
            </div>
        </div>
    </div>
@endsection
