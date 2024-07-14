@extends('admin.index')
@section('title','category')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Item Dashboard</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Product List
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quality</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quality</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($itemlist as $itemlists)
                        <tr>
                            <td>{{$itemlists->name}}</td>
                            <td>{{$itemlists->item_price}}</td>
                            <td>{{$itemlists->quanity}}</td>
                            <td>{{$itemlists->stock}}</td>
                            <td><img style="width: 50px" src="{{asset('storage/images/' .$itemlists->img)}}" alt="image"></td>
                            <td><a href="{{route('editem',['id'=>$itemlists->id])}}"><button class="btn btn-primary"><i class="fa-solid fa-user-pen me-1"></i>Edit</button></a></td>
                            <td><a href="{{route('item_delete',['id'=>$itemlists->id])}}"><button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection
