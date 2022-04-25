<?php $__env->startSection('seo_title','Оформление заказа'); ?>
<?php $__env->startSection('meta_keywords','Оформление заказа'); ?>
<?php $__env->startSection('meta_description','Оформление заказа'); ?>
<?php $__env->startSection('content'); ?>
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
                        <h1 class="m-0">Завершение</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section id="cartOne" class="py-5" data-ng-controller="CartController as cart">
        <div class="pre-header">
            <div class="container"><h1>Завершение</h1></div>
        </div>
        <div class="container" data-ng-init="cc.init()">
            <div class="row">
                <div class="content col-12">
                    <div class="complete-content"><strong>Спасибо, ваш заказ №<?php echo e($order->id); ?>принят и уже
                            обрабатывается.</strong>
                        <p>Мы с вами свяжемся в ближайшее рабочее время для уточнения деталей.</p></div>
                </div>
            </div>
        </div>
            <div class="container pt-lg-3" data-ng-init="cart.initCart()">
                    <div class="row align-items-center mb-4">
                        <div class="col-6 d-none d-sm-block">
                            <button class="goCatalog" onclick="location = '/catalog'"><i class="fa fa-long-arrow-left mr-2"></i>Продолжить покупки</button>
                        </div>
                    </div>
                    <div class="row align-items-center mb-4">
                    <div class="col-12 col-lg order-last order-lg-first text-center text-lg-left pt-4 pt-lg-0 d-none d-sm-block">
                        <ul class="stepCart list-inline">
                            <li class="list-inline-item">Корзина</li>
                            <li class="list-inline-item">Оформление заказа</li>
                            <li class="list-inline-item active">Заказ принят</li>
                        </ul>
                    </div>
                    </div>

        </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/b/buldoorskz/domains/buldoors.kz/resources/views/cart/thanks.blade.php ENDPATH**/ ?>