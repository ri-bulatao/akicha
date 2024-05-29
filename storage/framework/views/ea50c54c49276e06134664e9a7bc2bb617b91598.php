<div
    id="<?php echo e($this->getId('form-modal-content')); ?>"
    class="modal-dialog modal-lg"
    role="document"
>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><?php echo e($formTitle ? lang($formTitle) : ''); ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <?php echo $formWidget->render(); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\test/app/admin/formwidgets/stockeditor/history.blade.php ENDPATH**/ ?>