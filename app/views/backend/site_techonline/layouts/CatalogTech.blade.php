

@extends('backend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <h3 >Админ панель каталога строительной техники</h3>
    <div class="massage"></div>
    <div class="create_wrap">
        <h3>Добавить новую запись:</h3>
        <h4 contenteditable="true" class="create_model">Введите название модели</h4>
        <p contenteditable="true" class="create_description">Введите описание модели</p>
        <div class="create">Добавить
        </div>
    </div>

    @foreach($content['category_list'] as $category_item)

    <div class="Lot" id="id{{$category_item['id']}}">
        <h4 contenteditable="true">{{$category_item['model']}}</h4>

        <p contenteditable="true">{{$category_item['description']}}</p>
        <div class="delete"> Удалить
        </div>

        <div class="update"> Обновить
        </div>





    </div>
    @endforeach

</section>

@endsection

@section('scripts')
<script src="/js/backend/techonline/CatalogBase.js" type="text/javascript"></script>
@endsection