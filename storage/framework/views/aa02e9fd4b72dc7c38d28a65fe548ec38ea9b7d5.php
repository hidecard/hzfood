<?php $__env->startSection('title', 'Sales Report'); ?>
<?php $__env->startSection('content'); ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sales Report</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Orders
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Order Number</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->user->name); ?></td>
                                    <td><?php echo e($item->item_name); ?></td>
                                    <td><?php echo e($item->quantity); ?></td>
                                    <td><?php echo e($item->item_price); ?></td>
                                    <td><?php echo e($item->quantity * $item->item_price); ?></td>
                                    <td><?php echo e($order->id); ?></td>
                                    <td><?php echo e($order->created_at->format('Y-m-d')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/admin/layout/safes/report.blade.php ENDPATH**/ ?>