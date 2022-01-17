<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role->name == 'karyawan') {
            $attendances = Attendance::where('user_id', Auth::user()->id)->get();

            return view('attendance.index', compact('attendances'));
        }elseif(Auth::user()->role->name == 'administrasi'){
            $attendances = DB::table('attendances')
                                ->join('users', 'attendances.user_id', 'users.id')
                                ->select('attendances.*', 'users.name', 'users.office_id')
                                ->where('office_id', '=' ,Auth::user()->office_id)
                                ->get();
            // dd($attendances);

            return view('attendance.index', compact('attendances'));
        }else{
            $attendances = Attendance::all();

            return view('attendance.index', compact('attendances'));
        }
    }

    public function export()
    {
        $attendances = Attendance::all();

        $pdf = PDF::loadview('pdf.attendance',['attendances'=>$attendances]);
    	return $pdf->download('laporan-absensi.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
