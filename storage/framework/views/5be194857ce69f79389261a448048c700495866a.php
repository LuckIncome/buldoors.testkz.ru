<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#549f5d"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords'); ?>">
    <meta name="title" content="<?php echo $__env->yieldContent('seo_title'); ?>"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="/favicon.ico">
    <title><?php if(strlen($__env->yieldContent('seo_title')) > 2): ?> <?php echo $__env->yieldContent('seo_title'); ?> <?php else: ?> <?php echo $__env->yieldContent('title'); ?> <?php endif; ?> - <?php echo e(setting('site.title')); ?></title>
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <meta property="og:title" content="<?php if(strlen($__env->yieldContent('seo_title')) > 2): ?> <?php echo $__env->yieldContent('seo_title'); ?> <?php else: ?> <?php echo $__env->yieldContent('title'); ?> <?php endif; ?> - <?php echo e(setting('site.title')); ?>"/>
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description'); ?>"/>
    <meta property="og:url" content="<?php echo e(url()->current()); ?>"/>
    <meta property="og:image" content="<?php if(strlen($__env->yieldContent('image')) > 2): ?> <?php echo $__env->yieldContent('image'); ?> <?php else: ?> <?php echo e(env('APP_URL').'/images/og.jpg'); ?> <?php endif; ?>"/>
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:image:width" content="300"/>
    <meta property="og:image:height" content="300"/>
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
    <link href="/libs/ocfilter/nouislider.min.css" type="text/css" rel="stylesheet" media="screen"/>
    <link href="/libs/ocfilter/ocfilter.css" type="text/css" rel="stylesheet"
          media="screen"/>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" rel="stylesheet">
    <link href="/images/favicon.png" rel="icon"/>

    <link href="/css/main.min.css?v=20042021" rel="stylesheet">
    <link href="/css/main.min.css?v=20042021" rel="preload" as="style">
    <?php echo $__env->yieldContent('styles'); ?>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(37055460, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/37055460" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
</head>
<?php /**PATH /home/users/0/004/domains/buldoors.testkz.ru/resources/views/partials/head.blade.php ENDPATH**/ ?>