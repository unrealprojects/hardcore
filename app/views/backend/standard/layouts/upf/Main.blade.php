@extends('backend.standard.content')

@section('main')
    <h5>Размер</h5>
    <button class="Button Small">Маленькая</button>
    <button class="Button">Обычная</button>
    <button class="Button Large">Большая</button>
    <button class="Button Huge">Гигантская</button>
    <h5>Форма</h5>
    <button class="Button Round">Скругленные края</button>
    <button class="Button Search">Овальная</button>
    <button class="Button Large Search">Большая Овальная</button>
    <button class="Button Huge Search">Огромная Овальная</button>
    <h5>Тип</h5>
    <button class="Button Ghost">Кнопка с рамкой</button>
    <button class="Button Ghost Icon"><span class="fa fa-outdent"></span>Кнопка с рамкой и иконкой</button>
    <button class="Button Large Ghost Icon"><span class="fa fa-outdent"></span>Большая кнопка с рамкой и иконкой</button>
    <button class="Button Huge Ghost Icon"><span class="fa fa-outdent"></span>Огромная кнопка с рамкой и иконкой</button>
    <button class="Button Dropdown Round">
        Нажми на кнопку <span class="fa fa-caret-down"></span>
        <div class="Dropdown-Content">
            <ul>
                <li><a href="#">Открыть</a></li>
                <li><a href="#">Сохранить как ...</a></li>
                <li class="Divider"></li>
                <li><a href="#">Выйти</a></li>
            </ul>
        </div>
    </button>
    <button class="Button Dropdown Ghost">
        Нажми на кнопку <span class="fa fa-caret-down"></span>
        <div class="Dropdown-Content">
            <ul>
                <li><a href="#">Открыть</a></li>
                <li><a href="#">Сохранить как ...</a></li>
                <li class="Divider"></li>
                <li><a href="#">Выйти</a></li>
            </ul>
        </div>
    </button>
@endsection