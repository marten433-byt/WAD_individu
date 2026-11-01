<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockInController extends Controller
{
    public function index()
    {
        $stockIns = StockIn::with(['product', 'supplier'])
            ->latest()
            ->get();

        return view('stock_ins.index', compact('stockIns'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        $suppliers = Supplier::orderBy('name')->get();

        return view('stock_ins.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        DB::transaction(function () use ($validated) {
            $product = Product::whereKey($validated['product_id'])
                ->lockForUpdate()
                ->firstOrFail();

            StockIn::create($validated);

            $product->increment('stock', $validated['quantity']);
        });

        return redirect()
            ->route('stock-ins.index')
            ->with('success', 'Data stok masuk berhasil disimpan.');
    }
}