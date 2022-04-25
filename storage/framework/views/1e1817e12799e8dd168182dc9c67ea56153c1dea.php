<?php $__env->startSection('seo_title',$page->seo_title ? $page->seo_title : $page->title); ?>
<?php $__env->startSection('meta_keywords',$page->meta_keywords); ?>
<?php $__env->startSection('meta_description',$page->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <div id="product-category">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#"><?php echo e($page->title); ?></a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0"><?php echo e($page->title); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="newsPage" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="text-justify">
                            <?php echo $page->body; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/0/004/domains/buldoors.testkz.ru/resources/views/pages/show.blade.php ENDPATH**/ ?>