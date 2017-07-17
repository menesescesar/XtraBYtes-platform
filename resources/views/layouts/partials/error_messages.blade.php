@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> {{ trans('layout-partials.ERROR_INPUT') }}<br /><br />
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif