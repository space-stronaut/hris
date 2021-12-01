<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AttendanceIndex extends Component
{
    protected $listeners = ['absenMasuk', 'keluarSuccess'];
    public function render()
    {
        if (Auth::user()->role->name == 'karyawan') {
            $attendances = Attendance::where('user_id', Auth::user()->id)->get();

            return view('livewire.attendance-index', compact('attendances'));
        }elseif(Auth::user()->role->name == 'administrasi'){
            $attendances = DB::table('attendances')
                                ->join('users', 'attendances.user_id', 'users.id')
                                ->select('attendances.*', 'users.name', 'users.office_id')
                                ->where('office_id', '=' ,Auth::user()->office_id)
                                ->get();
            // dd($attendances);

            return view('livewire.attendance-index', compact('attendances'));
        }else{
            $attendances = Attendance::all();

            return view('livewire.attendance-index', compact('attendances'));
        }
    }

    public function absenMasuk()
    {
        session()->flash('message', 'Terima Kasih Telah Melakukan Absen');
    }

    public function absenKeluar($attendanceId)
    {
        $this->emit('absenKeluar', $attendanceId);
    }

    public function keluarSuccess()
    {
        session()->flash('keluar', 'Terima Kasih Telah Melakukan Absen');
    }
}
