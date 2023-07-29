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
@extends('master')

@section('content')
<body>

<div class="center">
    <ul class="list-items">
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="active">
        <a href="{{ route('products') }}">Products</a>
      </li>
      <li><a href="#">Order</a></li>
      <li><a href="#">Completed</a></li>
    </ul>
</div>

<div class="search-container">
        <input type="text" placeholder="Search products by name" class="search-input">
        <button type="submit" class="search-button">
            <span class="search-icon">&#128269;</span> Search
        </button>
    </div>

    <button onclick="showAddProductModal()" class="button-1" role="button">
  <i class="fas fa-plus"></i> Add Product
  <span class="tooltip">Add new products</span>
</button>

<!-- Add the modal container -->
<div id="addProductModal" class="modal">
  
  <div class="modal-content">
  <span class="modal-close" onclick="closeModal()">&times;</span>
    <h3>Select a category:</h3>
    <button onclick="selectCategory('clothes')">Clothes</button>
    <button onclick="selectCategory('shoes')">Shoes</button>
    <button onclick="selectCategory('food')">Food</button>
  </div>
</div>


<input type="hidden" id="selectedCategory" value="">

<script>
  function showAddProductModal() {
    // Show the modal with category options
    const modal = document.getElementById('addProductModal');
    modal.style.display = 'block';
  }

  function selectCategory(category) {
    // Update the selected category value
    document.getElementById('selectedCategory').value = category;

    // Redirect the user to the appropriate category form page based on the selected category
    window.location.href = `/add-product/${category}`;
  }
  function closeModal() {
  const modal = document.getElementById('addProductModal');
  modal.style.display = 'none';
}
</script>



<h2 class="table-title">Products</h2>
<div class="table-container">
  <table class="product-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Type</th>
        <th>Price</th>
        <th>Category</th>
        <td class="last-body">More</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Product 1</td>
        <td></td>
        <td>Type 1</td>
        <td>$10</td>
        <td>Category 1</td>
        <td class="last-body">
  <div class="more-options">
    <div class="icon-container">
      <a href="javascript:void(0)" class="edit" onclick="handleEditClick()">
        <i class="fas fa-edit"></i> 
      </a>
      <a href="javascript:void(0)" class="delete" onclick="handleDeleteClick()">
        <i class="fas fa-trash-alt"></i> 
      </a>
    </div>
  </div>
</td>

      </tr>
      <tr>
        <td>Product 2</td>
        <td></td>
        <td>Type 2</td>
        <td>$20</td>
        <td>Category 2</td>
        <td class="last-body">
  <div class="more-options">
    <div class="icon-container">
      <a href="javascript:void(0)" class="edit" onclick="handleEditClick()">
        <i class="fas fa-edit"></i> 
      </a>
      <a href="javascript:void(0)" class="delete" onclick="handleDeleteClick()">
        <i class="fas fa-trash-alt"></i> 
      </a>
    </div>
  </div>
</td>

      <!-- ... -->
    </tbody>
  </table>
</div>

<script>
  function handleEditClick() {
    // Add your logic for handling the edit click here
    // For example, you can show an edit modal or redirect to an edit page
    console.log("Edit clicked");
  }

  function handleDeleteClick() {
    // Add your logic for handling the delete click here
    // For example, you can show a confirmation dialog and delete the item on confirmation
    console.log("Delete clicked");
  }
</script>

</body>
@endsection
</html>
