@extends('layouts.app')

@section('content')
    <h1>Edit Clothes</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clothes.update', $clothes->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $clothes->name }}">

    <label for="type">Type</label>
    <input type="text" name="type" value="{{ $clothes->type }}" required>

    <label for="color">Color</label>
    <input type="text" name="color" value="{{ $clothes->color }}" required>

    <label for="size">Size</label>
    <input type="text" name="size" value="{{ $clothes->size }}" required>

    <label for="brand">Brand</label>
    <input type="text" name="brand" value="{{ $clothes->brand }}" required>

    <label for="price">Price</label>
    <input type="number" name="price" value="{{ $clothes->price }}" required>

    <label for="description">Description</label>
    <textarea name="description">{{ $clothes->description }}</textarea>

    <label for="gender">Gender</label>
    <select name="gender" required>
        <option value="male" {{ $clothes->category === 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $clothes->category === 'female' ? 'selected' : '' }}>Female</option>
        <option value="unisex" {{ $clothes->category === 'unisex' ? 'selected' : '' }}>Unisex</option>
    </select>

     
    <label for="category">Category</label>
    <select name="category" required>
        <option value="men fashon" {{ $clothes->category === 'men fashon' ? 'selected' : '' }}>Men Fashon</option>
        <option value="women fashon" {{ $clothes->category === 'women fashon' ? 'selected' : '' }}>Women Fashon</option>
        <option value="trending style" {{ $clothes->category === 'trending style' ? 'selected' : '' }}>Trending Style</option>
    </select>

        <!-- Add more fields as per your requirements -->

        <label for="image_url1">Image 1</label>
        <input type="file" name="image_url1" id="image_url1">
        <label for="image_url2">Image 2</label>
        <input type="file" name="image_url2" id="image_url2">
        <label for="image_url3">Image 3</label>
        <input type="file" name="image_url3" id="image_url3">

        <button type="submit">Update</button>
    </form>
@endsection
