<?php $__env->startSection('title', 'Order List'); ?>
<?php $__env->startSection('content'); ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Order List Dashboard</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Order List
            </div>
            <div class="card-body">
                <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Order Note</th>
                            <th>Order Date</th>
                            <th>Products</th>
                            <th>Quantities</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Order Status</th>
                            <th>Confirm</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->user->name); ?></td>
                            <td><?php echo e($order->user->phone); ?></td>
                            <td><?php echo e($order->city); ?></td>
                            <td><?php echo e($order->order_notes); ?></td>
                            <td><?php echo e($order->order_date); ?></td>
                            <td>
                                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($item->item_name); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($item->quantity); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($item->item_price); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php
                                    $totalPrice = 0;
                                    foreach ($order->orderItems as $item) {
                                        $totalPrice += $item->item_price * $item->quantity;
                                    }
                                    echo $totalPrice;
                                ?>
                            </td>
                            <td><?php echo e($order->order_status); ?></td>
                            <td>
                                <?php if($order->order_status == 'pending'): ?>
                                    <form action="<?php echo e(route('admin.orders.confirm', $order->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa-solid fa-user-pen me-1"></i>Confirm
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </td>
                            <td><a href=""><button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/admin/layout/order/order.blade.php ENDPATH**/ ?>