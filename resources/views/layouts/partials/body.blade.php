<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" id="app">
    @include('layouts.partials.headercontent')
    <!-- =============================================== -->
    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content-breadcrumb')
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.partials.footer')
    {{-- @include('layouts.partials.controlsidebar') --}}
</div>
<!-- ./wrapper -->
</body>
@include('layouts.partials.scripts')