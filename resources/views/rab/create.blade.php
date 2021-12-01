@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Create RAB
        </div>
        <div class="card-body">
            <form action="{{ route('rab.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="proses">
                <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" name="type" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Doc</label>
                    <input type="file" class="form-control" name="doc_rab">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection