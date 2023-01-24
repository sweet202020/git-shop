@extends('layouts.admin')
@section('content')
<form action="{{ route('admin.products.store') }}" method="post" class="card p-3 mb-5">
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
        {{-- DIVISORIO --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="inserisci il nome del prodotto" aria-describedby="helpId" value="{{ old('name') }}">
            <small id="name" class="text-muted">Help text</small>
        </div>
        @error('name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        {{-- DIVISORIO --}}
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select form-select-lg @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option selected value=''>Select one</option>
                @forelse ($types as $type)
                <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
                @empty
                <h6>Sorry.No types inside the database yet.</h6>
                @endforelse
            </select>
        </div>
        @error('type_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- DIVISORIO --}}

        <div class="mb-3">
            <label for="materials" class="form-label">Materials</label>
            <select multiple class="form-select form-select-lg" name="materials[]" id="materials">
                <option value="" disabled>Select one</option>
                @forelse ($materials as $material)
                <option value="{{ $material->id }}" {{ in_array($material->id, old('materials', [])) ? 'selected' : '' }}>
                    {{ $material->name }}
                </option>
                @empty
                <h6>Sorry.No materials inside the database yet.</h6>
                @endforelse
            </select>
        </div>
        @error('materials')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        {{-- DIVISORIO --}}



        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            <small id="description" class="text-muted">Help text</small>
        </div>
        @error('description')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        {{-- DIVISORIO --}}
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="text" name="price" id="price" class="form-control  @error('price') is-invalid @enderror" placeholder="inserisci il nome del prodotto" aria-describedby="helpId" value="{{ old('price') }}">
            <small id=" price" class="text-muted">Help text</small>
        </div>
        @error('price')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        {{-- DIVISORIO --}}


        <button type="submit" class="btn btn-primary">add product</button>

    </div>

</form>
@endsection