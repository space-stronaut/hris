<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AttendanceIndex extends Component
{
    protected $listeners = ['absenMasuk', 'keluarSuccess'];
    public function render()
    {
        $attendances = Attendance::where('user_id', Auth::user()->id)->get();
        return view('livewire.attendance-index', compact('attendances'));
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
