<?php $__env->startSection('seo_title',$post->seo_title ? $post->seo_title : $post->title); ?>
<?php $__env->startSection('meta_keywords',$post->meta_keywords); ?>
<?php $__env->startSection('meta_description',$post->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <div id="product-product" class="">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#"><?php echo e($post->title); ?></a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0"><?php echo e($post->title); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="newsPage" class=" py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mb-4 mb-xl-0">
                        <h2><?php echo e($post->title); ?></h2>
                        <span class="d-block mb-3" style="font-size: 14px;color: rgba(0, 0, 0, 0.5);"><img src="<?php echo e(Storage::disk('public')->url($post->image)); ?>" width="10" height="10" alt="" class="mr-2"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d.m.Y')); ?></span>
                        <div class="text-justify"><?php echo $post->body; ?></div>
                        <hr class="mb-0 d-block d-xl-none">
                    </div>
                    <div class="col-xl-3">
                        <section id="news" class="">
                            <div class="row">
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-xl-12 p-4">
                                    <div class="newsItem">
                                        <img src="<?php echo e(Storage::disk('public')->url($postItem->image)); ?>" alt="новость" class="d-block">
                                        <div class="p-3 newsCaption">
                                            <time datetime="" class="d-block mb-3"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $postItem->created_at)->format('d.m.Y')); ?></time>
                                            <p class="mb-3"><strong><?php echo e($postItem->title); ?></strong></p>
                                            <span class="mb-2 d-block"><?php echo \Illuminate\Support\Str::limit($post->excerpt, 90); ?></span>
                                            <a href="/news/<?php echo e($postItem->slug); ?>" class="moreNews">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/0/004/domains/buldoors.testkz.ru/resources/views/posts/show.blade.php ENDPATH**/ ?>