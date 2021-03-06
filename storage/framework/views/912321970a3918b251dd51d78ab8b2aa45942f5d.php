<?php $__env->startSection('seo_title','Карта сайта'); ?><?php $__env->startSection('meta_keywords','Карта сайта'); ?><?php $__env->startSection('meta_description','Карта сайта'); ?><?php $__env->startSection('content'); ?>
    <div class="checkout-complete-page sitemap-page def-page">
        <div class="container">
            <div class="row">
                <div class="content col-12">
                    <div class="sitemap-content">
                        <ul class="sitemap">
                            <li><a href="/about">О Компании</a></li>
                            <li><a href="/catalog">Каталог</a>
                                <ul class="children"> <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('catalog.show',$category->slug)); ?>">Каталог
                                                /<?php echo e($category->name); ?></a></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="/catalog/aksessuary">Каталог / Аксессуары</a></li>
                                </ul>
                            </li>
                            <li><a href="/sales">Акции</a>
                                <ul class="children"> <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('sales.show',$sale->slug)); ?>">Акции /<?php echo e($sale->title); ?></a>
                                        </li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </ul>
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
    </div><?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/b/buldoorskz/domains/buldoors.kz/resources/views/sitemap.blade.php ENDPATH**/ ?>