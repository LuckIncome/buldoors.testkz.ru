<?php $__env->startSection('seo_title',$product->seo_title ? $product->seo_title : $product->name); ?>
<?php $__env->startSection('meta_keywords',$product->meta_keywords); ?>
<?php $__env->startSection('meta_description',$product->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <div id="product-product" class="" data-ng-controller="ProductController as pc">

        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="/catalog">Каталог</a></li>
                                <li class="list-inline-item"><a href=""><?php echo e($product->name); ?></a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0"><?php echo e($product->name); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="productPage" class=" py-5" data-ng-init="pc.init('<?php echo e($product->slug); ?>')">
            <div class="container">
                <div class="row">
                    <?php if($product->images &&
 !empty(json_decode($product->images))): ?>
                        <div class="interior">
                            <div class="interiorBg">
                                <div class="fix-center-img"><img id="interiorBgImg" class="fit-height"
                                                                 src="/images/interiors/m-interior-1.jpg"></div>
                            </div>
                            <div class="interiorContent">
                                <div class="productImage"><img id="interiorImg" class="product"
                                                               src="<?php echo e(Voyager::image(json_decode($product->images)[0])); ?>"
                                                               alt="<?php echo e($product->name); ?>"></div>
                                <div class="intOptions">
                                    <button type="button" class="round-button close-options">&times;
                                    </button>
                                    <div class="prod-interior">
                                        <div class="prod-interior__settings">
                                            <div class="interior-images">
                                                <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a class="interior-image <?php if($k == 0): ?> active <?php endif; ?>"
                                                   data-img="<?php echo e(Voyager::image($image)); ?>"><img
                                                        src="<?php echo e(Voyager::image($image)); ?>"
                                                        alt="<?php echo e($product->name); ?>"></a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                            <div class="prod-interior__settings-top">
                                                <ul class="no-mark">
                                                    <li class="modern"><span>Modern</span></li>
                                                    <li class="pop"><span>Pop</span></li>
                                                    <li class="loft"><span>Loft</span></li>
                                                    <li class="classic"><span>Classic</span></li>
                                                </ul>
                                            </div>
                                            <div class="prod-interior__settings-bottom">
                                                <div class="interiors-line i--0"><a class="interior-item active"
                                                                                    data-img="/m-interior-1.jpg"><img
                                                            src="/images/interiors/11a5303bb3e5625dd7f07100005972282b8dd4e8ddb4fd4a.jpg"
                                                            alt="Интерьер Модерн-1"></a> <a
                                                        class="interior-item" data-img="/p-interior-1.jpg"><img
                                                            src="/images/interiors/c32a325c0cc459a55cec779a94f27a4ba4c3961c9ec23cee.jpg"
                                                            alt="Интерьер Поп-1"></a> <a class="interior-item"
                                                                                         data-img="/l-interior-1.jpg"><img
                                                            src="/images/interiors/bcdf193bdff796ecc565c9727aae7b0cb205d6b3de011e9c.jpg"
                                                            alt="Интерьер Лофт-1"></a> <a class="interior-item"
                                                                                          data-img="/c-interior-1.jpg"><img
                                                            src="/images/interiors/caf2f4e1b28623c33e526d1a14f89f5dfe4b7098773240b1.jpg"
                                                            alt="Интерьер Классика-1"></a></div>
                                                <div class="interiors-line i--1"><a class="interior-item"
                                                                                    data-img="/m-interior-2.jpg"><img
                                                            src="/images/interiors/50af03a18e6775d6650b1a2a248d363c68baf2d1f54b1b59.jpg"
                                                            alt="Интерьер Модерн-2"></a> <a
                                                        class="interior-item" data-img="/p-interior-2.jpg"><img
                                                            src="/images/interiors/d4532081558507c9931144878ea5cd4ad66584fc82e96baf.jpg"
                                                            alt="Интерьер Поп-2"></a> <a class="interior-item"
                                                                                         data-img="/l-interior-2.jpg"><img
                                                            src="/images/interiors/5e653f35d913d31558ec45b2b6228c2bc1369b2399c05a6a.jpg"
                                                            alt="Интерьер Лофт-2"></a> <a class="interior-item"
                                                                                          data-img="/c-interior-2.jpg"><img
                                                            src="/images/interiors/7f5402e0705488566e2123cec6ff9ef0e3ce4ffd4acd4531.jpg"
                                                            alt="Интерьер Классика-2"></a></div>
                                                <div class="interiors-line i--2"><a class="interior-item"
                                                                                    data-img="/m-interior-3.jpg"><img
                                                            src="/images/interiors/6207f5b92b97f66222af64f8f6e19df6d826872781849cdb.jpg"
                                                            alt="Интерьер Модерн-3"></a> <a
                                                        class="interior-item" data-img="/p-interior-3.jpg"><img
                                                            src="/images/interiors/099a693c4cb2a76bbf87ab4042ca698a9ece9e3c94ae7577.jpg"
                                                            alt="Интерьер Поп-3"></a> <a class="interior-item"
                                                                                         data-img="/l-interior-3.jpg"><img
                                                            src="/images/interiors/22e7b98c3e3c78abb51335f8f56f7fb7fac97d767af638c6.jpg"
                                                            alt="Интерьер Лофт-3"></a> <a class="interior-item"
                                                                                          data-img="/c-interior-3.jpg"><img
                                                            src="/images/interiors/645ef03b4cf9f6d4472f7a21218dc2c82bbc75297ada653d.jpg"
                                                            alt="Интерьер Классика-3"></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="optsBtn show-opts" title="Выбрать интерьер"><i class="fa fa-cog"></i></a> <a
                                    class="optsBtn minimize" title="Закрыть интерьер"><i
                                        class="fa fa-compress"></i></a></div>
                        </div>
                        <div class="switcher interior-switcher">
                            <a class="interiorBtn">Интерьер</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="mb-4 mb-md-0 offset-sm-2 offset-md-0 col-sm-8 col-md-6 col-lg-4">
                                <div class="productImg mb-4">
                                    <img src="<?php echo e(Voyager::image($product->thumb)); ?>" alt="<?php echo e($product->name); ?>">
                                </div>
                                <div class="row mb-4">

                                    <?php if($product->images && count(json_decode($product->images))): ?>
                                        <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strlen($image)): ?>
                                            <div class="col-4">
                                                <div class="productThumb">
                                                    <picture>
                                                        <source srcset="<?php echo e(str_replace(pathinfo(Voyager::image($image), PATHINFO_EXTENSION),'webp',Voyager::image($image))); ?>"
                                                                type="image/webp">
                                                        <source srcset="<?php echo e(Voyager::image($image)); ?>"
                                                                type="image/jpeg">
                                                        <img src="<?php echo e(Voyager::image($image)); ?>"
                                                             alt="<?php echo e($product->name); ?>">
                                                    </picture>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="productDesc p-4">
                                    <h4 class="mb-4">Описание</h4>
                                    <p><?php echo e($product->content); ?></p>
                                </div>

                                <div class="asideCta d-none d-md-block d-lg-none pt-5 px-4">
                                    <ul class="list-unstyled">
                                        <li class="asideLink mb-4">
                                            <a href="#" data-toggle="modal" data-target="#callback">Вызвать замерщика</a>
                                        </li>
                                        <li class="asideLink mb-3">
                                            <a href="">Доставка</a>
                                        </li>
                                        <li class="mb-4">
                                            <ul class="list-unstyled asideDesc">
                                                <li>- Забрать в магазине</li>
                                                <li>- Доставка по адресу</li>
                                            </ul>
                                        </li>
                                        <li class="asideLink pay mb-3">
                                            <a href="">Оплата</a>
                                        </li>
                                        <li class="mb-4">
                                            <ul class="list-unstyled asideDesc">
                                                <li>- Наличными при получении</li>
                                                <li>- Платежной картой при получении</li>
                                                <li>- Платежной картой на сайте</li>
                                                <li>- В рассрочку или в кредит</li>
                                                <li>- Безналичное перечисление (только для юридических лиц)</li>
                                                <li>- Через систему Kaspi.kz</li>
                                                <li>- Кредитной картой Kaspi Red</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <p>Проконсультируем Вас бесплатно!</p>
                                            <strong class="mb-4"><a href="tel:+7 (727) 294-24-72">+7 (727)
                                                    <span>294-24-72</span></a></strong>
                                            <div><img src="/img/payLogoLight.png" alt="pay logo light" class="img-fluid"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-lg-0 col-lg-8 px-md-4">
                                <div class="productAttr">
                                    <div class="row mb-4 px-md-4">
                                        <div class="col-lg-6 mb-3 mb-lg-0 text-center text-lg-left">
                                            <h2><?php echo e($product->name); ?></h2>
                                        </div>
                                        <div class="col-lg-6 mb-3 mb-lg-0 text-center text-lg-right">
                                            <span class="prodInstock mr-2 <?php echo e(!$product->stock_count ? 'text-danger' : ''); ?>"><?php echo e($product->stock_count ? 'Есть в наличии' : 'На заказ'); ?></span>


                                        </div>
                                    </div>

                                    <div id="product">
                                        <?php if($productT->options->count()): ?>
                                        <div class="d-flex flex-column flex-lg-row justify-content-between px-4 pb-4">
                                            <?php $__currentLoopData = $productT->options()->distinct('option')->pluck('option'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="text-center required ">
                                                    <label class="control-label mb-3"><?php echo e($option); ?>:
                                                        <span></span></label>
                                                    <div id="input-option<?php echo e(\Illuminate\Support\Str::slug($option)); ?>">
                                                        <div class="radio">
                                                            <?php $__currentLoopData = $productT->options()->where('option', $option)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <label data-option="<?php echo e($optionValue->value); ?>" class="active">
                                                                <span></span>
                                                                <input type="radio" name="option[<?php echo e(\Illuminate\Support\Str::slug($option)); ?>]" value="<?php echo e($optionValue->id); ?>">
                                                            </label>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="row align-items-center px-md-4 mb-5">
                                            <div class="col-sm-6 col-md-12 col-xl-6 mb-4 mb-sm-0 mb-md-4 mb-xl-0">
                                                <span class="prodPrice float-left"><?php echo e(number_format($product->regular_price,0 ,'', ' ')); ?> <span>₸</span></span>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-xl-6 text-center">
                                                <div class="buttonsProd">
                                                    <div class="prodBtns">
                                                        <?php if($product->stock_count): ?>
                                                        <button
                                                            type="button"
                                                            id="button-cart"
                                                            data-loading-text="Загрузка..." class="prodBtnBuy"
                                                            data-ng-click="pc.addToCart(<?php echo e($product->id); ?>)"

                                                        >
                                                            Добавить в корзину
                                                        </button>
                                                        <?php endif; ?>
                                                        <button
                                                            class="prodBtnComp d-none d-lg-inline"
                                                            data-ng-if="!pc.product.inCompare"
                                                            data-ng-click="pc.addToCompare(<?php echo e($product->id); ?>)"
                                                        >
                                                            <img src="/img/prodBtnComp.png" alt="compare-btn">
                                                        </button>
                                                        <button
                                                            class="prodBtnComp d-none d-lg-inline"
                                                            data-ng-if="pc.product.inCompare"
                                                            data-ng-click="pc.deleteCompare(<?php echo e($product->id); ?>)"
                                                        >
                                                            <img src="/img/prodBtnComp.png" alt="compare-btn2">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <nav class="productChar mb-4">
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#mainCharacter" role="tab" aria-controls="nav-home" aria-selected="true">Основные характеристики</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#complectation" role="tab" aria-controls="nav-profile" aria-selected="false">Комплектация</a>
                                                </div>
                                            </nav>
                                            <?php if($productT->chars): ?>
                                            <div class="tab-content productCharCont" id="nav-tabContent">

                                                <div class="tab-pane fade active show" id="mainCharacter" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <ul class="list-unstyled">
                                                        <?php $__currentLoopData = $productT->chars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $char): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="px-4 py-3">
                                                            <div class="row align-items-center">
                                                                <div class="col-5">
                                                                    <p class="leftChar"><?php echo e($char['name']); ?>:</p>
                                                                </div>
                                                                <div class="col-7">
                                                                    <p class="rightChar"><?php echo e($char['value']); ?></p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="complectation" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 px-xl-3 col-sm-8 offset-sm-2 offset-lg-0 pt-5 pt-lg-0 d-block d-md-none d-lg-block col-lg-2">
                        <div class="asideCta">
                            <ul class="list-unstyled">
                                <li class="asideLink mb-4">
                                    <a href="" data-toggle="modal" data-target="#callback">Вызвать замерщика</a>
                                </li>
                                <li class="asideLink mb-3">
                                    <a href="">Доставка</a>
                                </li>
                                <li class="mb-4">
                                    <ul class="list-unstyled asideDesc">
                                        <li>- Забрать в магазине</li>
                                        <li>- Доставка по адресу</li>
                                    </ul>
                                </li>
                                <li class="asideLink pay mb-3">
                                    <a href="">Оплата</a>
                                </li>
                                <li class="mb-4">
                                    <ul class="list-unstyled asideDesc">
                                        <li>- Наличными при получении</li>
                                        <li>- Платежной картой при получении</li>
                                        <li>- Платежной картой на сайте</li>
                                        <li>- В рассрочку или в кредит</li>
                                        <li>- Безналичное перечисление (только для юридических лиц)</li>
                                        <li>- Через систему Kaspi.kz</li>
                                        <li>- Кредитной картой Kaspi Red</li>
                                    </ul>
                                </li>
                                <li>
                                    <p>Проконсультируем Вас бесплатно!</p>
                                    <strong class="mb-4"><a href="tel:+7 (727) 294-24-72">+7 (727)
                                            <span>294-24-72</span></a></strong>
                                    <div><img src="/img/payLogoLight.png" alt="pay logo second" class="img-fluid"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container" id="tabsCategory">
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
                                <a href="<?php echo e(route('product.show',[$newProduct->category->slug,$newProduct->slug])); ?>">
                                    <picture>
                                        <source srcset="<?php echo e(str_replace(pathinfo(Voyager::image($newProduct->thumb),PATHINFO_EXTENSION),'webp',Voyager::image($newProduct->thumb))); ?>"
                                                type="image/webp">
                                        <source srcset="<?php echo e(Voyager::image($newProduct->thumb)); ?>"
                                                type="image/jpeg">
                                        <img src="<?php echo e(Voyager::image($newProduct->thumb)); ?>"
                                             alt="<?php echo e($newProduct->name); ?>">
                                    </picture>
                                    <div class="doorSlideCaption p-4">
                                        <h4 class="mb-1"><?php echo e($newProduct->name); ?></h4>
                                        <?php if($newProduct->category): ?>
                                            <p class="mb-2"><?php echo e($newProduct->category->name); ?></p>
                                        <?php endif; ?>
                                        <p class="price"><span><?php echo e(number_format($newProduct->regular_price,0 ,'', ' ')); ?></span> тг.</p>
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
                                <a href="<?php echo e(route('product.show',[$featuredProduct->category->slug,$featuredProduct->slug])); ?>">
                                    <picture>
                                        <source srcset="<?php echo e(str_replace(pathinfo(Voyager::image($featuredProduct->thumb),PATHINFO_EXTENSION),'webp',Voyager::image($featuredProduct->thumb))); ?>"
                                                type="image/webp">
                                        <source srcset="<?php echo e(Voyager::image($featuredProduct->thumb)); ?>"
                                                type="image/jpeg">
                                        <img src="<?php echo e(Voyager::image($featuredProduct->thumb)); ?>"
                                             alt="<?php echo e($featuredProduct->name); ?>">
                                    </picture>
                                </a>
                                <div class="doorSlideCaption p-4">
                                    <h4 class="mb-1"><?php echo e($featuredProduct->name); ?></h4>
                                    <?php if($featuredProduct->category): ?>
                                        <p class="mb-2"><?php echo e($featuredProduct->category->name); ?></p>
                                    <?php endif; ?>
                                    <p class="price"><span><?php echo e(number_format($featuredProduct->regular_price,0 ,'', ' ')); ?></span> тг.</p>
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
                                    <a href="<?php echo e(route('product.show',[$saleProduct->category->slug,$saleProduct->slug])); ?>">
                                        <picture>
                                            <source srcset="<?php echo e(str_replace(pathinfo(Voyager::image($saleProduct->thumb),PATHINFO_EXTENSION),'webp',Voyager::image($saleProduct->thumb))); ?>"
                                                    type="image/webp">
                                            <source srcset="<?php echo e(Voyager::image($saleProduct->thumb)); ?>"
                                                    type="image/jpeg">
                                            <img src="<?php echo e(Voyager::image($saleProduct->thumb)); ?>"
                                                 alt="<?php echo e($saleProduct->name); ?>">
                                        </picture>
                                    </a>
                                    <div class="doorSlideCaption p-4">
                                        <h4 class="mb-1"><?php echo e($saleProduct->name); ?></h4>
                                        <?php if($saleProduct->category): ?>
                                            <p class="mb-2"><?php echo e($saleProduct->category->name); ?></p>
                                        <?php endif; ?>
                                        <p class="price"><span><?php echo e(number_format($saleProduct->regular_price,0 ,'', ' ')); ?></span> тг.</p>
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
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("a.interior-item").click(function () {
                $("a.interior-item").removeClass("active");
                var e = "/images/interiors" + $(this).data("img");
                $(this).addClass("active"), $("#interiorBgImg").attr("src", e)
            });
            $("a.interior-image").click(function () {
                $("a.interior-image").removeClass("active");
                var e = $(this).data("img");
                $(this).addClass("active"), $("#interiorImg").attr("src", e)
            });
            $('.interiorBtn').click(function () {
                $('.interior').toggleClass('activeInterior');
                $(this).toggleClass('active');
            });
            if($('.intOptions:visible')){
                $('.show-opts').hide();
                $('.intOptions button').show();
            }else {
                $('.show-opts').show();
                $('.intOptions button').hide();
            }
            $('.intOptions button').click(function () {
                $('.intOptions').hide();
                $('.show-opts').show();
            });
            $('.show-opts').click(function () {
                $('.intOptions').toggle();
                $('.intOptions button').show();
                $(this).hide();
            });
            $('.optsBtn.minimize').click(function () {
                $('.interior').removeClass('activeInterior');
            });

            $('.btnCount').on('click', function () {
                val = parseInt($('#input-quantity').val());
                if ($(this).attr('id') === 'plus') {
                    $('#input-quantity').val(val + 1);

                } else if ($(this).attr('id') === 'minus' && val > 1) {
                    $('#input-quantity').val(val - 1);
                }


            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/b/buldoorskz/domains/buldoors.kz/resources/views/products/show.blade.php ENDPATH**/ ?>