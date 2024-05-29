<div
    class="dropdown"
    data-control="address-picker"
>
    <a
        class="btn btn-block dropdown-toggle border text-truncate"
        role="button"
        id="savedAddressPicker"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
    >
        <i data-address-picker-loading class="fa fa-map-marker"></i>&nbsp;&nbsp;
        <span class="pe-2"><?php echo e($searchDefaultAddress->formatted_address); ?></span>
        <span class="small text-primary"><?php echo app('translator')->get('igniter.local::default.search.text_change'); ?></span>
    </a>

    <div class="dropdown-menu w-100" aria-labelledby="savedAddressPicker">
        <h6 class="dropdown-header"><?php echo app('translator')->get('igniter.local::default.search.text_saved_addresses'); ?></h6>
        <a
            class="dropdown-item"
            data-address-picker-control="new"
        ><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo app('translator')->get('igniter.cart::default.checkout.text_address'); ?></a>
        <div class="dropdown-divider"></div>
        <?php $__currentLoopData = $__SELF__->getSavedAddresses(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a
                class="dropdown-item text-wrap py-2 <?php echo e($searchDefaultAddress->address_id === $address->address_id ? 'active' : ''); ?>"
                data-address-picker-control="select"
                data-request="<?php echo e($pickerEventHandler); ?>"
                data-request-data="addressId: '<?php echo e($address->address_id); ?>'"
            ><?php echo e($address->formatted_address); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

