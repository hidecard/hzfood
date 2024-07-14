<?php $__env->startSection('title', 'Message List'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 px-4">
        <h1 class="mt-4">Message List Dashboard</h1>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Message List
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($message->name); ?></td>
                            <td><?php echo e($message->email); ?></td>
                            <td><?php echo e($message->subject); ?></td>
                            <td><?php echo e($message->message); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/admin/layout/message/message.blade.php ENDPATH**/ ?>