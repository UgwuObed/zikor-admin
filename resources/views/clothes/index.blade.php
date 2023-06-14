@extends('layouts.app')

@section('content')
    <h1>Clothes List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Color</th>
                <th>Size</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clothes as $clothing)
                <tr>
                    <td>{{ $clothing->name }}</td>
                    <td>{{ $clothing->type }}</td>
                    <td>{{ $clothing->color }}</td>
                    <td>{{ $clothing->size }}</td>
                    <td>{{ $clothing->brand }}</td>
                    <td>{{ $clothing->price }}</td>
                    <td>
                        <a href="{{ route('clothes.show', $clothing->id) }}">View</a>
                        <a href="{{ route('clothes.edit', $clothing->id) }}">Edit</a>
                        <form action="{{ route('clothes.destroy', $clothing->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('clothes.create') }}">Add New Clothes</a>
@endsection
