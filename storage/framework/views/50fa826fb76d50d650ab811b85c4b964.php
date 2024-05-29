## You just received a <?php echo e($order_type); ?> order (<?php echo e($order_number); ?>) from <?php echo e($location_name); ?>.

**Customer name:** <?php echo e($first_name); ?> <?php echo e($last_name); ?><br>
**Order date:** <?php echo e($order_date); ?><br>
**Requested <?php echo e($order_type); ?> time:** <?php echo e($order_time); ?><br>
**Payment Method:** <?php echo e($order_payment); ?><br>
**Store:** <?php echo e($location_name); ?><br>
**Delivery Address:** <?php echo e($order_address); ?>


<?php echo e($order_comment); ?>


<?php \System\Classes\MailManager::instance()->startPartial('table'); ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th width="50%" align="left">Name/Description</th>
        <th align="right">Unit Price</th>
        <th align="right">Sub Total</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($order_menus)): ?>
        <?php $__currentLoopData = $order_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($order_menu['menu_quantity']); ?> x <?php echo e($order_menu['menu_name']); ?><br><?php echo $order_menu['menu_options']; ?><br><?php echo $order_menu['menu_comment']; ?></td>
                <td align="right"><?php echo e($order_menu['menu_price']); ?></td>
                <td align="right"><?php echo e($order_menu['menu_subtotal']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <tr>
        <td colspan="3">
            <hr>
        </td>
    </tr>
    <?php if(!empty($order_totals)): ?>
        <?php $__currentLoopData = $order_totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><br></td>
                <td align="right"><?php echo e($order_total['order_total_title']); ?></td>
                <td align="right"><?php echo e($order_total['order_total_value']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </tbody>
</table>
<?php echo \System\Classes\MailManager::instance()->renderPartial(); ?>