@extends('layouts.app')

@section('content')
    <h1>{{ $clothes->name }}</h1>

    <p>Type: {{ $clothes->type }}</p>
    <p>Color: {{ $clothes->color }}</p>
    <p>Size: {{ $clothes->size }}</p>
    <p>Brand: {{ $clothes->brand }}</p>
    <p>Price: {{ $clothes->price }}</p>
    <p>Description: {{ $clothes->description }}</p>
    <p>Category: {{ $clothes->category }}</p>
    <p>Gender: {{ $clothes->gender }}</p>

    <!-- Display the images if they exist -->
    @if ($clothes->image_url1) 
        <img src="{{ asset('storage/' . $clothes->image_url1) }}" alt="Image 1">
    @endif
    @if ($clothes->image_url2)
        <img src="{{ asset('storage/' . $clothes->image_url2) }}" alt="Image 2">
    @endif
    @if ($clothes->image_url3)
        <img src="{{ asset('storage/' . $clothes->image_url3) }}" alt="Image 3">
    @endif

    <a href="{{ route('clothes.edit', $clothes->id) }}">Edit</a>
@endsection
