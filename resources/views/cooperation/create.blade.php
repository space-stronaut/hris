@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Cooperation
        </div>
        <div class="card-body">
            <form action="{{ route('cooperation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                {{-- <input type="hidden" name="office_id" value="{{ Auth::user()->office_id }}"> --}}
                <input type="hidden" name="status" value="proses">
                <div class="form-group">
                    <label for="">Partner</label>
                    <select name="partner_id" id="" class="form-control">
                        <option value="">Choose Partner...</option>
                        @foreach ($parts as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Contract</label>
                    <input type="text" class="form-control" name="contract">
                </div>
                <div class="form-group">
                    <label for="">Payment</label>
                    <input type="text" class="form-control" name="payment">
                </div>
                <div class="form-group">
                    <label for="">File</label>
                    <input type="file" class="form-control" name="file_req">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    {{-- <input type="text" class="form-control" name="contract"> --}}
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection