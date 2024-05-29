<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <?php echo get_metas(); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo get_favicon(); ?>

    <?php if(empty($pageTitle = Template::getTitle())): ?>
        <title><?php echo e(setting('site_name')); ?></title>
    <?php else: ?>
        <title><?php echo e($pageTitle); ?><?php echo app('translator')->get('admin::lang.site_title_separator'); ?><?php echo e(setting('site_name')); ?></title>
    <?php endif; ?>
    <?php echo get_style_tags(); ?>

</head>
<body class="page <?php echo e($this->bodyClass); ?>">
<?php if(AdminAuth::isLogged()): ?>
    <?php echo $this->makePartial('top_nav'); ?>

    <?php echo AdminMenu::render('side_nav'); ?>

<?php endif; ?>

<div class="page-wrapper">
    <div class="page-content">
        <?php echo Template::getBlock('body'); ?>

    </div>
</div>

<div id="notification">
    <?php echo $this->makePartial('flash'); ?>

</div>
<?php if(AdminAuth::isLogged()): ?>
    <?php echo $this->makePartial('set_status_form'); ?>

<?php endif; ?>
<?php echo Assets::getJsVars(); ?>

<?php echo get_script_tags(); ?>

</body>
</html>
<?php /**PATH /var/www/html/app/admin/views/_layouts/default.blade.php ENDPATH**/ ?>