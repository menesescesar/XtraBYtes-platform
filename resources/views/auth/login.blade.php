@extends('layouts.master-background')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-content vertical-align-middle" style="background: rgba(40, 41, 41, 0.47);">
                <div class="panel-body">
                    <img class="center-block" style="height:250px;cursor: pointer;" src="{{ asset('img/xby-logo.png') }}" title="XtraBYtes" onclick="window.location='/';">
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input placeholder="{{trans('auth.email')}}" id="email" type="email" class="form-control" name="email" value="@if(session('email')){{session('email')}} @else {{old('email')}} @endif" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input placeholder="{{trans('auth.password')}}" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <label class="center-block text-center">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('auth.remember')}}
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <a class="btn btn-link center-block" href="{{ route('password.request') }}">
                                        {{trans('auth.forgot_password')}}?
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    {{trans('btns.login')}}
                                </button>

                                <a class="pull-right" href="{{route('register')}}">
                                    <button type="button" class="btn btn-primary">
                                        {{trans('btns.register')}}
                                    </button>
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
