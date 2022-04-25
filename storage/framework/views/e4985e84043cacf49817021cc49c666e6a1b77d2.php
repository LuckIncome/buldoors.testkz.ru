<?php $__env->startSection('meta_description',$description ? $description  : 'Акции'); ?>
<?php $__env->startSection('seo_title',$seoTitle ? $seoTitle : 'Акции'); ?>
<?php $__env->startSection('meta_keywords',$keywords ? $keywords : 'Акции'); ?>
<?php $__env->startSection('content'); ?>
    <div id="product-category">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#">Акции</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0">Акции</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="salesPage" class="py-3 py-xl-5">
            <div class="container px-lg-0">
                <div class="row">
                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-xl-12 px-4 salesItem mb-4">
                        <div class="row">
                            <div class="col-xl-5 px-0">
                                <div class="salesImg" style="position: relative;overflow: hidden;">
                                    <img src="<?php echo e(Storage::disk('public')->url($sale->image)); ?>" alt="sales_image" class="w-100" style="object-fit: cover">
                                    <span class="text-white m-0" style="position: absolute;left: 40px; top: 50%; transform: translateY(-50%);font-size: 60px;font-weight: 900;line-height: 1;">30/50% <span class="d-block m-0" style="font-size: 30px;">Скидка</span></span>
                                </div>
                            </div>
                            <div class="col-xl-7 px-0" style="background-color: #f9f9f9;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="salesCation p-4">
                                        <h4 class="mb-3" style="font-size: 22px;color: #000000;font-weight: bold;"><?php echo e($sale->title); ?></h4>
                                        <p class="mb-4" style="font-size: 14px;color: #777777;"><?php echo \Illuminate\Support\Str::limit($sale->excerpt, 170); ?></p>
                                        <!--<span class="d-block" style="font-size: 12px;color: #a1a1a1;font-weight: 300;"><?php echo e($sale->created_at); ?></span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="row px-md-4 pt-4">
                    <div class="col-sm-6 text-left"></div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/b/buldoorskz/domains/buldoors.kz/resources/views/sales/index.blade.php ENDPATH**/ ?>