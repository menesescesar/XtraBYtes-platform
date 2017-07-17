<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    <label class="box-title">{{trans('auth.username')}}</label>
    <input type="text" name="username" class="form-control" placeholder="{{trans('auth.username')}}" value="{{ isset($user) ? $user->username : '' }}">
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    <label>{{trans('auth.email')}}</label>
    <input type="text" name="email" class="form-control" placeholder="{{trans('auth.email')}}" value="{{ isset($user) ? $user->email : '' }}">
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<!-- password Form Input -->
<div class="form-group @if ($errors->has('password')) has-error @endif">
    <label>{{trans('auth.password')}}</label>
    <input type="password" name="password" class="form-control" placeholder="{{trans('auth.password')}}">
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
</div>

<!-- Roles Form Input -->
<div class="form-group @if ($errors->has('roles')) has-error @endif">
    <label>{{trans('roles.roles')}}</label>
      <select name="roles[]" class="form-control">
          @foreach($roles as $rol)
            <option value="{{$rol->id}}" {{ isset($user) && $user->hasRole($rol->name) ? 'selected=selected':'' }}>{{$rol->name}}</option>
          @endforeach
      </select>
    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
</div>

<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'false', 'model' => $user ])
@endif