@extends('layouts.master-backoffice')

@section('title', trans('auth.create'))

@section('content')
<div class="box box-primary">
    <div class="box-header">
    <div class="row">
        <div class="col-md-5">
            <h2 class="no-margin">{{trans('auth.create')}}</h2>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> {{trans('btns.back')}}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{route('users.store')}}">
                {{ csrf_field() }}
                @include('user._form')
                <!-- Submit Form Button -->
                <input type="submit" class="btn btn-primary" value="{{trans('btns.create')}}">
            </form>
        </div>
    </div>
    </div>
</div>
@endsection