@extends('layouts.app')

@section('content')
    <h1>{{ $food->name }}</h1>

    <p>Type: {{ $food->type }}</p>
    <p>Size: {{ $food->quantity }}</p>
    <p>Price: {{ $food->price }}</p>
    <p>Description: {{ $food->description }}</p>
    <p>Category: {{ $food->category }}</p>

    <!-- Display the images if they exist -->
    @if ($food->image_url1) 
        <img src="{{ asset('storage/' . $food->image_url1) }}" alt="Image 1">
    @endif
    @if ($food->image_url2)
        <img src="{{ asset('storage/' . $food->image_url2) }}" alt="Image 2">
    @endif
    @if ($food->image_url3)
        <img src="{{ asset('storage/' . $food->image_url3) }}" alt="Image 3">
    @endif

    <a href="{{ route('food.edit', $food->id) }}">Edit</a>
@endsection
