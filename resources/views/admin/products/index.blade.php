@extends('layouts.admin')
@section('content')
<div class="table-responsive">
    <button class="btn btn-primary mt-5 p-3"><a class="text-white text-uppercase" href="{{route('admin.products.create')}}">add product</a></button>
    <table class="table table-primary mt-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="">
                <td scope="row">{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>

                <td>
                    <a href="{{route('admin.products.show', $product->id)}}">show</a>
                    <a href="{{route('admin.products.edit', $product->id)}}">
                        <i class="fas fa-pencil fa-sm fa-fw"></i>
                    </a>
                    -delete
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection