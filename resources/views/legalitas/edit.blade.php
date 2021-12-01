@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Update Legality
        </div>
        <div class="card-body">
            <form action="{{ route('legalitas.update', $legal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Company</label>
                    <input type="text" name="company" value="{{ $legal->company }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Office</label>
                    <select name="office_id" id="" class="form-control">
                        <option value="">Choose Office...</option>
                        @foreach ($offices as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $legal->office_id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $legal->name }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No Contact</label>
                    <input type="text" name="no_contact" value="{{ $legal->no_contact }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Start Contract</label>
                    <input type="date" name="start_contract" value="{{ $legal->start_contract }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">End Contract</label>
                    <input type="date" name="end_contract" value="{{ $legal->end_contract }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Notes</label>
                    <input type="text" name="notes" value="{{ $legal->notes }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection