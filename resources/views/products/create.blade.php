
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - GudangKu</title>
    <style>
        * {
            box-sizing: border-box;
        }

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

        h1 {
            margin-top: 0;
        }

        .field {
            margin-bottom: 18px;
        }

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

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 15px;
        }

        .cancel {
            margin-left: 8px;
            background: #e2e8f0;
            color: #1e293b;
        }

        .error {
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 7px;
            background: #fee2e2;
            color: #991b1b;
        }

        .hint {
            color: #64748b;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Tambah Barang</h1>
            <p>Isi informasi barang yang ingin dimasukkan ke gudang.</p>

            @if ($errors->any())
                <div class="error">
                    <strong>Periksa kembali data berikut:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="category_id">Kategori *</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">-- Pilih kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="hint">Kategori harus dibuat terlebih dahulu.</p>
                </div>

                <div class="field">
                    <label for="code">Kode Barang *</label>
                    <input type="text" id="code" name="code"
                           value="{{ old('code') }}"
                           placeholder="Contoh: BRG001" required>
                </div>

                <div class="field">
                    <label for="name">Nama Barang *</label>
                    <input type="text" id="name" name="name"
                           value="{{ old('name') }}"
                           placeholder="Contoh: Mouse Wireless" required>
                </div>

                <div class="field">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description"
                              placeholder="Keterangan barang (opsional)">{{ old('description') }}</textarea>
                </div>

                <div class="field">
                    <label for="purchase_price">Harga Beli (Rp) *</label>
                    <input type="number" id="purchase_price"
                           name="purchase_price"
                           value="{{ old('purchase_price', 0) }}"
                           min="0" step="0.01" required>
                </div>

                <div class="field">
                    <label for="selling_price">Harga Jual (Rp) *</label>
                    <input type="number" id="selling_price"
                           name="selling_price"
                           value="{{ old('selling_price', 0) }}"
                           min="0" step="0.01" required>
                </div>

                <div class="field">
                    <label for="stock">Stok Awal *</label>
                    <input type="number" id="stock" name="stock"
                           value="{{ old('stock', 0) }}"
                           min="0" step="1" required>
                </div>

                <button type="submit" class="btn">Simpan Barang</button>
                <a href="{{ route('products.index') }}" class="btn cancel">
                    Batal
                </a>
            </form>
        </div>
    </div>
</body>
</html>
