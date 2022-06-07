
<aside class="main-sidebar <?php echo e(config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4')); ?>">

    
    <?php if(config('adminlte.logo_img_xl')): ?>
        <?php echo $__env->make('adminlte::partials.common.brand-logo-xl', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('adminlte::partials.common.brand-logo-xs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    

    <div class="sidebar language-he">
        <?php if(Auth::user()): ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column <?php echo e(config('adminlte.classes_sidebar_nav', '')); ?>"
                    data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('dashboard*')) ? 'active' : ''); ?>" href="<?php echo e(URL::to('/')); ?>/dashboard"><i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                <?php echo e('Dashboard'); ?>

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('users*')) ? 'active' : ''); ?>" href="<?php echo e(URL::to('/')); ?>/users"><i class="fas fa-fw fa-user "></i><p> <?php echo e('User Management'); ?></p></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('cbrands*')) ? 'active' : ''); ?>" href="<?php echo e(URL::to('/')); ?>/cbrands"><i class="fas fa-fw fa-circle "></i><p> <?php echo e('Coffee Brand Management'); ?></p></a>
                    </li>

                </ul>
            </nav> 
        <?php endif; ?>

    </div>
</aside>
<?php /**PATH C:\wamp64\www\playground\coffee_brand\vendor\jeroennoten\laravel-adminlte\src/../resources/views/partials/sidebar/left-sidebar.blade.php ENDPATH**/ ?>