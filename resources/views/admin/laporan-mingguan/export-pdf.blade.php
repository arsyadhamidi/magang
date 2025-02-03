<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
            background-color: #f8f9fa;
            border-bottom: 2px solid #20c997;
            height: 50px;
        }

        .header img {
            width: 50px;
            height: auto;
            margin-right: 15px;
            float: left;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
            margin-left: 50px;
            float: left;
        }

        .judul h1 {
            margin: 20px 30px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #20c997;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Responsive styling */
        @media (max-width: 600px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" alt="Logo Kemenkumham">
        <h1>Kementerian Hukum dan Hak Asasi Manusia Sumatera Barat</h1>
    </div>
    <div class="judul">
        <h1>REKAP DATA LAPORAN MINGGUAN</h1>
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Nilai</th>
            <th>Status</th>
        </tr>
        @foreach ($mingguans as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->users->name ?? '-' }}</td>
                <td>{{ $data->tgl_laporan ?? '-' }}</td>
                <td>{{ $data->nilai ?? '-' }}</td>
                <td>{{ $data->status ?? '-' }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
