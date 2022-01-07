@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                Cooperation
            </div>
            <div>
                <a href="{{ route('cooperation.create') }}" class="btn btn-primary">Cooperation</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Partner</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kontrak</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Description</th>
                        <th scope="col">Unduh</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coops as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{$item->user->name}}
                        </td>
                        <td>
                            {{$item->partner->name}}
                        </td>
                        <td>
                            {{$item->price}}
                        </td>
                        <td>
                            {{$item->contract}}
                        </td>
                        <td>
                            {{$item->payment}}
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td>
                            <a href="{{ route('cooperation.download', $item->id) }}" class="btn btn-info">Unduh</a>
                        </td>
                        <td>
                            <div class="badge badge-info text-uppercase">{{ $item->status }}</div>
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('cooperation.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('cooperation.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" onclick="return confirm('Apa anda yakin ingin menghapusnya?')" class="btn btn-danger ml-2">Hapus</button>
                            </form>
                            @if (Auth::user()->role->name == 'direksi' || Auth::user()->role->name == 'manajemen')
                            <form action="{{ route('cooperation.confirm', $item->id) }}" method="POST">
                                @csrf
                                {{-- @method('delete') --}}
                                <input type="hidden" name="status" value="disetujui">
                                    <button type="submit" onclick="return confirm('Apa anda yakin ingin menyetujuinya?')" class="btn btn-info ml-2">Setujui</button>
                                </form>
                                <form action="{{ route('cooperation.confirm', $item->id) }}" method="POST">
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