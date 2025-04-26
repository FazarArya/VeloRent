<!DOCTYPE html>
<html>

<head>
    <title>Detail Pesanan #{{ $pesanan->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #ddd;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 150px auto;
            margin-bottom: 5px;
        }

        .label {
            font-weight: bold;
            color: #666;
        }

        .status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .status-pending {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .status-approved {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-rejected {
            background-color: #FEE2E2;
            color: #991B1B;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Detail Pesanan #{{ $pesanan->id }}</h1>
        <p>{{ $pesanan->created_at->format('d M Y H:i') }}</p>
    </div>

    <div class="section">
        <div class="section-title">Informasi Pesanan</div>
        <div class="info-grid">
            <div class="label">ID Pesanan</div>
            <div>{{ $pesanan->id }}</div>
        </div>
        <div class="info-grid">
            <div class="label">Status</div>
            <div>
                <span class="status status-{{ $pesanan->status }}">
                    {{ ucfirst($pesanan->status) }}
                </span>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informasi Pelanggan</div>
        <div class="info-grid">
            <div class="label">Nama</div>
            <div>{{ $pesanan->nama }}</div>
        </div>
        <div class="info-grid">
            <div class="label">Email</div>
            <div>{{ $pesanan->email }}</div>
        </div>
        <div class="info-grid">
            <div class="label">No HP</div>
            <div>{{ $pesanan->no_hp }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informasi Kendaraan</div>
        <div class="info-grid">
            <div class="label">Jenis Kendaraan</div>
            <div>{{ ucfirst($pesanan->katalog->jenis_kendaraan) }}</div>
        </div>
        <div class="info-grid">
            <div class="label">Pilihan Kendaraan</div>
            <div>{{ ucfirst(str_replace('_', ' ', $pesanan->katalog->nama_kendaraan)) }}</div>
        </div>
    </div>

    <div class="section">
        <p style="color: #666; font-size: 12px; text-align: center; margin-top: 50px;">
            Dokumen ini dicetak pada {{ now()->format('d M Y H:i') }}
        </p>
    </div>
</body>

</html>
