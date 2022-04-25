<?php $__env->startSection('seo_title','Корзина'); ?><?php $__env->startSection('meta_keywords','Корзина'); ?><?php $__env->startSection('meta_description','Корзина'); ?><?php $__env->startSection('content'); ?>
    <div id="checkout-cart" class="">

        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="">Корзина покупок</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0">Корзина покупок</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="cartOne" class="py-5" data-ng-controller="CartController as cart">
            <div class="container pt-lg-3" data-ng-init="cart.initCart()">

                    <div class="row align-items-center cartRow mb-md-3 mb-xl-5" data-ng-repeat="product in cart.products">
                        <div class="col-3 col-sm-2 col-md-auto pr-3 pr-lg-5 cartProductItem">
                            <img data-ng-src="{{product.attributes.image_link}}" alt="{{product.attributes.name}}" class="img-fluid">
                        </div>
                        <div class="col-9 col-sm-10 col-md px-3 px-lg-5 cartProductItem">
                            <div>

                                <h4><a data-ng-href="{{product.attributes.link}}">{{product.attributes.name}}</a></h4>
                            </div>
                        </div>
                        <div class="col-6 justify-content-end order-4 order-md-3 col-md-3 px-3 px-lg-5 cartProductItem">
                            <p class="prodPrice">{{product.price}} <span>₸</span></p>
                        </div>
                        <div class=" col-6 justify-content-center col-md-auto px-3 px-lg-5 cartProductItem">
                            <div class="prodQty">
                                <button id="minus" class="minus btnQty" data-ng-click="cart.removeQuantity(product)"></button>
                                <input min="0" class="inpQty" type="number" data-ng-value="{{product.quantity}}" data-ng-model="product.quantity">

                                <button id="plus" class="plus btnQty" data-ng-click="cart.addQuantity(product)"></button>
                            </div>
                        </div>
                        <div class="order-last col-12 col-md-auto pl-3 pl-lg-5 text-center text-md-left">
                            <button class="deleteCart" data-ng-click="cart.deleteItem(product)"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </div>

                <div class="row align-items-center mb-4">
                    <div class="col-6 d-none d-sm-block">
                        <button class="goCatalog" onclick="location = '/catalog'"><i class="fa fa-long-arrow-left mr-2"></i>Продолжить покупки</button>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row justify-content-center justify-content-sm-end align-items-center">
                            <div class="col-auto">
                                <span class="totalProduct">Общая сумма заказа:</span>
                            </div>
                            <div class="col-auto">
                                <span class="totalPrice">{{cart.subtotal}} <span>₸</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-12 col-lg order-last order-lg-first text-center text-lg-left pt-4 pt-lg-0 d-none d-sm-block">
                        <ul class="stepCart list-inline">
                            <li class="list-inline-item active">Корзина</li>
                            <li class="list-inline-item">Оформление заказа</li>
                            <li class="list-inline-item">Заказ принят</li>
                        </ul>
                    </div>
                    <div class="col-lg-auto col-12 text-center">
                        <button class="cartNextStep" onclick="location = '/checkout'">Оформить заказ</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/b/buldoorskz/domains/buldoors.kz/resources/views/cart/index.blade.php ENDPATH**/ ?>