@section('title','admin')
@extends('admin.index')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admin Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Admin List</li>
        </ol>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(@session('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{session('success')}}</li>
                </ul>
            </div>
            @endif
            @if(@session('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{session('Error')}}</li>
                </ul>
            </div>
            @endif
        <form action="{{route('admin_create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Name" type="text" name="name">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Email" type="email" name="email">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Ph No" type="text" name="phone">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Password" type="password" name="password">
            <input class="btn btn-danger my-3 ms-2" type="submit" value="Register">
        </form>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Admin Accounts List
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Ph No</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Ph No</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($result as $res)
                        <tr>
                            <td>{{$res->id}}</td>
                            <td>{{$res->name}}</td>
                            <td>{{$res->phone}}</td>
                            <td>{{$res->email}}</td>
                            <td><a href="{{route('edit' , ['id'=> $res->id])}}"><button class="btn btn-primary"><i class="fa-solid fa-user-pen me-1"></i>Edit</button></a></td>
                            <td><a href="{{route('admin_delete',['id'=> $res->id])}}"><button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
