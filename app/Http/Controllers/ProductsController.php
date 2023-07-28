<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        // Your logic to fetch products and other data goes here
        $products = // ... Logic to fetch products

        // Set the value of $showAddProduct based on certain conditions
        $showAddProduct = true; // For example, set this to true when the "Add" button is clicked.

        return view('products.index', [
            'products' => $products,
            'showAddProduct' => $showAddProduct,
        ]);
    }

    // Add other methods for CRUD operations or other functionalities as needed
}
