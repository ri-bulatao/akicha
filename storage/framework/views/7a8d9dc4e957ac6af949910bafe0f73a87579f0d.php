<?php if($record['is_refundable'] && is_null($record['refunded_at'])): ?>
    <a
        role="button"
        class="text-primary font-weight-bold"
        data-control="refund"
        data-log-id="<?php echo e($record['payment_log_id']); ?>"
    ><?php echo app('translator')->get('igniter.payregister::default.button_refund'); ?></a>
<?php else: ?>
    -
<?php endif; ?>
<?php /**PATH C:\laragon\www\test/extensions/igniter/payregister/views/partials/refund_button.blade.php ENDPATH**/ ?>