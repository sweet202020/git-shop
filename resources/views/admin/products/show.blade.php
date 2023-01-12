@extends('layouts.admin')
@section('content')

<div class="container">
    <h1>{{$product->name}}</h1>
    <p>{{$product->description}}</p>
    <h5>{{$product->price}}</h5>
</div>
@endsection