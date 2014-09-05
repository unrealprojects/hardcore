@extends('frontend.standard.start')

@section('head')
    @include('frontend.site_techonline.head')
@endsection

@section('content')
<div id="wrap">
<header>
    @include('frontend.site_techonline.parts.header')
    @yield('header1')
</header>

<main>
    @yield('main')
</main>
</div>

<footer>
    @include('frontend.site_techonline.parts.footer')
</footer>
@endsection

@section('scripts')
    @include('frontend.site_techonline.script')
@endsection