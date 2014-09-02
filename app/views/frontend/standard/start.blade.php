<!doctype HTML>
<html>

    <head>
        @include('general.head')
        @yield('head')
    </head>

    <body>
        @yield('content')

        @include('general.scripts')
        @include('general.scripts_ie8')
        @yield('scripts')
    </body>

</html>
