<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right"><?php echo e('Name'); ?><span style="color:red;"> *</span></label>
    <div class="col-md-6">
        <?php echo Form::text('name', null, [
          'class' => 'form-control',
          'required'                      => 'required',
          'data-parsley-trigger'          => 'change focusout',
          ]); ?>

        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
    </div>
</div>

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right"><?php echo e('Image'); ?><span style="color:red;"> *</span></label>
    <div class="col-md-6">
        <?php echo Form::file('image', null, [
            'class' => 'form-control',
            'required'                      => 'required',
            'data-parsley-trigger'          => 'change focusout',
          ]); ?>

        <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
    </div>
</div>
<?php /**PATH C:\wamp64\www\playground\coffee_brand\resources\views/cbrands/partials/form-fields.blade.php ENDPATH**/ ?>