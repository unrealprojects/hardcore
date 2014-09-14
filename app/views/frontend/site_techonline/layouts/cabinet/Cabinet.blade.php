@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<!-- Личный Кабинет -->
<div class="Comment Node">
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
            <input type="submit" value="Обновить Информацию"/>
        </div>
    </form>
</div>
@endsection