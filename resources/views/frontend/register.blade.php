@include('frontend.layout.part.nav')
<head>
    <title>Register</title>
</head>

<section class="container">
    <div class="row m-5 p-4 shadow p-3 mb-5 bg-body rounded">
        <div class="col-lg-6 text-center">
            <img src="{{asset('img/Woman ordering food and paying online.png')}}" alt="">
        </div>
        <div class="col-lg-6 text-center">
            <h2><span>Welcome to </span> <span class="text-danger">Hz Food</span></h2>
            <h6>Create your account</h6>
            <form action="{{route('user_register')}}" method="POST">
                @csrf
                <div class="text-start mt-5">
                    <label for="name">Your Name</label>
                    <input id="name" type="text" class="form-control m-2" name="name" placeholder="Enter Your Name">
                </div>
                <div class="text-start mt-2">
                    <label for="email">Your Email</label>
                    <input id="email" type="text" class="form-control m-2" name="email" placeholder="Enter Your Email Address">
                </div>
                <div class="text-start mt-2">
                    <label for="email">Your Phone Number</label>
                    <input id="email" type="phone" class="form-control m-2" name="phone" placeholder="Enter Your Phone Number">
                </div>
                <div class="text-start mt-2">
                    <label for="password">Your Password</label>
                    <input id="password" type="text" class="form-control m-2" name="password" placeholder="Enter Your Password">
                </div>
                <div>
                  <input class="btn btn-outline-danger w-50 mt-3" type="submit" value="Register">
                </div>
            </form>
            <hr>
            <h5>or</h5>
            <div class="d-flex justify-content-evenly">
              <div>
                <h6 class="">Do you have account</h6>
              </div>
              <div>
                <a class="text-decoration-none text-danger" href="{{route('login')}}">Login your account</a>
              </div>
            </div>
         </div>
    </div>
   </section>

@include('frontend.layout.part.footer')
