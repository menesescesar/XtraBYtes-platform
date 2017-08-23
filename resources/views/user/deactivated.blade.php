@extends('layouts.master-background')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-content vertical-align-middle" style="background: rgba(40, 41, 41, 0.47);">
                <div class="panel-body">
                    <img class="center-block" style="height:250px" src="{{ asset('img/xby-logo.png') }}" title="XtraBYtes">
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="text-center" >
                                <h4><b>{{ trans('auth.Your_account_is_deactivated') }}</b></h4>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="text-center">
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    {{ csrf_field() }}
                                    <a href="#" onclick='document.getElementById("logout-form").submit()' class="btn btn-default btn-flat">{{ trans('layout-partials.SignOut') }}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
