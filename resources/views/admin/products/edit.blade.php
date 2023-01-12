@extends('layouts.admin')
@section('content')

<section class="py-5">

    <div class="container">
        <form action="{{route('admin.products.update',$product->id)}}" method="post" class="card p-3">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="insert a name" aria-describedby="helpId" value="{{old('name',$product)}}">
                <small id="helpId" class="text-muted">insert a product name</small>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="insert a description" aria-describedby="helpId" value="{{old('description',$product)}}">
                <small id="helpId" class="text-muted">insert a product description</small>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="insert a price " aria-describedby="helpId" value="{{old('price',$product)}}">
                <small id="helpId" class="text-muted">insert a product price </small>
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</section>

@endsection