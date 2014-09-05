@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
 <h3>Каталог строительной техники</h3>
@foreach($content['list'] as $list_elem)
    <div class="Lot">
        <h4>{{$list_elem['model']}}</h4>

    {{$list_elem['description']}}
    {{$list_elem['brand']['name']}}

    @foreach(json_decode($list_elem['photos'],true) as $photo)
        <img src="{{$photo['src']}}" alt="{{$photo['name']}}">
    @endforeach
    </div>
@endforeach
</section>
@endsection