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
      @if ($clothes->count() > 0)
    @foreach ($clothes as $clothing)
      <tr>
        <td>{{ $clothing->name }}</td>
        <td><img src="{{ asset('storage/' . $clothes->image_url1) }}" alt="Image 1"></td>
        <td>{{ $clothing->type }}</td>
        <td>{{ $clothing->price }}</td>
        <td>{{ $clothing->category }}/td>
        <td class="last-body">
  <div class="more-options">
  <div class="icon-container">
          <a href="javascript:void(0)" class="edit" onclick="handleEditClick('{{ route('clothes.edit', $clothes->id) }}')">
          <i class="fas fa-edit"></i> 
      </a>
      <div class="icon-container">
                            <!-- Pass the delete route to the handleDeleteClick function -->
       <a href="javascript:void(0)" class="delete" onclick="handleDeleteClick('{{ route('clothes.destroy', $clothing->id) }}')">
       <i class="fas fa-trash-alt"></i>
      </a>
    </div>
  </div>
</td>
      </tr>

      @endforeach
      @endif


@if ($food->count() > 0)
      @foreach ($food as $foodItem)
      <tr>
        <td>{{ $foodItem->name }}</td>
        <td> <img src="{{ asset('storage/' . $food->image_url1) }}" alt="Image 1"></td>
        <td>{{ $foodItem->type }}</td>
        <td>{{ $foodItem->price }}</td>
        <td>{{ $foodItem->quantity }}</td>
        <td class="last-body">
  <div class="more-options">
    <div class="icon-container">
          <a href="javascript:void(0)" class="edit" onclick="handleEditClick('{{ route('food.edit', $foodItem->id) }}')">
          <i class="fas fa-edit"></i> 
      </a>
      <div class="icon-container">
                            <!-- Pass the delete route to the handleDeleteClick function -->
       <a href="javascript:void(0)" class="delete" onclick="handleDeleteClick('{{ route('food.destroy', $foodItem->id) }}')">
       <i class="fas fa-trash-alt"></i>
      </a>
    </div>
  </div>
</td>
      </tr>
      @endforeach
      @endif

      @if ($shoes->count() > 0)
      @foreach ($shoes as $shoe)
      <tr>
        <td>{{ $shoe->name }}</td>
        <td><img src="{{ asset('storage/' . $shoes->image_url1) }}" alt="Image 1"></td>
        <td>{{ $shoe->type }}</td>
        <td>{{ $shoe->price }}</td>
        <td>{{ $shoe->category }}</td>
        <td class="last-body">
  <div class="more-options">
    <div class="icon-container">
          <a href="javascript:void(0)" class="edit" onclick="handleEditClick('{{ route('shoes.edit', $shoe->id) }}')">
          <i class="fas fa-edit"></i> 
      </a>
      <div class="icon-container">
                            <!-- Pass the delete route to the handleDeleteClick function -->
       <a href="javascript:void(0)" class="delete" onclick="handleDeleteClick('{{ route('shoes.destroy', $shoe->id) }}')">
       <i class="fas fa-trash-alt"></i>
      </a>
    </div>
  </div>
</td>
      </tr>
      @endforeach
      @endif

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
<script>
        function handleEditClick(editUrl) {
            // Navigate to the edit URL
            window.location.href = editUrl;
        }
    </script>
<form id="deleteForm" action="" method="POST">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function handleDeleteClick(deleteUrl) {
            // Set the action attribute of the delete form to the delete URL
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = deleteUrl;

            // Submit the delete form
            deleteForm.submit();
        }
    </script>

</body>

@endsection
</html>
