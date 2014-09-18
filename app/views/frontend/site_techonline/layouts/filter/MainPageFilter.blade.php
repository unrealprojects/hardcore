<section class="Node Filter">

    <h3 class="Heading Primary">Поиск стройтехники</h3>

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
                                    <a class="All-Cities" href="/catalog/?region={{$subRegions['alias']}}" alias="{{$subRegions['alias']}}">Все города</a>
                                    <a class="Back" href="/">Вернуться к выбору региона</a>
                                    <ul>
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
                            <li><a href="/catalog/?category={{$subCategory['alias']}}" alias="{{$category['alias']}}">{{$subCategory['name']}}</a></li>
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
                    <ul class="Filter Accordion Accordion-Brands">

                        <li class="Filter-Subheader Accordion-Subheader">
                            <div class="Accordion-Switch"><span>&or;</span></div>
                            <a href="#">Выбор производителя</a>
                        </li>

                        <li class="Filter-Subcategory Accordion-Subcategory">
                            <ul>
                                <li>
                                    <div class="Control-Group">
                                        <input type="checkbox" checked="checked" id="all_brands"/>
                                        <label for="all_brands" >Все производители</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="Control-Group">
                                        <input type="checkbox" checked="checked" id="native_brands"/>
                                        <label for="native_brands" >Отечественные производители</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="Control-Group">
                                        <input type="checkbox" checked="checked" id="foreign_brands"/>
                                        <label for="foreign_brands" >Зарубежные производители</label>
                                    </div>
                                </li>
                                @foreach($content['filter']['brands'] as $brand)
                                <li>
                                    <div class="Control-Group">
                                        <input type="checkbox" checked="checked" foreign="{{$brand['foreign']}}" name="{{$brand['alias']}}" id="brand_{{$brand['alias']}}"/>
                                        <label for="brand_{{$brand['alias']}}" >{{$brand['name']}}</label>
                                    </div>

                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>

                </form>
            </div>
        </dd>
    </dl>
    <div class="Control-Group Offset">
        <button class="Button Search">Выполнить поиск</button>
    </div>
</section>

@section('scripts')
@parent
<script>
searchArray = {};
/* Вспомогательный функционал */
function scrollToTabs(){
    $('body,html').animate({
        scrollTop: $('.Node.Filter').offset().top
    }, 400);
}


/* Формирование слайдера */
$("#Slider-Range-1").slider({
    range: true,
    min: 100,
    max: 50000,
    values: [ 100, 50000 ],
    slide: function( event, ui ) {
        $("#Slider-Range-Value-1").text(ui.values[ 0 ] + "руб. - " + ui.values[ 1 ] +"руб.");
        searchArray['[params][price][min-value]']=ui.values[ 0 ];
        searchArray['[params][price][max-value]']= ui.values[ 1 ];
        searchArray['[params][price][alias]']='price';
    }
});
$("#Slider-Range-Value-1").text( $( "#Slider-Range-1").slider( "values", 0 ) +
    " - руб." + $( "#Slider-Range-1" ).slider( "values", 1 ) +"руб." );




/* Autocomplite */
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

/* Таб :: Региионы */
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

/* Таб :: Категории */
function getParams($category_alias){
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

    /* todo:: ajax запрос на смену таба */
    getParams(searchArray['category']);
    /* Смена таба */
    $('.Tab-Categories').removeClass('Active');
    $('.Tab-Params').addClass('Active');
    scrollToTabs();
    return false;
});

/* Таб :: Параметры */
function checkedBrands(){
    var all_selected=true;
    $('.Accordion-Brands input[type=checkbox]').each(function(key,item){
        if($(item).is(':checked') && $(item).attr('name')){
            searchArray['brands['+key+']']=$(item).attr('name');
        }else{
            if($(item).attr('name')){
                all_selected=false;
            }
            delete searchArray['brands['+key+']'];
        }
    });
    if(all_selected){
        $('#all_brands').prop('checked','checked');
    }else{
        $('#all_brands').prop('checked',false);
    }

    /* Если выбраны все зарубежные или не выбраны - переключаем select */
    var foreign_all_selected=true;
    $('.Accordion-Brands input[foreign="1"]').each(function(key,item){
        if(!$(item).is(':checked') && $(item).attr('name')){
            foreign_all_selected=false;

        }
    });
    if(foreign_all_selected){
        $('#foreign_brands').prop('checked','checked');
    }else{
        $('#foreign_brands').prop('checked',false);
    }

    /* Если выбраны все jntxtycndtyyst или не выбраны - переключаем select */
    var native_all_selected=true;
    $('.Accordion-Brands input[foreign=0]').each(function(key,item){
        if(!$(item).is(':checked') && $(item).attr('name')){
            native_all_selected=false;
        }
    });
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