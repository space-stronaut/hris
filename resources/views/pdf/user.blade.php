<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data User</title>
</head>
<body>

	<div class="container">
		<center>
			<h4>Laporan Data User</h4>
		</center>
		<br/>
		<table class="table" border="2" style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kantor</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>
                        {{$item->office->name}}
                    </td>
                    <td>
                        {{$item->email}}
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