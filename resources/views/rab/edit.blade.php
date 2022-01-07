@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Update RAB
        </div>
        <div class="card-body">
            <form action="{{ route('rab.update', $rab->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="proses">
                <div class="form-group">
                    <label for="">Agenda</label>
                    <input type="text" name="agenda" value="{{ $rab->agenda }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ $rab->lokasi }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="date" id="" value="{{ $rab->date }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Peserta</label>
                    <input type="text" name="peserta" value="{{ $rab->peserta }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jumlah anggaran</label>
                    <input type="text" name="anggaran" value="{{ $rab->anggaran }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" id="" value="{{ $rab->keterangan }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Doc</label>
                    <input type="file" class="form-control" name="doc_rab">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $rab->name }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection