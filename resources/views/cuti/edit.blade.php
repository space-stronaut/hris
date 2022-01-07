@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Pengajuan Cuti dan lembur
        </div>
        <div class="card-body">
            <form action="{{ route('cuti.update', $cuti->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="{{ $cuti->status }}">
                <div class="form-group">
                    <label for="">Tipe Pengajuan</label>
                    <select name="pengajuan" id="" class="form-control">
                        <option value="">Pilih...</option>
                        <option value="cuti" {{$cuti->pengajuan == 'cuti' ? 'selected' : ''}}>Cuti</option>
                        <option value="lembur" {{$cuti->pengajuan == 'lembur' ? 'selected' : ''}}>Lembur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{ $cuti->keterangan }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Dari Tanggal</label>
                    <input type="date" name="start" id="" value="{{ $cuti->start }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Sampai Tanggal</label>
                    <input type="date" name="end" id="" value="{{ $cuti->end }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection