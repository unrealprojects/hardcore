@extends('frontend.standard.content')
<meta charset="utf-8"/>
<style>
    .colon{
        width: 100px;
        float: left;
    }
</style>

{{--<table border="1">
    <tr>
        <td>Время</td>
        <td>Температура</td>
        <td>Давление</td>
    </tr>
    @foreach($main as $item)
    <tr>
        <td>{{$item['time']}}</td>
        <td>{{$item['temp']}}</td>
        <td>{{$item['pressure']}}</td>
    </tr>
    @endforeach
</table>--}}

<h3>Среднесуточное значение</h3>
<table border="1">
    <tr>
        <td>ym/d</td>
        @for($i=1; $i<32;$i++)
         <td>{{$i}}</td>
        @endfor
    </tr>
    @foreach($avgDay as $key=>$list)
    <tr>
        <td>{{$key}}</td>
        @foreach($list as $value)
            <td>{{str_replace('.',',',$value/8)}}</td>
        @endforeach
    </tr>
    @endforeach
</table>
