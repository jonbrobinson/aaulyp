@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- LOGIN FORM -->
                        <h2 class="section-heading">Welcome Back</h2>
                        <form class="form-horizontal" role="form" method="post" action="{{ url('/login') }}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="inputEmail3" class="control-label sr-only">Email</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ old('email') }}">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="control-label sr-only">Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" value="{{ old('password') }}">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="remember">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Sign in</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <p><em>Don't have an account yet?</em> <a href="/register"><strong>Sign Up</strong></a>
                            <br>
                            <em>Forgot your password?</em> <a href="{{ url('/password/reset') }}">Recover Password</a></p>
                        <!-- END LOGIN FORM -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('partials.footer')
@endsection
