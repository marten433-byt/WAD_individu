
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GudangKu - Dashboard</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { background: #f4f7fb; color: #1e293b; }
        .layout { display: flex; min-height: 100vh; }
        .sidebar { width: 245px; flex-shrink: 0; background: #173b68; color: white; padding: 28px 18px; }
        .brand { font-size: 25px; font-weight: bold; margin-bottom: 38px; }
        .brand span { color: #75d5ff; }
        .menu-title { color: #b9cce3; font-size: 12px; margin: 24px 12px 10px; }
        .menu a { display: block; padding: 12px; margin-bottom: 6px; color: #e5edf8; text-decoration: none; border-radius: 8px; }
        .menu a.active, .menu a:hover { background: #285587; color: white; }
        main { flex: 1; padding: 32px; min-width: 0; }
        .topbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 30px; }
        .topbar h1 { font-size: 28px; margin-bottom: 8px; }
        .muted { color: #64748b; font-size: 14px; }
        .profile { background: white; padding: 12px 16px; border-radius: 10px; font-size: 14px; }
        .cards { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 18px; margin-bottom: 28px; }
        .card { background: white; padding: 23px; border-radius: 14px; box-shadow: 0 3px 12px #0f172a0a; }
        .card-label { color: #64748b; font-size: 14px; margin-bottom: 18px; }
        .card-number { font-size: 29px; font-weight: bold; margin-bottom: 8px; }
        .blue { color: #2563eb; }
        .green { color: #159669; }
        .orange { color: #d97706; }
        .red { color: #dc4545; }
        .content-card { background: white; padding: 24px; border-radius: 14px; box-shadow: 0 3px 12px #0f172a0a; }
        .content-card h2 { font-size: 19px; margin-bottom: 8px; }
        .content-card p { line-height: 1.7; color: #64748b; }
        .actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 20px; }
        .actions a { padding: 12px 16px; background: #2563eb; color: white; border-radius: 8px; text-decoration: none; font-size: 14px; }
        .actions a:hover { background: #1d4ed8; }
        footer { margin-top: 25px; color: #94a3b8; font-size: 13px; }
        @media (max-width: 1000px) { .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 600px) {
            .layout { flex-direction: column; }
            .sidebar { width: 100%; }
            .brand { margin-bottom: 20px; }
            main { padding: 20px; }
            .topbar { align-items: flex-start; flex-direction: column; }
            .cards { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand">Gudang<span>Ku.</span></div>

            <nav class="menu">
                <div class="menu-title">MENU UTAMA</div>
                <a href="/" class="active">▦ &nbsp; Dashboard</a>
                <a href="{{ route('products.index') }}">▤ &nbsp; Data Barang</a>
                <a href="{{ route('products.create') }}">▧ &nbsp; Tambah Barang</a>
                <a href="{{ route('suppliers.index') }}">♙ &nbsp; Supplier</a>

                <div class="menu-title">TRANSAKSI</div>
                <a href="{{ route('stock-ins.index') }}">＋ &nbsp; Barang Masuk</a>
                <a href="{{ route('stock-outs.index') }}">− &nbsp; Barang Keluar</a>

                <div class="menu-title">LAINNYA</div>
                <a href="{{ route('products.index') }}">▥ &nbsp; Laporan Barang</a>
            </nav>
        </aside>

        <main>
            <header class="topbar">
                <div>
                    <h1>Dashboard</h1>
                    <p class="muted">Selamat datang di sistem inventaris GudangKu.</p>
                </div>
                <div class="profile">Administrator</div>
            </header>

            <section class="cards">
                <div class="card">
                    <p class="card-label">Total Jenis Barang</p>
                    <div class="card-number blue">{{ \App\Models\Product::count() }}</div>
                    <p class="muted">Barang terdaftar</p>
                </div>

                <div class="card">
                    <p class="card-label">Total Kategori</p>
                    <div class="card-number green">{{ \App\Models\Category::count() }}</div>
                    <p class="muted">Kategori barang</p>
                </div>

                <div class="card">
                    <p class="card-label">Barang Masuk</p>
                    <div class="card-number orange">{{ \App\Models\StockIn::count() }}</div>
                    <p class="muted">Transaksi masuk</p>
                </div>

                <div class="card">
                    <p class="card-label">Barang Keluar</p>
                    <div class="card-number red">{{ \App\Models\StockOut::count() }}</div>
                    <p class="muted">Transaksi keluar</p>
                </div>
            </section>

            <section class="content-card">
                <h2>Selamat datang di GudangKu 👋</h2>
                <p>
                    GudangKu membantu mengelola persediaan barang dengan lebih mudah.
                    Kamu bisa mencatat barang, menyimpan data supplier, dan memantau
                    transaksi barang masuk maupun keluar.
                </p>

                <div class="actions">
                    <a href="{{ route('products.create') }}">+ Tambah Barang</a>
                    <a href="{{ route('stock-ins.create') }}">+ Catat Barang Masuk</a>
                    <a href="{{ route('stock-outs.create') }}">− Catat Barang Keluar</a>
                </div>
            </section>

            <footer>GudangKu &copy; 2026 — Sistem Manajemen Inventaris</footer>
        </main>
    </div>
</body>
</html>
