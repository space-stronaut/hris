@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Update Asset
        </div>
        <div class="card-body">
            <form action="{{ route('assets.update', $asset->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Office</label>
                    <select name="office_id" id="" class="form-control">
                        <option value="">Choose Office...</option>
                        @forelse ($offices as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $asset->office_id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" name="category" value="{{ $asset->category }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" value="{{ $asset->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">QTY</label>
                    <input type="number" name="qty" value="{{ $asset->qty }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Lokasi</label>
                    <input type="text" name="location" value="{{ $asset->location }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tahun</label>
                    <input type="text" name="years" value="{{ $asset->years }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Unit</label>
                    <input type="number" name="unit" value="{{ $asset->unit }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kondisi</label>
                    <input type="text" name="condition" value="{{ $asset->condition }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    {{-- <input type="text" name="category" class="form-control"> --}}
                    <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $asset->description }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection