@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                Pengajuan Cuti & Lembur
            </div>
            <div>
                <a href="{{ route('cuti.create') }}" class="btn btn-primary">Ajukan</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Pengajuan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cutis as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{$item->user->name}}
                        </td>
                        <td>
                            {{$item->keterangan}}
                        </td>
                        <td>
                            {{$item->pengajuan}}
                        </td>
                        <td>
                            <div class="badge badge-info text-uppercase">{{ $item->status }}</div>
                        </td>
                        <td class="d-flex">
                            @if ($item->status == 'proses')
                            <a href="{{ route('cuti.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('cuti.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" onclick="return confirm('Apa anda yakin ingin menghapusnya?')" class="btn btn-danger ml-2">Hapus</button>
                            </form>
                            @endif
                            @if ($item->status == 'proses' && Auth::user()->role->name == 'hrd')
                            <form action="{{ route('cuti.validasi', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="dikonfirmasi hrd">
                                    <button type="submit" onclick="return confirm('Apa anda yakin ingin menerima?')" class="btn btn-info ml-2">Terima</button>
                                </form>
                                <form action="{{ route('cuti.validasi', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="ditolak hrd">
                                        <button type="submit" onclick="return confirm('Apa anda yakin ingin menolaknya?')" class="btn btn-danger ml-2">Tolak</button>
                                    </form>
                            @endif
                            @if ($item->status == 'dikonfirmasi hrd' && Auth::user()->role->name == 'manajemen')
                            <form action="{{ route('cuti.validasi', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="dikonfirmasi manager">
                                    <button type="submit" onclick="return confirm('Apa anda yakin ingin menerima?')" class="btn btn-info ml-2">Terima</button>
                                </form>
                                <form action="{{ route('cuti.validasi', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="ditolak manager">
                                        <button type="submit" onclick="return confirm('Apa anda yakin ingin menolaknya?')" class="btn btn-danger ml-2">Tolak</button>
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