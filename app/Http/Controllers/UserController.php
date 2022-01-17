<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class UserController extends Controller
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
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices = Office::all();
        $roles = Role::all();
        return view('users.create' , compact('offices', 'roles'));
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

        $data['password'] = bcrypt($request->password);

        if ($request->file('foto_ktp') != NULL) {
            $data['foto_ktp'] = $request->file('foto_ktp')->store('ktp', 'public');
        }
        if ($request->file('poto_profile') != NULL) {
            $data['poto_profile'] = $request->file('poto_profile')->store('poto_profile', 'public');
        }

        User::create($data);

        return redirect()->route('user.index');
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
        $user = User::find($id);
        $roles = Role::all();
        $offices = Office::all();

        return view('users.edit', compact('user', 'roles', 'offices'));
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

        if ($request->password != NULL) {
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = User::find($id)->password;
        }

        if ($request->file('foto_ktp') != NULL) {
            $data['foto_ktp'] = $request->file('foto_ktp')->store('ktp', 'public');
        }
        if ($request->file('poto_profile') != NULL) {
            $data['poto_profile'] = $request->file('poto_profile')->store('poto_profile', 'public');
        }

        User::find($id)->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back();
    }

    public function export()
    {
        $users = User::all();
 
    	$pdf = PDF::loadview('pdf.user',['users'=>$users]);
    	return $pdf->download('laporan-users.pdf');
    }
}
