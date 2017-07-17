@can('edit_users')
    <a href="{{ route($entity.'.edit', [str_singular($entity) => $id])  }}" class="btn btn-xs btn-info">
        <i class="fa fa-edit"></i> {{trans('btns.edit')}}</a>
@endcan

@can('delete_users')
    <form method="POST" action="{{route($entity.'.destroy',[str_singular($entity) => $id])}}" onsubmit='return confirm("{{trans('actions.are_you_sure_want_to_delete')}}?")' style="display: inline;">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="{{trans('btns.delete')}}">

        <button type="submit" class="btn-delete btn btn-xs btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </form>
@endcan