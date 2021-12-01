@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Legality
        </div>
        <div class="card-body">
            <form action="{{ route('legalitas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Company</label>
                    <input type="text" name="company" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Office</label>
                    <select name="office_id" id="" class="form-control">
                        <option value="">Choose Office...</option>
                        @foreach ($offices as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No Contact</label>
                    <input type="text" name="no_contact" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Start Contract</label>
                    <input type="date" name="start_contract" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">End Contract</label>
                    <input type="date" name="end_contract" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Notes</label>
                    <input type="text" name="notes" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection