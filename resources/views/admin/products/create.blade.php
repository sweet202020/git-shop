@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.products.store') }}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf

        <div class="container">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror"
                    placeholder="inserisci il nome del prodotto" aria-describedby="helpId" value="{{ old('name') }}">
                <small id="name" class="text-muted">Help text</small>
            </div>
            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description"
                    cols="30" rows="10">{{ old('description') }}</textarea>
                <small id="description" class="text-muted">Help text</small>
            </div>
            @error('description')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="text" name="price" id="price"
                    class="form-control  @error('price') is-invalid @enderror" placeholder="inserisci il nome del prodotto"
                    aria-describedby="helpId" value="{{ old('price') }}">
                <small id=" price" class="text-muted">Help text</small>
            </div>
            @error('price')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary">add product</button>

        </div>



    </form>
@endsection
