@extends('partials.app')
@section('meta_description',$description)
@section('seo_title',$seoTitle)
@section('meta_keywords',$keywords)
@section('content')
    <div id="common-home" class="container-fluid px-0">
        <div class="row">
            <div id="content" class="col-12">
                <section id="slider">
                    <div class="container-fluid px-0">
                        <style>
                            #slider .slider .slideContainer:after {
                                content: none;
                            }

                            #slider .slider:after {
                                content: none;
                            }

                            #slider .slider .slideContainer, #slider .slider .sliders-box {
                                border-radius: 0;
                                height: 100%;
                            }

                            #slider .slider .sliders-box .slide img {
                                width: 110%;
                                height: 110%;
                            }

                            #slider .mainTitle {
                                align-items: flex-end;
                                padding-bottom: 50px;
                            }

                            #slider .col-lg-6.px-0 {
                                position: relative;
                            }

                            #slider .mainTitle:before {
                                content: '';
                                position: absolute;
                                left: 0;
                                z-index: 3;
                                top: 0;
                                width: 100%;
                                height: 100%;
                            / / background-image: url(/img/bg-after.png);
                                background-repeat: no-repeat;
                                background-position: top right;
                                background-size: cover;
                                display: flex;
                            }
                        </style>
                        <div class="row">
                            <div class="col-6 d-none d-lg-flex px-0">
                                <div class="slider">
                                    <div class="slideContainer">
                                        <div class="sliders-box">
                                            <div class="slide"
                                                 style="position: absolute; top: 0px; left: 0px; display: block;"><img
                                                    src="/images/skidka.png" alt="Main slider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 px-0">
                                <div class="mainTitle">
                                    <div class="title">
                                        <hgroup>
                                            <h1 class="text-center text-lg-left"
                                                style="font-size:36px;color:#FFF;font-weight:500">Дарим скидки до 30%</h1>
                                        </hgroup>
                                        <form action="#" class="callback-form text-center text-lg-left">
                                            @csrf
                                            <div class="row align-items-center">
                                                <div class="col-xl-7">
                                                    <div class="inputGroup">
                                                        <label for="name" class="text-left mx-auto mr-lg-auto ml-lg-0 ">Имя</label>
                                                        <input type="text" id="name" name="name" placeholder="Ваше имя"
                                                               class=" mx-auto mr-lg-auto ml-lg-0">
                                                    </div>
                                                    <div class="inputGroup">
                                                        <label for="phone"
                                                               class="text-left mx-auto mr-lg-auto ml-lg-0 ">Телефон
                                                        </label>
                                                        <input type="tel" id="phone" name="phone"
                                                               placeholder="Номер телефона"
                                                               class=" mx-auto mr-lg-auto ml-lg-0" maxlength="16">
                                                    </div>
                                                </div>
                                                <div class="col-xl-5 text-center text-lg-right">
                                                    <button type="submit" class="button">Оставить заявку</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="popularProduct" class="py-3">

                    <div class="container py-3">
                        <div id="tabs">
                            <ul class="row scrollRow flex-nowrap">
                                <li class="col-9 col-lg-4 col-xl-3 scrollItem"><a href="#tabs-1">Новинки</a></li>
                                <li class="col-9 col-lg-4 col-xl-3 scrollItem"><a href="#tabs-2">Хиты продаж</a></li>
                                <li class="col-9 pl-5 pl-sm-0 col-lg-4 col-xl-3 scrollItem"><a href="#tabs-3">Акции</a></li>
                            </ul>
                            <div id="tabs-1" class="p-0">

                                <div class="doorSlider owl-carousel newDoor row py-5 m-0">
                                    @foreach($newProducts as $newProduct)
                                    <div class="doorSlide">
                                        <a href="{{route('product.show',[$newProduct->category->slug,$newProduct->slug])}}">
                                            <picture>
                                                <source srcset="{{str_replace(pathinfo(Voyager::image($newProduct->thumb),PATHINFO_EXTENSION),'webp',Voyager::image($newProduct->thumb))}}"
                                                        type="image/webp">
                                                <source srcset="{{Voyager::image($newProduct->thumb)}}"
                                                        type="image/jpeg">
                                                <img src="{{Voyager::image($newProduct->thumb)}}"
                                                     alt="{{$newProduct->name}}">
                                            </picture>
                                            <div class="doorSlideCaption p-4">
                                                <h4 class="mb-1">{{$newProduct->name}}</h4>
                                                @if($newProduct->category)
                                                <p class="mb-2">{{ $newProduct->category->name }}</p>
                                                @endif
                                                <p class="price"><span>{{number_format($newProduct->regular_price,0 ,'', ' ')}}</span> тг.</p>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-9 d-none d-md-block">
                                        <ul class='newDots owl-dots'></ul></div>
                                    <div class="col-md-3 text-center text-md-right pr-md-5">
                                        <a href="" class="allDoors titlesYellow d-none">Все новинки</a>
                                    </div>
                                </div>

                            </div>
                            <div id="tabs-2" class="p-0">

                                <div class="doorSlider owl-carousel hitDoor row py-5">

                                    @foreach($featuredProducts as $featuredProduct)
                                    <div class="doorSlide">
                                        <a href="{{route('product.show',[$featuredProduct->category->slug,$featuredProduct->slug])}}">
                                            <picture>
                                                <source srcset="{{str_replace(pathinfo(Voyager::image($featuredProduct->thumb),PATHINFO_EXTENSION),'webp',Voyager::image($featuredProduct->thumb))}}"
                                                        type="image/webp">
                                                <source srcset="{{Voyager::image($featuredProduct->thumb)}}"
                                                        type="image/jpeg">
                                                <img src="{{Voyager::image($featuredProduct->thumb)}}"
                                                     alt="{{$featuredProduct->name}}">
                                            </picture>
                                        </a>
                                        <div class="doorSlideCaption p-4">
                                            <h4 class="mb-1">{{$featuredProduct->name}}</h4>
                                            @if($featuredProduct->category)
                                            <p class="mb-2">{{ $featuredProduct->category->name }}</p>
                                            @endif
                                            <p class="price"><span>{{number_format($featuredProduct->regular_price,0 ,'', ' ')}}</span> тг.</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-9 d-none d-md-block">
                                        <ul class='hitDots owl-dots'></ul></div>
                                    <div class="col-md-3 text-center text-md-right pr-md-5">
                                        <a href="" class="allDoors titlesYellow d-none">Все хиты</a>
                                    </div>
                                </div>

                            </div>
                            <div id="tabs-3" class="p-0">

                                <div class="doorSlider owl-carousel saleDoor row py-5">

                                    @foreach($saleProducts as $saleProduct)
                                    <div class="doorSlide">
                                        <a href="{{route('product.show',[$saleProduct->category->slug,$saleProduct->slug])}}">
                                            <picture>
                                                <source srcset="{{str_replace(pathinfo(Voyager::image($saleProduct->thumb),PATHINFO_EXTENSION),'webp',Voyager::image($saleProduct->thumb))}}"
                                                        type="image/webp">
                                                <source srcset="{{Voyager::image($saleProduct->thumb)}}"
                                                        type="image/jpeg">
                                                <img src="{{Voyager::image($saleProduct->thumb)}}"
                                                     alt="{{$saleProduct->name}}">
                                            </picture>
                                        </a>
                                        <div class="doorSlideCaption p-4">
                                            <h4 class="mb-1">{{$saleProduct->name}}</h4>
                                            @if($saleProduct->category)
                                            <p class="mb-2">{{ $saleProduct->category->name }}</p>
                                            @endif
                                            <p class="price"><span>{{number_format($saleProduct->regular_price,0 ,'', ' ')}}</span> тг.</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-9 d-none d-md-block">
                                        <ul class='saleDots owl-dots'></ul></div>
                                    <div class="col-md-3 text-center text-md-right pr-md-5">
                                        <a href="" class="allDoors titlesYellow d-none">Все акции</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>
                <section id="reviewProduct" class="py-5">
                    <div class="container pt-3 pt-xl-5">
                        <div id="review"
                             class="row align-items-center ui-tabs ui-corner-all ui-widget ui-widget-content">
                            <h3 class="d-block order-first w-100 d-lg-none pl-lg-5 text-center text-lg-left">Каталог
                                дверей</h3>
                            <ul class="col-lg-4 col-xl-3 order-2 order-lg-last d-block d-md-flex d-lg-block justify-content-lg-start pl-lg-5 ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header"
                                role="tablist">
                                <li class="ui-corner-left"><h3
                                        class="d-none d-lg-block pl-lg-5 text-center text-lg-left">Каталог дверей</h3>
                                </li>

                                
                                <li class="d-block w-100 d-md-inline-block d-lg-block ui-tabs-tab ui-state-default ui-tab ui-corner-left"
                                    role="tab" tabindex="-1" aria-controls="review-2" aria-labelledby="ui-id-5"
                                    aria-selected="false" aria-expanded="false"><a href="#review-2"
                                                                                   data-href="/catalog/buldors"
                                                                                   class="reviewLink pl-lg-5 w-100 text-center text-lg-left ui-tabs-anchor"
                                                                                   role="presentation" tabindex="-1"
                                                                                   id="ui-id-5">Бульдорс</a></li>
                                <li class="d-block w-100 d-md-inline-block d-lg-block ui-tabs-tab ui-state-default ui-tab ui-corner-left"
                                    role="tab" tabindex="-1" aria-controls="review-3" aria-labelledby="ui-id-6"
                                    aria-selected="false" aria-expanded="false"><a href="#review-3"
                                                                                   data-href="/catalog/mastino"
                                                                                   class="reviewLink pl-lg-5 w-100 text-center text-lg-left ui-tabs-anchor"
                                                                                   role="presentation" tabindex="-1"
                                                                                   id="ui-id-6">Mastino</a></li>
                                <li class="d-block w-100 d-md-inline-block d-lg-block ui-tabs-tab ui-state-default ui-tab ui-corner-left"
                                    role="tab" tabindex="-1" aria-controls="review-4" aria-labelledby="ui-id-7"
                                    aria-selected="false" aria-expanded="false"><a href="#review-4"
                                                                                   data-href="/catalog/mezhkomnatnye-dveri"
                                                                                   class="reviewLink pl-lg-5 w-100 text-center text-lg-left ui-tabs-anchor"
                                                                                   role="presentation" tabindex="-1"
                                                                                   id="ui-id-7">Межкомнатные двери</a>
                                </li>
                                <li class="d-block w-100 d-md-inline-block d-lg-block ui-tabs-tab ui-state-default ui-tab ui-tabs-active ui-state-active ui-corner-left"
                                    role="tab" tabindex="0" aria-controls="review-1" aria-labelledby="ui-id-4"
                                    aria-selected="true" aria-expanded="true"><a href="#review-1"
                                                                                 data-href="/catalog/furnitury"
                                                                                 class="reviewLink pl-lg-5 w-100 text-center text-lg-left ui-tabs-anchor"
                                                                                 role="presentation" tabindex="-1"
                                                                                 id="ui-id-4">Фурнитуры</a></li>
                            </ul>
                            <div id="review-1"
                                 class="col-lg-8 col-xl-9 order-3 reviewTab activ ui-tabs-panel ui-corner-bottom ui-widget-content"
                                 aria-labelledby="ui-id-4" role="tabpanel" aria-hidden="false">
                                <div class="row">
                                    <div class="col-xl-5 d-none d-xl-block pt-4 pr-4">
                                        <h2>Фурнитуры</h2>
                                        <p class="mb-4"></p>
                                        <p class="mb-5"></p>
                                    </div>
                                    <div class="col-xl-7 px-0">
                                        <div class="row reviewSliderWrap flex-nowrap">
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/H-0511(1)%20AB-340x440.jpeg"
                                                                alt="H-0511">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/н-0513%20мат%20хром%20(2)-340x440.jpeg"
                                                                alt="H-0513">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/H-0517%20BN-340x440.jpeg"
                                                                alt="H-0517">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/0519-340x440.jpeg"
                                                                alt="H-0519 G">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="review-2"
                                 class="col-lg-8 col-xl-9 order-3 reviewTab ui-tabs-panel ui-corner-bottom ui-widget-content"
                                 aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true" style="display: none;">
                                <div class="row">
                                    <div class="col-xl-5 d-none d-xl-block pt-4 pr-4">
                                        <h2>Бульдорс</h2>
                                        <p class="mb-4">Производство входных дверей по ГОСТ! Защитные взломостойкие
                                            бронированные!. Высокая шумоизоляция! Доставка и установка!</p>
                                        <p class="mb-5">Входные двери в квартиру или частный дом обеспечивают улучшенную
                                            защиту от утечек тепла, сквозняков и посторонних шумов за счет слоя жесткого
                                            вспененного пенополиуретана.</p>
                                    </div>
                                    <div class="col-xl-7 px-0">
                                        <div class="row reviewSliderWrap flex-nowrap">
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/45-р1%20dub-340x440.jpeg"
                                                                alt="Бульдорс 45 P-1 Дуб крем">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/Laser-24-340x440.jpeg"
                                                                alt="Бульдорс Laser-24">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/steel-12-1-340x440.jpeg"
                                                                alt="Бульдорс Steel 12">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/steel-23-340x440.jpeg"
                                                                alt="Бульдорс Steel 23">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="review-3"
                                 class="col-lg-8 col-xl-9 order-3 reviewTab ui-tabs-panel ui-corner-bottom ui-widget-content"
                                 aria-labelledby="ui-id-6" role="tabpanel" aria-hidden="true" style="display: none;">
                                <div class="row">
                                    <div class="col-xl-5 d-none d-xl-block pt-4 pr-4">
                                        <h2>Mastino</h2>
                                        <p class="mb-4">Входные двери в квартиру или частный дом обеспечивают улучшенную
                                            защиту от утечек тепла, сквозняков и посторонних шумов за счет слоя жесткого
                                            вспененного пенополиуретана.</p>
                                        <p class="mb-5">Вся линейка входных дверей «Бульдорс», начиная с коллекций
                                            эконом-класса и заканчивая моделями премиум-класса, производится на
                                            автоматизированных технологических линиях, не имеющих аналогов в Казахстане
                                            и России.</p>
                                    </div>
                                    <div class="col-xl-7 px-0">
                                        <div class="row reviewSliderWrap flex-nowrap">
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/Lazio-340x440.png"
                                                                alt="Mastino Lacio">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/dver_mastino_line_2_temnyi_venge-340x440.jpeg"
                                                                alt="Mastino Line 2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/Novara-340x440.png"
                                                                alt="Mastino Novara">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/Mastino-i1-340x440.png"
                                                                alt="Mastino Ponte ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="review-4"
                                 class="col-lg-8 col-xl-9 order-3 reviewTab ui-tabs-panel ui-corner-bottom ui-widget-content"
                                 aria-labelledby="ui-id-7" role="tabpanel" aria-hidden="true" style="display: none;">
                                <div class="row">
                                    <div class="col-xl-5 d-none d-xl-block pt-4 pr-4">
                                        <h2>Межкомнатные двери</h2>
                                        <p class="mb-4">Производство межкомнатных дверей по ГОСТ! Защитные взломостойкие
                                            бронированные!. Высокая шумоизоляция! Доставка и установка!</p>
                                        <p class="mb-5"></p>
                                    </div>
                                    <div class="col-xl-7 px-0">
                                        <div class="row reviewSliderWrap flex-nowrap">
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/Вельвет%20орех10004-340x440.jpeg"
                                                                alt="Light ПДО 10004">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/Вельвет%20орех%2010012-340x440.jpeg"
                                                                alt="Light ПДО 10012">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/Вельвет%20орех10013-340x440.jpeg"
                                                                alt="Light ПДО 10013">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 reviewSlider">
                                                <div class="row">
                                                    <div class="mb-4 mb-md-0 col-12">
                                                        <div class="reviewBig mx-auto">
                                                            <div class="reviewShadow d-none d-sm-block"></div>
                                                            <img
                                                                src="/storage/catalog/Вельвет%20орех10021-340x440.jpeg"
                                                                alt="Light ПДО 10021">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reviewBottom pt-2 pt-md-3 pb-3 pb-md-4">
                        <div class="container-fluid px-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-6"><a id="allDoorLink"
                                                                            href="index.php?route=product/category&amp;path=18_46"
                                                                            class="titlesYellow d-inline-block">Все
                                                    двери Бульдорс</a></div>
                                            <div class="col-6"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 text-sm-right pr-5 order-first order-sm-last mb-3 mb-sm-0">
                                        <ul class="reviewDots owl-dots">
                                            <li class="owl-dot reviewDotsLi active"></li>
                                            <li class="owl-dot reviewDotsLi"></li>
                                            <li class="owl-dot reviewDotsLi"></li>
                                            <li class="owl-dot reviewDotsLi"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="laminat" class="py-3 py-md-5">
                    <div class="container py-3 py-xl-5">
                        <div class="row">
                            <div class="col-lg-5 order-last order-lg-first">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-5 p-3"><img src="img/1.png" class="img-fluid" alt="картинка 1">
                                    </div>
                                    <div class="col-sm-6 col-lg-7 p-3"><img src="img/2.png" class="img-fluid" alt="картинка 2">
                                    </div>
                                    <div class="d-none d-lg-block col-lg-7 p-3"><img src="img/3.png" class="img-fluid"
                                                                                     alt="картинка 3"></div>
                                    <div class="d-none d-lg-block col-lg-5 p-3"><img src="img/4.png" class="img-fluid"
                                                                                     alt="картинка 4"></div>
                                </div>
                            </div>
                            <div class="col-lg-7 py-3 pl-lg-5 order-first order-lg-last text-center text-lg-left">
                                <h2 class="mb-4">Ламинат и плинтус</h2>
                                <p class="mb-4">Среди современных отделочных материалов для пола большим спросом
                                    пользуется ламинат. Цена на многослойную доску доступная, а технические
                                    характеристики высокие.
                                </p>
                                <p class="mb-4">Материал наделен достаточной жесткостью и прочностью, имеет длительный
                                    эксплуатационный срок. Обладает хорошими теплоизоляционными, звукоизоляционными
                                    свойствами. Отличается разнообразием расцветок, декоративным оформлением.</p>
                                <p class="mb-4 d-none d-lg-block"><strong>Стремление приобрести высококачественный товар
                                        вполне обосновано. Длительность эксплуатационного срока напольного покрытия
                                        обеспечивается:</strong></p>
                                <ul class="mb-5 d-none d-lg-block">
                                    <li>влагостойким защитным слоем,</li>
                                    <li>высоким классом износостойкости.</li>
                                    <li>влагостойким защитным слоем,</li>
                                    <li>высоким классом износостойкости.</li>
                                    <li>влагостойким защитным слоем</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid px-0 pt-2 pt-md-3 pb-3 pb-md-4">
                        <div class="container">
                            <div class="row">
                                <div class="offset-lg-5 col-lg-7 pl-lg-5 text-center text-sm-left">

                                    <a href="/catalog/laminaty-i-plintusa"
                                       class="titlesYellow">Все Ламинаты и плинтуса</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="aboutUs" class="pt-3 pt-md-5">
                    <div class="container py-3 py-xl-5">
                        <div class="row">
                            <div class="col-xl-7 text-center text-xl-left mb-4 mb-xl-0">
                                <h2 class="mb-4">О нас</h2>
                                <p class="mb-4">Компания Бульдорс.кз реализует входные и межкомнатные двери известного
                                    российского бренда Бульдорс в Алматы и по всему Казахстану. Мы предлагаем двери из
                                    металла, бруса, МДФ и других материалов.</p>
                                <p class="mb-4">Двери Бульдорс отличаются привлекательным внешним видом и высокой
                                    надежностью механической составляющей. На ваш выбор представлены двери как с
                                    внутренней, так и с внешней отделкой экологичными материалами любой цветовой
                                    гаммы.</p>
                                <p class="mb-4">Ваш дом – ваша крепость. Защитите ее с помощью двери «Бульдорс»!</p>
                            </div>
                            <div class="col-xl-5 col-lg-10 offset-lg-1 offset-xl-0 offset-sm-2 col-sm-8">
                                <div class="videoAbout">
                                    <video src="#" poster="img/preview.png"></video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid px-0 pt-2 pt-md-3 pb-3 pb-md-4">
                        <div class="container">
                            <div class="row">
                                <div class=" col-xl-7 col-12">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 mb-4 mb-sm-0"><a href="/about"
                                                                                       class="titlesYellow">Подробнее о
                                                нас</a></div>
                                        <div class="col-xl-3 col-sm-6 text-sm-right text-xl-left"><a
                                                href="/partners" class="titleWhite">Стать партнером</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="why" class="pt-3 pt-md-5 pb-0 pb-md-3">
                    <div class="container py-3 py-xl-5">
                        <div class="row">
                            <div class="col-xl-3 p-3 col-lg-10 offset-lg-1 offset-xl-0">
                                <h2 class="mb-4 text-center text-xl-left">Почему Бульдорс</h2>
                                <p class="mb-4 text-center text-xl-left"><strong class="d-block">Обратившись в нашу
                                        компанию Вы получаете:</strong></p>
                                <ul class="list-unstyled pl-4">
                                    <li class="mb-3 pl-5">грамотную консультацию относительно того, какую дверь лучше
                                        поставить именно в вашем случае;
                                    </li>
                                    <li class="mb-3 pl-5">доставку двери до места установки;</li>
                                    <li class="mb-3 pl-5">правильную установку двери профессиональными мастерами;</li>
                                    <li class="mb-3 pl-5">гарантию как на установку, таки на приобретаемую дверь.</li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 p-3 text-center">
                                <img src="img/whyItem.png" alt="дверь" class="d-block mb-3 w-100" height="277">
                                <h4 class="mb-3">Гарантия качества</h4>
                                <p>Предприятие оснащено самым новейшим высокоточным оборудованием, что позволяет
                                    избежать погрешностей и дефектов. Вся наша продукция сертифицированная и имеет
                                    гарантии.</p>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 p-3 text-center">
                                <img src="img/whyImg2.png" alt="Экологичность дверей" class="d-block mb-3 w-100" height="277">
                                <h4 class="mb-3">Экологичность</h4>
                                <p>Исключительно все модели: от экономичных
                                    до дорогостоящих, сделаны из материалов, отличающихся экологической безопасностью и
                                    высокой износостойкостью, в строгом соответствии со всеми стандартами качества.</p>
                            </div>
                            <div class="col-xl-3 col-lg-4 offset-md-3 offset-lg-0 col-md-6 p-3 text-center">
                                <img src="img/whyImg3.png" alt="Большой ассортимент дверей" class="d-block mb-3 w-100" height="277">
                                <h4 class="mb-3">Большой ассортимент</h4>
                                <p>Компания «ДвериСити» предлагает богатое разнообразие моделей и широкий диапазон цен,
                                    исходя из запросов покупателей. Каждый заказ максимально прорабатывается с учетом
                                    всех пожеланий клиента.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="comment" class="pt-3 pt-md-5 pb-0 pb-md-3">
                    <div class="container py-3 py-xl-5">
                        <div class="row align-items-center">
                            <div class="col-xl-5 col-lg-8 offset-lg-2 offset-xl-0 col-md-10 offset-md-1 mb-4 mb-xl-0">
                                <h2 class="mb-5 d-block d-xl-none text-center">Отзывы наших клиентов</h2>
                                <div class="p-4 comments">
                                    <h2 class="d-none d-xl-block mb-4">Отзывы наших клиентов</h2>
                                    <div class="row flex-nowrap commentWrap">
                                        <div class="col-12 commentItem">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><img
                                                        src="/storage/catalog/avaComment-100x100.png"
                                                        alt="комментарий" class="rounded-circle w-100 h-100"></div>
                                                <div class="col">
                                                    <strong class="d-block">Жумабеков Аскар</strong>
                                                    <span class="d-block">г. Талгар, Алматинская область.</span>
                                                </div>
                                                <div class="col-12 pt-4 mb-5" style="height: 270px; overflow: hidden;">
                                                    <p>Рекомендую компанию «Бульдорс.кз».

                                                        При выборе двери, в первую очередь, обратить внимание на ее
                                                        защитную функцию, а именно – на замки. </p>
                                                    <p>

                                                        Во второю очередь – на качество стали, из которой изготовлен
                                                        короб и полотно, т.к. толщина металла может быть небольшая, а
                                                        гибкость жестче. </p>
                                                    <p>В третьих, какой материал используется для сохранения тепла и
                                                        звукоизоляции. При покупке двери я руководствовался именно этими
                                                        параметрами. Дверь «Бульдорс 25» полностью удовлетворила мои
                                                        требования.</p>
                                                    <p> Рекомендую.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="commentNav">
                                        <div class="row">
                                            <div class="col-sm-6 text-center text-sm-left order-last order-sm-first">
                                                <a href="#" class="titlesYellow" data-toggle="modal"
                                                   data-target="#allComments">Все отзывы</a>
                                            </div>
                                            <div
                                                class="col-sm-6 text-center text-sm-right order-first order-sm-last mb-4 mb-sm-0">
                                                <ul class="commentDots owl-dots">
                                                    <li class="owl-dot commentDotsLi active"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-8 offset-lg-2 offset-xl-0 d-none d-lg-block pl-lg-5">
                                <h3 class="mb-4">Рады видеть вас у нас на сайте</h3>
                                <p class="mb-4">Двери «Бульдорс» изготовлены на высокоточном оборудовании по современным
                                    технологиям из качественного сырья российских производителей</p>
                                <ul class="textComment list-unstyled pl-4">
                                    <li class="pl-5 mb-4">Производственный процесс полностью автоматизирован. Это
                                        позволяет исключить человеческий фактор и снизить риск возникновения брака.
                                    </li>
                                    <li class="pl-5 mb-4">Все составляющие дверных конструкций неоднократно испытаны и
                                        безупречно функционируют в течение всего срока эксплуатации.
                                    </li>
                                </ul>
                                <p><strong>Стальные двери «Бульдорс» на 100% отвечают европейским стандартам
                                        качества.</strong></p>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="modal fade" id="allComments" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Отзывы наших клиентов</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="allComments owl-carousel">
                                    <div class="commentItems">
                                        <div class="row align-items-center">
                                            <div class="col-auto"><img src="/storage/catalog/avaComment-100x100.png" alt="отзыв" class="rounded-circle w-100 h-100"></div>
                                            <div class="col">
                                                <strong class="d-block">Жумабеков Аскар</strong>
                                                <span class="d-block">г. Талгар, Алматинская область.</span>
                                            </div>
                                            <div class="col-12 pt-4 mb-5" style="height: 270px; overflow: hidden;">
                                                <p>Рекомендую компанию «Бульдорс.кз».

                                                    При выборе двери, в первую очередь, обратить внимание на ее защитную функцию, а именно – на замки. </p><p>

                                                    Во второю очередь – на качество стали, из которой изготовлен короб и полотно, т.к. толщина металла может быть небольшая, а гибкость жестче. </p><p>В третьих, какой материал используется для сохранения тепла и звукоизоляции. При покупке двери я руководствовался именно этими параметрами. Дверь «Бульдорс 25» полностью удовлетворила мои требования.</p><p> Рекомендую.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-dots"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="news" class="pt-3 pt-md-5 pb-0 pb-md-3">
                    <div class="container py-3 py-xl-5">
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-xl-3 py-3 col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                    <div class="newsItem">
                                        <img src="{{Storage::disk('public')->url($post->image)}}" alt="новость"
                                             class="d-block">
                                        <div class="p-3 newsCaption">
                                            <time class="d-block mb-3">{{$post->created_at}}</time>
                                            <p class="mb-3"><strong>{{$post->title}}</strong></p>
                                            <p class="mb-3 d-block">{{$post->excerpt}}</p>
                                            <a href="/news/{{$post->slug}}" class="moreNews">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-xl-3 pt-xl-5 px-4 text-center text-xl-left mb-4 mb-xl-0">
                                <h2 class="mb-4 pt-xl-5">Новости</h2>
                                <h3>Последние новости из мира дверей и домашнего декора</h3>
                            </div>
                            <div class="col-12 mb-4 d-md-none text-center">
                                <a href="/news" class="titlesYellow">Все новости</a>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid px-0 pt-2 pt-md-3 pb-3 pb-md-4 d-none d-md-block">
                        <div class="container">
                            <div class="row">
                                <div class="col-3 offset-9 px-4">
                                    <a href="/news" class="titlesYellow">Все новости</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

    @include('partials.modalVideo')
@endsection
