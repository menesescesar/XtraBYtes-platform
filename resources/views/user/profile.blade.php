@extends('layouts.master-backoffice')

@section('page-title')
    {{ trans('users.profile')." ".$user->username }}
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="col-md-6">
            <h1 class="no-margin">{{ $user->username }}'s {{trans('users.details')}}</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-sm bg-blue pull-right" href="/profile/edit"><i class="fa fa-edit"></i>{{trans('btns.edit')}}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-0">
            <img src="/user/{{$user->id}}/image/{{$user->img}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="box-body no-padding">
            <table class="table">
                <tbody>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-user"></i></td>
                    <td style="width: 100px"><strong>{{trans('users.username')}}</strong></td>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-user"></i></td>
                    <td><strong>{{trans('users.name')}}</strong></td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-envelope-o"></i></td>
                    <td><strong>{{trans('users.email')}}</strong></td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i></td>
                    <td><strong>{{trans('users.timezone')}}</strong></td>
                    <td>{{$user->timezone}}</td>
                </tr>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-calendar"></i></td>
                    <td><strong>{{trans('users.last_login')}}</strong></td>
                    <td>{{$user->last_login}}</td>
                </tr>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-info-circle"></i></td>
                    <td><strong>{{trans('users.account')}}</strong></td>
                    <td>
                        @if($user->active)
                            {{trans('users.active')}}
                        @else
                            {{trans('users.disabled')}}
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection