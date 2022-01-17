@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                Reimbursment
            </div>
            <div>
                <a href="{{ route('reimburstment.create') }}" class="btn btn-primary">Tambah Reimbursment</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kantor</th>
                        <th scope="col">Position</th>
                        <th scope="col">Aktivitas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reims as $item)
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
                        <td>
                            {{$item->status}}
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('reimburstment.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('reimburstment.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" onclick="return confirm('Apa anda yakin ingin menghapusnya?')" class="btn btn-danger ml-2">Hapus</button>
                            </form>
                            <form action="{{ route('reimburstment.confirm', $item->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="disetujui">
                                <button class="btn btn-info ml-2">Setujui</button>
                            </form>
                            <form action="{{ route('reimburstment.confirm', $item->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="ditolak">
                                <button class="btn btn-warning ml-2">Tolak</button>
                            </form>
                            <a href="{{ route('reimburstment.download', $item->id) }}" class="btn btn-success">Unduh Nota</a>
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
    </div>
@endsection