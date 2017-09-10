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
        <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/totem/css/app.css') }}">
        <style>
            #totem-nav-menu .mdc-temporary-drawer__header {
                background: url({{asset('vendor/totem/img/mask.svg')}}) 10px 32px no-repeat;
                background-size: 30%;
            }
        </style>
        @stack('style')
    </head>
    <body class="m0">
        <section id="app">
            @include('totem::partials.sidebar')
            @include('totem::partials.toolbar')
            <main class="mdc-toolbar-fixed-adjust p1">
                <div class="max-width-3 mx-auto">
                    @include('totem::partials.alerts')
                    @yield('content')
                    @include('totem::partials.footer')
                </div>
            </main>
        </section>
        <script src="{{ asset('/vendor/totem/js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
