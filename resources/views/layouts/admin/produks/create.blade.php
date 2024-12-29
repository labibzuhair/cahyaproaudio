@extends('layouts.admin.master.master')


@section('title', 'Halaman Utama')

@section('content')
    <div class="container">
        <h1>Create Product</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}"
                    required>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}"
                    required>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label for="stock">Stock</label> <input type="number" class="form-control"
                    id="stock" name="stock" value="{{ old('stock') }}" required> @error('stock')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo_main">Main Photo</label>
                <input type="file" class="form-control" id="photo_main" name="photo_main" required>
                @error('photo_main')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo_1">Photo 1</label>
                <input type="file" class="form-control" id="photo_1" name="photo_1">
                @error('photo_1')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo_2">Photo 2</label>
                <input type="file" class="form-control" id="photo_2" name="photo_2">
                @error('photo_2')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo_3">Photo 3</label>
                <input type="file" class="form-control" id="photo_3" name="photo_3">
                @error('photo_3')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo_4">Photo 4</label>
                <input type="file" class="form-control" id="photo_4" name="photo_4">
                @error('photo_4')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>

@endsection
