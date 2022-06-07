<?php if(Auth::user()): ?>
    <div class="text-center" style="width:100%; min-width:80px">
        <a href="<?php echo e(URL::to('/')); ?>/users/<?php echo e($user->id); ?>/edit"   class="btn btn-xs btn-info" style="padding: 8px 13px;"><i class="fa fa-edit"></i></a>
        <form method="POST" action="<?php echo e(URL::to('/')); ?>/users/<?php echo e($user->id); ?>" accept-charset="UTF-8" style="display:inline;">
            <input name="_method" value="DELETE" type="hidden"><input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
            <button class="btn btn-xs btn-danger user-del-btn" style="padding: 8px 13px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </form>
    </div>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\playground\coffee_brand\resources\views/users/partials/action-index.blade.php ENDPATH**/ ?>