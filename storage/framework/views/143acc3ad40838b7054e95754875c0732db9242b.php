<div class="form-group ">
    <?php if(!isset($skipCancel) || !$skipCancel): ?>
        <a href="<?php echo (url()->previous() === url()->current())?'/':url()->previous(); ?>" class="btn btn-info"> <?php echo e(__('messages.'.$cancelValue)); ?></a>
    <?php endif; ?>
    <button type="submit" class="btn btn-<?php echo $submitBtnStatus; ?>">
        <?php echo e(__('messages.'.$submitValue)); ?>

    </button>

</div>
<?php /**PATH C:\wamp64\www\playground\coffee_brand\resources\views/partials/form/save-cancel.blade.php ENDPATH**/ ?>