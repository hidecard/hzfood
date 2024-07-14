@include('frontend.layout.part.nav')
<head>
    <title>Login</title>
</head>
<section class="container">
    <div class="row m-5 p-4 shadow p-3 mb-5 bg-body rounded">
        <div class="col-lg-6 text-center">
            <img src="{{asset('img/Woman enters the password from her account.png')}}" alt="">
        </div>
        <div class="col-lg-6 text-center">
            <h2><span>Welcome back </span> <span class="text-danger">Hz Food</span></h2>
            <h6>Login your account</h6>
            <form action="{{ route('login_form') }}" method="POST">
                @csrf
                <div class="text-start mt-2">
                    <label for="email" class="form-label">Gmail</label>
                    <input class="w-50 ms-2 form-control" placeholder="Email" id="email" type="email" name="email">
                </div>
                <div class="text-start mt-2">
                    <label for="password" class="form-label">Password</label>
                    <input class="w-50 ms-2 form-control" placeholder="Password" id="password" type="password" name="password">
                </div>
                <button class="btn btn-outline-danger w-50 mt-3" type="submit">Login</button>
            </form>
            <hr>
            <h5>or</h5>
            <div class="d-flex justify-content-evenly">
              <div>
                <h6 class="">Don't have your account</h6>
              </div>
              <div>
                <a class="text-decoration-none text-danger" href="{{route('user_register_form')}}">Register your account</a>
              </div>
            </div>
         </div>
    </div>
   </section>
   @include('frontend.layout.part.footer')

