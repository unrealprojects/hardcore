@extends('frontend.standard.start')

@section('head')
    @include('frontend.site_techonline.head')
@endsection

@section('content')
<div id="wrap">
    @include('frontend.site_techonline.parts.header')
    <main>
        @include('frontend.site_techonline.parts.breadcrumbs')
        @yield('main')
    </main>
    <div id="wrap-stop"></div>
</div>

<footer>
    @include('frontend.site_techonline.parts.footer')
</footer>
@endsection

@section('scripts')
    @include('frontend.site_techonline.script')
@endsection