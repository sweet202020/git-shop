@extends('layouts.admin')
@section('content')
<form action="{{route('admin.products.store')}}" method="post">
    @csrf
    <div class="container">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="inserisci il nome del prodotto" aria-describedby="helpId" value="{{old('name')}}">
            <small id="name" class="text-muted">Help text</small>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{old('description')}}</textarea>
            <small id="description" class="text-muted">Help text</small>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="text" name="price" id="price" class="form-control" placeholder="inserisci il nome del prodotto" aria-describedby="helpId" value="{{old('price')}}">
            <small id=" price" class="text-muted">Help text</small>
        </div>
        <button type="submit">add product</button>
    </div>
</form>
@endsection