<?php $__env->startSection('title','category'); ?>
<?php $__env->startSection('content'); ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Item Dashboard</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Product List
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quality</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quality</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $__currentLoopData = $itemlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemlists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($itemlists->name); ?></td>
                            <td><?php echo e($itemlists->item_price); ?></td>
                            <td><?php echo e($itemlists->quanity); ?></td>
                            <td><?php echo e($itemlists->stock); ?></td>
                            <td><img style="width: 50px" src="<?php echo e(asset('storage/images/' .$itemlists->img)); ?>" alt="image"></td>
                            <td><a href="<?php echo e(route('editem',['id'=>$itemlists->id])); ?>"><button class="btn btn-primary"><i class="fa-solid fa-user-pen me-1"></i>Edit</button></a></td>
                            <td><a href="<?php echo e(route('item_delete',['id'=>$itemlists->id])); ?>"><button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/admin/layout/product/itemlist.blade.php ENDPATH**/ ?>