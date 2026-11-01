<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StockOutController extends Controller
{
    public function index()
    {
        $stockOuts = StockOut::with('product')
            ->latest()
            ->get();

        return view('stock_outs.index', compact('stockOuts'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('stock_outs.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'recipient' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        DB::transaction(function () use ($validated) {
            $product = Product::whereKey($validated['product_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($product->stock < $validated['quantity']) {
                throw ValidationException::withMessages([
                    'quantity' => 'Stok produk tidak mencukupi.',
                ]);
            }

            StockOut::create($validated);

            $product->decrement('stock', $validated['quantity']);
        });

        return redirect()
            ->route('stock-outs.index')
            ->with('success', 'Data stok keluar berhasil disimpan.');
    }
}
