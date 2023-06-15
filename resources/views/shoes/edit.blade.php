@extends('layouts.app')

@section('content')
    <h1>Edit Shoes</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shoes.update', $shoes->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $shoes->name }}">

    <label for="type">Type</label>
    <input type="text" name="type" value="{{ $shoes->type }}" required>

    <label for="color">Color</label>
    <input type="text" name="color" value="{{ $shoes->color }}" required>

    <label for="size">Size</label>
    <input type="text" name="size" value="{{ $shoes->size }}" required>

    <label for="brand">Brand</label>
    <input type="text" name="brand" value="{{ $shoes->brand }}" required>

    <label for="price">Price</label>
    <input type="number" name="price" value="{{ $shoes->price }}" required>

    <label for="description">Description</label>
    <textarea name="description">{{ $shoes->description }}</textarea>

    <label for="gender">Gender</label>
    <select name="gender" required>
        <option value="male" {{ $shoes->category === 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $shoes->category === 'female' ? 'selected' : '' }}>Female</option>
        <option value="unisex" {{ $shoes->category === 'unisex' ? 'selected' : '' }}>Unisex</option>
    </select>

     
    <label for="category">Category</label>
    <select name="category" required>
        <option value="men fashon" {{ $shoes->category === 'men fashon' ? 'selected' : '' }}>Men Fashon</option>
        <option value="women fashon" {{ $shoes->category === 'women fashon' ? 'selected' : '' }}>Women Fashon</option>
        <option value="trending style" {{ $shoes->category === 'trending style' ? 'selected' : '' }}>Trending Style</option>
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
