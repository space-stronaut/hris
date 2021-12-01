@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                BPJS
            </div>
            <div>
                <a href="{{ route('bpjs.create') }}" class="btn btn-primary">Ajukan BPJS</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kantor</th>
                        <th scope="col">Tipe BPJS</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bps as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{$item->user->name}}
                        </td>
                        <td>
                            {{$item->user->office->name}}
                        </td>
                        <td>
                            {{$item->bpjs_type}}
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td>
                            <div class="badge badge-info text-uppercase">{{ $item->status }}</div>
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('bpjs.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('bpjs.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" onclick="return confirm('Apa anda yakin ingin menghapusnya?')" class="btn btn-danger ml-2">Hapus</button>
                            </form>
                            <form action="{{ route('bpjs.confirm', $item->id) }}" method="POST">
                                @csrf
                                {{-- @method('delete') --}}
                                <input type="hidden" name="status" value="disetujui">
                                    <button type="submit" onclick="return confirm('Apa anda yakin ingin menyetujuinya?')" class="btn btn-info ml-2">Setujui</button>
                                </form>
                                <form action="{{ route('bpjs.confirm', $item->id) }}" method="POST">
                                    @csrf
                                    {{-- @method('delete') --}}
                                    <input type="hidden" name="status" value="ditolak">
                                        <button type="submit" onclick="return confirm('Apa anda yakin ingin menolaknya?')" class="btn btn-secondary ml-2">Tolak</button>
                                    </form>
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