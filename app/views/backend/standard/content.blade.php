@extends('backend.standard.start')

@section('head')
@include('backend.standard.head')
@endsection

@section('content')
<div data-role="header" class="ui-header-fixed">

</div>
<div role="main" class="ui-content">
    @yield('main')
</div>
<div data-role="footer">

</div>
@endsection


@section('scripts')
    @include('backend.standard.scripts')
@endsection