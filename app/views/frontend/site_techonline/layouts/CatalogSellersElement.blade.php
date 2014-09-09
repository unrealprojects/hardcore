@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot">

        <h4>
            <a href="/catalog/{{$content['element']['alias']}}">{{$content['element']['name']}}</a></h4>
        <ul class="Lot-Gallery Grid-Node-1-3">
            @foreach(json_decode($content['element']['photos'],true) as $photo)
                 <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
            @endforeach
        </ul>

        <div class="Lot-About Grid-Node-2-3">
            <p>{{$content['element']['description']}}</p>
            <table class="Stripped">
                <tr>
                    <td>Телефоны:</td>
                    <td>{{$content['element']['phone']}}</td>
                </tr>
                <tr>
                    <td>Адрес:</td>
                    <td> {{$content['element']['adress']}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td> {{$content['element']['email']}}</td>
                </tr>
                <tr>
                    <td>Skype:</td>
                    <td> {{$content['element']['skype']}}</td>
                </tr>
                <tr>
                    <td>Site:</td>
                    <td> {{$content['element']['website']}}</td>
                </tr>
                <tr>
                    <td>Регион:</td>
                    <td> {{$content['element']['region']['name']}}</td>
                </tr>
            </table>
    </div>

        <!-- Список Техники -->
        <h4>Аренда стройтехники</h4>
        <div class="CatalogTech">
            @foreach($content['element']['tech_list'] as $tech)
            <div class="Element">
                <h4> <a href="/rent/{{$tech['alias']}}">{{$tech['name']}}</a></h4>
                <p>{{$tech['description']}}</p>
                <p>{{$tech['rate']}}</p>
            </div>
            @endforeach
        </div>

        <!-- Список Запчастей -->
        <h4>Запчасти и сервис</h4>
        <div class="CatalogParts">
            @foreach($content['element']['parts_list'] as $part)
            <div class="Element">
                <h4> <a href="/parts/{{$part['alias']}}">{{$part['name']}}</a></h4>
                <p>{{$part['description']}}</p>
                <p>{{$part['price']}}</p>

            </div>
            @endforeach
        </div>

        <!-- Комментарии -->
        <h4>Комментарии</h4>
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