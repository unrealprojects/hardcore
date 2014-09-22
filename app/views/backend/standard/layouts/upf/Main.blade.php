@extends('backend.standard.content')

@section('main')
<aside class="Menu">
    <ul class="Menu-Category">
        <li class="Menu-Category-Item">
            <a class="Menu-Category-Link" href="#"><span class="fa fa-pencil-square-o"></span>Публикации</a><span class="Menu-Category-Icon fa fa-angle-right"></span>
            <ul class="Menu-Subcategory">
                <li class="Menu-Subcategory-Item"><a class="Menu-Subcategory-Link" href="#"><span class="fa fa-file"></span>Страницы</a></li>
                <li class="Menu-Subcategory-Item"><a class="Menu-Subcategory-Link" href="#"><span class="fa fa-calendar"></span>Новости</a></li>
                <li class="Menu-Subcategory-Item"><a class="Menu-Subcategory-Link" href="#"><span class="fa fa-pencil"></span>Черновики</a></li>
            </ul>
        </li>
        <li class="Menu-Category-Item">
            <a class="Menu-Category-Link" href="#"><span class="fa fa-sitemap"></span>Структура</a><span class="Menu-Category-Icon fa fa-angle-right"></span>
            <ul class="Menu-Subcategory">
                <li class="Menu-Subcategory-Item"><a class="Menu-Subcategory-Link" href="#"><span class="fa fa-share-alt"></span>Разделы</a></li>
                <li class="Menu-Subcategory-Item"><a class="Menu-Subcategory-Link" href="#"><span class="fa fa-tags"></span>Теги</a></li>
            </ul>
        </li>
        <li class="Menu-Category-Item"><a class="Menu-Category-Link" href="#"><span class="fa fa-folder-open"></span>Файлы</a><span class="Menu-Category-Icon fa fa-angle-right"></li>
        <li class="Menu-Category-Item">
            <a class="Menu-Category-Link" href="#"><span class="fa fa-cog"></span>Настройки</a><span class="Menu-Category-Icon fa fa-angle-right"></span>
                    <ul class="Menu-Subcategory">
                        <li class="Menu-Subcategory-Item"><a class="Menu-Subcategory-Link" href="#"><span class="fa fa-file"></span>Внешний вид</a></li>
                        <li class="Menu-Subcategory-Item"><a class="Menu-Subcategory-Link" href="#"><span class="fa fa-puzzle-piece"></span>Плагины</a></li>
                    </ul>
        </li>
        <li class="Menu-Category-Item">
            <a class="Menu-Category-Link" href="#">
                <span class="fa fa-close"></span>Выход
            </a>
        </li>
    </ul>
</aside>
<div class="Menu-Shadow"></div>
@endsection