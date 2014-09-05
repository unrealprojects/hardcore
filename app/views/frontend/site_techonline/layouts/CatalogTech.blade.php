@extends('frontend.site_techonline.'.$content['template'])

@foreach($content['list'] as $list_elem)
    {{$list_elem['model']}}
    {{$list_elem['description']}}
    {{$list_elem['brand']['name']}}
    @foreach(json_decode($list_elem['photos'],true) as $photo)
        {{$photo['src']}}
        {{$photo['name']}}
    @endforeach
@endforeach