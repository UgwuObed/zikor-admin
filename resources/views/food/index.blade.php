@extends('layouts.app')

@section('content')
    <h1>Food List</h1>

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
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($food as $fooding)
                <tr>
                    <td>{{ $fooding->name }}</td>
                    <td>{{ $fooding->type }}</td>
                    <td>{{ $fooding->quantity }}</td>
                    <td>{{ $fooding->price }}</td>
                    <td>
                        <a href="{{ route('food.show', $fooding->id) }}">View</a>
                        <a href="{{ route('food.edit', $fooding->id) }}">Edit</a>
                        <form action="{{ route('food.destroy', $fooding->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('food.create') }}">Add New Shoes</a>
@endsection
