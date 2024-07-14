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
            @foreach ($result as $results)
            <form action="{{route('update_category',['id'=>$results->id])}}" method="POST">
                @csrf
                <input name="category_name" value="{{$results->category_name}}" class="form-control w-50 my-3" type="text" placeholder="Add new category">
                <input name="submit" class="btn btn-danger" type="submit" value="Update">
            </form>
            @endforeach
        </div>
    </div>
</main>

@endsection
