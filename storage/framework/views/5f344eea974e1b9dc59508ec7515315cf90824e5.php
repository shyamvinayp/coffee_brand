<script src="<?php echo asset('js/datatables/jquery.js'); ?>"></script>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><?php echo e('Add Coffee Brand'); ?></div>
                    <div class="card-body">
                        <?php echo Form::open(['route'=>'cbrands.store', 'id' => 'main-form', 'class' => 'dirtyforms', 'enctype' => "multipart/form-data"]); ?>

                        <?php echo $__env->make('cbrands.partials.form-fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="row mt-20 text-right">
                            <div class="col-sm-12">
                                <?php echo $__env->make('partials.form.save-cancel', ['submitValue'=>"save", 'cancelValue' => 'cancel', 'skipCancel'=> false, 'submitBtnStatus' => 'Primary'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('cbrands.partials.create-edit-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\playground\coffee_brand\resources\views/cbrands/create.blade.php ENDPATH**/ ?>