
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - GudangKu</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1e293b;
        }
        .container {
            max-width: 750px;
            margin: auto;
        }
        .card {
            padding: 25px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 10px #00000008;
        }
        .field { margin-bottom: 18px; }
        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 15px;
        }
        textarea { min-height: 90px; }
        .btn {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .cancel {
            margin-left: 8px;
            background: #e2e8f0;
            color: #1e293b;
        }
        .errors {
            padding: 12px;
            margin-bottom: 15px;
            background: #fee2e2;
            color: #991b1b;
            border-radius: 7px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Edit Barang</h1>
        <p>Ubah informasi barang yang ingin diperbarui.</p>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="category_id">Kategori *</label>
                <select id="category_id" name="category_id" required>
                    <option value="">-- Pilih kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @selected(old('category_id', $product->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="code">Kode Barang *</label>
                <input id="code" name="code" type="text"
                    value="{{ old('code', $product->code) }}" required>
            </div>

            <div class="field">
                <label for="name">Nama Barang *</label>
                <input id="name" name="name" type="text"
                    value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="field">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="field">
                <label for="purchase_price">Harga Beli (Rp) *</label>
                <input id="purchase_price" name="purchase_price" type="number"
                    min="0" step="0.01"
                    value="{{ old('purchase_price', $product->purchase_price) }}" required>
            </div>

            <div class="field">
                <label for="selling_price">Harga Jual (Rp) *</label>
                <input id="selling_price" name="selling_price" type="number"
                    min="0" step="0.01"
                    value="{{ old('selling_price', $product->selling_price) }}" required>
            </div>

            <div class="field">
                <label for="stock">Stok *</label>
                <input id="stock" name="stock" type="number"
                    min="0" step="1"
                    value="{{ old('stock', $product->stock) }}" required>
            </div>

            <button type="submit" class="btn">Simpan Perubahan</button>
            <a href="{{ route('products.index') }}" class="btn cancel">Batal</a>
        </form>
    </div>
</div>
</body>
</html>
