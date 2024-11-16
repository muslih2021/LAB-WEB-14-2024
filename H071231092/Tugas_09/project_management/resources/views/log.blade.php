<!-- resources/views/inventorylog.blade.php -->
@extends('layout.master')

@section('title', 'Inventory Log')
@section('header', 'Inventory Log')

@section('content')

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Error Message -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addInventoryLogModal">Add Category</button>

    <!-- Tabel Inventory Log -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($log as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->product->name }}</td>
                    <td>{{ $log->type }}</td>
                    <td>{{ $log->quantity }}</td>
                    <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <!-- Tombol untuk memicu modal -->
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteInventoryLogModal{{ $log->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
                <!-- Include Modal Delete Inventory Log -->
                @include('modals.delete_inventorylog', ['log' => $log])
            @endforeach
        </tbody>
    </table>


    @include('modals.add_inventorylog')
@endsection
