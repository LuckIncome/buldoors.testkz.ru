<?php $__env->startSection('meta_description',$description ? $description : 'Новости'); ?>
<?php $__env->startSection('seo_title',$seoTitle ? $seoTitle  : 'Новости'); ?>
<?php $__env->startSection('meta_keywords',$keywords ? $keywords  : 'Новости'); ?>
<?php $__env->startSection('content'); ?>
    <div id="product-category">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#">Новости</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0">Новости</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="news" class="py-3 py-xl-5">
            <div class="container">
                <div class="row d-flex justify-content-around">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-sm-6 p-4">
                        <div class="newsItem">
                            <a href="/news/<?php echo e($post->slug); ?>"
                               class=""><img src="<?php echo e(Storage::disk('public')->url($post->image)); ?>"
                                             alt="новость" class="d-block"></a>
                            <div class="p-3 newsCaption">
                                <time datetime="" class="d-block mb-3"><?php echo e($post->created_at); ?></time>
                                <p class="mb-3"><strong><?php echo e($post->title); ?></strong></p>
                                <span class="mb-2 d-block"><?php echo \Illuminate\Support\Str::limit($post->excerpt, 120); ?></span>
                                <a href="/news/<?php echo e($post->slug); ?>"
                                   class="moreNews">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/0/004/domains/buldoors.testkz.ru/resources/views/posts/index.blade.php ENDPATH**/ ?>