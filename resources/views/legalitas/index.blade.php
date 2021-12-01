@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                Legalitas
            </div>
            <div>
                <a href="{{ route('legalitas.create') }}" class="btn btn-primary">Tambah Kelegalitasan</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company</th>
                        <th scope="col">Office</th>
                        <th scope="col">Name</th>
                        <th scope="col">No Contact</th>
                        <th scope="col">Start Contract</th>
                        <th scope="col">End Contract</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($legals as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{$item->company}}
                        </td>
                        <td>
                            {{$item->office->name}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->no_contact}}
                        </td>
                        <td>
                            {{$item->start_contract}}
                        </td>
                        <td>
                            {{$item->end_contract}}
                        </td>
                        <td>
                            {{$item->notes}}
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('legalitas.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('legalitas.destroy', $item->id) }}" method="POST">
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