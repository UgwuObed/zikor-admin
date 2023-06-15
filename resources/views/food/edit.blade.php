@extends('layouts.app')

@section('content')
    <h1>Edit Food</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('food.update', $food->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $food->name }}">

    <label for="type">Type</label>
    <input type="text" name="type" value="{{ $food->type }}" required>

    <label for="quantity">Quantity</label>
    <input type="text" name="quantity" value="{{ $food->quantity }}" required>

    <label for="price">Price</label>
    <input type="number" name="price" value="{{ $food->price }}" required>

    <label for="description">Description</label>
    <textarea name="description">{{ $food->description }}</textarea>

     
    <label for="category">Category</label>
    <select name="category" required>
        <option value="international" {{ $food->category === 'international' ? 'selected' : '' }}>International Fashon</option>
        <option value="national" {{ $food->category === 'national' ? 'selected' : '' }}>National</option>
        <option value="local" {{ $food->category === 'local' ? 'selected' : '' }}>Local</option>
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
