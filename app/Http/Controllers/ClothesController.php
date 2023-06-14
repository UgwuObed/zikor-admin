<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothes;
use Illuminate\Support\Facades\Storage;


class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clothes = Clothes::all();
        return view('clothes.index', compact('clothes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clothes.create');
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
            'color' => 'required|string',
            'size' => 'required|string',
            'category' => 'nullable|string',
            'gender' => 'nullable|string',
            'brand' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url1' => 'nullable|image|max:2048',
            'image_url2' => 'nullable|image|max:2048',
            'image_url3' => 'nullable|image|max:2048',
        ]);

        // Handle the image uploads if provided
        $imagePaths = [];
        if ($request->hasFile('image_url1')) {
            $imagePaths[] = $request->file('image_url1')->store('clothes');
        }
        if ($request->hasFile('image_url2')) {
            $imagePaths[] = $request->file('image_url2')->store('clothes');
        }
        if ($request->hasFile('image_url3')) {
            $imagePaths[] = $request->file('image_url3')->store('clothes');
        }

        // Create a new Clothes instance
        $clothes = new Clothes([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'color' => $validatedData['color'],
            'size' => $validatedData['size'],
            'category' => $validatedData['category'],
            'gender' => $validatedData['gender'],
            'brand' => $validatedData['brand'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'image_url1' => $imagePaths[0] ?? null,
            'image_url2' => $imagePaths[1] ?? null,
            'image_url3' => $imagePaths[2] ?? null,
        ]);

        // Save the Clothes instance
        auth()->user()->clothes()->save($clothes);

        // Redirect to the index page or show a success message
        return redirect()->route('clothes.index')->with('success', 'Clothes added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clothes = Clothes::findOrFail($id);
        return view('clothes.show', compact('clothes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clothes = Clothes::findOrFail($id);
        return view('clothes.edit', compact('clothes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the Clothes instance
        $clothes = Clothes::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'color' => 'required|string',
            'size' => 'required|string',
            'category' => 'nullable|string',
            'gender' => 'nullable|string',
            'brand' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url1' => 'nullable|image|max:2048',
            'image_url2' => 'nullable|image|max:2048',
            'image_url3' => 'nullable|image|max:2048',
        ]);

        // Update the Clothes instance with the new data
        $clothes->update([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'color' => $validatedData['color'],
            'size' => $validatedData['size'],
            'category' => $validatedData['category'],
            'gender' => $validatedData['gender'],
            'brand' => $validatedData['brand'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
        ]);

        // Handle the image uploads if provided
        $imagePaths = [];
        if ($request->hasFile('image_url1')) {
            $imagePaths[] = $request->file('image_url1')->store('clothes');
        }
        if ($request->hasFile('image_url2')) {
            $imagePaths[] = $request->file('image_url2')->store('clothes');
        }
        if ($request->hasFile('image_url3')) {
            $imagePaths[] = $request->file('image_url3')->store('clothes');
        }

        // Update the image URLs if new images were uploaded
        if (!empty($imagePaths)) {
            $clothes->update([
                'image_url1' => $imagePaths[0] ?? null,
                'image_url2' => $imagePaths[1] ?? null,
                'image_url3' => $imagePaths[2] ?? null,
            ]);
        }

        // Redirect to the index page or show a success message
        return redirect()->route('clothes.index')->with('success', 'Clothes updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the Clothes instance
        $clothes = Clothes::findOrFail($id);

        // Delete the image files associated with the Clothes instance if they exist
        $imageUrls = [$clothes->image_url1, $clothes->image_url2, $clothes->image_url3];
        foreach ($imageUrls as $imageUrl) {
            if (!empty($imageUrl)) {
                Storage::delete($imageUrl);
            }
        }

        // Delete the Clothes instance
        $clothes->delete();

        // Redirect to the index page or show a success message
        return redirect()->route('clothes.index')->with('success', 'Clothes deleted successfully.');
    }
}
