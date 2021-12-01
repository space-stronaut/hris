<?php

namespace App\Http\Controllers;

use App\Models\Bpjs;
use Illuminate\Http\Request;

class BpjsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bps = Bpjs::all();

        return view('bpjs.index', compact('bps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bpjs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bpjs::create($request->all());

        return redirect()->route('bpjs.index');
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
        $bp = Bpjs::find($id);

        return view('bpjs.edit', compact('bp'));
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
        Bpjs::find($id)->update($request->all());

        return redirect()->route('bpjs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bpjs::find($id)->delete();

        return redirect()->back();
    }

    public function confirm(Request $request, $id)
    {
        Bpjs::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function download($id)
    {
        $i = Bpjs::find($id)->doc_rab;

        return response()->download(storage_path('app/public/'. $i));
    }
}
