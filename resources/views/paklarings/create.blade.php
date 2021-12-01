@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Paklaring
        </div>
        <div class="card-body">
            <form action="{{ route('paklarings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="proses">
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Doc</label>
                    <input type="file" class="form-control" name="doc_paklaring">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection