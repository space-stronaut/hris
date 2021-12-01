@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Reimbursment
        </div>
        <div class="card-body">
            <form action="{{ route('reimburstment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="office_id" value="{{ Auth::user()->office_id }}">
                {{-- <input type="hidden" name="status" value="proses"> --}}
                <div class="form-group">
                    <label for="">Activity</label>
                    <input type="text" name="activity" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Note</label>
                    <input type="text" class="form-control" name="nota">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection