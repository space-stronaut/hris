@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                Paklaring
            </div>
            <div>
                <a href="{{ route('paklarings.create') }}" class="btn btn-primary">Tambah Paklaring</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Doc</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Unduh</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($paks as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{$item->user->name}}
                        </td>
                        <td>
                            {{Storage::url($item->doc_paklaring)}}
                        </td>
                        <td>
                            {{$item->req_date}}
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td>
                            {{$item->status}}
                        </td>
                        <td>
                            <a href="{{ route('paklaring.download', $item->id) }}" class="btn btn-info">Unduh</a>
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('paklarings.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('paklarings.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" onclick="return confirm('Apa anda yakin ingin menghapusnya?')" class="btn btn-danger ml-2">Hapus</button>
                            </form>
                            <form action="{{ route('paklaring.confirm', $item->id) }}" method="POST">
                                @csrf
                                {{-- @method('delete') --}}
                                <input type="hidden" name="status" value="disetujui">
                                    <button type="submit" onclick="return confirm('Apa anda yakin ingin menyetujuinya?')" class="btn btn-info ml-2">Setujui</button>
                                </form>
                                <form action="{{ route('paklaring.confirm', $item->id) }}" method="POST">
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