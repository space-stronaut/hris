@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                Assets
            </div>
            <div>
                <a href="{{ route('assets.create') }}" class="btn btn-primary">Tambah Asset</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Office</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Asset</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assets as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{$item->office->name}}
                        </td>
                        <td>
                            {{$item->category}}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->qty }}
                        </td>
                        <td>
                            {{ $item->location }}
                        </td>
                        <td>
                            {{ $item->years }}
                        </td>
                        <td>
                            {{$item->unit}}
                        </td>
                        <td>
                            {{$item->condition}}
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('assets.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('assets.destroy', $item->id) }}" method="POST">
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