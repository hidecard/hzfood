@extends('admin.index')
@section('title','admin')
@section('content')

<main>
    @foreach ($result as $results)

    <form action="{{route('admin_update_code',['id'=>$results->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name" class="form-label mt-2 ms-2">Name</label>
        <input class="w-50 ms-2 form-control" value="{{$results->name}}" placeholder="Name" id="name" type="text" name="name">
        <label for="email" class="form-label mt-2 ms-2">Ph No</label>
        <input class="w-50 ms-2 form-control" value="{{$results->phone}}" placeholder="Email" id="email" type="text" name="phone">
        <label for="email" class="form-label mt-2 ms-2">Email</label>
        <input class="w-50 ms-2 form-control" value="{{$results->email}}" placeholder="Email" id="email" type="email" name="email">
        <label for="password" class="form-label mt-2 ms-2">Old Password</label>
        <input class="w-50 ms-2 form-control" placeholder="Password" id="oldpassword" type="password" name="password">
        <label for="confirmpassword" class="form-label mt-2 ms-2">New Password</label>
        <input class="w-50 ms-2 form-control" placeholder="Confirm Password" id="newpassword" type="password" name="password_confirmation">
        <input class="btn btn-danger my-3 ms-2" type="submit" value="Update">
    </form>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</main>

@endsection
