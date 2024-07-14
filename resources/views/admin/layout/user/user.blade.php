@extends('admin.index')
@section('title','user')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User Dashboard</h1>

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
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                User Accounts List
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Ph No</th>
                            {{-- <th>Edit</th> --}}
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Ph No</th>
                            {{-- <th>Edit</th> --}}
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($result as $useres)
                        <tr>
                            <td>{{$useres->id}}</td>
                            <td>{{$useres->name}}</td>
                            <td>{{$useres->email}}</td>
                            <td>{{$useres->phone}}</td>
                            {{-- <td><a href="{{route('edit' , ['id'=> $useres->id])}}"><button class="btn btn-primary"><i class="fa-solid fa-user-pen me-1"></i>Edit</button></a></td> --}}
                            <td><a href="{{route('user_delete',['id'=>$useres->id])}}"><button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
