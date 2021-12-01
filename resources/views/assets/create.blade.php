@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Asset
        </div>
        <div class="card-body">
            <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Office</label>
                    <select name="office_id" id="" class="form-control">
                        <option value="">Choose Office...</option>
                        @forelse ($offices as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" name="category" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">QTY</label>
                    <input type="number" name="qty" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Lokasi</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tahun</label>
                    <input type="text" name="years" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Unit</label>
                    <input type="number" name="unit" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kondisi</label>
                    <input type="text" name="condition" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    {{-- <input type="text" name="category" class="form-control"> --}}
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection