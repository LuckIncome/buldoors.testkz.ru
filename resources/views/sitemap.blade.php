@extends('partials.app')@section('seo_title','Карта сайта')@section('meta_keywords','Карта сайта')@section('meta_description','Карта сайта')@section('content')
    <div class="checkout-complete-page sitemap-page def-page">
        <div class="container">
            <div class="row">
                <div class="content col-12">
                    <div class="sitemap-content">
                        <ul class="sitemap">
                            <li><a href="/about">О Компании</a></li>
                            <li><a href="/catalog">Каталог</a>
                                <ul class="children"> @foreach($categories as $category)
                                        <li><a href="{{route('catalog.show',$category->slug)}}">Каталог
                                                /{{$category->name}}</a></li>@endforeach
                                    <li><a href="/catalog/aksessuary">Каталог / Аксессуары</a></li>
                                </ul>
                            </li>
                            <li><a href="/sales">Акции</a>
                                <ul class="children"> @foreach($sales as $sale)
                                        <li><a href="{{route('sales.show',$sale->slug)}}">Акции /{{$sale->title}}</a>
                                        </li>@endforeach </ul>
                            </li>
                            <li><a href="/news">Новости</a></li>
                            <li><a href="/partners">Партнеры</a></li>
                            <li><a href="/contacts">Контакты</a></li>
                            <li><a href="/compare">Сравнение товаров</a></li>
                            <li><a href="/cart">Корзина</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>@endsection
