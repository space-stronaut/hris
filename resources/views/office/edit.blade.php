@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Office Create
        </div>
        <div class="card-body">
            <form action="{{ route('office.update', $office->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $office->name }}">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="address" value="{{ $office->address }}">
                </div>
                <div class="form-group">
                    <label for="">No Telp</label>
                    <input type="number" class="form-control" name="phone" value="{{ $office->phone }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection