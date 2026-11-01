
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catat Barang Keluar - GudangKu</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1e293b;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 650px;
            margin: 0 auto;
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0f172a0a;
        }
        h1 { margin-top: 0; }
        label {
            display: block;
            margin: 16px 0 7px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
        }
        textarea { min-height: 90px; }
        .button {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }
        .submit { background: #dc3545; color: white; margin-top: 20px; }
        .back { background: #e2e8f0; color: #1e293b; }
        .error { color: #dc2626; font-size: 13px; margin-top: 5px; }
        .alert { background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 6px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Catat Barang Keluar</h1>
        <p>Isi formulir untuk mencatat barang yang keluar dari gudang.</p>

        @if ($errors->any())
            <div class="alert">
                <strong>Periksa kembali data berikut:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('stock-outs.store') }}" method="POST">
            @csrf

            <label for="product_id">Nama Barang</label>
            <select id="product_id" name="product_id" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} (Stok: {{ $product->stock }})
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="quantity">Jumlah Barang Keluar</label>
            <input type="number" id="quantity" name="quantity"
                   min="1" value="{{ old('quantity', 1) }}" required>
            @error('quantity')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="date">Tanggal Keluar</label>
            <input type="date" id="date" name="date"
                   value="{{ old('date', date('Y-m-d')) }}" required>
            @error('date')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="recipient">Penerima</label>
            <input type="text" id="recipient" name="recipient"
                   value="{{ old('recipient') }}"
                   placeholder="Nama penerima (opsional)">
            @error('recipient')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="notes">Catatan</label>
            <textarea id="notes" name="notes"
                      placeholder="Catatan tambahan (opsional)">{{ old('notes') }}</textarea>
            @error('notes')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit" class="button submit">Simpan Barang Keluar</button>
            <a href="{{ route('stock-outs.index') }}" class="button back">Kembali</a>
        </form>
    </div>
</body>
</html>
