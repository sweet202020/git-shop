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

                {{-- SEPARATORE --}}

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

                {{-- SEPARATORE --}}

                <div class="mb-3">
                    <label for="type_id" class="form-label">Type</label>
                    <select class="form-select form-select-lg @error('type_id') is-invalid @enderror" name="type_id"
                        id="type_id">
                        <option selected value=''>Untyped</option>

                        @forelse($types as $type)
                            <option value="{{ $type->id }}"
                                {{ $type->id == old('type_id', $product->type_id) ? 'selected' : '' }}>{{ $type->name }}
                            </option>
                        @empty
                            <option value="">Sorry, no categories in the system.</option>
                        @endforelse
                    </select>
                </div>
                @error('type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {{-- SEPARATORE --}}

                <div class="mb-3">
                    <label for="materials" class="form-label">City</label>
                    <select multiple class="form-select form-select-lg" name="materials[]" id="materials">
                        <option value="" disabled>Select one</option>

                        @forelse ($materials as $material)
                            @if ($errors->any())
                                <option
                                    value="{{ $material->id }}"{{ in_array($material->id, old('materials', [])) ? 'selected' : '' }}>
                                    {{ $material->name }}</option>
                            @else
                                <option
                                    value="{{ $material->id }}"{{ $product->materials->contains($material->id) ? 'selected' : '' }}>
                                    {{ $material->name }}</option>
                            @endif
                        @empty
                            <h6>Sorry.No materials inside the database yet.</h6>
                        @endforelse
                    </select>
                    @error('materials')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                </div>

                {{-- SEPARATORE --}}

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

                {{-- SEPARATORE --}}

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

                {{-- SEPARATORE --}}

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </section>

@endsection
