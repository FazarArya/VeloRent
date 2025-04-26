<!DOCTYPE html>
<html>

<head>
    <title>Detail Pesanan #{{ $pesanan->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }

        .info-section {
            margin-bottom: 25px;
        }

        .info-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #eee;
        }

        .info-grid {
            margin-bottom: 5px;
        }

        .info-label {
            font-weight: bold;
            color: #666;
            width: 150px;
            display: inline-block;
        }

        .status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
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

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Detail Pesanan #{{ $pesanan->id }}</h1>
        <p style="color: #666;">Tanggal: {{ $pesanan->created_at->format('d M Y H:i') }}</p>
    </div>

    <div class="info-section">
        <div class="info-title">Status Pesanan</div>
        <div class="info-grid">
            <span class="info-label">Status:</span>
            <span class="status status-{{ $pesanan->status }}">
                {{ ucfirst($pesanan->status) }}
            </span>
        </div>
    </div>

    <div class="info-section">
        <div class="info-title">Informasi Pelanggan</div>
        <div class="info-grid">
            <span class="info-label">Nama:</span>
            <span>{{ $pesanan->nama }}</span>
        </div>
        <div class="info-grid">
            <span class="info-label">Email:</span>
            <span>{{ $pesanan->email }}</span>
        </div>
        <div class="info-grid">
            <span class="info-label">No. Handphone:</span>
            <span>{{ $pesanan->no_hp }}</span>
        </div>
    </div>

    <div class="info-section">
        <div class="info-title">Informasi Kendaraan</div>
        <div class="info-grid">
            <span class="info-label">Jenis Kendaraan:</span>
            <span>{{ ucfirst($pesanan->katalog->jenis_kendaraan) }}</span>
        </div>
        <div class="info-grid">
            <span class="info-label">Pilihan Kendaraan:</span>
            <span>{{ ucfirst(str_replace('_', ' ', $pesanan->katalog->nama_kendaraan)) }}</span>
        </div>
    </div>

    <div class="info-section">
        <div class="info-title">Informasi Tambahan</div>
        <div class="info-grid">
            <span class="info-label">Tanggal Dibuat:</span>
            <span>{{ $pesanan->created_at->format('d M Y H:i') }}</span>
        </div>
        <div class="info-grid">
            <span class="info-label">Terakhir Update:</span>
            <span>{{ $pesanan->updated_at->format('d M Y H:i') }}</span>
        </div>
    </div>

    <div class="footer">
        <p>Dokumen ini dicetak pada {{ now()->format('d M Y H:i') }}</p>
        <p>Wheelzy Rental - Sistem Penyewaan Kendaraan</p>
    </div>
</body>

</html>
