<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryLog;
use App\Models\Product;

class InventoryLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = InventoryLog::query();

    if ($request->has('type')) {
        $query->where('type', $request->type);
    }
    $product = Product::all();

    $log = $query->with('product')->paginate(10);

    return view('log', compact('log','product'));
}
    
    public function destroy(InventoryLog $inventorylog)
    {
        try {
            $inventorylog->delete();
    
            return redirect()->route('inventorylog.index')->with('success', 'Log inventory berhasil dihapus.');
    
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus log: ' . $e->getMessage());
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all products to populate the dropdown in the form
        $product = Product::all();
    
        // Return the view with the products list
        return view('inventorylog.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:restock,sold',
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;

        // Create a new inventory log
        $inventoryLog = new InventoryLog();
        $inventoryLog->product_id = $product->id;
        $inventoryLog->quantity = $quantity;
        $inventoryLog->type = $request->type;
        $inventoryLog->date = now();
        $inventoryLog->save();

        // Adjust the product stock based on the type
        if ($request->type == 'restock') {
            $product->stock += $quantity;
        } elseif ($request->type == 'sold') {
            if ($product->stock < $request->quantity) {
                return redirect()->back()->with('error', "Stock Product gagal di kurang karena stock hanya ada 0");
            } else {
                $product->stock -= $request->quantity;
            }
        }

        $product->save();

        return redirect()->back()->with('success', 'Inventory log added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
