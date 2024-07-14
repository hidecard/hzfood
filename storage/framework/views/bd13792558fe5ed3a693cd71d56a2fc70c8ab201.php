<?php $__env->startSection('title','category'); ?>
<?php $__env->startSection('content'); ?>

<main>
    <div class="p-4">
        <h4>Item Add</h4>
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
                <li><?php echo e('success'); ?></li>
            </ul>
        </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin_item_insert')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <input class="form-control w-25 my-2" id="img" name="img" type="file">
            <select name="category" id="" class="form-control w-25 my-2">
                <option value="">Choose Category</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Item Name" type="text" name="name">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Item Quanity" type="text" name="quanity">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Item Price" type="text" name="price">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Item stock" type="text" name="stock">
            <input type="submit" class="btn btn-danger mt-3" name="submit" value="Add Item">

    </form>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/admin/layout/product/index.blade.php ENDPATH**/ ?>