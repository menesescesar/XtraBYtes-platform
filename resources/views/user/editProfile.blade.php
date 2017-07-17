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
            <a class="btn btn-sm bg-blue pull-right" href="/profile"><i class="fa fa-times"></i>{{trans('btns.cancel')}}</a>
        </div>
    </div>
    <div class="row">
        <form enctype="multipart/form-data" method="POST" action="{{ route('post.profile.edit',['id' => $user->id]) }}">
            {{ csrf_field() }}
            <div class="col-md-2 col-md-offset-0 clearfix" style="text-align: center;">
                <img src="/user/{{$user->id}}/image/{{$user->img}}" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
                <div class="clearfix" style="text-align: center;">
                    <input type="button" value="Update Profile Image" class="btn btn-sm btn-primary" style="margin-top: 10px;" onclick="document.getElementById('user-img').click();" />
                    <input type="file" style="display:none;" id="user-img" name="user-img"/>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-0">
                <div class="box-body">

                    <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input disabled type="text" name="username" class="form-control" value="{{ $user->username or old('username') }}" placeholder="{{ trans('auth.username') }}">
                        </div>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" value="{{ $user->name or old('name')}}" placeholder="{{ trans('auth.name') }}">
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input disabled type="text" name="email" class="form-control" value="{{ $user->email or old('email')}}" placeholder="{{ trans('auth.email') }}">
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('timezone') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <select name="timezone" id="timezone" class="js-example-basic-single">
                                <?php $timezones = timezoneList();?>
                                <option value=""></option>
                                @foreach($timezones as $value => $label)
                                    <option @if(old('timezone') == $value or $user->timezone==$value) selected @endif value="{{$value}}">{{$label}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('timezone'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('timezone') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="current_password" class="form-control" placeholder="{{ trans('auth.current_password') }}">
                        </div>
                        @if ($errors->has('current_password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="{{ trans('auth.new_password') }}">
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('auth.new_password_confirmation') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="{{ trans('auth.save') }}" class="btn btn-sm btn-primary pull-right">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra_scripts')
<script>
$(document).ready(function() {
    $(".js-example-basic-single").select2({ width: '100%' });
});
</script>
@endsection