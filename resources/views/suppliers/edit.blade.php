
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier - GudangKu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px #00000012;
        }

        h1 { margin-top: 0; }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, textarea {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .save {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #e5e7eb;
            color: #333;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Supplier</h1>
        <p>Perbarui informasi supplier di bawah ini.</p>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nama Supplier</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $supplier->name) }}"
                required
            >

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $supplier->email) }}"
            >

            <label for="phone">Nomor Telepon</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $supplier->phone) }}"
            >

            <label for="address">Alamat</label>
            <textarea id="address" name="address">{{ old('address', $supplier->address) }}</textarea>

            <button type="submit" class="btn save">Simpan Perubahan</button>
            <a href="{{ route('suppliers.index') }}" class="btn back">Kembali</a>
        </form>
    </div>
</body>
</html>
