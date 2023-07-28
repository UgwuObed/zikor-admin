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
<!-- Inside your main page HTML -->
<button onclick="showAddProductModal()">Add Product</button>

<!-- Add the modal container -->
<div id="addProductModal" class="modal">
  <div class="modal-content">
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
</script>




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
      <tr>
        <td>Product 1</td>
        <td>Type 1</td>
        <td>$10</td>
        <td>Category 1</td>
        <td class="last-body">
          <a href="#" onclick="handleMoreClick(0)">
            <img src="/more.png" alt="More" width="20" height="8">
          </a>
          <div class="more-options" style="display: none;">
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
        </td>
      </tr>
      <tr>
        <td>Product 2</td>
        <td>Type 2</td>
        <td>$20</td>
        <td>Category 2</td>
        <td class="last-body">
          <a href="#" onclick="handleMoreClick(1)">
            <img src="/more.png" alt="More" width="20" height="8">
          </a>
          <div class="more-options" style="display: none;">
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
        </td>
      </tr>
      <!-- ... -->
    </tbody>
  </table>
</div>

<script>
  function handleMoreClick(rowIndex) {
    var moreOptionsDivs = document.querySelectorAll('.more-options');
    
    moreOptionsDivs.forEach(function (div, index) {
      if (index === rowIndex) {
        div.style.display = div.style.display === 'none' ? 'block' : 'none';
      } else {
        div.style.display = 'none';
      }
    });
  }
</script>

</body>
</html>
