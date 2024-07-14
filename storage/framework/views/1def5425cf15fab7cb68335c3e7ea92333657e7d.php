<?php $__env->startSection('title','category'); ?>
<?php $__env->startSection('content'); ?>

<main>
    <div class="container-fluid">
        <div class="row p-3">
            <h3>Category Section</h3>

            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
            <div class="alert alert-success">
                <ul>
                    <li><?php echo e(session('success')); ?></li>
                </ul>
            </div>
            <?php endif; ?>
            <form action="<?php echo e(route('admin_category_insert')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input name="category_name" class="form-control w-50 my-3" type="text" placeholder="Add new category">
                <input name="submit" class="btn btn-danger" type="submit" value="Add">
            </form>
        </div>
        <div class="row">
            <table id="datatablesSimple" class="text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($reqs->id); ?></td>
                        <td><?php echo e($reqs->category_name); ?></td>
                        <td><a href="<?php echo e(route('edit_category' , ['id'=> $reqs->id])); ?>"><button class="btn btn-primary">Edit</button></a></td>
                        <td><a href=""><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/admin/layout/category/index.blade.php ENDPATH**/ ?>