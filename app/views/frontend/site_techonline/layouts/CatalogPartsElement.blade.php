@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot">

        <h4><!--<img src="/photo/techonline/{{$content['element']['logo']}}">--><a href="/catalog/{{$content['element']['alias']}}">{{$content['element']['brand']['name']}} {{$content['element']['category']['name']}}
                {{$content['element']['model']}}</a></h4>
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
            @foreach($content['element']['params_values'] as $param)
            <tr>
                <td>{{$param['param_data']['name']}}</td>
                <td>{{$param['value']}}</td>
                <td>{{$param['param_data']['dimension']}}</td>
            </tr>
            @endforeach
        </table>
    </div>



</section>
<!-- Комментарии -->
<section class="Comments Node">
    @foreach($content['element']['comments'] as $comment)
    <div class="Comment">
        <h4>{{$comment['name']}}</h4>
        <p>{{$comment['comment']}}</p>
        <p class="Right">{{$comment['created_at']}}</p>
    </div>
    @endforeach
</div>

@endsection