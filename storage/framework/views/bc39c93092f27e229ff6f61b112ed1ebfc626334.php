<?php $__env->startSection('title', 'Users | Lara Admin'); ?>
<?php $__env->startSection('content_header'); ?>
<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row mb-2">
<div class="col-sm-6">
<h1><?php echo e(__('messages.user_list')); ?></h1>
</div>
<div class="col-sm-6">
    <a class="btn btn-info float-sm-right ml-2" href="<?php echo e(URL::to('/')); ?>/users/create" ><?php echo e(__('messages.create_new_user')); ?></a>


</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th width="20px"><?php echo e('S.N.'); ?></th>
                <th><?php echo e('Name'); ?></th>
                <th><?php echo e('Email'); ?></th>
                <th><?php echo e('Created Date'); ?></th>
                <th width="300px"><?php echo e('Action'); ?></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<link href="<?php echo e(asset('css/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<script src="<?php echo asset('js/datatables/jquery.js'); ?>"></script>
<script src="<?php echo asset('js/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo asset('js/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
		drawCallback: function () {
                    $(".user-del-btn").click(function () {
                        let r = confirm('Are you sure you want to delete this item?');
                        return (r === true);
                    })
                },
        serverSide: true,
        ajax: "<?php echo e(route('users.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ],
		columnDefs: [
			{
				orderable: false,
				targets: [0,4]
			},
			{
				searchable: false,
                targets: [0,4]
			}
		],
    });
  });
 </script>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\playground\coffee_brand\resources\views/users/index.blade.php ENDPATH**/ ?>