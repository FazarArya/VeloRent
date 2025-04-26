<!DOCTYPE html>
<html>

<head>
    <title>History Pesanan</title>
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
            margin-bottom: 30px;
        }

        .header h1 {
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 11px;
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
            text-align: center;
            font-size: 11px;
            color: #666;
            margin-top: 20px;
        }

        .summary {
            margin-top: 15px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>History Pesanan</h1>
        <p>{{ now()->format('d M Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 8%">ID</th>
                <th style="width: 12%">Tanggal</th>
                <th style="width: 20%">Nama</th>
                <th style="width: 20%">Jenis Kendaraan</th>
                <th style="width: 25%">Kendaraan</th>
                <th style="width: 10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                    <td>{{ $item->nama }}</td>
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
        <div>Total Pesanan: {{ $pesanan->count() }}</div>
    </div>

    <div class="footer">
        Dicetak pada {{ now()->format('d M Y H:i') }}
    </div>
</body>

</html>
