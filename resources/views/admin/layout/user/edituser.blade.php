@extends('admin.index')
@section('title','user')
@section('content')
<main>
    @foreach ($result as $results)

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{'success'}}</li>
        </ul>
    </div>
    @endif

    <form action="{{route('user_update_code',['id'=>$results->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label">Name</label>
        <input class="w-50 mt-3 ms-2 form-control" value="{{$results->name}}" placeholder="Name" id="name" type="text" name="name">
        <label for="email" class="form-label">Email</label>
        <input class="w-50 mt-3 ms-2 form-control" value="{{$results->email}}" placeholder="Email" id="email" type="email" name="email">
        <label for="email" class="form-label">Ph No</label>
        <input class="w-50 mt-3 ms-2 form-control" value="{{$results->phone}}" placeholder="Email" id="email" type="phone" name="phone">
        <label for="password" class="form-label">Old Password</label>
        <input class="w-50 mt-3 ms-2 form-control" placeholder="Password" id="oldpassword" type="password" name="password">
        <label for="confirmpassword" class="form-label">New Password</label>
        <input class="w-50 mt-3 ms-2 form-control" placeholder="Confirm Password" id="newpassword" type="password" name="password_confirmation">
        <input class="btn btn-primary my-3 ms-2" type="submit" value="Register">
    </form>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</main>
@endsection
