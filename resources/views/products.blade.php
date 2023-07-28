<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Offside&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Zikor</title>
</head>
<body>
@extends('layouts.app') <!-- Assuming you have a base layout named 'app.blade.php' -->

@section('content')
<div class="product-container">
  <!-- ... Your existing content here ... -->
</div>

@if($showAddProduct)
<div class="add-product-section">
    <h2>Add Product</h2>
    <div class="category-container">
      <label for="category">Category:</label>
      <select id="category" value="{{ $selectedCategory }}" onChange="handleCategoryChange(event)">
        <option value="">Select an option</option>
        <option value="cloths">Clothes</option>
        <option value="food">Food</option>
        <option value="shoes">Shoes</option>
      </select>
    </div>
    @if($selectedCategory === 'cloths')
    <div class="form-wrapper}">
      <div class="form-field">
        <label for="name">Name *</label>
        <input
          type="text"
          id="name"
          value="name"
          onChange="handleInputChange(event)"
          class="inputName"
        />
      </div>
      <div class="form-field1">
        <label for="type">Type *</label>
        <input
          type="text"
          id="type"
          value="type"
          onChange="handleInputChange(event)"
          class="inputType"
        />
      </div>
      <div class="form-field">
        <label for="brand">Brand *</label>
        <input
          type="text"
          id="brand"
          value="brand"
          onChange="handleInputChange(event)"
          class="inputBrand"
        />
      </div>
      <div class="form-field2">
        <label for="size">Size *</label>
        <input
          type="text"
          id="size"
          value="size"
          onChange="handleInputChange(event)"
          class="inputSize"
        />
      </div>
      <div class="form-field3">
        <label for="category">Gender *</label>
        <select
          id="category"
          value="category"
          onChange="handleInputChange(event)"
          class="selectCategory"
        >
          <option value="">Select a gender category</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Unisex">Unisex</option>
        </select>
      </div>
      <div class="form-field">
        <label for="description">Description *</label>
        <textarea
          id="description"
          value="{{ $formValues['description'] ?? '' }}"
          onChange="handleInputChange(event)"
          class="textareaDescription"
        ></textarea>
      </div>
      <div class="form-field">
        <label for="color">Color *</label>
        <input
          type="text"
          id="color"
          value="{{ $formValues['color'] ?? '' }}"
          onChange="handleInputChange(event)"
          class="inputColor"
        />
      </div>
      <div class="form-field">
        <label for="price">Price *</label>
        <input
          type="text"
          id="price"
          value="{{ $formValues['price'] ?? '' }}"
          onChange="handleInputChange(event)"
          class="inputPrice"
        />
      </div>
      <div class="form-field">
        <label for="image" class="dropContainer">
          <span class="dropTitle">Drop files here</span>
          or
          <input
            type="file"
            id="image"
            accept="image/*"
            class="inputImage"
            onChange="handleImageChange(event)"
          />
        </label>
      </div>

      <div>
        <button type="button" onClick="handleUpload(event)" class="uploadButton">
          Add
        </button>
      </div>
    </div>
    @elseif($selectedCategory === 'food')
    <div>
      <div>
        <label for="name">Name:</label>
        <input
          type="text"
          id="name"
          value="{{ $formValues['name'] ?? '' }}"
          onChange="handleInputChange(event)"
        />
      </div>
      <!-- Add food specific form fields here -->
      <!-- ... -->
    </div>
    @elseif($selectedCategory === 'shoes')
    <div>
      <div>
        <label for="name">Name:</label>
        <input
          type="text"
          id="name"
          value="{{ $formValues['name'] ?? '' }}"
          onChange="handleInputChange(event)"
        />
      </div>
      <!-- Add shoes specific form fields here -->
      <!-- ... -->
    </div>
    @else
    <!-- For other categories, you can return null or any other content you need -->
    @endif
  </div>

  @if($isNotificationVisible)
  <div class="notification show">
    Product successfully added!
  </div>
  @endif
  <div class="table-container">
    <h2 class="table-title">Products</h2>
    <table class="product-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Price</th>
          <th>Category</th>
          <td class="last-body">More</td>
        </tr>
      </thead>
      <tbody>
        <!-- Dummy table content -->
        <tr>
          <td>Product 1</td>
          <td>Type 1</td>
          <td>$10</td>
          <td>Category 1</td>
          <td class="last-body">
            <a href="#">
              <img src="{{ asset('more.png') }}" alt="More" width="20" height="8" onClick="handleMoreClick(0)">
            </a>
            @if($selectedRow === 0)
            <div class="more-options">
              <ul>
                <li>
                  <a href="#" class="edit">
                    Edit
                  </a>
                </li>
                <li>
                  <a href="#" class="delete">
                    Delete
                  </a>
                </li>
              </ul>
            </div>

            @endif
          </td>
        </tr>
        <!-- ... -->
      </tbody>
    </table>
  </div>
</div>
@endsection
@endsection
@section('scripts')
  <script src="{{ mix('js/app.js') }}"></script> <!-- Update with the correct path to your compiled JavaScript file -->
@endsection
</body>
</html>