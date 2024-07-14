@extends('admin.index')
@section('title','category')
@section('content')

<main>
    <div class="p-4">
        <h4>Item Add</h4>
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
        <form action="{{route('admin_item_insert')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <label for="img"><i class="fa-solid fa-image"></i></label> --}}
            <input class="form-control w-25 my-2" id="img" name="img" type="file">
            <select name="category" id="" class="form-control w-25 my-2">
                <option value="">Choose Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Item Name" type="text" name="name">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Item Quanity" type="text" name="quanity">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Item Price" type="text" name="price">
            <input class="w-50 mt-3 ms-2 form-control" placeholder="Item stock" type="text" name="stock">
            <input type="submit" class="btn btn-danger mt-3" name="submit" value="Add Item">

    </form>
    </div>
</main>

@endsection
