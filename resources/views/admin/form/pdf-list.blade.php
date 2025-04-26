<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pesanan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            margin: 1cm;
            size: landscape;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 15px;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 12px;
            color: #666;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
            font-size: 11px;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .status {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            display: inline-block;
            font-weight: bold;
        }

        .status-pending {
            background: #FEF3C7;
            color: #92400E;
        }

        .status-approved {
            background: #D1FAE5;
            color: #065F46;
        }

        .status-rejected {
            background: #FEE2E2;
            color: #991B1B;
        }

        .footer {
            text-align: right;
            font-size: 10px;
            color: #666;
            margin-top: 10px;
        }

        .summary {
            margin-top: 15px;
            text-align: right;
            font-size: 11px;
        }

        .summary-item {
            margin-bottom: 3px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Daftar Pesanan Kendaraan</h1>
        <div class="subtitle">
            Periode: {{ now()->format('d M Y') }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 4%">No</th>
                <th style="width: 7%">ID</th>
                <th style="width: 10%">Tanggal</th>
                <th style="width: 15%">Nama</th>
                <th style="width: 15%">Email</th>
                <th style="width: 10%">No HP</th>
                <th style="width: 12%">Jenis Kendaraan</th>
                <th style="width: 15%">Kendaraan</th>
                <th style="width: 8%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ ucfirst($item->katalog->jenis_kendaraan) }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $item->katalog->nama_kendaraan)) }}</td>
                    <td>
                        <span class="status status-{{ $item->status }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <div class="summary-item">Total Pesanan: {{ $pesanan->count() }}</div>
        <div class="summary-item">Pending: {{ $pesanan->where('status', 'pending')->count() }}</div>
        <div class="summary-item">Approved: {{ $pesanan->where('status', 'approved')->count() }}</div>
        <div class="summary-item">Rejected: {{ $pesanan->where('status', 'rejected')->count() }}</div>
    </div>

    <div class="footer">
        Dicetak pada: {{ now()->format('d M Y H:i') }}
    </div>
</body>

</html>
