@extends('admin.index')
@section('title','category')
@section('content')

<main>
    <div class="container-fluid">
        <div class="row p-3">
            <h3>Category Section</h3>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{session('success')}}</li>
                </ul>
            </div>
            @endif
            <form action="{{route('admin_category_insert')}}" method="POST">
                @csrf
                <input name="category_name" class="form-control w-50 my-3" type="text" placeholder="Add new category">
                <input name="submit" class="btn btn-danger" type="submit" value="Add">
            </form>
        </div>
        <div class="row">
            <table id="datatablesSimple" class="text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($result as $reqs)
                    <tr>
                        <td>{{$reqs->id}}</td>
                        <td>{{$reqs->category_name}}</td>
                        <td><a href="{{route('edit_category' , ['id'=> $reqs->id])}}"><button class="btn btn-primary">Edit</button></a></td>
                        <td><a href=""><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection
