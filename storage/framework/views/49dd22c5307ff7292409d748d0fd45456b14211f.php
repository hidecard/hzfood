<?php echo $__env->make('frontend.layout.part.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<head>
    <title>Cart</title>
</head>
<section class="container">
    <table class="table m-4">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Products</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="align-items-center">
                <td><img style="height: 50px; width: 50px;" src="<?php echo e(asset('storage/images/' . $carts->img)); ?>" alt=""></td>
                <th scope="row"><?php echo e($carts->item_name); ?></th>
                <td>
                    <input type="number" class="form-control w-50 price" value="<?php echo e($carts->item_price); ?>" min="0" data-id="<?php echo e($carts->id); ?>">
                </td>
                <td>
                    <input type="number" class="form-control w-25 quantity" value="<?php echo e($carts->quanity); ?>" min="1" data-id="<?php echo e($carts->id); ?>">
                </td>
                <td class="subtotal"><?php echo e($carts->item_price * $carts->quanity); ?></td>
                <td>
                    <form action="<?php echo e(route('remove_cart', $carts->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                    </form>
                </td>
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
            <h6>Discount</h6>
            <h6>Total</h6>
        </div>
        <div class="col-lg-4 text-end">
            <h6 id="subtotal-sum">0 MMK</h6>
            <h6>0 MMK</h6>
            <h6 id="total-sum">0 MMK</h6>
        </div>
    </div>
    <hr>
    <div class="text-end">
        <a class="btn btn-outline-danger mb-4" href="<?php echo e(route('order')); ?>">Proceed To Checkout</a>
    </div>
</section>
<script>
    document.querySelectorAll('.quantity').forEach((input, index) => {
        input.addEventListener('input', function() {
            updateRowSubtotal(index);
        });
    });

    document.querySelectorAll('.price').forEach((input, index) => {
        input.addEventListener('input', function() {
            updateRowSubtotal(index);
        });
    });

    function updateRowSubtotal(index) {
        let price = parseFloat(document.querySelectorAll('.price')[index].value);
        let qty = parseInt(document.querySelectorAll('.quantity')[index].value);
        let subtotal = price * qty;
        document.querySelectorAll('.subtotal')[index].textContent = subtotal;

        updateTotals();

        let cartId = document.querySelectorAll('.quantity')[index].dataset.id;
        updateCart(cartId, qty, price);
    }

    function updateTotals() {
        let subtotals = document.querySelectorAll('.subtotal');
        let subtotalSum = Array.from(subtotals).reduce((sum, subtotal) => sum + parseFloat(subtotal.textContent), 0);

        document.getElementById('subtotal-sum').textContent = subtotalSum + ' MMK';
        document.getElementById('total-sum').textContent = subtotalSum + ' MMK';
    }

    function updateCart(cartId, quantity, price) {
        fetch('<?php echo e(route("update_cart_quantity")); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({ id: cartId, quantity: quantity, price: price })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Failed to update cart');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Initial calculation on page load
    updateTotals();
</script>
<?php echo $__env->make('frontend.layout.part.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/frontend/layout/ui/cart.blade.php ENDPATH**/ ?>