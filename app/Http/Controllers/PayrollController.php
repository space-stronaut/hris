<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role->name == 'karyawan') {
            $pays = Payroll::where('user_id', Auth::user()->id)->get();
            return view('payroll.index', compact('pays'));
        }else{
            $pays = Payroll::all();
            return view('payroll.index', compact('pays'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('payroll.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('salary_slip')) {
            $data['salary_slip'] = $request->file('salary_slip')->store('salary_slip', 'public');
        }
        Payroll::create($data);

        return redirect()->route('payroll.index');
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
        $pay = Payroll::find($id);

        return view('payroll.edit', compact('pay'));
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
        $data = $request->all();

        if ($request->file('salary_slip')) {
            $data['salary_slip'] = $request->file('salary_slip')->store('salary_slip', 'public');
        }
        Payroll::find($id)->update($data);

        return redirect()->route('payroll.index');
    }

    public function download($id)
    {
        $i = Payroll::find($id)->salary_slip;

        return response()->download(storage_path('app/public/'. $i));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payroll::find($id)->delete();

        return redirect()->back();
    }
}
