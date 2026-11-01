
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang - GudangKu</title>
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
            max-width: 1100px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 8px;
        }

        p {
            color: #64748b;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .card {
            padding: 22px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 10px #00000008;
            overflow-x: auto;
        }

        .success {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 8px;
            background: #dcfce7;
            color: #166534;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background: #f8fafc;
        }

        .empty {
            padding: 30px;
            text-align: center;
            color: #64748b;
        }

        .action {
            color: #2563eb;
            text-decoration: none;
            margin-right: 10px;
        }

        .delete {
            display: inline;
        }

        .delete button {
            padding: 0;
            border: none;
            background: none;
            color: #dc2626;
            cursor: pointer;
            font-size: inherit;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>Data Barang</h1>
                <p>Kelola barang yang tersimpan di gudang kamu.</p>
            </div>

            <a href="{{ route('products.create') }}" class="btn">
                + Tambah Barang
            </a>
        </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <h3>Daftar Barang</h3>

            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>Rp {{ number_format($product->purchase_price, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($product->selling_price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a class="action"
                                   href="{{ route('products.edit', $product) }}">
                                    Edit
                                </a>

                                <form class="delete"
                                      action="{{ route('products.destroy', $product) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty">
                                Belum ada barang. Klik tombol Tambah Barang
                                untuk memasukkan data pertama.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <p>
            <a href="{{ url('/') }}">← Kembali ke Dashboard</a>
        </p>
    </div>
</body>
</html>
