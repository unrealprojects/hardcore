@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot">
        <h4>{{$content['element']['model']}}</h4>

    {{$content['element']['description']}}
    {{$content['element']['brand']['name']}}

        <ul class="Lot-Gallery Grid-Node-1-3 ">
        @foreach(json_decode($content['element']['photos'],true) as $photo)
            <li><img src="/photo/techonline/{{$photo['src']}}" alt="{{$photo['name']}}"></li>
        @endforeach
        </ul>
    </div>
</section>


@endsection