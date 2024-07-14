
<?php echo $__env->make('frontend.layout.part.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<head>
    <title>About</title>
</head>
  <!-- About us section start -->
   <section>
    <h4 class="ms-4 mb-4"><a class="list-unstyled text-decoration-none text-dark" href="">Home / About Us</a></h4>
   </section>
   <section class="container-fluid">
    <div class="row mb-4">
        <div class="col-lg-6 text-center">
            <img id="imgabout" src="<?php echo e(asset('img/gallery-3.jpg')); ?>" alt="">
        </div>
        <div class="col-lg-6 align-items-center">
            <h6 class="text-danger mt-4">Save more with GO! We give you the lowest prices
                on all your grocery needs.</h6>
                <div>
                    <h4 class="mt-5">Our Vision</h4>
                    <p class="mt-3 ms-3">It is a long established fact that a reader will be distracted by
                        the readable content of a page when looking at its layout.
                        The point of using Lorem Ipsum is that it has a more-or-less
                        normal distribution of letters, as opposed to using 'Content here, </p>
                </div>
                <div>
                    <h4 class="mt-5">Our Goal</h4>
                    <p class="mt-3 ms-3">When looking at its layout. The point of using Lorem Ipsum is that
                        it has a more-or-less normal distribution of letters, as opposed
                       to using 'Content here, Lorem Ipsum has been the industry's standard
                       dummy text ever since.</p>
                </div>
        </div>
    </div>

   </section>
  <!-- About us section end -->
     <!-- service section start -->
     <section class="service">
        <div class="container">
          <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center">
              <h2 class="mb-4 mt-4">Our Services</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="media d-block text-center block-6 services">
                <div class="icon d-flex justify-content-center align-items-center mb-5">
                  <img style="height: 100px; width: 100px;" src="../img/Fast food combo.png" alt="">
                </div>
                <div class="media-body">
                  <h3 class="heading">Healthy Foods</h3>
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="media d-block text-center block-6 services">
                <div class="icon d-flex justify-content-center align-items-center mb-5">
                  <img style="height: 100px; width: 100px;" src="../img/scooter with delivery bag.png" alt="">
                </div>
                <div class="media-body">
                  <h3 class="heading">Fastest Delivery</h3>
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="media d-block text-center block-6 services">
                <div class="icon d-flex justify-content-center align-items-center mb-5">
                  <img style="height: 100px; width: 100px;" src="../img/pizza slice.png" alt="">
              </div>
                <div class="media-body">
                  <h3 class="heading">Original Recipes</h3>
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- service section end -->
       <!-- about chef section start -->
       <section class="chef">
        <div class="container">
            <div class="row justify-content-center mb-2 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
              <h2 class="mb-4 mt-4">Our Chef</h2>
              <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
              <p class="mt-2">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div class="row">
              <div class="col-lg-4 mb-3 d-flex mb-sm-4 ftco-animate">
                  <div class="staff">
                <img class="mb-2" src="<?php echo e(asset('img/person_1.jpg')); ?>" alt="">
                <div class="info text-center">
                            <h3><a href="teacher-single.html">Tom Smith</a></h3>
                            <span class="position">Hair Specialist</span>
                            <div class="text">
                              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                          </div>
                        </div>
                  </div>
              </div>
              <div class="col-lg-4 mb-3 d-flex mb-sm-4 ftco-animate">
                  <div class="staff">
                <img class="mb-2" src="<?php echo e(asset('img/person_2.jpg')); ?>" alt="">
                        <div class="info text-center">
                            <h3><a href="teacher-single.html">Mark Wilson</a></h3>
                            <span class="position">Beard Specialist</span>
                            <div class="text">
                              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                          </div>
                        </div>
                  </div>
              </div>
              <div class="col-lg-4 mb-3 d-flex mb-sm-4 ftco-animate">
                  <div class="staff">
                <img class="mb-2" src="<?php echo e(asset('img/person_3.jpg')); ?>" alt="">
                        <div class="info text-center">
                            <h3><a href="teacher-single.html">Patrick Jacobson</a></h3>
                            <span class="position">Hair Stylist</span>
                            <div class="text">
                              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                          </div>
                        </div>
                  </div>
              </div>

          </div>
        </div>
      </section>
        <!-- about chef section end -->

        <?php echo $__env->make('frontend.layout.part.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/frontend/layout/ui/about.blade.php ENDPATH**/ ?>