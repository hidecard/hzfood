@extends('admin.index')
@section('title','category')
@section('content')

<form action="{{route('edit_item',['id'=>$result->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
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
    {{-- <label for="img"><i class="fa-solid fa-image"></i></label> --}}
    <input disabled class="w-25 ms-2 my-2 form-control" value="{{$result->img}}" id="img" type="text" name="img">
    <input class="form-control ms-2 w-25 my-2" id="img" name="img" type="file">
    <select name="category" id="" class="form-control ms-2 w-25 my-2">
        <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
        {{-- <option value="">Choose Category</option> --}}
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
        @endforeach
    </select>
        <label for="name" class="ms-2 form-label">Item Name</label>
        <input class="w-50  ms-2 form-control" value="{{$result->name}}" type="text" name="name">
        <label for="name" class="ms-2 form-label">Item Quanity</label>
        <input class="w-50  ms-2 form-control" value="{{$result->quanity}}" type="text" name="quanity">
        <label for="name" class="ms-2 form-label">Item Price</label>
        <input class="w-50  ms-2 form-control" value="{{$result->item_price}}" type="text" name="price">
        <label for="name" class="ms-2 form-label">Item Stock Only 0 and 1 </label>
        <input class="w-50  ms-2 form-control" value="{{$result->stock}}" type="text" name="stock">
    <input type="submit" class="btn btn-danger ms-2 mt-3" name="submit" value="Update Item">

</form>

@endsection
