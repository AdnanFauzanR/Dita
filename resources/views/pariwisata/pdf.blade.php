<!DOCTYPE html>
<html>
<head>
    <style>
        .containerKop {
            width: 100%;
            height: 100;
        }

        .containerKop img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        p {
            text-align: center;
            text-width: 2;
            font-family:Arial, Helvetica, sans-serif;
            font-size: 16px;
        }

        .containerTitle {
            text-align: center;
            width: 300px;
            margin: 25px auto;
            margin-top: 0px;
        }

        .containerTitle p {
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            font-family:Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #4692FD;
            color: white;
        }
    </style>
</head>
<body>
    <div class="containerKop">
        <img src="{{ public_path('storage/Kop Laporan/kop_laporan.png') }}" alt="Kop Laporan"/>
    </div>
    <div class="containerTitle">
        <p>LAPORAN SUMBER DAYA ALAM SEKTOR PARIWISATA TAHUN {{ $year }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Wisata</th>
                <th>Jenis Wisata</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Total Wisatawan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->nama_wisata }}</td>
                    <td>{{ $item->jenis_wisata }}</td>
                    <td>{{ $item->kecamatan }}</td>
                    <td>{{ $item->desa }}</td>
                    <td>{{ $item->total_wisatawan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

