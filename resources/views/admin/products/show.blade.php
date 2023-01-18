@extends('layouts.admin')
@section('content')

    <div class="container text-center p-5 d-flex align-items-center flex-column">
        <h1 class="mt-4">{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <h5>{{ $product->price }}</h5>
        <h6>Type: {{ $product->type ? $product->type->name : 'Uncategorized' }}</h6>
        <div class="Materie">
            @if (count($product->materials) > 0)
                <span>Materie: </span>
                @foreach ($product->materials as $material)
                    <span>{{ $material->name }}</span>
                @endforeach
            @else
                <span>Materie: Nessuna materia prima  associata a questo progetto.</span>
            @endif
        </div>
    </div>
@endsection
