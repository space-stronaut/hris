@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            User Create
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role_id" id="" class="form-control">
                        <option value="">Choose Role...</option>
                        @forelse ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @empty
                            <option value="">Belum Ada Role</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Office</label>
                    <select name="office_id" id="" class="form-control">
                        <option value="">Choose Office...</option>
                        @forelse ($offices as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @empty
                            <option value="">Belum Ada Role</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Place Of Birth</label>
                    <input type="text" name="place_of_birth" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Citizen</label>
                    <input type="text" name="citizen" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Date Of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <div>
                        <label for="">L</label>
                        <input type="radio" name="gender" value="L" id="">
                    </div>
                    <div>
                        <label for="">P</label>
                        <input type="radio" name="gender" value="P" id="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Domicile</label>
                    <input type="text" name="domicile" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Religion</label>
                    <select name="religion" id="" class="form-control">
                        <option value="">Choose Religion...</option>
                        <option value="islam">Islam</option>
                        <option value="protestan">Protestan</option>
                        <option value="khatolik">Khatolik</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Mother Name</label>
                    <input type="text" class="form-control" name="mother_name">
                </div>
                <div class="form-group">
                    <label for="">Position</label>
                    <input type="text" class="form-control" name="position">
                </div>
                <div class="form-group">
                    <label for="">Education</label>
                    <input type="text" class="form-control" name="education">
                </div>
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="number" class="form-control" name="phone">
                </div>
                <div class="form-group">
                    <label for="">Account Number</label>
                    <input type="number" class="form-control" name="account_number">
                </div>
                <div class="form-group">
                    <label for="">NPWP</label>
                    <input type="number" class="form-control" name="npwp">
                </div>
                <div class="form-group">
                    <label for="">KTP</label>
                    <input type="file" class="form-control" name="foto_ktp">
                </div>
                <div class="form-group">
                    <label for="">Profile Photo</label>
                    <input type="file" class="form-control" name="poto_profile">
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" name="status" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Join Date</label>
                    <input type="date" name="join_date" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Out Date <small>*Bila Sudah Keluar</small></label>
                    <input type="date" name="out_date" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection