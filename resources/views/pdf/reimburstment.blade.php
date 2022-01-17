
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Reimbursment</title>
</head>
<body>

	<div class="container">
		<center>
			<h4>Laporan Data Reimbursment</h4>
		</center>
		<br/>
		<table class="table" style="width: 100%" border="2">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kantor</th>
                    <th scope="col">Position</th>
                    <th scope="col">Aktivitas</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reimburstments as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{$item->user->name}}
                    </td>
                    <td>
                        {{$item->office->name}}
                    </td>
                    <td>
                        {{$item->user->position}}
                    </td>
                    <td>
                        {{$item->activity}}
                    </td>
                    <td class="text-uppercase">
                        {{$item->status}}
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