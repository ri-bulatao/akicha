<div
    id="<?php echo e($this->getId('form-modal-content')); ?>"
    class="modal-dialog"
    role="document"
>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><?php echo e($formTitle ? lang($formTitle) : ''); ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <?php echo form_open([
            'id' => 'stock-editor-form',
            'role' => 'form',
            'method' => 'PATCH',
            'data-request' => $this->getEventHandler('onSaveRecord'),
        ]); ?>

        <div
            id="<?php echo e($this->getId('form-modal-fields')); ?>"
            class="modal-body progress-indicator-container"
        >
            <p><?php echo $formDescription; ?></p>
            <div class="accordion" id="<?php echo e($this->getId('stock-locations')); ?>">
                <?php $__currentLoopData = $formWidgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formWidget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="accordion-item">
                        <h5
                            id="<?php echo e($formWidget->getId('heading')); ?>-<?php echo e($loop->index); ?>"
                            class="accordion-header"
                        >
                            <button
                                class="accordion-button <?php echo e($loop->first ? '' : 'collapsed'); ?>"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#<?php echo e($formWidget->getId('collapse')); ?>-<?php echo e($loop->index); ?>"
                                aria-expanded="<?php echo e($loop->first ? 'true' : 'false'); ?>"
                                aria-controls="<?php echo e($formWidget->getId('collapse')); ?>-<?php echo e($loop->index); ?>"
                            ><?php echo e($formWidget->model->location->location_name); ?></button>
                        </h5>

                        <div
                            id="<?php echo e($formWidget->getId('collapse')); ?>-<?php echo e($loop->index); ?>"
                            class="accordion-collapse collapse <?php echo e($loop->first ? ' show' : ''); ?>"
                            aria-labelledby="<?php echo e($formWidget->getId('heading')); ?>-<?php echo e($loop->index); ?>"
                            data-bs-parent="#<?php echo e($this->getId('stock-locations')); ?>"
                        >
                            <div class="accordion-body">
                                <div class="form-fields p-0">
                                    <?php $__currentLoopData = $formWidget->getFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $formWidget->renderField($field); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="modal-footer text-right">
            <button
                type="button"
                class="btn btn-link"
                data-bs-dismiss="modal"
            ><?php echo app('translator')->get('admin::lang.button_close'); ?></button>
            <button
                type="submit"
                class="btn btn-primary"
                data-attach-loading
            ><?php echo app('translator')->get('admin::lang.button_save'); ?></button>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>
<?php /**PATH C:\laragon\www\test/app/admin/formwidgets/stockeditor/form.blade.php ENDPATH**/ ?>