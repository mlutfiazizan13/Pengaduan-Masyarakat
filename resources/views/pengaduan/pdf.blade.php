<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table.paleBlueRows {
            font-family: Arial, Helvetica, sans-serif;
            border: 0px solid #FFFFFF;
            width: 100%;
            height: 200px;
            text-align: center;
            border-collapse: collapse;
        }
        table.paleBlueRows td, table.paleBlueRows th {
            border: 1px solid #FFFFFF;
            padding: 3px 3px;
        }
        table.paleBlueRows tbody td {
            font-size: 13px;
        }
        table.paleBlueRows tr:nth-child(even) {
            background: #D0E4F5;
        }
        table.paleBlueRows thead {
            background: #C4C4C4;
            border-bottom: 5px solid #FFFFFF;
        }
        table.paleBlueRows thead th {
            font-size: 17px;
            font-weight: bold;
            color: #000000;
            text-align: center;
            border-left: 2px solid #FFFFFF;
        }
        table.paleBlueRows thead th:first-child {
            border-left: none;
        }

        table.paleBlueRows tfoot td {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <table class="paleBlueRows">
        <thead>
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            {{-- {{ dd($d->Nik) }} --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nik }}</td>
                            <td>{{ $d->Nik->nama }}</td>
                            <td>{{ $d->Nik->telp }}</td>
                            <td>{{ $d->isi_laporan }}</td>
                            {{-- {{ dd(public_path("images/pengaduan/".$d->foto)) }} --}}
                            <td><img src="{{ public_path("images/pengaduan/".$d->foto) }}" alt="" style="width: 150px"></td>
                            <td class="text-center">
                                @if ($d->status == 'waiting')
                                    <span class="">Menunggu</span>
                                @endif
                                @if ($d->status == 'proses')
                                    <span class="">Proses</span>
                                @endif
                                @if ($d->status == 'selesai')
                                    <span class="">Selesai</span>
                                @endif
                            </td>                            
                        </tr>
                      @endforeach
                    </tbody>
        </table>
</body>
</html>