<section class="Node Filter">

    <h3 class="Heading Primary">Поиск стройтехники</h3>

    <dl class="Tabs">

        <!-- ФИЛЬТР :: ТАБ 1 :: РЕГИОНЫ-->

        <dt class="Active Tab-Regions"><span>Выбор региона</span></dt>
        <dd class="Active Tab-Regions">
            <div>
                <div class="Control-Group">
                    <input class="Autocomplete Autocomplete-Regions" placeholder="Поиск региона ..."/>
                </div>
                <ul class="Filter Accordion ">
                    @foreach($content['filter']['regions'] as $region)
                    <li class="Filter-Subheader Accordion-Subheader">
                        @if($region['subRegions'])
                        <div class="Accordion-Switch"><span>&or;</span></div>
                        @endif
                        <a href="/catalog/?region={{$region['alias']}}" alias="{{$region['alias']}}">{{$region['name']}}</a>
                    </li>

                    @if($region['subRegions'])
                    <li class="Filter-Subcategory Accordion-Subcategory">
                        <ul>
                            @foreach($region['subRegions'] as $subRegions)
                            <li>
                                <a href="/catalog/?region={{$subRegions['alias']}}" alias="{{$subRegions['alias']}}">{{$subRegions['name']}}</a>
                                <!-- Вложенные города -->

                                @if(!empty($subRegions['cities']))
                                <div class="Filter-Cities">
                                    <ul class="List-Group-Actions">
                                        <li class="Item-Group-Actions">
                                            <a class="All-Cities" href="/catalog/?region={{$subRegions['alias']}}" alias="{{$subRegions['alias']}}">Все города</a>
                                        </li>
                                        <li class="Item-Group-Actions">
                                            <a class="Icon Back" href="/">Вернуться к выбору региона</a>
                                        </li>
                                    </ul>
                                    <ul class="List-Params Row Merge">
                                        @foreach($subRegions['cities'] as $city)
                                        <li class="List-Params-Item XS-6 LR-4"><a href="/catalog/?region={{$city['alias']}}" alias="{{$city['alias']}}">{{$city['name']}}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </dd>

        <!-- ФИЛЬТР:: ТАБ 2 ::КАТЕГОРИИ -->

        <dt class="Tab-Categories"><span>Выбор категории</span></dt>
        <dd class="Tab-Categories">
            <div>
                <div class="Control-Group">
                    <input class="Autocomplete Autocomplete-Categories" placeholder="Поиск техники ..."/>
                </div>

                <ul class="Filter Accordion">
                    @foreach($content['filter']['categories'] as $category)
                    <li class="Filter-Subheader Accordion-Subheader">
                        @if($category['subCategories'])
                        <div class="Accordion-Switch"><span>&or;</span></div>
                        @endif
                        <a href="/catalog/?category={{$category['alias']}}" alias="{{$category['alias']}}">{{$category['name']}}</a>
                    </li>

                    @if($category['subCategories'])
                    <li class="Filter-Subcategory Accordion-Subcategory">
                        <ul>
                            @foreach($category['subCategories'] as $subCategory)
                                <li><a href="/catalog/?category={{$subCategory['alias']}}" alias="{{$subCategory['alias']}}">{{$subCategory['name']}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </dd>

        <!-- ФИЛЬТР :: ТАБ 3 :: ПАРАМЕТРЫ -->

        <dt class="Wide Tab-Params"><span>Дополнительные параметры</span></dt>
        <dd class="Tab-Params">
            <div>
                <form class="Form-Vertical" action="">
                    <div class="Control-Group">
                        <label for="Slider-Range-1">Цена: <span id="Slider-Range-Value-1"></span></label>

                        <div class="Slider-Range" id="Slider-Range-1"></div>
                    </div>
                    <!-- Бренды -->
                    <ul class="List-Group-Actions">
                        <li class="Item-Group-Actions">
                            <label class="Control-Group">
                                <input type="checkbox" checked="checked" id="all_brands"/>
                                <span for="all_brands" >Все производители</span>
                            </label>
                        </li>
                        <li class="Item-Group-Actions">
                            <label class="Control-Group">
                                <input type="checkbox" checked="checked" id="native_brands"/>
                                <span for="native_brands" >Отечественные производители</span>
                            </label>
                        </li>
                        <li class="Item-Group-Actions">
                            <label class="Control-Group">
                                <input type="checkbox" checked="checked" id="foreign_brands"/>
                                <span for="foreign_brands" >Зарубежные производители</span>
                            </label>
                        </li>
                    </ul>
                    <div class="Spoiler">
                        <a href="#" class="Spoiler-Caption">Конкретные производители</a>

                        <ul class="List-Params  Accordion-Brands Spoiler-Content">
                            @foreach($content['filter']['brands'] as $brand)
                            <li class="Item-Group-Actions XS-6 LR-4">
                                <label class="Control-Group">
                                    <input type="checkbox" checked="checked" foreign="{{$brand['foreign']}}" name="{{$brand['alias']}}" id="brand_{{$brand['alias']}}"/>
                                    <span for="brand_{{$brand['alias']}}" >{{$brand['name']}}</span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </form>
            </div>
        </dd>
    </dl>
    <div class="Control-Group Offset">
        <button id="Filter-Search" class="Button">Выполнить поиск</button>
    </div>
</section>

@include('frontend.site_techonline.layouts/filter/FilterScript')
