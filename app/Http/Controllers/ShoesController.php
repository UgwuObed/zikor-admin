<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoes;
use Illuminate\Support\Facades\Storage;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $shoes = $user->shoes;
        return view('shoes.index', compact('shoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shoes.create');
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
        $imagePaths[] = $request->file('image_url1')->store('shoes');
    }
    if ($request->hasFile('image_url2')) {
        $imagePaths[] = $request->file('image_url2')->store('shoes');
    }
    if ($request->hasFile('image_url3')) {
        $imagePaths[] = $request->file('image_url3')->store('shoes');
    }
     
    // Get the authenticated user
    $user = auth()->user();

    // Create a new shoes instance
    $shoes = new Shoes([
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
        'user_id' => $user->id,
    ]);
 
    // Save the shoes instance
    auth()->user()->shoes()->save($shoes);

    // Redirect to the index page or show a success message
    return redirect()->route('shoes.index')->with('success', 'Shoes added successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $shoes = Shoes::findOrFail($id);
        return view('shoes.show', compact('shoes'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shoes = auth()->user()->shoes()->findOrFail($id);
        return view('shoes.edit', compact('shoes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the shoes instance
        $shoes = auth()->user()->shoes()->findOrFail($id);

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

        // Update the shoes instance with the new data
        $shoes->update([
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
            $imagePaths[] = $request->file('image_url1')->store('shoes');
        }
        if ($request->hasFile('image_url2')) {
            $imagePaths[] = $request->file('image_url2')->store('shoes');
        }
        if ($request->hasFile('image_url3')) {
            $imagePaths[] = $request->file('image_url3')->store('shoes');
        }

        // Update the image URLs if new images were uploaded
        if (!empty($imagePaths)) {
            $shoes->update([
                'image_url1' => $imagePaths[0] ?? null,
                'image_url2' => $imagePaths[1] ?? null,
                'image_url3' => $imagePaths[2] ?? null,
            ]);
        }

        // Redirect to the index page or show a success message
        return redirect()->route('shoes.index')->with('success', 'Shoes updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the shoes instance
        $shoes = auth()->user()->clothes()->findOrFail($id);

        // Delete the image files associated with the Shoes instance if they exist
        $imageUrls = [$shoes->image_url1, $shoes->image_url2, $shoes->image_url3];
        foreach ($imageUrls as $imageUrl) {
            if (!empty($imageUrl)) {
                Storage::delete($imageUrl);
            }
        }

        // Delete the shoes instance
        $shoes->delete();

        // Redirect to the index page or show a success message
        return redirect()->route('shoes.index')->with('success', 'Shoes deleted successfully.');
    }
}