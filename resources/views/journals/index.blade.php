@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                My Journal
            </div>
            <div>
                <a href="{{ route('journal.create') }}" class="btn btn-primary">Tambah Journal</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Dokumen</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($journals as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{$item->user->name}}
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td>
                            <img style="max-width: 50%" src="{{Storage::url($item->foto)}}" />
                        </td>
                        <td>
                            {{ Storage::url($item->document) }}
                        </td>
                        <td>
                            <div class="badge badge-info text-uppercase">{{ $item->status }}</div>
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('journal.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('journal.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" onclick="return confirm('Apa anda yakin ingin menghapusnya?')" class="btn btn-danger ml-2">Hapus</button>
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