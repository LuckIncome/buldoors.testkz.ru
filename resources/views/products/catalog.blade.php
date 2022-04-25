@extends('partials.app')
@section('seo_title',$seoTitle)
@section('meta_description',$description)
@section('meta_keywords',$keywords)
@section('content')
    <div id="product-category">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#">Каталог</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0">Каталог</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="allCategories" class="pt-3 pt-xl-5">
            <div class="container-fluid px-0">
                <div class="row">
                    @foreach($catalog as $key=>$subcategory)
                        <div class="col-md-6 allCategoriesItemWrap mb-3">
                            <div class="allCategoriesItem">
                                <img src="{{Storage::disk('public')->url($subcategory->image)}}" alt="{{$subcategory->getTranslatedAttribute('name',$locale,$fallbackLocale)}}" class="w-100 h-100">
                                <div class="allCategoriesItemCaption">
                                    <small>{{$subcategory->name}}</small>
                                    <a href="/catalog/{{$subcategory->slug}}"><h2>{{$subcategory->getTranslatedAttribute('name',$locale,$fallbackLocale)}}</h2></a>
                                    <a href="/catalog/{{$subcategory->slug}}" class="titleWhite goCatalog">Перейти</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="container my-5" id="tabsCategory">
                    <ul class="row scrollRow flex-nowrap">
                        <li class="col-9 col-lg-4 col-xl-3 scrollItem"><a href="#tabsCategory-1">Новинки</a></li>
                        <li class="col-9 col-lg-4 col-xl-3 scrollItem"><a href="#tabsCategory-2">Хиты продаж</a>
                        </li>
                        <li class="col-9 pl-5 pl-sm-0 col-lg-4 col-xl-3 scrollItem"><a
                                href="#tabsCategory-3">Акции</a></li>
                    </ul>
                    <div id="tabsCategory-1" class="p-0">

                        <div class="doorSlider owl-carousel newDoor row py-5 m-0">
                            @foreach($newProducts as $newProduct)
                            <div class="doorSlide">
                                <a href="{{route('product.show',[$newProduct->category->slug,$newProduct->slug])}}"><img src="{{Voyager::image($newProduct->getThumbnail($newProduct->thumb, 'small'))}}"
                                                                  alt="{{ $newProduct->name }}">
                                    <div class="doorSlideCaption p-4">
                                        <h4 class="mb-1">{{ $newProduct->name }}</h4>
                                        <p class="mb-2">{{ $newProduct->category->name }}</p>
                                        <p class="price"><span>@if(!$newProduct->sale_price)
                                                    {{number_format($newProduct->regular_price,0 ,'', ' ')}} <span>₸</span>&nbsp;&nbsp;<s
                                                    style="color: #BDBDBD;font-size: 14px;position: relative;top: -2px;">{{number_format($newProduct->regular_price,0 ,'', ' ')}} <span
                                                        style="color: #BDBDBD;font-size: 14px;">₸</span></s>
                                                    @else
                                                    {{number_format($newProduct->sale_price,0 ,'', ' ')}} <span>₸</span>
                                                        @endif</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-9 d-none d-md-block">
                                <ul class='newDots owl-dots'></ul>
                            </div>
                            <div class="col-md-3 text-center text-md-right pr-md-5">
                                <a href="" class="allDoors titlesYellow d-none">Все новинки</a>
                            </div>
                        </div>

                    </div>
                    <div id="tabsCategory-2" class="p-0">

                        <div class="doorSlider owl-carousel hitDoor row py-5">

                            @foreach($featuredProducts as $featuredProduct)
                            <div class="doorSlide">
                                <a href="{{route('product.show',[$featuredProduct->category->slug,$featuredProduct->slug])}}"><img src="{{Voyager::image($featuredProduct->getThumbnail($featuredProduct->thumb, 'small'))}}"
                                                                     alt="{{Voyager::image($featuredProduct->getThumbnail($featuredProduct->thumb, 'small'))}}"></a>
                                <div class="doorSlideCaption p-4">
                                    <h4 class="mb-1">{{$featuredProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)}}</h4>
                                    <p class="mb-2">{{$featuredProduct->category->getTranslatedAttribute('name',$locale,$fallbackLocale)}}</p>
                                    <p class="price"><span>@if(!$featuredProduct->sale_price)
                                                        {{ $featuredProduct->special }} <span>₸</span>&nbsp;&nbsp;<s
                                                style="color: #BDBDBD;font-size: 14px;position: relative;top: -2px;">{{number_format($featuredProduct->regular_price,0 ,'', ' ')}} <span
                                                    style="color: #BDBDBD;font-size: 14px;">₸</span></s>
                                                    @else
                                                {{number_format($featuredProduct->regular_price,0 ,'', ' ')}} <span>₸</span>
                                                    @endif</span></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-9 d-none d-md-block">
                                <ul class='hitDots owl-dots'></ul>
                            </div>
                            <div class="col-md-3 text-center text-md-right pr-md-5">
                                <a href="" class="allDoors titlesYellow d-none">Все хиты</a>
                            </div>
                        </div>

                    </div>
                    <div id="tabsCategory-3" class="p-0">

                        <div class="doorSlider owl-carousel saleDoor row py-5">

                            @foreach($saleProducts as $saleProduct)
                            <div class="doorSlide">
                                <a href="{{route('product.show',[$saleProduct->category->slug,$saleProduct->slug])}}"><img src="{{Voyager::image($saleProduct->getThumbnail($saleProduct->thumb, 'small'))}}"
                                                                  alt="{{$saleProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)}}"></a>
                                <div class="doorSlideCaption p-4">
                                    <h4 class="mb-1">{{$saleProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)}}</h4>
                                    <p class="mb-2">{{$saleProduct->category->getTranslatedAttribute('name',$locale,$fallbackLocale)}}</p>
                                    <p class="price"><span>@if(!$saleProduct->sale_price)
                                                {{ $saleProduct->special }} <span>₸</span>&nbsp;&nbsp;<s
                                                style="color: #BDBDBD;font-size: 14px;position: relative;top: -2px;">{{number_format($featuredProduct->regular_price,0 ,'', ' ')}} <span
                                                    style="color: #BDBDBD;font-size: 14px;">₸</span></s>
                                                    @else
                                                {{number_format($featuredProduct->regular_price,0 ,'', ' ')}} <span>₸</span>
                                                    @endif</span></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-9 d-none d-md-block">
                                <ul class='saleDots owl-dots'></ul>
                            </div>
                            <div class="col-md-3 text-center text-md-right pr-md-5">
                                <a href="" class="allDoors titlesYellow d-none">Все акции</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--<div class="featured-products pb-5">
            <nav>
                <div class="container">
                    <div class="nav nav-tabs align-items-end" id="nav-tab" role="tablist"><a
                                class="nav-item nav-link active" id="nav-new-tab" data-toggle="tab" href="#nav-new"
                                role="tab" aria-controls="nav-new" aria-selected="true">Новинки</a> <a
                                class="nav-item nav-link" id="nav-hit-tab" data-toggle="tab" href="#nav-hit" role="tab"
                                aria-controls="nav-hit" aria-selected="false">Хиты продаж</a> <a class="nav-item nav-link"
                                                                                                 id="nav-action-tab"
                                                                                                 data-toggle="tab"
                                                                                                 href="#nav-action"
                                                                                                 role="tab"
                                                                                                 aria-controls="nav-action"
                                                                                                 aria-selected="false">Акции</a>
                    </div>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-new" role="tabpanel"
                     aria-labelledby="nav-new-tab">--}}{{--<a href="#" class="show-more">Все новинки</a>--}}{{--
                    <div class="tab-slider">
                        <div class="sliderArrows main justify-content-center"><a class="prevSlide">Previous</a>
                            <span>1/3</span> <a class="nextSlide">Next</a></div>
                        <div class="content"> @foreach($newProducts as $newProduct)
                                <div class="item">
                                    <div class="image"><a
                                                href="{{route('product.show',[$newProduct->category->slug,$newProduct->slug])}}">
                                            <picture>
                                                <source srcset="{{str_replace(pathinfo(Voyager::image($newProduct->getThumbnail($newProduct->thumb, 'small')))['extension'],'webp',Voyager::image($newProduct->getThumbnail($newProduct->thumb, 'small')))}}"
                                                        type="image/webp">
                                                <source srcset="{{Voyager::image($newProduct->getThumbnail($newProduct->thumb, 'small'))}}"
                                                        type="image/jpeg">
                                                <img src="{{Voyager::image($newProduct->getThumbnail($newProduct->thumb, 'small'))}}"
                                                     alt="{{$newProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)}}">
                                            </picture>
                                        </a></div>
                                    <div class="text"><a
                                                href="{{route('product.show',[$newProduct->category->slug,$newProduct->slug])}}"
                                                class="name">{{$newProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)}}</a>
                                        <span class="category">{{$newProduct->category->getTranslatedAttribute('name',$locale,$fallbackLocale)}}
                                            -{{$newProduct->getTranslatedAttribute('brand',$locale,$fallbackLocale)}}</span>
                                        <hr>
                                        <div class="price"> @if(!$newProduct->sale_price) <span>{{number_format($newProduct->regular_price,0 ,'', ' ')}}
                                                <span class="valute">₸</span></span> @else <span class="old-price">{{number_format($newProduct->regular_price,0 ,'', ' ')}}
                                                <span class="valute">₸</span></span> <span class="new-price">{{number_format($newProduct->sale_price,0 ,'', ' ')}}
                                                <span class="valute">₸</span></span> @endif </div>
                                    </div>
                                </div>@endforeach </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-hit" role="tabpanel"
                     aria-labelledby="nav-hit-tab">--}}{{--<a href="#" class="show-more">Все хиты продаж</a>--}}{{--
                    <div class="tab-slider">
                        <div class="sliderArrows main justify-content-center"><a class="prevSlide">Previous</a>
                            <span>1/3</span> <a class="nextSlide">Next</a></div>
                        <div class="content"> @foreach($featuredProducts as $featuredProduct)
                                <div class="item">
                                    <div class="image"><a
                                                href="{{route('product.show',[$featuredProduct->category->slug,$featuredProduct->slug])}}">
                                            <picture>
                                                <source srcset="{{str_replace(pathinfo(Voyager::image($featuredProduct->getThumbnail($featuredProduct->thumb, 'small')))['extension'],'webp',Voyager::image($featuredProduct->getThumbnail($featuredProduct->thumb, 'small')))}}"
                                                        type="image/webp">
                                                <source srcset="{{Voyager::image($featuredProduct->getThumbnail($featuredProduct->thumb, 'small'))}}"
                                                        type="image/jpeg">
                                                <img src="{{Voyager::image($featuredProduct->getThumbnail($featuredProduct->thumb, 'small'))}}"
                                                     alt="{{$featuredProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)}}">
                                            </picture>
                                        </a></div>
                                    <div class="text"><a
                                                href="{{route('product.show',[$featuredProduct->category->slug,$featuredProduct->slug])}}"
                                                class="name">{{$featuredProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)}}</a>
                                        <span class="category">{{$featuredProduct->category->getTranslatedAttribute('name',$locale,$fallbackLocale)}}
                                            -{{$featuredProduct->getTranslatedAttribute('brand',$locale,$fallbackLocale)}}</span>
                                        <hr>
                                        <div class="price"> @if(!$featuredProduct->sale_price) <span>{{number_format($featuredProduct->regular_price,0 ,'', ' ')}}
                                                <span class="valute">₸</span></span> @else <span class="old-price">{{number_format($featuredProduct->regular_price,0 ,'', ' ')}}
                                                <span class="valute">₸</span></span> <span class="new-price">{{number_format($featuredProduct->sale_price,0 ,'', ' ')}}
                                                <span class="valute">₸</span></span> @endif </div>
                                    </div>
                                </div>@endforeach </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-action" role="tabpanel"
                     aria-labelledby="nav-action-tab">--}}{{--<a href="#" class="show-more">Все акции</a>--}}{{--
                    <div class="tab-slider">
                        <div class="sliderArrows main justify-content-center"><a class="prevSlide">Previous</a>
                            <span>1/3</span> <a class="nextSlide">Next</a></div>
                        <div class="content"> @foreach($saleProducts as $saleProduct)
                                <div class="item">
                                    <div class="image"><a
                                                href="{{route('product.show',[$saleProduct->category->slug,$saleProduct->slug])}}">
                                            <picture>
                                                <source srcset="{{str_replace(pathinfo(Voyager::image($saleProduct->getThumbnail($saleProduct->thumb, 'small')))['extension'],'webp',Voyager::image($saleProduct->getThumbnail($saleProduct->thumb, 'small')))}}"
                                                        type="image/webp">
                                                <source srcset="{{Voyager::image($saleProduct->getThumbnail($saleProduct->thumb, 'small'))}}"
                                                        type="image/jpeg">
                                                <img src="{{Voyager::image($saleProduct->getThumbnail($saleProduct->thumb, 'small'))}}"
                                                     alt="{{$saleProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)}}">
                                            </picture>
                                        </a></div>
                                    <div class="text"><a
                                                href="{{route('product.show',[$saleProduct->category->slug,$saleProduct->slug])}}"
                                                class="name">{{$saleProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)}}</a>
                                        <span class="category">{{$saleProduct->category->getTranslatedAttribute('name',$locale,$fallbackLocale)}}
                                            -{{$saleProduct->getTranslatedAttribute('brand',$locale,$fallbackLocale)}}</span>
                                        <hr>
                                        <div class="price"> @if(!$saleProduct->sale_price) <span>{{number_format($saleProduct->regular_price,0 ,'', ' ')}}
                                                <span class="valute">₸</span></span> @else <span class="old-price">{{number_format($saleProduct->regular_price,0 ,'', ' ')}}
                                                <span class="valute">₸</span></span> <span class="new-price">{{number_format($saleProduct->sale_price,0 ,'', ' ')}}
                                                <span class="valute">₸</span></span> @endif </div>
                                    </div>
                                </div>@endforeach </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>
@endsection
