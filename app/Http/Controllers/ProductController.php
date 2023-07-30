<?php 


namespace App\Http\Controllers;

use App\Models\Clothes;
use App\Models\Food;
use App\Models\Shoes;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of all products.
     */
    public function index()
    {
        $user = auth()->user();

        $clothes = $user->clothes;
        $food = $user->food;
        $shoes = $user->shoes;


        return view('products', compact('clothes', 'food', 'shoes'));
    }
}
