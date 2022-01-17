
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Absensi</title>
</head>
<body>

	<div class="container">
		<center>
			<h4>Laporan Data Absensi</h4>
		</center>
		<br/>
		<table class="table rounded" style="width: 100%" border="2">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Lokasi Absen Masuk</th>
                    <th scope="col">Jam Absen Masuk</th>
                    <th scope="col">Lokasi Absen Keluar</th>
                    <th scope="col">Jam Absen Keluar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{$item->user->name}}
                    </td>
                    <td>
                        {{
                            Carbon\Carbon::parse($item->date)->format('d M Y')
                        }}
                    </td>
                    <td>
                        {{$item->location_clock_in}}
                    </td>
                    <td>
                        {{
                            Carbon\Carbon::parse($item->clock_in)->format('H : i')
                        }}
                    </td>
                    <td>
                        {{$item->location_clock_out ? $item->location_clock_out : '-'}}
                    </td>
                    <td>
                        {{
                            $item->clock_out ? Carbon\Carbon::parse($item->clock_out)->format('H : i') : '-'
                        }}
                    </td>
                </tr>
                @empty
                <tr>
                    <th scope="row">Belum ada data</th>
                </tr>
                @endforelse
            </tbody>
        </table>

	</div>

</body>
</html>