<?php
    $userPanel = \Admin\Classes\UserPanel::forUser();
?>
<li class="nav-item dropdown">
    <a href="#" class="nav-link" data-bs-toggle="dropdown">
        <img
            class="rounded-circle"
            src="<?php echo e($userPanel->getAvatarUrl().'&s=64'); ?>"
        >
    </a>
    <div class="dropdown-menu">
        <div class="d-flex flex-column w-100 align-items-center">
            <div class="pt-4 px-4 pb-2">
                <img class="rounded-circle" src="<?php echo e($userPanel->getAvatarUrl().'&s=64'); ?>">
            </div>
            <div class="pb-3 text-center">
                <div class="text-uppercase"><?php echo e($userPanel->getUserName()); ?></div>
                <div class="text-muted"><?php echo e($userPanel->getRoleName()); ?></div>
            </div>
        </div>
        <div role="separator" class="dropdown-divider"></div>
        <?php $__currentLoopData = $item->options(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="dropdown-item <?php echo e($item->cssClass); ?>" <?php echo Html::attributes($item->attributes); ?>>
                <i class="<?php echo e($item->iconCssClass); ?>"></i><span><?php echo app('translator')->get($item->label); ?></span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</li>
<?php /**PATH C:\laragon\www\test/app/admin/views/_partials/top_nav_user_menu.blade.php ENDPATH**/ ?>