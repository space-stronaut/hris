@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                RAB
            </div>
            <div>
                <a href="{{ route('rab.create') }}" class="btn btn-primary">Tambah RAB</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Agenda</th>
                        <th scope="col">Date</th>
                        <th scope="col">Peserta</th>
                        <th scope="col">Anggaran</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Dokumen</th>
                        <th scope="col">Status</th>
                        <th scope="col">Unduh</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rabs as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{$item->user->name}}
                        </td>
                        <td>
                            {{$item->agenda}}
                        </td>
                        <td>
                            {{$item->date}}
                        </td>
                        <td>
                            {{$item->peserta}}
                        </td>
                        <td>
                            {{$item->anggaran}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{ Storage::url($item->doc_rab) }}
                        </td>
                        <td>
                            <div class="badge badge-info text-uppercase">{{ $item->status }}</div>
                        </td>
                        <td>
                            <a href="{{ route('rab.download', $item->id) }}" class="btn btn-info">Unduh</a>
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('rab.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('rab.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" onclick="return confirm('Apa anda yakin ingin menghapusnya?')" class="btn btn-danger ml-2">Hapus</button>
                            </form>
                            @if (Auth::user()->role->name == 'direksi' || Auth::user()->role->name == 'manajemen')
                            <form action="{{ route('rab.confirm', $item->id) }}" method="POST">
                                @csrf
                                {{-- @method('delete') --}}
                                <input type="hidden" name="status" value="disetujui">
                                    <button type="submit" onclick="return confirm('Apa anda yakin ingin menyetujuinya?')" class="btn btn-info ml-2">Setujui</button>
                                </form>
                                <form action="{{ route('rab.confirm', $item->id) }}" method="POST">
                                    @csrf
                                    {{-- @method('delete') --}}
                                    <input type="hidden" name="status" value="ditolak">
                                        <button type="submit" onclick="return confirm('Apa anda yakin ingin menolaknya?')" class="btn btn-secondary ml-2">Tolak</button>
                                    </form>
                            @endif
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