<div class="card bg-light p-4 shadow-sm m-4">
    <div class="text-center my-5 m-auto">
        <i class="fa fa-ban fa-4x text-muted mb-4"></i>
        <h1><?php echo app('translator')->get('admin::lang.title_access_denied'); ?></h1>
        <p class="lead mt-3"><?php echo app('translator')->get('admin::lang.alert_user_restricted'); ?></p>
        <a href="javascript:;" onclick="history.go(-1); return false;"><?php echo app('translator')->get('admin::lang.text_back_link'); ?></a>
        <br><br>
        <a href="<?php echo e(Admin::url('/')); ?>"><?php echo app('translator')->get('admin::lang.text_admin_link'); ?></a>
    </div>
</div>
<?php /**PATH C:\laragon\www\test/app/admin/views/access_denied.blade.php ENDPATH**/ ?>