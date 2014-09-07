@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
 <h3>Каталог строительной техники</h3>
@foreach($content['list'] as $list_elem)
    <div class="Lot">
        <h4>{{$list_elem['model']}}</h4>

    {{$list_elem['description']}}
    {{$list_elem['brand']['name']}}

        <ul class="Lot-Gallery Grid-Node-1-3">
        @foreach(json_decode($list_elem['photos'],true) as $photo)

            <li><img src="/photo/techonline/{{$photo['src']}}" alt="{{$photo['name']}}"></li>

        @endforeach
        </ul>
    </div>
@endforeach
    {{$content['pagination']}}
</section>

@endsection