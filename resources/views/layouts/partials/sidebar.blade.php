<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image no-padding">
                <img src=" {{ asset('/img/xby-logo.png') }} " class="img-circle">
            </div>

            <div class="center-block info" style="position:initial;padding-left: 40px;">
                <p class="no-margin text-center" style="color: white;font-size: 1.1em;">PoSIGN Secured</p>

                <div class="center-block info text-center">
                    <img width="25px" src=" {{ asset('/img/xby-logo.png') }} " class="img-circle">
                    <img width="25px" src=" {{ asset('/img/xby-logo.png') }} " class="img-circle">
                    <img width="25px" src=" {{ asset('/img/xby-logo.png') }} " class="img-circle">
                    <img width="25px" src=" {{ asset('/img/xby-logo.png') }} " class="img-circle">
                </div>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">{{ trans('layout-partials.MainNavigation') }}</li>

            <li><a href="/dashboard"><i class="fa fa-tachometer"></i> <span>{{ trans('layout-partials.Dashboard') }}</span></a></li>

            <li><a href="/explorer"><i class="fa fa-book"></i> <span>{{ trans('layout-partials.Explorer') }}</span></a></li>

            @can('edit_translations')
            <li><a href="/translations"><i class="fa fa-language"></i> <span>{{ trans('layout-partials.Translations') }}</span></a></li>
            @endcan

            @can('view_users')
            <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>{{ trans('layout-partials.Users') }}</span></a></li>
            @endcan

            @can('view_roles')
            <li><a href="{{route('roles.index')}}"><i class="fa fa-tasks"></i> <span>{{ trans('layout-partials.Roles') }}</span></a></li>
            @endcan

            @can('view_prediction')
                <li><a href="{{route('xby_prediction')}}"><i class="fa fa-line-chart"></i> <span>{{ trans('layout-partials.Predictions') }}</span></a></li>
            @endcan

            <li><a href="/documentation"><i class="fa fa-book"></i><span>{{ trans('layout-partials.Documentation') }}</span></a></li>
<!--
            <li class="header">XBY Separator</li>
            <li><a href="/"><i class="fa fa-circle-o text-red"></i> <span>Module A</span></a></li>

            <li class="header"></li>
            <li><a href="/"><i class="fa fa-plus"></i><span>Extra Link</span></a></li>
-->
        </ul>
    </section>
</aside>