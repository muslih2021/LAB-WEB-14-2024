@extends('layouts.base')

@section('title', 'Inventory Logs')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Inventory Logs</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left bg-gray-200">Product</th>
                <th class="px-4 py-2 text-left bg-gray-200">Type</th>
                <th class="px-4 py-2 text-left bg-gray-200">Quantity</th>
                <th class="px-4 py-2 text-left bg-gray-200">Date</th>
                <th class="px-4 py-2 text-left bg-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $log->product->name }}</td>
                    <td class="px-4 py-2">{{ $log->type }}</td>
                    <td class="px-4 py-2">{{ $log->quantity }}</td>
                    <td class="px-4 py-2">{{ $log->created_at->format('d-m-Y H:i') }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('inventorylog.destroy', $log->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 focus:outline-none">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection