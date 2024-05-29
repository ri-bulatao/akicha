<div class="py-2">
    <p class="lead"><?php echo e($formModel->location->location_name); ?></p>
    <?php echo e(format_address($formModel->location->getAddress())); ?>

</div>
<?php /**PATH C:\laragon\www\test/app/admin/views/orders/form/field_location.blade.php ENDPATH**/ ?>