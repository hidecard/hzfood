<?php echo $__env->make('frontend.layout.part.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<head>
    <title>Order</title>
</head>

<!-- Order section start -->
<section>
    <h4 class="ms-4 mb-4"><a class="list-unstyled text-decoration-none text-dark" href="">Home / Order</a></h4>
</section>

<section class="container">
    <div class="ms-5">
        <h6>Billing details</h6>
    </div>
    <form action="<?php echo e(route('placeOrder')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="city" class="form-label">City / Township *</label>
            <input type="text" name="city" placeholder="Enter your city / township" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phoneNumber" class="form-label">Phone Number *</label>
            <input type="text" name="phone" placeholder="Enter phone number" class="form-control" required>
        </div>
        <div class="form-text">Ship to a different address?</div>
        <div>Order notes</div>
        <div class="form-floating mt-2">
            <textarea class="form-control" name="order_notes" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Notes about your order, e.g. special notes for delivery.</label>
        </div>

        <section class="container mt-5">
            <div><h6>Your order</h6></div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($carts->item_name); ?></td>
                        <td><?php echo e($carts->item_price); ?> MMK</td>
                        <td><?php echo e($carts->quanity); ?></td>
                        <td><?php echo e($carts->item_price * $carts->quanity); ?> MMK</td>
                        <input type="hidden" name="items[<?php echo e($carts->id); ?>][item_id]" value="<?php echo e($carts->item_id); ?>">
                        <input type="hidden" name="items[<?php echo e($carts->id); ?>][item_name]" value="<?php echo e($carts->item_name); ?>">
                        <input type="hidden" name="items[<?php echo e($carts->id); ?>][item_price]" value="<?php echo e($carts->item_price); ?>">
                        <input type="hidden" name="items[<?php echo e($carts->id); ?>][quantity]" value="<?php echo e($carts->quanity); ?>">
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>

        <section class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 text-end">
                    <h6>Subtotal</h6>
                </div>
                <div class="col-lg-4 text-end">
                    <h6><?php echo e($cart->sum(function ($item) {
                        return $item->item_price * $item->quanity;
                    })); ?> MMK</h6>
                </div>
            </div>
        </section>

        <section class="container my-3">
            <div class="text-end">
                <input type="submit" value="Place Order" class="btn btn-outline-danger mb-4"></input>
            </div>
        </section>
    </form>
</section>
<!-- Order section end -->

<?php echo $__env->make('frontend.layout.part.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/frontend/layout/ui/order.blade.php ENDPATH**/ ?>