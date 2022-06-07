<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
<div class="alert alert-danger alert-block center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>

<?php if($message = Session::get('warning')): ?>
<div class="alert alert-warning alert-block center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
<div class="alert alert-info alert-block center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Please check the form below for errors
</div>
<?php endif; ?>

<style>
.center {
	text-align:center;
	margin: auto;
	width: 40%;
	border: 3px solid #73AD21;
	padding: 10px;
}
</style>
<script>
 $(document).ready(function () {

            setTimeout(function() {
                $('.alert-block').slideUp("slow");
            }, 3000);
});
</script>
<?php /**PATH C:\wamp64\www\playground\coffee_brand\resources\views/flash-message.blade.php ENDPATH**/ ?>