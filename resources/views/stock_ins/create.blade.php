
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f5f6fa;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
        }
        button {
            margin-top: 20px;
            padding: 10px 16px;
            background: #198754;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .back {
            display: inline-block;
            margin-top: 15px;
            color: #198754;
        }
        .error {
            color: #b02a37;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Stok Masuk</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('stock-ins.store') }}" method="POST">
            @csrf

            <label for="date">Tanggal Masuk</label>
            <input type="date" id="date" name="date"
                value="{{ old('date', date('Y-m-d')) }}" required>

            <label for="product_id">Produk</label>
            <select id="product_id" name="product_id" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        @selected(old('product_id') == $product->id)>
                        {{ $product->name }} (Stok: {{ $product->stock }})
                    </option>
                @endforeach
            </select>

            <label for="supplier_id">Pemasok (opsional)</label>
            <select id="supplier_id" name="supplier_id">
                <option value="">-- Pilih Pemasok --</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}"
                        @selected(old('supplier_id') == $supplier->id)>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>

            <label for="quantity">Jumlah Masuk</label>
            <input type="number" id="quantity" name="quantity"
                min="1" value="{{ old('quantity') }}" required>

            <label for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>

            <button type="submit">Simpan Stok Masuk</button>
        </form>

        <a class="back" href="{{ route('stock-ins.index') }}">
            ← Kembali ke Riwayat Stok Masuk
        </a>
    </div>
</body>
</html>
