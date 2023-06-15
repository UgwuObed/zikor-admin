@extends('layouts.app')

@section('content')
    <h1>Shoes List</h1>

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
            @foreach ($shoes as $shoeing)
                <tr>
                    <td>{{ $shoeing->name }}</td>
                    <td>{{ $shoeing->type }}</td>
                    <td>{{ $shoeing->color }}</td>
                    <td>{{ $shoeing->size }}</td>
                    <td>{{ $shoeing->brand }}</td>
                    <td>{{ $shoeing->price }}</td>
                    <td>
                        <a href="{{ route('shoes.show', $shoeing->id) }}">View</a>
                        <a href="{{ route('shoes.edit', $shoeing->id) }}">Edit</a>
                        <form action="{{ route('shoes.destroy', $shoeing->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('shoes.create') }}">Add New Shoes</a>
@endsection
