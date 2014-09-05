@extends('frontend.standard.start')


@section('head')
<link rel="stylesheet" href="/scss/general/frontend/techonline/main.css"/>
@endsection


@section('content')
<header>
    @include('frontend.site_techonline.parts.header')
    @yield('header1')
</header>

<main>
    @yield('main')
</main>

<footer>
    @include('frontend.site_techonline.parts.footer')
</footer>
@endsection

@include('frontend.site_techonline.head')
@include('frontend.site_techonline.script')