<div class="collapse navbar-collapse" id="mainNavbar">
    <a href="#" class="closeBtn" style="display: none;"><i class="">×</i></a>
    <ul class="navbar-nav mx-auto">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e($menu_item->link()); ?>" class="menu__item"><?php echo e($menu_item->title); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH /home/users/0/004/domains/buldoors.testkz.ru/resources/views/partials/header-menu.blade.php ENDPATH**/ ?>