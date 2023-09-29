<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAUT</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <h1>DATA ASLI</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kehadiran</th>
                <th>Kemampuan</th>
                <th>Kinerja</th>
                <th>Keaktifan</th>
                <th>Kontribusi</th>
                <th>Cuti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kehadiran }}</td>
                    <td>{{ $item->kemampuan }}</td>
                    <td>{{ $item->kinerja }}</td>
                    <td>{{ $item->keaktifan }}</td>
                    <td>{{ $item->kontribusi }}</td>
                    <td>{{ $item->cuti }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>DATA ALTERNATIF</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kehadiran</th>
                <th>Kemampuan</th>
                <th>Kinerja</th>
                <th>Keaktifan</th>
                <th>Kontribusi</th>
                <th>Cuti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alternatif->kehadiran }}</td>
                    <td>{{ $item->alternatif->kemampuan }}</td>
                    <td>{{ $item->alternatif->kinerja }}</td>
                    <td>{{ $item->alternatif->keaktifan }}</td>
                    <td>{{ $item->alternatif->kontribusi }}</td>
                    <td>{{ $item->alternatif->cuti }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>DATA NORMALISASI</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kehadiran</th>
                <th>Kemampuan</th>
                <th>Kinerja</th>
                <th>Keaktifan</th>
                <th>Kontribusi</th>
                <th>Cuti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->normalisasi->kehadiran }}</td>
                    <td>{{ $item->normalisasi->kemampuan }}</td>
                    <td>{{ $item->normalisasi->kinerja }}</td>
                    <td>{{ $item->normalisasi->keaktifan }}</td>
                    <td>{{ $item->normalisasi->kontribusi }}</td>
                    <td>{{ $item->normalisasi->cuti }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>DATA VX</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kehadiran</th>
                <th>Kemampuan</th>
                <th>Kinerja</th>
                <th>Keaktifan</th>
                <th>Kontribusi</th>
                <th>Cuti</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->vx->kehadiran }}</td>
                    <td>{{ $item->vx->kemampuan }}</td>
                    <td>{{ $item->vx->kinerja }}</td>
                    <td>{{ $item->vx->keaktifan }}</td>
                    <td>{{ $item->vx->kontribusi }}</td>
                    <td>{{ $item->vx->cuti }}</td>
                    <td>{{ $item->vx->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>DATA RANKING</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Total</th>
                <th>Ranking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->vx->total }}</td>
                    <td>{{ $item->ranking }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
