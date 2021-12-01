@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit
        </div>
        <div class="card-body">
            <form action="{{ route('payroll.update', $pay->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="office_id" value="{{ Auth::user()->office_id }}">
                <input type="hidden" name="status" value="proses"> --}}
                <div class="form-group">
                    <label for="">Pegawai</label>
                    <select name="user_id" id="" class="form-control">
                        <option value="">Choose...</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $pay->user_id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Salary Recap</label>
                    <input type="text" class="form-control" value="{{ $pay->salary_recap }}" name="salary_recap">
                </div>
                <div class="form-group">
                    <label for="">Salary Slip</label>
                    <input type="text" class="form-control" value="{{ $pay->salary_slip }}" name="salary_slip">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection