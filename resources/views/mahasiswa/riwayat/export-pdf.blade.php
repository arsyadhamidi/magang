<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Izin Magang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .content {
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
        }

        .signature {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Surat Izin Magang</h1>
            <p>No: {{ $countIzins ?? '0' }}/SM/{{ date('Y') }}</p>
        </div>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini:</p>
            <p>Nama: <strong>Sintia Oktrina</strong><br>
                Jabatan: <strong>Kepala Jurusan</strong><br>
                Alamat: <strong>Jl. Prof. Dr. Hamka</strong></p>

            <p>Dengan ini memberikan izin kepada:</p>
            <p>Nama: <strong>{{ $izins->mahasiswa->nama ?? '-' }}</strong><br>
                NIM: <strong>{{ $izins->mahasiswa->nim ?? '-' }}</strong><br>
                Jurusan: <strong>{{ $izins->mahasiswa->jurusan ?? '-' }}</strong><br>
                Perguruan Tinggi: <strong>{{ $izins->mahasiswa->universitas ?? '-' }}</strong></p>

            <p>Untuk melakukan magang di instansi kami selama:</p>
            <p>Mulai: <strong>{{ \Carbon\Carbon::parse($izins->tgl_mulai)->translatedFormat('d F Y') }}</strong><br>
                Selesai: <strong>{{ \Carbon\Carbon::parse($izins->tgl_selesai)->translatedFormat('d F Y') }}</strong>
            </p>

            <p>Demikian surat izin magang ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="footer">
            <p>Padang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        </div>

        <div class="signature">
            <p>Kepala Instansi</p>
            <p>Sintia Oktarina</p>
        </div>
    </div>

</body>

</html>
