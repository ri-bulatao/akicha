You received an order!

You just received an order from <?php echo e($location_name); ?>.

The order number is <?php echo e($order_number); ?>

This is a <?php echo e($order_type); ?> order.

Customer name: <?php echo e($first_name); ?> <?php echo e($last_name); ?>

Order date: <?php echo e($order_date); ?>

Requested <?php echo e($order_type); ?> time: <?php echo e($order_time); ?>

Payment Method: <?php echo e($order_payment); ?>


<?php echo e($order_address); ?>

Store: <?php echo e($location_name); ?>


<?php echo e($order_comment); ?>


<?php if(!empty($order_menus)): ?>
<?php $__currentLoopData = $order_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($order_menu['menu_quantity']); ?> x <?php echo e($order_menu['menu_name']); ?>

<?php echo $order_menu['menu_options']; ?>

- <?php echo e($order_menu['menu_price']); ?>

- <?php echo e($order_menu['menu_subtotal']); ?>

<?php echo $order_menu['menu_comment']; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(!empty($order_totals)): ?>
<?php $__currentLoopData = $order_totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($order_total['order_total_title']); ?>

<?php echo e($order_total['order_total_value']); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>