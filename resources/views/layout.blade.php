<!DOCTYPE html>
<html lang="en" class="mdc-typography">
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/totem/css/app.css') }}">
        @stack('style')
    </head>
    <body class="m0">
        @include('totem::partials.toolbar')
        @include('totem::partials.sidebar')
        <main class="mdc-toolbar-fixed-adjust" id="root">
            <div class="mdc-layout-grid max-width-4 mx-auto">
                <div class="mdc-layout-grid__inner">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

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
                        <div class="uk-margin-top">
                            @include('totem::partials.footer')
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell"></div>
                </div>
            </div>
        </main>
        <script src="{{ asset('/vendor/totem/js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
