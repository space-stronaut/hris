<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AttendanceStore extends Component
{
    public $loc_in;
    public $loc_out;

    protected $listeners = ['absenKeluar'];

    public function render()
    {
        return view('livewire.attendance-store');
    }
    public function absenMasuk()
    {
        Attendance::create([
            'user_id' => Auth::user()->id,
            'date' => today(),
            'clock_in' => now(),
            'location_clock_in' => $this->loc_in
        ]);

        $this->emit('absenMasuk');
    }

    public function absenKeluar(Attendance $attendance)
    {
        $attendance->update([
            'user_id' => Auth::user()->id,
            'date' => today(),
            'clock_out' => now(),
            'location_clock_out' => $this->loc_out
        ]);

        $this->emit('keluarSuccess');
        // dd($attendance->id);
    }
}
