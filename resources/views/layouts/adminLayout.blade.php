<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("layouts.admin.header")
</head>
<body>
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            @include("layouts.admin.main-header")
            @include("layouts.admin.main-sidebar")

            <div class="page-body">
                @yield('content')
            </div>

        </div>
    </div>

    @include("layouts.admin.footer")
</body>
</html>
