@extends('layouts.master-backoffice')

@section('title', trans('auth.Edit_User') . ' ' . $user->first_name)

@section('content')
<div class="box box-primary">
    <div class="box-header">
    <div class="row">
        <div class="col-md-5">
            <h2 class="no-margin">{{ trans('auth.Edit_User') }} {{ $user->first_name }}</h2>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> {{ trans('btns.back') }}</a>
        </div>
    </div>

    <div class="animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form method="POST" action="{{route('users.update',  $user->id)}}">
                            {{csrf_field()}}
                            <input name="_method" value="put" type="hidden">
                            @include('user._form')
                            <!-- Submit Form Button -->
                            <input type="submit" class="btn btn-primary" value="{{ trans('btns.save') }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection