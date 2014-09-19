<section class="Node Filter">

    <h3 class="Heading Primary">Поиск стройтехники</h3>
    div.Filter
    <dl class="Tabs">
        <dt class="Active Tab-Regions"><span>Выбор региона</span></dt>
        <dd class="Active Tab-Regions">
            <div>
                <div class="Control-Group">
                    <input class="Autocomplete Autocomplete-Regions" placeholder="Поиск региона ..."/>
                </div>
                <!-- ФИЛЬТР::ТАБ 1::РЕГИОНЫ-->
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
                                    <ul class="List-Params">
                                        @foreach($subRegions['cities'] as $city)
                                        <li><a href="/catalog/?region={{$city['alias']}}" alias="{{$city['alias']}}">{{$city['name']}}</a></li>
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

        <dt class="Tab-Categories"><span>Выбор категории</span></dt>
        <dd class="Tab-Categories">
            <div>
                <div class="Control-Group">
                    <input class="Autocomplete Autocomplete-Categories" placeholder="Поиск техники ..."/>
                </div>
                <!-- ФИЛЬТР::ТАБ 2::КАТЕГОРИИ -->
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

        <dt class="Wide Tab-Params"><span>Дополнительные параметры</span></dt>
        <dd class="Tab-Params">
            <div>
                <form class="Form-Vertical" action="">
                    <!-- ФИЛЬТР::ТАБ 3::ПАРАМЕТРЫ (ЗАВЕРСТАТЬ СЛАЙДЕР JQUERY - ВЫВЕДУ ПОЗЖЕ) -->
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
                    <ul class="List-Params">
                        @foreach($content['filter']['brands'] as $brand)
                        <li class="Item-Group-Actions">
                            <label class="Control-Group">
                                <input type="checkbox" checked="checked" foreign="{{$brand['foreign']}}" name="{{$brand['alias']}}" id="brand_{{$brand['alias']}}"/>
                                <span for="brand_{{$brand['alias']}}" >{{$brand['name']}}</span>
                            </label>

                        </li>
                        @endforeach
                    </ul>
                </form>
            </div>
        </dd>
    </dl>
    <div class="Control-Group Offset">
        <button id="Filter-Search" class="Button">Выполнить поиск</button>
    </div>
</section>

@section('scripts')
@parent
<script>
searchArray = {};

/* Вспомогательный функционал */

// Анимация при переключении табов
function scrollToTabs(){
    $('body,html').animate({
        scrollTop: $('.Node.Filter').offset().top
    }, 400);
}

/* Формирование слайдера */

//Фильтр по цене
$("#Slider-Range-1").slider({
    range: true,
    min: 100,
    max: 50000,
    values: [ 100, 50000 ],
    slide: function( event, ui ) {
        $("#Slider-Range-Value-1").text(ui.values[ 0 ] + "руб. - " + ui.values[ 1 ] +"руб.");
        searchArray['[params][price][min-value]']=ui.values[ 0 ];
        searchArray['[params][price][max-value]']= ui.values[ 1 ];
        searchArray['[params][price][alias]В']='price';
    }
});

$("#Slider-Range-Value-1").text(
    $( "#Slider-Range-1").slider( "values", 0 ) + " - руб." + $( "#Slider-Range-1" ).slider( "values", 1 ) +"руб."
);


/* Autocomplite по регионам */
var regions = [
    @foreach($content['filter']['regions_list'] as $region)
        {key:"{{$region['alias']}}",label:"{{$region['name']}}"},
    @endforeach
];

$( ".Autocomplete-Regions" ).autocomplete({
    source: regions,
    select: function (event, ui) {
        /* Запись параметров */
        searchArray['region']=ui.item.key;
        delete searchArray['region_type'];

        /* Смена таба */
        $('.Tab-Regions').removeClass('Active');
        $('.Tab-Categories').addClass('Active');
        scrollToTabs();
    }
});

/* Autocomplite по категориям */
var categories = [
    @foreach($content['filter']['categories_list'] as $category)
        {key:"{{$category['alias']}}",label:"{{$category['name']}}"},
    @endforeach
];

$( ".Autocomplete-Categories" ).autocomplete({
    source: categories,
    select: function (event, ui) {
        /* Запись параметров */
        searchArray['category']=ui.item.key;

        /* todo:: ajax запрос на смену таба */
        /* Смена таба */
        $('.Tab-Categories').removeClass('Active');
        $('.Tab-Params').addClass('Active');
        scrollToTabs();
    }
});

/* Некликабельность ссылок */
$(document).on('click','.Filter a',function(){
    return false;
});

/*********************************************************************** Таб :: Региионы */
$('dd.Tab-Regions .Filter-Subcategory li>a').click(function(){
    /* Переход на города, если они есть */
    if($('.Filter-Cities',$(this).parent()).length){
        var cities=$('.Filter-Cities',$(this).parent());
        $('dd.Tab-Regions .Filter.Accordion').hide().after($(cities).clone());
        /* Запись параметров региона */
        searchArray['region']=$(this).attr('alias');
        delete searchArray['region_type'];
        scrollToTabs();

        /* Возврат на категории */
        $('.Tabs .Back').on('click',function(){
            $('dd>div>.Filter-Cities').remove();
            $('.Tab-Regions .Filter.Accordion').show();
            scrollToTabs();
            return false;
        });
        /* Если нет городов, выбор категории */
    }else{

        /* Запись параметров */
        searchArray['region']=$(this).attr('alias');
        delete searchArray['region_type'];

        /* Смена таба */
        $('.Tab-Regions').removeClass('Active');
        $('.Tab-Categories').addClass('Active');
        scrollToTabs();
    }
    return false;
});

/* Выбор города */
$(document).on('click','.Filter-Cities a',function(){
    searchArray['region']=$(this).attr('alias');
    delete searchArray['region_type'];

    /* Смена таба */
    $('.Tab-Regions').removeClass('Active');
    $('.Tab-Categories').addClass('Active');
    scrollToTabs();
    return false;
});

/* Выбор типа категории (популярные, области...)*/
$('dd.Tab-Regions .Filter-Subheader a').click(function(){
    /* Запись параметров */
    searchArray['region_type']=$(this).attr('alias');
    delete searchArray['region'];

    /* Смена таба */
    $('.Tab-Regions').removeClass('Active');
    $('.Tab-Categories').addClass('Active');
    scrollToTabs();
    return false;
});

/****************************************************************************************** Таб :: Категории */

// Получение параметров через ajax по категории
function getAjaxParams($category_alias){
    $.ajax({
        type:'get',
        url:'/filter/'+$category_alias,
        dataType:'json',
        success:function(data){
            $('.Ajax-Params').remove();
            $('.Tab-Params .Form-Vertical>.Control-Group').first().after($('<div/>').html(data['params']).text());
            $('body').append($('<div/>').html(data['script']).text());
        }
    });
}



$('dd.Tab-Categories a').click(function(){
    /* Запись параметров */
    searchArray['category']=$(this).attr('alias');

    getAjaxParams(searchArray['category']);

    /* Смена таба */
    $('.Tab-Categories').removeClass('Active');
    $('.Tab-Params').addClass('Active');
    scrollToTabs();
    return false;
});

/*********************************************************************************** Таб :: Параметры :: Бренды*/
function checkedBrands(){
    var all_selected=true,
        foreign_all_selected=true,
        native_all_selected=true;
    $('.Accordion-Brands input[type=checkbox]').each(function(key,item){
        if($(item).is(':checked') && $(item).attr('name')){
            searchArray['brands['+key+']']=$(item).attr('name');
        }else{
            if($(item).attr('name')){
                all_selected=false;
            }
            /* Если выбраны все отечественные или не выбраны - переключаем select */
            if(!$(item).is(':checked') && $(item).attr('name') && $(item).attr('foreign')=='0'){
                native_all_selected=false;
            }
            /* Если выбраны все зарубежные или не выбраны - переключаем select */
            if(!$(item).is(':checked') && $(item).attr('name')&& $(item).attr('foreign')=='1'){
                foreign_all_selected=false;
            }
            delete searchArray['brands['+key+']'];
        }
    });

    if(all_selected){
        $('#all_brands').prop('checked','checked');
    }else{
        $('#all_brands').prop('checked',false);
    }
    if(foreign_all_selected){
        $('#foreign_brands').prop('checked','checked');
    }else{
        $('#foreign_brands').prop('checked',false);
    }
    if(native_all_selected){
        $('#native_brands').prop('checked','checked');
    }else{
        $('#native_brands').prop('checked',false);
    }
}

$('.Accordion-Brands input[type=checkbox]').click( function(){
    if($(this).attr('id')!='foreign_brands' &&
        $(this).attr('id')!='native_brands' &&
        $(this).attr('id')!='all_brands' ){
        checkedBrands();
    }
});

$('#all_brands').click(function(){
    if($(this).is(':checked')){
        $('.Accordion-Brands input[type=checkbox]').prop('checked','checked');
    }else{
        $('.Accordion-Brands input[type=checkbox]').prop('checked',false);
    }
    checkedBrands();
});

$('#foreign_brands').click(function(){
    if($(this).is(':checked')){
        $('.Accordion-Brands input[foreign=1]').prop('checked','checked');
    }else{
        $('.Accordion-Brands input[foreign=1]').prop('checked',false);
    }
    checkedBrands();
});

$('#native_brands').click(function(){
    if($(this).is(':checked')){
        $('.Accordion-Brands input[foreign=0]').prop('checked','checked');
    }else{
        $('.Accordion-Brands input[foreign=0]').prop('checked',false);
    }
    checkedBrands();
});

/* Поиск */
$('.Search').click(function(){
    searchString='?';
    $.each(searchArray,function(key,value){
        searchString+=key+'='+value+'&';
    });
//            location.href='rent'+searchString;
    console.log('rent'+searchString);
});
</script>
@endsection