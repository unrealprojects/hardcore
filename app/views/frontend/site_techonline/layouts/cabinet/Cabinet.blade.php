@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<!-- Личный Кабинет -->
<div class="Comment Node" xmlns="http://www.w3.org/1999/html">
    <h4 class="Section-Header">Личный Кабинет</h4>

    <nav class="Navigation">
        <ul>
            <li><a href="/cabinet/{{\Route::current()->parameter('alias')}}/" title="Каталог стройтехники">Редактировать данные</a></li>
            <li><a href="/cabinet/{{\Route::current()->parameter('alias')}}/rent" title="Взять стройтехнику в аренду">Разместить стройтехнику</a></li>
            <li><a href="/cabinet/{{\Route::current()->parameter('alias')}}/parts">Разместить запчасти</a></li>
        </ul>
    </nav>


    <form class="Form-Horizontal action="">
        <h4 class="Section-Subheader">Редактировать данные</h4>

        <div class="Control-Group">
            <label for="Cabinet-Name">Название организации</label>
            <input id="Cabinet-Name" name="name" type="text" value="{{$content['item']['name']}}"/>
        </div>

        <div class="Control-Group">
            <label for="Cabinet-Description">Описание организации</label>
            <textarea name="description" id="Cabinet-Description" rows="5">{{$content['item']['description']}}</textarea>
        </div>

        <div class="Control-Group">
            <label for="Cabinet-Adress">Адрес организации</label>
            <input id="Cabinet-Adress" name="adress" type="text" value="{{$content['item']['adress']}}"/>
        </div>

        <div class="Control-Group">
            <label for="Cabinet-Phone">Телефон организации</label>
            <input id="Cabinet-Phone" name="phone" type="text" value="{{$content['item']['phone']}}"/>
        </div>

        <div class="Control-Group">
            <label for="Cabinet-Email">Email организации</label>
            <input id="Cabinet-Email" name="email" type="text" value="{{$content['item']['email']}}"/>
        </div>

        <div class="Control-Group">
            <label for="Cabinet-Skype">Skype организации</label>
            <input id="Cabinet-Skype" name="skype" type="text" value="{{$content['item']['skype']}}"/>
        </div>

        <div class="Control-Group">
            <label for="Cabinet-Website">Вебсайт организации</label>
            <input id="Cabinet-Website" name="website" type="text" value="{{$content['item']['website']}}"/>
        </div>

        <div class="Control-Group">
            <label for="Cabinet-Region">Регион</label>
            <select id="Cabinet-Region" name="website" type="text" value="{{$content['item']['region_id']}}"/>
                @foreach($content['regions'] as $region)
                    @if($region['id']==$content['item']['region_id'])
                        <option selected="selected" value="{{$region['id']}}">{{$region['name']}}</option>
                    @else
                        <option value="{{$region['id']}}">{{$region['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="Control-Group">
            <label for="Cabinet-Active">Опубликовать</label>
            <input id="Cabinet-Active" name="active" type="checkbox" {{($content['item']['active'])?'checked=checked':''}}"/>
        </div>

        <div class="Control-Group">
            <label for="Cabinet-Rating">Рейтинг</label>
            <input id="Cabinet-Rating" name="active" type="text" disabled="true" value="{{$content['item']['rating']}}"/>
        </div>
        <div class="Control-Group">
            <label for="Cabinet-Created">Аккаунт создан</label>
            <input id="Cabinet-Created" name="created" type="text" disabled="true" value="{{$content['item']['created_at']}}"/>
        </div>


        <div class="Control-Group">
            <input type="submit" value="Обновить Информацию"/>
        </div>
    </form>
</div>



<article class="Node">
    <h4 class="Section-Header">Стройтехника</h4>
    <ul class="Lot-List">
        @foreach($content['item']['tech_list'] as $list_elem)
        <li class="Lot">
            <header>
                <div>
                    <h4><a href="/rent/{{$list_elem['metadata']['alias']}}">{{$list_elem['name']}}</a></h4>
                    <h5 class="Lot-Price">{{$list_elem['rate']}}</h5>
                </div>
            </header>
            <div class="Lot-Gallery Grid-Node-3-7">
                @foreach(json_decode($list_elem['photos'],true) as $i=>$photo)
                @if($i==1)
                <img class="Lot-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}">

                <ul>
                    @elseif($i>1 && $i<5)
                    <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
                    @elseif($i>5)
                    <li style="display: none">
                        <img src="{{$photo['src']}}" alt="{{$photo['name']}}">
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <div class="Lot-About Grid-Node-4-7">
                <p>{{$list_elem['description']}}</p>

                <!-- Параметры товара -->
                <h6>Характеристики</h6>
                <table class="Stripped">
                    <tr>
                        <td>Категория:</td>
                        <td>{{$list_elem['model']['category']['name']}}</td>
                    </tr>
                    <tr>
                        <td>Бренд:</td>
                        <td>{{$list_elem['model']['brand']['name']}}</td>
                    </tr>
                    <tr>
                        <td>Модель:</td>
                        <td>{{$list_elem['model']['model']}}</td>
                    </tr>
                    <tr>
                        <td>Регион:</td>
                        <td>{{$list_elem['region']['name']}}</td>
                    </tr>
                    <tr>
                        <td>Cтатус:</td>
                        <td>{{$list_elem['status']['name']}}</td>
                    </tr>
                    <tr>
                        <td>Состояние:</td>
                        <td> {{$list_elem['opacity']['name']}}</td>
                    </tr>
                </table>
            </div>

        </li>
        @endforeach
    </ul>
</article>


@include('frontend.standard.layouts.comments.List')
@endsection

