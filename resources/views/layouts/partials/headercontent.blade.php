<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>XBY</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>XtraBYtes</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('layout-partials.ToggleNavigation') }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav" id="localeNav">
                <li class="dropdown">
                    <?php $localeCode=\App::getLocale(); ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img id="imgNav{{$localeCode}}" src="{{ asset('/img/flags/4x3/'.$localeCode.'.svg') }}" alt="..." style="height:18px;margin:0;padding:0;">  <span id="lanNav{{$localeCode}}">{{strtoupper($localeCode)}}</span> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li><a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" id="nav{{$localeCode}}" href="#" class="language"> <img id="imgNav{{$localeCode}}" src="{{ asset('/img/flags/4x3/'.$localeCode.'.svg') }}" alt="..." style="height:18px;margin:0;padding:0;">  <span id="lanNav{{$localeCode}}"> {{ strtoupper($localeCode) }}</span></a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::check() && $user = Auth::user())
                            <img src="{{ isset($user->img) ? route('get.user.img',['id'=>$user->id,'img'=>$user->img]) : asset('img/user.png') }}" class="user-image" alt="{{ trans('layout-partials.UserImage') }}">
                            <span class="hidden-xs">{{ $user->username }}</span>
                        @else
                            <img src="{{ asset('img/user.png') }}" class="user-image" alt="{{ trans('layout-partials.UserImage') }}">
                            <span class="hidden-xs">&nbsp;</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if(Auth::check() && $user = Auth::user())
                                <img src="{{ isset($user->img) ? route('get.user.img',['id'=>$user->id,'img'=>$user->img]) : asset('img/user.png') }}" class="img-circle" alt="{{ trans('layout-partials.UserImage') }}">
                                <p>
                                    {{ $user->username }}
                                </p>
                            @else
                                <img src="{{ asset('img/user.png') }}" class="img-circle" alt="{{ trans('layout-partials.UserImage') }}">
                                <p>

                                </p>
                            @endif
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            @if(Auth::check())
                                <div class="pull-left">
                                    <a href="/profile/" class="btn btn-default btn-flat">{{ trans('layout-partials.Profile') }}</a>
                                </div>
                                <div class="pull-right">
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        {{ csrf_field() }}
                                        <a href="#" onclick='document.getElementById("logout-form").submit()' class="btn btn-default btn-flat">{{ trans('layout-partials.SignOut') }}</a>
                                    </form>
                                </div>
                            @else
                                <div class="pull-left">
                                    <a href="/register" class="btn btn-default btn-flat">{{ trans('layout-partials.Register') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/login" class="btn btn-default btn-flat">{{ trans('layout-partials.Login') }}</a>
                                </div>
                            @endif
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>