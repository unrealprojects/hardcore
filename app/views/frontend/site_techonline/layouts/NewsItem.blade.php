@extends('frontend.site_techonline.'.$content['template'])

@section('main')

<section class="Node">
    <div class="Lot" itemscope itemtype="http://data-vocabulary.org/Product">
        <header>
            <h4 class="Section-Header">
                {{$content['item']['name']}}
            </h4>
            <p>{{$content['item']['created_at']}}</p>
            @foreach($content['item']['tags'] as $tag)
                 <a href="/news/?tag={{$tag['alias']}}&{{\Input::getQueryString()}}">{{$tag['name']}} </a>
            @endforeach
        </header>

        <div class="Lot-Gallery Grid-Node-2-5">
            <img class="Lot-Main-Photo" src="{{$content['item']['logo']}}" alt="{{$content['item']['logo']}}" itemprop="image">
        </div>

        <div class="Lot-About Grid-Node-3-5">
            <p itemprop="description">{{$content['item']['text']}}</p>
    </div>

</section>
@include('frontend.standard.layouts.comments.List')

@endsection