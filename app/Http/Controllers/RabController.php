<?php

namespace App\Http\Controllers;

use App\Models\Rab;
use Illuminate\Http\Request;

class RabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rabs = Rab::all();

        return view('rab.index', compact('rabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rab.create');
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

        if ($request->file('doc_rab')) {
            $data['doc_rab'] = $request->file('doc_rab')->store('doc_rab', 'public');
        }

        Rab::create($data);

        return redirect()->route('rab.index');
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
        $rab = Rab::find($id);

        return view('rab.edit', compact('rab'));
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

        if ($request->file('doc_rab')) {
            $data['doc_rab'] = $request->file('doc_rab')->store('doc_rab', 'public');
        }

        Rab::find($id)->update($data);

        return redirect()->route('rab.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rab::find($id)->delete();

        return redirect()->back();
    }

    public function confirm(Request $request, $id)
    {
        Rab::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function download($id)
    {
        $i = Rab::find($id)->doc_rab;

        return response()->download(storage_path('app/public/'. $i));
    }
}
