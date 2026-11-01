
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Stok Keluar - GudangKu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f5f6fa;
            color: #333;
        }
        h1 {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #dc3545;
            color: white;
        }
        .success {
            padding: 12px;
            background: #d1e7dd;
            color: #0f5132;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Riwayat Stok Keluar</h1>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('stock-outs.create') }}" class="button">
        + Tambah Stok Keluar
    </a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama Produk</th>
                <th>Jumlah Keluar</th>
                <th>Penerima</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stockOuts as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->date->format('d-m-Y') }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->recipient ?? '-' }}</td>
                    <td>{{ $item->notes ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data stok keluar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
