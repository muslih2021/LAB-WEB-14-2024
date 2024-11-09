@extends('layouts.base')

@section('title', 'Products')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Products</h1>

    <a href="{{ route('product.create') }}" class="inline-block mb-4 px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        Create New Product
    </a>

    <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b text-left">Name</th>
                <th class="px-4 py-2 border-b text-left">Description</th>
                <th class="px-4 py-2 border-b text-left">Price</th>
                <th class="px-4 py-2 border-b text-left">Stock</th>
                <th class="px-4 py-2 border-b text-left">Category</th>
                <th class="px-4 py-2 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $product->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $product->description }}</td>
                    <td class="px-4 py-2 border-b">{{ $product->price }}</td>
                    <td class="px-4 py-2 border-b">{{ $product->stock }}</td>
                    <td class="px-4 py-2 border-b">{{ $product->category->name }}</td>
                    <td class="px-4 py-2 border-b space-x-2">
                        <a href="{{ route('product.edit', $product->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Edit
                        </a>

                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Delete
                            </button>
                        </form>

                        <form action="{{ route('product.decreaseStock', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="number" name="quantity" min="1" placeholder="Qty" required class="px-2 py-1 border rounded">
                            <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Sell
                            </button>
                        </form>

                        <form action="{{ route('product.increaseStock', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="number" name="quantity" min="1" placeholder="Qty" required class="px-2 py-1 border rounded">
                            <button type="submit" class="px-3 py-1 bg-yellow-600 text-white rounded hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                Restock
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection