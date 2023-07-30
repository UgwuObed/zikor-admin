<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $food = $user->food;
        return view('food.index', compact('food'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'type' => 'required|string',
        'quantity' => 'required|string',
        'category' => 'nullable|string',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'image_url1' => 'nullable|image|max:2048',
        'image_url2' => 'nullable|image|max:2048',
        'image_url3' => 'nullable|image|max:2048',
    ]);

    // Handle the image uploads if provided
    $imagePaths = [];
    if ($request->hasFile('image_url1')) {
        $imagePaths[] = $request->file('image_url1')->store('food');
    }
    if ($request->hasFile('image_url2')) {
        $imagePaths[] = $request->file('image_url2')->store('food');
    }
    if ($request->hasFile('image_url3')) {
        $imagePaths[] = $request->file('image_url3')->store('food');
    }
     
    // Get the authenticated user
    $user = auth()->user();

    // Create a new food instance
    $food = new Food([
        'name' => $validatedData['name'],
        'type' => $validatedData['type'],
        'quantity' => $validatedData['quantity'],
        'category' => $validatedData['category'],
        'price' => $validatedData['price'],
        'description' => $validatedData['description'],
        'image_url1' => $imagePaths[0] ?? null,
        'image_url2' => $imagePaths[1] ?? null,
        'image_url3' => $imagePaths[2] ?? null,
        'user_id' => $user->id,
    ]);
 
    // Save the food instance
    auth()->user()->food()->save($food);

    // Redirect to the index page or show a success message
    return redirect()->route('food.index')->with('success', 'food added successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $food = food::findOrFail($id);
        return view('food.show', compact('food'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $food = auth()->user()->food()->findOrFail($id);
        return view('food.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the food instance
        $food = auth()->user()->food()->findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'quantity' => 'required|string',
            'category' => 'nullable|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url1' => 'nullable|image|max:2048',
            'image_url2' => 'nullable|image|max:2048',
            'image_url3' => 'nullable|image|max:2048',
        ]);

        // Update the food instance with the new data
        $food->update([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'quantity' => $validatedData['quantity'],
            'category' => $validatedData['category'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
        ]);

        // Handle the image uploads if provided
        $imagePaths = [];
        if ($request->hasFile('image_url1')) {
            $imagePaths[] = $request->file('image_url1')->store('food');
        }
        if ($request->hasFile('image_url2')) {
            $imagePaths[] = $request->file('image_url2')->store('food');
        }
        if ($request->hasFile('image_url3')) {
            $imagePaths[] = $request->file('image_url3')->store('food');
        }

        // Update the image URLs if new images were uploaded
        if (!empty($imagePaths)) {
            $food->update([
                'image_url1' => $imagePaths[0] ?? null,
                'image_url2' => $imagePaths[1] ?? null,
                'image_url3' => $imagePaths[2] ?? null,
            ]);
        }

        // Redirect to the index page or show a success message
        return redirect()->route('food.index')->with('success', 'food updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the food instance
        $food = auth()->user()->food()->findOrFail($id);

        // Delete the image files associated with the Clothes instance if they exist
        $imageUrls = [$food->image_url1, $food->image_url2, $food->image_url3];
        foreach ($imageUrls as $imageUrl) {
            if (!empty($imageUrl)) {
                Storage::delete($imageUrl);
            }
        }

        // Delete the Clothes instance
        $food->delete();

        // Redirect to the index page or show a success message
        return redirect()->route('food.index')->with('success', 'food deleted successfully.');
    }
}
