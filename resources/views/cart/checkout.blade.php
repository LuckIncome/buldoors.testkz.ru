@extends('partials.app')
@section('seo_title','Оформление заказа')
@section('meta_keywords','Оформление заказа')
@section('meta_description','Оформление заказа')
@section('content')
    <section id="breadcrumbs">
        <div class="container-fluid px-0 py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 mb-1 d-none d-sm-block">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                            <li class="list-inline-item"><a href="/cart">Корзина покупок</a></li>
                            <li class="list-inline-item"><a href="">Оформление заказа</a></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <h1 class="m-0">Оформление заказа</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="cartTwo" class="py-5" data-ng-controller="CartController as cart">


        <div id="success-messages"></div>
        <div id="quickcheckoutconfirm" class="container pt-lg-3" data-ng-init="cart.initCart()">
            <div id="quickcheckout-disable" class="row">
                <div
                    class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 offset-xl-0 col-xl-6  pr-xl-4 border-right rowsStepTwo">
                    <div id="cart1">
                        <div class="quickcheckout-content" style="border:none; padding: 0px;">

                            <div class="row align-items-center cartRow mb-3" data-ng-repeat="product in cart.products">
                                <div class="image col-3"><img
                                        data-ng-src="@{{product.attributes.image_link}}" src="#"
                                        alt="@{{product.attributes.name}}"></div>
                                <div class="name col-4"><strong>@{{product.attributes.name}}</strong></div>
                                <div class="price col-3"><span>Цена:</span>
                                    <p class="old-price"
                                       data-ng-if="product.attributes.regular_price">@{{product.attributes.regular_price}}
                                        <span class="valute">₸</span></p>
                                    <p class="new-price">@{{product.price}}<span class="valute">₸</span></p>
                                </div>
                                <div class="count col-2"><p>@{{product.quantity}}шт *</p></div>
                            </div>

                            <div class="row align-items-center mb-4 pt-3 pt-lg-5">
                                <div
                                    class="col-12 col-lg order-last order-lg-first text-center text-xl-left pt-4 pt-lg-0 d-none d-sm-block">
                                    <ul class="stepCart list-inline">
                                        <li class="list-inline-item ">Корзина</li>
                                        <li class="list-inline-item active">Оформление заказа</li>
                                        <li class="list-inline-item">Заказ принят</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-12">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <span class="totalProduct">Сумма к оплате:</span>
                                        </div>
                                        <div class="col-auto">
                                            <p>@{{cart.total}}<span class="valute">₸</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="quickcheckoutmid d-block d-xl-none text-center">
                        <div id="terms">
                            <div class="quickcheckout-content">
                                <div id="payment" class="text-left" style="display:none;"></div>
                                <div class="terms">

                                    <div class="payBtn mb-3">
                                        <button type="button" id="button-payment-method" class="btn btn-primary"
                                                data-loading-text="загрузка..." disabled="disabled">Оплатить
                                        </button>
                                    </div>
                                    <label style="cursor: pointer; color: #cccccc; "> Согласен на обработку персональных
                                        данных
                                        <input type="checkbox" name="agree" value="1" checked="checked">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 offset-xl-0 col-xl-6  order-first order-xl-last pl-xl-4 pt-4">
                    <div class="mb-4 mb-sm-5 sectionStatus">
                        <form action="{{route('cart.checkout.submit')}}" method="POST">
                        <h5 class="mb-4">Ваши данные</h5>

                            {{csrf_field()}}
                            <div id="payment-address">
                            <div class="quickcheckout-content form-group row">
                                <div class="col-12 pb-3">
                                    <label style="cursor: pointer; color: #cccccc; " for="customCheck">
                                        Я представитель юридического лица
                                        <input type="checkbox"
                                               data-ng-checked="isEntity"
                                               data-ng-model="isEntity"
                                               id="customCheck"
                                               name="is-entity"
                                               data-ng-change="cart.changeEntity()"
                                        >
                                    </label>
                                </div>

                                <div class=" pb-3 col-sm-6 required" data-ng-if="isEntity">
                                    <input name="companyName" type="text" placeholder="Название компании *" value="" class="form-control" id="company-name" data-ng-required="isEntity">
                                </div>

                                <div class="pb-3 col-sm-6 required" data-ng-if="isEntity">
                                    <input name="companyBin" type="text" placeholder="БИН *" value=""  class="form-control" id="company-bin" data-ng-required="isEntity">
                                </div>

                                <div class="pb-3 col-sm-6 required" data-ng-if="isEntity">
                                    <input name="companyBik" type="text" placeholder="БИК *" value=""  class="form-control" id="company-bik" data-ng-required="isEntity">
                                </div>

                                <div class="pb-3 col-sm-6 required" data-ng-if="isEntity">
                                    <input name="companyIik" type="text" placeholder="ИИК *" value=""  class="form-control" id="company-iik" data-ng-required="isEntity">
                                </div>

                                <div class=" pb-3 col-sm-6 required">
                                    <input name="name" type="text" placeholder="Имя *" value="" class="form-control" id="input-payment-firstname" required>
                                </div>

                                <div class=" pb-3 col-sm-6 required">
                                    <input type="tel" name="phone" placeholder="Телефон *" value="" class="form-control" id="input-payment-firstname" required>
                                </div>

                                <div class=" pb-3 col-sm-6 required">
                                    <input type="email" name="email" placeholder="E-mail *" value="" class="form-control" id="input-payment-firstname" required>
                                </div>

                                <div class="col-12 sectionDelivery pt-1">
                                    <h5 class="mb-4">Доставка</h5><br>
                                </div>

                                <div class="input-block top-0"><strong>Способ доставки</strong>
                                    <div class="delivery-radios">
                                        <div class="custom-control custom-radio"><input type="radio"
                                                                                        class="custom-control-input"
                                                                                        id="deliveryCourier"
                                                                                        name="delivery"
                                                                                        value="courier" checked>
                                            <label class="custom-control-label"
                                                   for="deliveryCourier">Курьер</label></div>
                                        <div class="custom-control custom-radio"><input type="radio"
                                                                                        class="custom-control-input"
                                                                                        id="selfDelivery"
                                                                                        name="delivery"
                                                                                        value="self"> <label
                                                class="custom-control-label" for="selfDelivery">Самовывоз с
                                                магазина</label></div>
                                    </div>
                                </div>

                                <div class="col-12 mb-3 custom-field required">
                                    <label for="addressDelivery" class="addressLabel mb-2">г. Алматы</label>
                                    <textarea id="checkout-address" type="text" name="address" class="form-control rounded" rows="3" placeholder="Адрес доставки*" spellcheck="false" data-gramm="false"></textarea>
                                </div>

                                <div class="col-12 custom-field">
                                    <textarea class="form-control rounded" name="comments" rows="3" placeholder="Комментарии к заказу" spellcheck="false" data-gramm="false"></textarea>
                                </div>

                                <div class="sectionPayment pt-1 mb-xl-4 mb-5">
                                    <h5 class="mb-4">Способы оплаты</h5>
                                    <div class="form-group">
                                        <select name="payment" id="paymentMethod" class="form-control rounded">
                                            <option value="cash">Наличными, при получении</option>
                                            <option value="card">Платёжной картой при получении</option>
                                            <option value="online">Online-оплата</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="terms col-12">
                                    <div class="payBtn mb-3">
                                        <button type="submit" id="button-payment-method" class="btn btn-primary" >Оплатить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    {{--{% if shipping_required %}
                    <div id="shipping-method" {% if not shipping_module %}{{ 'class="hidden"' }}{% endif %}>
                        <div class="quickcheckout-content"></div>
                    </div>
                    {% endif %}
                    <div id="payment-method" {% if not payment_module %}{{ 'class="hidden"' }}{% endif %}>
                        <div class="quickcheckout-content"></div>
                    </div>
                    <div class="quickcheckoutmid d-none d-xl-block">
                        <div id="terms">
                            <div class="quickcheckout-content">{{ terms }}</div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
