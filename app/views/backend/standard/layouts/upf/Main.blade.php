@extends('backend.standard.content')

@section('main')
<aside class="Menu">
    <ul class="Menu-Category">
        <li class="Menu-Category-Item">
            <a class="Menu-Category-Link" href="#">
                <span class="fa fa-dashboard"></span>Приборная панель
            </a>
        </li>
        <li class="Menu-Category-Item">
            <a class="Menu-Category-Link Active" href="#"><span class="fa fa-pencil-square-o"></span>Публикации</a><span class="Menu-Category-Icon fa fa-angle-right"></span>
            <ul class="Menu-Subcategory">
                <li class="Menu-Subcategory-Item"><a class="Menu-Subcategory-Link Active" href="#"><span class="fa fa-pencil"></span>Создать</a></li>
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
<main>
    <nav class="Userbar">
        <ul>
            <li><a href="#"><span class="fa fa-bars fa-lg"></span></a></li>
            <li><a href="#"><span class="fa fa-home fa-lg"></span></a></li>
        </ul>
    </nav>
    <nav class="Breadcrumbs">
        <ul class="Breadcrumb-List">
            <li class="Breadcrumb-Item"itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/" itemprop="url">
                    <span itemprop="title">Главная</span>
                </a>
            </li>
            <li class="Breadcrumb-Item"itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/" itemprop="url">
                    <span itemprop="title">Публикации</span>
                </a>
            </li>
            <li class="Breadcrumb-Item">
                <span>Создать</span>
            </li>
        </ul>
    </nav>
    <section class="Content">
        <h3 class="Heading Secondary">Создание новой публикации</h3>
    </section>
</main>
@endsection