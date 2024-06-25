<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pelayanan PDF</title>
</head>

<body>
    <b>
        <h2>Detail Pelayanan</h2>
        {{-- <h3>Pelayan Altar</h3> --}}
        {{-- <h3>Pengumpul Persembahan</h3> --}}
        {{-- <h3>Penerima Tamu</h3> --}}
    </b>
    <p>Tanggal dan Waktu Cetak: {{ $tanggal }}</p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th align="center" style="border: 1.5px solid black; padding: 10px;">Id</th>
                <th style="border: 1.5px solid black; padding: 10px;">Status Pelayanan</th>
                {{-- <th style="border: 1.5px solid black; padding: 10px;">Email</th>
                <th style="border: 1.5px solid black; padding: 10px;">Gender</th>
                <th style="border: 1.5px solid black; padding: 10px;">DOB</th> --}}
            </tr>
        </thead>
        {{ $no = 1 }}
        <tbody>
            @foreach ($detailpelayanan as $d)
                <tr>
                    {{-- agar data bisa berurut paginationnya --}}
                    {{-- <td>{{ $data->firstItem() + $loop->index }}</td> --}}
                    <td align="center" style="border: 1px solid black; padding: 10px;">{{ $d->id }}</td>
                    <td style="border: 1px solid black; padding: 10px;">{{ $d->status_pelayanan }}</td>
                    {{-- <td style="border: 1px solid black; padding: 10px;">{{ $d->email }}</td>
                    <td style="border: 1px solid black; padding: 10px;">{{ $d->gender }}</td>
                    <td align="center" style="border: 1px solid black; padding: 10px;">{{ $d->dob }}</td> --}}
                    <br><br>
                </tr>
                {{ $no++ }}
            @endforeach
        </tbody>
    </table>
</body>

</html>
