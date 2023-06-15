@extends('layouts.app')

@section('content')
    <h1>{{ $shoes->name }}</h1>

    <p>Type: {{ $shoes->type }}</p>
    <p>Color: {{ $shoes->color }}</p>
    <p>Size: {{ $shoes->size }}</p>
    <p>Brand: {{ $shoes->brand }}</p>
    <p>Price: {{ $shoes->price }}</p>
    <p>Description: {{ $shoes->description }}</p>
    <p>Category: {{ $shoes->category }}</p>
    <p>Gender: {{ $shoes->gender }}</p>

    <!-- Display the images if they exist -->
    @if ($shoes->image_url1) 
        <img src="{{ asset('storage/' . $shoes->image_url1) }}" alt="Image 1">
    @endif
    @if ($shoes->image_url2)
        <img src="{{ asset('storage/' . $shoes->image_url2) }}" alt="Image 2">
    @endif
    @if ($shoes->image_url3)
        <img src="{{ asset('storage/' . $shoes->image_url3) }}" alt="Image 3">
    @endif

    <a href="{{ route('shoes.edit', $shoes->id) }}">Edit</a>
@endsection
