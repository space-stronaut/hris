@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Update Partnership
        </div>
        <div class="card-body">
            <form action="{{ route('partnerships.update', $part->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                {{-- <input type="hidden" name="status" value="proses"> --}}
                <div class="form-group">
                    <label for="">Group Name</label>
                    <input type="text" name="group_name" value="{{ $part->group_name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $part->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Office Number</label>
                    <input type="number" name="office_number" value="{{ $part->office_number }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" value="{{ $part->address }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Contact Person</label>
                    <input type="number" name="contact_person" value="{{ $part->contact_person }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    {{-- <input type="number" name="office_number" class="form-control"> --}}
                    <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $part->description }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection