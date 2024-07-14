<?php echo $__env->make('frontend.layout.part.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<head>
    <title>Order Confirm</title>
</head>
<section>
    <h4 class="ms-4 mb-4"><a class="list-unstyled text-decoration-none text-dark" href="">Home / Order Confirm</a></h4>
   </section>
   <!-- order confirm section start -->
    <section class="container">
        <div class="text-center">
            <img id="check" src="<?php echo e(asset('img/Young woman pointing at checkmark.png')); ?>" alt="">
        </div>
        <div class="text-center">
            <h2>Order Confirm</h2>
            <h6>Your order has been placed successfully.</h6>
        </div>
        <div class="text-end me-5 pe-5">
            <h6 class="me-5 pe-5">Thank for chose me ...</h6>
        </div>
        <div class="text-center mb-5">
            <a class="btn btn-outline-danger" href="<?php echo e(route('index')); ?>">Continue Shopping</a>
        </div>
    </section>
    <!-- order confirm section end -->
    <?php echo $__env->make('frontend.layout.part.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/frontend/layout/ui/order_done.blade.php ENDPATH**/ ?>