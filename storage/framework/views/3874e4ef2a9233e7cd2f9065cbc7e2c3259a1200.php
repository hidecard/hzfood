<?php $__env->startSection('title','admin'); ?>

<?php $__env->startSection('content'); ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admin Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Admin List</li>
        </ol>
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
        <form action="<?php echo e(route('admin_create')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Name" type="text" name="name">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Email" type="email" name="email">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Ph No" type="text" name="phone">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Password" type="password" name="password">
            <input class="btn btn-danger my-3 ms-2" type="submit" value="Register">
        </form>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Admin Accounts List
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Ph No</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Ph No</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($res->id); ?></td>
                            <td><?php echo e($res->name); ?></td>
                            <td><?php echo e($res->phone); ?></td>
                            <td><?php echo e($res->email); ?></td>
                            <td><a href="<?php echo e(route('edit' , ['id'=> $res->id])); ?>"><button class="btn btn-primary"><i class="fa-solid fa-user-pen me-1"></i>Edit</button></a></td>
                            <td><a href="<?php echo e(route('admin_delete',['id'=> $res->id])); ?>"><button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/admin/layout/admin/admin.blade.php ENDPATH**/ ?>