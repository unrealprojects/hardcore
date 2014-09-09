@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot">
        <h4><a href="/rent/{{$content['element']['alias']}}">
                {{$content['element']['name']}}</a></h4>
        <ul class="Lot-Gallery Grid-Node-1-3">
            @foreach(json_decode($content['element']['photos'],true) as $photo)
            <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
            @endforeach
        </ul>

        <div class="Lot-About Grid-Node-2-3">
            <p>{{$content['element']['description']}}</p>

            <!-- Параметры товара -->
            <h6>Характеристики</h6>
            <table class="Stripped">
                <tr>
                    <td>Категория:</td>
                    <td>{{$content['element']['category']['name']}}</td>
                </tr>
                <tr>
                    <td>Арендодатель:</td>
                    <td><a href="/admin/{{$content['element']['admin']['alias']}}">{{$content['element']['admin']['name']}}</a></td>
                </tr>
                <tr>
                    <td>Cтатус:</td>
                    <td>{{$content['element']['status']['name']}}</td>
                </tr>
                <tr>
                    <td>Состояние:</td>
                    <td> {{$content['element']['opacity']['name']}}</td>
                </tr>
                <tr>
                    <td>Цена:</td>
                    <td>{{$content['element']['price']}}</td>
                </tr>
            </table>
        </div>

        <!-- Комментарии -->
        <div class="Comments">
            @foreach($content['element']['comments'] as $comment)
            <div class="Comment">
                <h4>{{$comment['name']}}</h4>
                <p>{{$comment['comment']}}</p>
                <p class="Right">{{$comment['created_at']}}</p>
            </div>
            @endforeach
        </div>
</section>


@endsection