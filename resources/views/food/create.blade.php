<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/food.css') }}" rel="stylesheet">
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
    <h1>Add Food</h1>

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
       <h3>Add Images</h3>
    <div class="form-group">
                    <label for="image_url1">Image 1</label>
                    <div class="file-drop" id="file-drop">
                        <span>Drag and drop images here or</span>
                        <label for="image_url1" class="file-label">click to upload</label>
                        <input type="file" name="image_url1" id="image_url1" class="file-input" multiple>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image_url2">Image 2</label>
                    <div class="file-drop" id="file-drop">
                        <span>Drag and drop images here or</span>
                        <label for="image_url2" class="file-label">click to upload</label>
                        <input type="file" name="image_url2" id="image_url2" class="file-input" multiple>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image_url3">Image 3</label>
                    <div class="file-drop" id="file-drop">
                        <span>Drag and drop images here or</span>
                        <label for="image_url3" class="file-label">click to upload</label>
                        <input type="file" name="image_url3" id="image_url3" class="file-input" multiple>
                    </div>
                </div>
        

        <button type="submit">Add</button>
    </form>
    <a href="{{ route('products') }}" class="cancel-link">
    <span class="cancel-icon">&#x2716;</span>
      </a>
        </div>
    </div>
    <script>
        const fileDrop = document.getElementById("file-drop");
        const fileInput = document.getElementById("image-input");
        const fileLabel = document.querySelector(".file-label");

        fileDrop.addEventListener("dragover", (e) => {
            e.preventDefault();
            fileDrop.classList.add("file-drop-hover");
        });

        fileDrop.addEventListener("dragleave", () => {
            fileDrop.classList.remove("file-drop-hover");
        });

        fileDrop.addEventListener("drop", (e) => {
            e.preventDefault();
            fileDrop.classList.remove("file-drop-hover");
            fileInput.files = e.dataTransfer.files;
        });

        fileDrop.addEventListener("click", () => {
            fileInput.click();
        });

        fileInput.addEventListener("change", () => {
            if (fileInput.files.length > 0) {
                fileLabel.textContent = `${fileInput.files.length} files selected`;
            } else {
                fileLabel.textContent = "Click to upload";
            }
        });
    </script>
</body>

@endsection
</html>