@extends('layouts.base')

@section('title','Categories')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Categories</h1>
    
    <a href="{{ route('category.create') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 mb-4">Create New Category</a>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @foreach ($categories as $category)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $category->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $category->description }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('category.edit', $category->id) }}" class="text-yellow-500 hover:text-yellow-600 mr-2">Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection