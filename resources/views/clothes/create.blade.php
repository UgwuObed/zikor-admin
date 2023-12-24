<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/clothes.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Offside&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Zikor</title>
</head>
@extends('master')

@section('content')
<body>
    <div class="overlay">
        <div class="container">
            <h1>Add New Clothes</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('clothes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="name">Name</label>
                <input type="text" name="name" id="name">

                <label for="type">Type</label>
                <input type="text" name="type" required>

                <label for="color">Color</label>
                <input type="text" name="color" required>

                <label for="size">Size</label>
                <input type="text" name="size" required>

                <label for="brand">Brand</label>
                <input type="text" name="brand" required>

                <label for="price">Price</label>
                <input type="number" name="price" required>

                <label for="description">Description</label>
                <textarea name="description"></textarea>

                <label for="gender">Gender</label>
                <select name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="unisex">Unisex</option>
                </select>

                <label for="category">Category</label>
                <select name="category" required>
                    <option value="men fashon">Men Fashion</option>
                    <option value="women fashion">Women Fashion</option>
                    <option value="trending style">Trending Style</option>
                </select>

                <h3>Add Images</h3>
                <div class="form-group">
                    <label for="image_url1">Image 1</label>
                    <input type="file" name="image_url1" id="image_url1" class="file-input" multiple>
                </div>

                <div class="form-group">
                    <label for="image_url2">Image 2</label>
                    <input type="file" name="image_url2" id="image_url2" class="file-input" multiple>
                </div>

                <div class="form-group">
                    <label for="image_url3">Image 3</label>
                    <input type="file" name="image_url3" id="image_url3" class="file-input" multiple>
                </div>

                <button type="submit">Add</button>
            </form>

            <a href="{{ route('products') }}" class="cancel-link">
                <span class="cancel-icon">&#x2716;</span>
            </a>
        </div>
    </div>
</body>

@endsection
</html>
