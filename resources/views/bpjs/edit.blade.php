@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Ajukan BPJS
        </div>
        <div class="card-body">
            <form action="{{ route('bpjs.update', $bp->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="office_id" value="{{ Auth::user()->office_id }}">
                <input type="hidden" name="status" value="proses">
                <div class="form-group">
                    <label for="">Tipe BPJS</label>
                    <input type="text" value="{{ $bp->bpjs_type }}" name="bpjs_type" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" value="{{ $bp->description }}" class="form-control" name="description">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection