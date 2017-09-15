<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            Totem
            @yield('page-title')
        </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/totem/css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/totem/css/style.css') }}">
        @stack('style')
    </head>
    <body>
        <div id="app">
            <div id="wrapper" class="toggled">
                @include('totem::partials.sidebar')
                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <a href="" class="tm-mobile-menu-toggle" uk-icon="icon: menu" uk-toggle="target: #wrapper; cls: toggled"></a>

                    <div class="uk-container uk-container-medium" id="content">
                        @include('totem::partials.alerts')
                        @yield('main-panel-before')
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header">
                                @yield('title')
                            </div>
                            <div class="uk-card-body">
                                @yield('main-panel-content')
                            </div>
                            <div class="uk-card-footer">
                                @yield('main-panel-footer')
                            </div>
                        </div>
                        @yield('main-panel-after')
                        @yield('additional-panels')
                    </div>
                </div>
                <!-- /#page-content-wrapper -->
            </div>
        </div>
        <script src="{{ asset('/vendor/totem/js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
