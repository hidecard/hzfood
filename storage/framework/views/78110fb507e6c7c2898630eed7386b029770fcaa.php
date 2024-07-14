<?php echo $__env->make('frontend.layout.part.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<head>
    <title>Contact</title>
</head>
<!-- contact section start -->
<section>
    <h4 class="ms-4 mb-4"><a class="list-unstyled text-decoration-none text-dark" href="">Home / Contact</a></h4>
   </section>
   <section class="container-fruid">
    <div class="row mb-4">
        <div class="col-lg-6">
            <h6 class="mt-2 ms-5">Get In Touch</h6>
            <div class="icontext d-flex ps-5 mt-3">
                <i class="me-3 fa-solid fa-location-dot"></i>
                <h6>Address : </h6>
            </div>
            <div>
                <p class="ps-5">No. 312  Kan Nar lan , Ahlone Township
                    Yangon , Myanmar</p>
            </div>
            <div class="icontext d-flex ps-5 mt-3">
                <i class="me-3 fa-solid fa-phone"></i>
                <h6>Phone : </h6>
            </div>
            <div>
                <p class="ps-5">+959 954 835 518 ., +959 781 455 672</p>
            </div>
            <div class="icontext d-flex ps-5 mt-3">
                <i class="me-3 fa-solid fa-envelope"></i>
                <h6>Email : </h6>
            </div>
            <div>
                <p class="ps-5">hzfood@gmail.com , hzfood.org@gmail.com</p>
            </div>
            <div class="icontext d-flex ps-5 mt-3">
                <i class="me-3 fa-solid fa-globe"></i>
                <h6>Website : </h6>
            </div>
            <div>
                <p class="ps-5">www.hzfood.org</p>
            </div>
            <div class="d-flex">
                <div class="ps-5">
                    <h6>Follow : </h6>
                </div>
                <div class="ms-3 mb-3">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <img id="imgabout" src="../img/Fruits shop view.png" alt="">
        </div>
    </div>
   </section>
   <!-- contact section end -->
  <!-- Contact form section start -->
  <section class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('contact.submit')); ?>" method="POST" class="contact-form">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-2">
                            <input type="text" class="form-control" name="name" placeholder="Your Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-2">
                            <input type="email" class="form-control" name="email" placeholder="Your Email">
                        </div>
                    </div>
                </div>
                <div class="form-group m-2">
                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div class="form-group m-2">
                    <textarea name="message" cols="30" rows="7" class="form-control"
                        placeholder="Message"></textarea>
                </div>
                <div class="form-group m-2">
                    <input type="submit" value="Send Message" class="btn btn-outline-danger py-3 px-5">
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Contact form section end -->

     <?php echo $__env->make('frontend.layout.part.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/frontend/layout/ui/contact.blade.php ENDPATH**/ ?>