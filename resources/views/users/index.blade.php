@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                User Management
            </div>
            @if (Auth::user()->role->name == 'administrator')
            <div>
                <a href="{{ route('user.pdf') }}" class="btn btn-danger mr-2">Export PDF</a>
                <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
            </div>
            @endif
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kantor</th>
                        @if (Auth::user()->role->name == 'administrator')
                        <th scope="col">Aksi</th>
                        @endif
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
                        @if (Auth::user()->role->name == 'administrator')
                        <td class="d-flex">
                            
                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                            </form>
                        </td>
                        @endif
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