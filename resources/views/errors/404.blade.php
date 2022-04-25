@extends('partials.app')
@section('seo_title','404 - Такой страницы не существует')
@section('meta_keywords','404 - Такой страницы не существует')
@section('meta_description','404 - Такой страницы не существует')
@section('content')
    <div id="product-category">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#">Запрашиваемая страница не найдена!</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0">Запрашиваемая страница не найдена!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="checkout-complete-page def-page">
            <div class="container">
                <div class="row">
                    <div class="content col-12">
                        <div class="complete-content">
                            <div class="error__content">
                                <div class="error-space"></div>
                                <div class="error-img"><img src="img/cartEmpty.svg" alt=""></div>
                                <div class="error-text">
                                    <div class="dont-find">К сожалению, запрашиваемая Вами страница не найдена.
                                        Вероятно, Вы указали несуществующий адрес, страница была удалена, перемещена
                                        или сейчас она временно недоступна!</div>
                                    <a href="/catalog"><i class="fa fa-long-arrow-left mr-2"></i>Продолжить покупки</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection