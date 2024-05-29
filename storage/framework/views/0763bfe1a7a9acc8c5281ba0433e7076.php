Hi <?php echo e($first_name); ?> <?php echo e($last_name); ?>,

## Thank you for registering with <?php echo e($site_name); ?>.

Your account has now been created and you can log in using your email address and password by clicking the button below:

<?php \System\Classes\MailManager::instance()->startPartial('button', ['url' => $account_login_link, 'type' => 'primary']); ?>
Login into your account
<?php echo \System\Classes\MailManager::instance()->renderPartial(); ?>