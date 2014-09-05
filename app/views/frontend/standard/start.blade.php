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
    </body>

</html>
