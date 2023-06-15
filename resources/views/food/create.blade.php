@extends('layouts.app')

@section('content')
    <h1>Create New Food</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

    <label for="name">Name</label>
    <input type="text" name="name" id="name">
           
    <label for="type">Type</label>
    <input type="text" name="type" required>

    <label for="quantity">Quantity</label>
    <input type="text" name="quantity" required>

    <label for="price">Price</label>
    <input type="number" name="price" required>

    <label for="description">Description</label>
    <textarea name="description"></textarea>


    <label for="category">Category</label>
        <select name="category" required>
        <option value="international">International</option>
        <option value="national">National</option>
        <option value="local">Local</option>
    </select>

        <!-- Add more fields as per your requirements -->

        <label for="image_url1">Image 1</label>
        <input type="file" name="image_url1" id="image_url1">
        <label for="image_url2">Image 2</label>
        <input type="file" name="image_url2" id="image_url2">
        <label for="image_url3">Image 3</label>
        <input type="file" name="image_url3" id="image_url3">

        <button type="submit">Create Product</button>
    </form>
@endsection
