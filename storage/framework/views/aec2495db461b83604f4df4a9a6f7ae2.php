<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzBzTyWD60Jc60vU37F8fwwOL2jKkk3FI&libraries=places"></script>
</head>

<?php if(count($customerAddresses)): ?>
    <div class="list-group list-group-flush">
        <?php $__currentLoopData = $customerAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                class="mb-3 list-group-item <?php echo e(($customer->address_id == $address->address_id) ? 'list-group-item-info' : ''); ?>"
                style="position: relative;"
            >
                <address class="text-left mb-0 py-2"><?php echo e(format_address($address)); ?></address>
                <span class="" style="position: absolute; top: 10px; right: 20px;">
                    <!-- <a
                        class="btn btn-outline-default"
                        href="<?php echo e(site_url('account/address') . '/' . $address->address_id); ?>"
                    ><?php echo app('translator')->get('igniter.user::default.account.text_edit'); ?></a> -->
                    <button
                        type="button"
                        class="btn text-danger pull-right"
                        data-request="accountAddressBook::onDelete"
                        data-request-data="addressId: '<?php echo e($address->address_id); ?>'"
                    ><?php echo app('translator')->get('igniter.user::default.account.text_delete'); ?></button>
                    <?php if($customer->address_id != $address->address_id): ?>
                        <a
                            class="btn btn-outline-default"
                            href="<?php echo e(site_url('account/address') . '/' . $address->address_id); ?>?setDefault=1"
                        ><?php echo app('translator')->get('igniter.user::default.text_set_default'); ?></a>
                    <?php endif; ?>
                </span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="pagination-bar text-right">
        <div class="links"><?php echo $customerAddresses->links(); ?></div>
    </div>
<?php else: ?>
    <p><?php echo app('translator')->get('igniter.user::default.account.text_no_address'); ?></p>
<?php endif; ?>

<div class="buttons">
    <button
        class="btn btn-primary btn-lg"
        data-request="<?php echo e($addAddressEventHandler); ?>"
    ><?php echo app('translator')->get('igniter.user::default.account.button_add'); ?></button>
</div>

