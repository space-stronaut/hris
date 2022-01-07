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
                    <label for="">Agenda</label>
                    <input type="text" name="agenda" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Lokasi</label>
                    <input type="text" name="lokasi" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="date" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Peserta</label>
                    <input type="text" name="peserta" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jumlah anggaran</label>
                    <input type="text" name="anggaran" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" id="" class="form-control">
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