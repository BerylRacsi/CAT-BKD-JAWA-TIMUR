@extends('layouts.app')

@section('navbar')

@stop

@section('content')

<div class="container pt-md-5" style="padding-bottom: 9em;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="text-center">Admin Login</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{-- <label for="email" class="col-md-4 col-form-label">E-Mail Address</label> --}}

                            <div class="col-md-8 ml-auto mr-auto">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{-- <label for="password" class="col-md-4 col-form-label">Password</label> --}}

                            <div class="col-md-8 ml-auto mr-auto">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>

                                <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                                Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection