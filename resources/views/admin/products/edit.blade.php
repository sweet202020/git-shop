@extends('layouts.admin')
@section('content')

    <section class="py-5">

        <div class="container">
            <form action="{{ route('admin.products.update', $product->id) }}" method="post" class="card p-3">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" name="name" id="name"
                        class="form-control  @error('name') is-invalid @enderror" placeholder="insert a name"
                        aria-describedby="helpId" value="{{ old('name', $product) }}">
                    <small id="helpId" class="text-muted">insert a product name</small>
                </div>
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" name="description" id="description"
                        class="form-control  @error('description') is-invalid @enderror" placeholder="insert a description"
                        aria-describedby="helpId" value="{{ old('description', $product) }}">
                    <small id="helpId" class="text-muted">insert a product description</small>
                </div>
                @error('description')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="text" name="price" id="price"
                        class="form-control  @error('price') is-invalid @enderror" placeholder="insert a price "
                        aria-describedby="helpId" value="{{ old('price', $product) }}">
                    <small id="helpId" class="text-muted">insert a product price </small>
                </div>
                @error('price')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </section>

@endsection
