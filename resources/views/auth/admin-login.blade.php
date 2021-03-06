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
                                    <div class="btn btn-danger btn-block disabled">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{-- <label for="password" class="col-md-4 col-form-label">Password</label> --}}

                            <div class="col-md-8 ml-auto mr-auto">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <div class="btn btn-danger btn-block disabled">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection