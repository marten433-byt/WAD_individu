
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier - GudangKu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h1 { margin-top: 0; }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th { background: #e9eef5; }

        .success {
            padding: 12px;
            background: #d1fae5;
            margin: 15px 0;
            border-radius: 5px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .edit { background: #d97706; }
        .delete { background: #dc2626; }
        .back { background: #64748b; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Supplier</h1>
        <p>Kelola data pemasok barang di GudangKu.</p>

        <a href="{{ route('suppliers.create') }}" class="btn">
            + Tambah Supplier
        </a>

        <a href="{{ url('/') }}" class="btn back">
            Kembali ke Dashboard
        </a>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($suppliers->isEmpty())
            <p>Belum ada data supplier. Silakan tambahkan supplier baru.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Supplier</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email ?? '-' }}</td>
                            <td>{{ $supplier->phone ?? '-' }}</td>
                            <td>{{ $supplier->address ?? '-' }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('suppliers.edit', $supplier->id) }}"
                                       class="btn edit">Edit</a>

                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus supplier ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
