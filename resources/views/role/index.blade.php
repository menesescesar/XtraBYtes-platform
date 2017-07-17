@extends('layouts.master-backoffice')

@section('title', 'Roles & Permissions')

@section('content')
<div class="box box-primary">
    <div class="box-header">
    <!-- Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('roles.store') }}">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="roleModalLabel">{{trans('roles.role')}}</h4>
                </div>
                <div class="modal-body">
                    <!-- name Form Input -->
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        <label>{{trans('auth.name')}}</label>
                        <input name="name" type="text" class="form-control" placeholder="{{trans('roles.role_name')}}">
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('btns.close') }}</button>

                    <!-- Submit Form Button -->
                    <button type="submit" class="btn btn-primary">{{ trans('btns.submit') }}</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <h2 class="no-margin">{{ trans('roles.roles') }}</h2>
        </div>
        <div class="col-md-7">
            @can('add_roles')
                <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#roleModal"> <i class="glyphicon glyphicon-plus"></i> {{trans('roles.new')}} </a>
            @endcan
        </div>
    </div>


    @forelse ($roles as $role)
        <form method="POST" action="{{ route('roles.update',$role->id) }}" class="m-b">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">

        @if($role->name === 'Admin')
            @include('shared._permissions', [
                          'title' => $role->name .' '. trans('roles.permissions'),
                          'options' => ['disabled'] ])
        @else
            @include('shared._permissions', [
                          'title' => $role->name .' '. trans('roles.permissions'),
                          'model' => $role ])
            @can('edit_roles')
                 <button type="submit" class="btn btn-primary">{{trans('btns.save')}}</button>
            @endcan
        @endif
        </form>
    @empty
        <p>{{trans('roles.No_roles_defined')}}</p>
    @endforelse
    </div>
</div>
@endsection