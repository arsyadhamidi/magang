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
            padding: 20px;
            border-bottom: 1px solid black;
        }

        .header img {
            width: 100px;
            height: auto;
            margin-right: 15px;
        }

        .header-text {
            text-align: center;
            margin-top: -120px;
            margin-left: 60px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
            color: #333;
        }

        .header h2 {
            font-size: 16px;
            margin: 5px 0;
            color: #333;
        }

        .header p {
            margin: 5px 0;
            color: #333;
        }

        .header a {
            color: #007BFF; /* Warna biru untuk tautan */
            text-decoration: none; /* Menghilangkan garis bawah */
        }

        .header a:hover {
            text-decoration: underline; /* Garis bawah saat hover */
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
        <div class="header-text">
            <h1>KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA</h1>
            <h2>REPUBLIK INDONESIA</h2>
            <strong>KANTOR WILAYAH SUMATERA BARAT</strong>
            <p>Jalan S. Parman Nomor 256 Padang</p>
            <p>Telepon: 0751 7055471 - Faksimili: 0751 7055471</p>
            <p>Lamaran: <a href="http://sumbar.kemenkumham.go.id">http://sumbar.kemenkumham.go.id</a></p>
        </div>
    </div>
    <table style="width: 100%; border: none;">
        <tr style="border: none;">
            <td style="width: 15%; border: none;">Hal</td>
            <td style="width: 3%; border: none;">:</td>
            <td style="border: none;">REKAP DATA PERIZINAN MAGANG</td>
        </tr>
    </table>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>TTL</th>
            <th>JK</th>
            <th>Telepon</th>
            <th>Universitas</th>
            <th>Status</th>
        </tr>
        @foreach ($izins as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama ?? '-' }}</td>
                <td>{{ $data->tmp_lahir ?? '-' }}, {{ $data->tgl_lahir ?? '-' }}</td>
                <td>{{ $data->jk ?? '-' }}</td>
                <td>{{ $data->telepon ?? '-' }}</td>
                <td>{{ $data->universitas ?? '-' }}</td>
                <td>{{ $data->status ?? '-' }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
