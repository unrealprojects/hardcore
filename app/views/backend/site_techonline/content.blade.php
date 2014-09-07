@extends('backend.standard.start')

@section('head')
@include('backend.site_techonline.head')
@endsection

@section('content')
<div id="wrap">


    <main>
        @yield('main')
    </main>
</div>


@endsection

@section('scripts')
@include('backend.site_techonline.script')
@endsection