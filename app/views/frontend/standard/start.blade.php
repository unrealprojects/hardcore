<!doctype HTML>
<html>

    <head>
        @include('general.head')
        @yield('head')
    </head>

    <body>
        @yield('content')

        @include('general.scripts')
        @yield('scripts')
        @yield('scripts_ie8')
    </body>

</html>
