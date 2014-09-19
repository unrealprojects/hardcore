@extends('frontend.site_techonline.'.$content['template'])

@section('main')

<section class="Node">
    <div class="Snippet-Item News">

        <header>
            <h4 class="Heading Primary">
                {{$content['item']['name']}}
            </h4>
        </header>

        <div class="Item-Photo Grid-Node-2-5">
            <img class="Photo" src="{{$content['item']['logo']}}" alt="{{$content['item']['logo']}}" itemprop="image">
        </div>

        <div class="Item-Content Grid-Node-3-5">
            {{$content['item']['text']}}
        </div>

        <footer class="Item-Info">
            <div class="Date">
                Дата публикации: {{$content['item']['created_at']}}
            </div>
            <ul class="Tag-List">
                <li class="Tag-Item"><a href="#">Long Name Tag 1</a></li>
                <li class="Tag-Item"><a href="#">Long Name Tag 2</a></li>
                <li class="Tag-Item"><a href="#">Long Name Tag 3</a></li>

                @foreach($content['item']['tags'] as $tag)
                <li class="Tag-Item">
                    <a href="/news/?tag={{$tag['alias']}}&{{\Input::getQueryString()}}">
                        {{$tag['name']}}
                    </a>
                </li>
                @endforeach
            </ul>
        </footer>

    </div>
</section>
@include('frontend.standard.layouts.comments.List')

@endsection