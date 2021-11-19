@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            User Edit
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role_id" id="" class="form-control">
                        <option value="">Choose Role...</option>
                        @forelse ($roles as $item)
                            <option value="{{ $item->id }}" {{ $user->role_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                            <option value="{{ $item->id }}" {{ $user->office_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @empty
                            <option value="">Belum Ada Role</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Place Of Birth</label>
                    <input type="text" name="place_of_birth" class="form-control" value="{{ $user->place_of_birth }}">
                </div>
                <div class="form-group">
                    <label for="">Citizen</label>
                    <input type="text" name="citizen" class="form-control" value="{{ $user->citizen }}">
                </div>
                <div class="form-group">
                    <label for="">Date Of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" value="{{ $user->date_of_birth }}">
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <div>
                        <label for="">L</label>
                        <input type="radio" name="gender" value="L" id="" {{ $user->gender == 'L' ? 'checked' : '' }}>
                    </div>
                    <div>
                        <label for="">P</label>
                        <input type="radio" name="gender" value="P" id="" {{ $user->gender == 'P' ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" id="" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <label for="">Domicile</label>
                    <input type="text" name="domicile" class="form-control" id="" value="{{ $user->domicile }}">
                </div>
                <div class="form-group">
                    <label for="">Religion</label>
                    <select name="religion" id="" class="form-control">
                        <option value="">Choose Religion...</option>
                        <option value="islam" {{ $user->religion == 'islam' ? 'selected' : '' }}>Islam</option>
                        <option value="protestan" {{ $user->religion == 'protestan' ? 'selected' : '' }}>Protestan</option>
                        <option value="khatolik" {{ $user->religion == 'khatolik' ? 'selected' : '' }}>Khatolik</option>
                        <option value="hindu" {{ $user->religion == 'hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="budha" {{ $user->religion == 'budha' ? 'selected' : '' }}>Budha</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Mother Name</label>
                    <input type="text" class="form-control" name="mother_name" value="{{ $user->mother_name }}">
                </div>
                <div class="form-group">
                    <label for="">Position</label>
                    <input type="text" class="form-control" name="position" value="{{ $user->position }}">
                </div>
                <div class="form-group">
                    <label for="">Education</label>
                    <input type="text" class="form-control" name="education" value="{{ $user->education }}">
                </div>
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="">Account Number</label>
                    <input type="number" class="form-control" name="account_number" value="{{ $user->account_number }}">
                </div>
                <div class="form-group">
                    <label for="">NPWP</label>
                    <input type="number" class="form-control" name="npwp" value="{{ $user->npwp }}">
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
                    <input type="text" name="status" class="form-control"value="{{ $user->status }}">
                </div>
                <div class="form-group">
                    <label for="">Join Date</label>
                    <input type="date" name="join_date" id="" class="form-control" value="{{ $user->join_date }}">
                </div>
                <div class="form-group">
                    <label for="">Out Date <small>*Bila Sudah Keluar</small></label>
                    <input type="date" name="out_date" id="" class="form-control" value="{{ $user->out_date }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection