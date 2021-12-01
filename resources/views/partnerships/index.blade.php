@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                Partnership
            </div>
            <div>
                <a href="{{ route('partnerships.create') }}" class="btn btn-primary">Tambah Partnership</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Nama group</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Office Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact Person</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($parts as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{$item->user->name}}
                        </td>
                        <td>
                            {{$item->group_name}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->office_number}}
                        </td>
                        <td>
                            {{$item->address}}
                        </td>
                        <td>
                            {{$item->contact_person}}
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('partnerships.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('partnerships.destroy', $item->id) }}" method="POST">
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