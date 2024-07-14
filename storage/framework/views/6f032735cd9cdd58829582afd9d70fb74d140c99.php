<?php echo $__env->make('frontend.layout.part.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<head>
    <title>Home</title>
</head>

<section class="home">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo e(asset('img/gg.png')); ?>" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="menu">
    <div class="container mb-3">
        <div id="menu_item" class="row justify-content-center">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-3 col-md-6 mb-4 mx-1 d-flex justify-content-center">
                <div id="menuitem" class="services-wrap text-center shadow p-3 mb-5 bg-body">
                    <div class="position-relative">
                        <div class="<?php echo e($item->stock == 0 ? 'outstock' : 'instock'); ?>">
                            <i class="fa-solid fa-circle fs-4 m-2"></i>
                        </div>
                      </div>
                      
                      <img id="imagemenu" src="<?php echo e(asset('storage/images/' .$item->img)); ?>" alt="">
                      <div class="text">
                        <h3 class="bg-light"><?php echo e($item->name); ?></h3>
                        <span class="d-flex justify-content-center text-center bg-light <?php echo e($item->stock == 0 ? 'text-danger' : 'text-success'); ?>">
                            <i class="fa-solid fa-circle mx-2 bg-light"></i>
                            <h6 class="bg-light"><?php echo e($item->stock == 0 ? 'Out Of Stock' : 'In Stock'); ?></h6>
                        </span>
                            <div class="bg-light"><?php echo e($item->item_price); ?> MMK</div>
                            <?php if($item->stock != 0): ?>
                            <?php if(session('user_id')): ?>
                            <form action="<?php echo e(route('add_cart')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product" value="<?php echo e($item->id); ?>">
                                <input type="hidden" name="quanity" value="1">
                                <input type="hidden" name="img" value="<?php echo e($item->img); ?>">
                                <input type="hidden" name="name" value="<?php echo e($item->name); ?>">
                                <input type="hidden" name="price" value="<?php echo e($item->item_price); ?>">
                                <input type="submit" href="" id="btnorder" value="Add to Cart" class="btn btn-outline-danger mt-2"></input>
                            </form>
                            <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-danger mt-2">Login to Add to Cart</a>
                            <?php endif; ?>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="d-flex justify-content-center">
            <?php echo e($items->links()); ?>

        </div>
    </div>
</section>

<?php echo $__env->make('frontend.layout.part.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/frontend/layout/ui/home.blade.php ENDPATH**/ ?>