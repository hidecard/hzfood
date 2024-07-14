<?php $__env->startSection('title','user'); ?>
<?php $__env->startSection('content'); ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User Dashboard</h1>

        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if(@session('success')): ?>
            <div class="alert alert-success">
                <ul>
                    <li><?php echo e(session('success')); ?></li>
                </ul>
            </div>
            <?php endif; ?>
            <?php if(@session('error')): ?>
            <div class="alert alert-danger">
                <ul>
                    <li><?php echo e(session('Error')); ?></li>
                </ul>
            </div>
            <?php endif; ?>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                User Accounts List
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Ph No</th>
                            
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Ph No</th>
                            
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $useres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($useres->id); ?></td>
                            <td><?php echo e($useres->name); ?></td>
                            <td><?php echo e($useres->email); ?></td>
                            <td><?php echo e($useres->phone); ?></td>
                            
                            <td><a href="<?php echo e(route('user_delete',['id'=>$useres->id])); ?>"><button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/admin/layout/user/user.blade.php ENDPATH**/ ?>