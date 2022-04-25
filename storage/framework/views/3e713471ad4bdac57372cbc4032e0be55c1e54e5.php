<?php $__env->startSection('seo_title',$seoTitle); ?>
<?php $__env->startSection('meta_description',$description); ?>
<?php $__env->startSection('meta_keywords',$keywords); ?>
<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 allCategoriesItemWrap mb-3">
                            <div class="allCategoriesItem">
                                <img src="<?php echo e(Storage::disk('public')->url($subcategory->image)); ?>" alt="<?php echo e($subcategory->getTranslatedAttribute('name',$locale,$fallbackLocale)); ?>" class="w-100 h-100">
                                <div class="allCategoriesItemCaption">
                                    <small><?php echo e($subcategory->name); ?></small>
                                    <a href="/catalog/<?php echo e($subcategory->slug); ?>"><h2><?php echo e($subcategory->getTranslatedAttribute('name',$locale,$fallbackLocale)); ?></h2></a>
                                    <a href="/catalog/<?php echo e($subcategory->slug); ?>" class="titleWhite goCatalog">Перейти</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $newProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="doorSlide">
                                <a href="<?php echo e(route('product.show',[$newProduct->category->slug,$newProduct->slug])); ?>"><img src="<?php echo e(Voyager::image($newProduct->getThumbnail($newProduct->thumb, 'small'))); ?>"
                                                                  alt="<?php echo e($newProduct->name); ?>">
                                    <div class="doorSlideCaption p-4">
                                        <h4 class="mb-1"><?php echo e($newProduct->name); ?></h4>
                                        <p class="mb-2"><?php echo e($newProduct->category->name); ?></p>
                                        <p class="price"><span><?php if(!$newProduct->sale_price): ?>
                                                    <?php echo e(number_format($newProduct->regular_price,0 ,'', ' ')); ?> <span>₸</span>&nbsp;&nbsp;<s
                                                    style="color: #BDBDBD;font-size: 14px;position: relative;top: -2px;"><?php echo e(number_format($newProduct->regular_price,0 ,'', ' ')); ?> <span
                                                        style="color: #BDBDBD;font-size: 14px;">₸</span></s>
                                                    <?php else: ?>
                                                    <?php echo e(number_format($newProduct->sale_price,0 ,'', ' ')); ?> <span>₸</span>
                                                        <?php endif; ?></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="doorSlide">
                                <a href="<?php echo e(route('product.show',[$featuredProduct->category->slug,$featuredProduct->slug])); ?>"><img src="<?php echo e(Voyager::image($featuredProduct->getThumbnail($featuredProduct->thumb, 'small'))); ?>"
                                                                     alt="<?php echo e(Voyager::image($featuredProduct->getThumbnail($featuredProduct->thumb, 'small'))); ?>"></a>
                                <div class="doorSlideCaption p-4">
                                    <h4 class="mb-1"><?php echo e($featuredProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)); ?></h4>
                                    <p class="mb-2"><?php echo e($featuredProduct->category->getTranslatedAttribute('name',$locale,$fallbackLocale)); ?></p>
                                    <p class="price"><span><?php if(!$featuredProduct->sale_price): ?>
                                                        <?php echo e($featuredProduct->special); ?> <span>₸</span>&nbsp;&nbsp;<s
                                                style="color: #BDBDBD;font-size: 14px;position: relative;top: -2px;"><?php echo e(number_format($featuredProduct->regular_price,0 ,'', ' ')); ?> <span
                                                    style="color: #BDBDBD;font-size: 14px;">₸</span></s>
                                                    <?php else: ?>
                                                <?php echo e(number_format($featuredProduct->regular_price,0 ,'', ' ')); ?> <span>₸</span>
                                                    <?php endif; ?></span></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                            <?php $__currentLoopData = $saleProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saleProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="doorSlide">
                                <a href="<?php echo e(route('product.show',[$saleProduct->category->slug,$saleProduct->slug])); ?>"><img src="<?php echo e(Voyager::image($saleProduct->getThumbnail($saleProduct->thumb, 'small'))); ?>"
                                                                  alt="<?php echo e($saleProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)); ?>"></a>
                                <div class="doorSlideCaption p-4">
                                    <h4 class="mb-1"><?php echo e($saleProduct->getTranslatedAttribute('name',$locale,$fallbackLocale)); ?></h4>
                                    <p class="mb-2"><?php echo e($saleProduct->category->getTranslatedAttribute('name',$locale,$fallbackLocale)); ?></p>
                                    <p class="price"><span><?php if(!$saleProduct->sale_price): ?>
                                                <?php echo e($saleProduct->special); ?> <span>₸</span>&nbsp;&nbsp;<s
                                                style="color: #BDBDBD;font-size: 14px;position: relative;top: -2px;"><?php echo e(number_format($featuredProduct->regular_price,0 ,'', ' ')); ?> <span
                                                    style="color: #BDBDBD;font-size: 14px;">₸</span></s>
                                                    <?php else: ?>
                                                <?php echo e(number_format($featuredProduct->regular_price,0 ,'', ' ')); ?> <span>₸</span>
                                                    <?php endif; ?></span></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/b/buldoorskz/domains/buldoors.kz/resources/views/products/catalog.blade.php ENDPATH**/ ?>