<div class="card mb-3">
    <div class="card-header">
        <div class="card-header d-flex justify-content-between align-items-center">
            @if (App\Models\Attendance::where('user_id', Auth::user()->id)->where('date', Carbon\Carbon::today())->where('clock_in', '!=' , NULL)->first() != NULL)
                <button disabled class="btn btn-success">Kamu Sudah Absen Masuk</button>
            @elseif(App\Models\Attendance::where('user_id', Auth::user()->id)->where('date', Carbon\Carbon::today())->where('clock_in', '!=' , NULL)->first() == NULL && Carbon\Carbon::now()->format('H : i') > '09 : 15')
            <button disabled class="btn btn-outline-danger">Kamu Telat Melakukan Absen</button>
            @elseif(App\Models\Attendance::where('user_id', Auth::user()->id)->where('date', Carbon\Carbon::today())->where('clock_in', '!=' , NULL)->first() == NULL && Carbon\Carbon::now()->format('H : i') < '06 : 00')
            <button disabled class="btn btn-info">Absen Belum Dibuka</button>
            @else
            <form wire:submit.prevent="absenMasuk">
                {{-- <input type="text" id="latlong" wire:model="loc_in" class="form-control"> --}}
                <button type="submit" class="btn btn-outline-success">Absen Masuk</button>
            </form>
            @endif
        </div>
    </div>
    <div class="card-header mt-2">
        {{-- {{$loc_in}} --}}
        <label for="">Lokasimu</label>
        <input type="text" id="latlong" @if(App\Models\Attendance::where('user_id', Auth::user()->id)->where('date', Carbon\Carbon::today())->where('clock_in', '!=' , NULL)->first() == NULL) wire:model="loc_in" @else wire:model="loc_out" @endif class="form-control" readonly>
    </div>
</div>