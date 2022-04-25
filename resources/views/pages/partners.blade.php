@extends('partials.app')
@section('meta_description',$description ? $description : 'Партнеры')
@section('seo_title',$seoTitle ? $seoTitle : 'Партнеры')
@section('meta_keywords',$keywords ? $keywords : 'Партнеры')
@section('content')
    <div id="product-category">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#">Партнеры</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0">Партнеры</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="partnerPage" class="py-5">
            <div class="container-fluid px-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 pr-lg-5">
                            <h3 class="partTitle" style="color: #000000;margin-bottom: 20px;">Стань нашим представителем сегодня!</h3>
                            <h4 style="font-size: 26px;line-height: 38px;color: #000000;font-weight: bold;margin-bottom: 20px;">Вас ждет выгодное партнёрство!</h4>
                            <ul class="p-0 pl-lg-4" style="list-style: none; font-size: 16px;line-height: 29px;">
                                <li style="background:url('../img/liStyleWhy.png') no-repeat left center; padding-left: 30px;margin-bottom: 20px;">Доступная ценовая политика компании, которая позволит Вам стабильно зарабатывать на наших дверях!</li>
                                <li style="background:url('../img/liStyleWhy.png') no-repeat left center; padding-left: 30px;margin-bottom: 20px;">Производственная мощность – 900 дверей в сутки. Мы изготовим для Вас любую партию дверей в самый кратчайший срок!</li>
                                <li style="background:url('../img/liStyleWhy.png') no-repeat left center; padding-left: 30px;margin-bottom: 20px;">Выгодные условия сотрудничества: возможность предоставления исключительного права на реализацию дверей «Бульдорс» в Вашем регионе.</li>
                                <li style="background:url('../img/liStyleWhy.png') no-repeat left center; padding-left: 30px;margin-bottom: 20px;">Активная рекламно-маркетинговая политика. Мы гарантируем Вам содействие в продвижении продукта!</li>
                                <li style="background:url('../img/liStyleWhy.png') no-repeat left center; padding-left: 30px;margin-bottom: 20px;">Мы оказываем помощь в логистике и имеем возможность заказа железнодорожного и автомобильного транспорта.</li>
                            </ul>
                        </div>
                        <div class="col-lg-5 partFormWrap" style="background: url('../img/partnerBg.png') no-repeat center left;-webkit-background-size: cover;background-size: cover;display: flex;align-items: center;border-radius: 10px">
                            <form action="" class="partForm" style="margin: 60px auto">
                                <h5 class="text-center text-lg-left" style="color: #ffffff;font-weight: bold;font-size: 20px;margin-bottom: 20px;">Оставьте заявку и мы свяжемся с вами в ближайшее время</h5>
                                <input type="text" style="background-color: transparent;border: .5px solid #ffffff; border-radius: 10px;width: 100%;height: 40px;margin-bottom: 20px;font-size: 14px;line-height: 39px;padding: 0 10px;color: #ffffff;" class="partnerInput" placeholder="ФИО" name="part-name">
                                <input type="text" style="background-color: transparent;border: .5px solid #ffffff; border-radius: 10px;width: 100%;height: 40px;margin-bottom: 20px;font-size: 14px;line-height: 39px;padding: 0 10px;color: #ffffff;" class="partnerInput" placeholder="Телефон" name="part-tel">
                                <input type="text" style="background-color: transparent;border: .5px solid #ffffff; border-radius: 10px;width: 100%;height: 40px;margin-bottom: 20px;font-size: 14px;line-height: 39px;padding: 0 10px;color: #ffffff;" class="partnerInput" placeholder="E-mail" name="part-email">
                                <input type="text" style="background-color: transparent;border: .5px solid #ffffff; border-radius: 10px;width: 100%;height: 40px;margin-bottom: 20px;font-size: 14px;line-height: 39px;padding: 0 10px;color: #ffffff;" class="partnerInput" placeholder="Город" name="part-city">
                                <input type="text" style="background-color: transparent;border: .5px solid #ffffff; border-radius: 10px;width: 100%;height: 40px;margin-bottom: 20px;font-size: 14px;line-height: 39px;padding: 0 10px;color: #ffffff;" class="partnerInput" placeholder="Название компании" name="part-company">
                                <select name="part-order" style="background-color: transparent;border: .5px solid #ffffff; border-radius: 10px;width: 100%;height: 40px;margin-bottom: 20px;font-size: 14px;line-height: 39px;padding: 0 10px;color: #bbbbbb;">
                                    <option type="text" value="part-opt">Оптовые продажи</option>
                                    <option type="text" value="part-roz">Розничные продажи</option>
                                </select>
                                <button type="submit" style="height: 40px;border: 0;background-color: #ffffff;font-size: 13px;color: #000000;border-radius: 40px;width: 190px;text-align: center;">Оставить заявку</button>
                            </form>
                            <style>
                                .partForm {
                                    width: 460px;
                                }
                                .partForm input::placeholder {
                                    color: #bbbbbb;
                                }
                                @media (max-width:1200px) {
                                    .partForm {
                                        width: 300px;
                                    }
                                }
                                @media (max-width:992px) {
                                    .partFormWrap {
                                        background-position: center center;
                                        border-radius: 0px;
                                    }
                                    .partForm button {
                                        display: block;
                                        margin: auto;
                                    }
                                }


                                @media (max-width:576px) {
                                    .partTitle {
                                        font-size: 34px;
                                        font-weight: bold;
                                        line-height: 40px;
                                    }
                                }


                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
       @endsection

