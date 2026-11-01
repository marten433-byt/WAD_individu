
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier - GudangKu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h1 { margin-top: 0; }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .back { background: #64748b; }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Supplier</h1>
        <p>Masukkan informasi pemasok barang.</p>

        @if ($errors->any())
            <div class="error">
                <p>Periksa kembali data yang kamu masukkan:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf

            <label for="name">Nama Supplier *</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
                maxlength="255"
            >

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                maxlength="255"
            >

            <label for="phone">Nomor Telepon</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
                maxlength="20"
            >

            <label for="address">Alamat</label>
            <textarea
                id="address"
                name="address"
            >{{ old('address') }}</textarea>

            <button type="submit" class="btn">
                Simpan Supplier
            </button>

            <a href="{{ route('suppliers.index') }}" class="btn back">
            Kembali
            </a>
        </form>
    </div>
</body>
</html>
