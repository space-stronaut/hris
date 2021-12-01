<?php

namespace App\Http\Controllers;

use App\Models\Paklaring;
use Illuminate\Http\Request;

class PaklaringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paks = Paklaring::all();

        return view('paklarings.index', compact('paks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paklarings.create');
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

        if ($request->file('doc_paklaring')) {
            $data['doc_paklaring'] = $request->file('doc_paklaring')->store('doc_paklaring', 'public');
        }

        $data['req_date'] = now();

        Paklaring::create($data);

        return redirect()->route('paklarings.index');
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
        $pak = Paklaring::find($id);

        return view('paklarings.edit', compact('pak'));
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

        if ($request->file('doc_paklaring')) {
            $data['doc_paklaring'] = $request->file('doc_paklaring')->store('doc_paklaring', 'public');
        }

        $data['req_date'] = now();

        Paklaring::find($id)->update($data);

        return redirect()->route('paklarings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paklaring::find($id)->delete();

        return redirect()->back();
    }

    public function confirm(Request $request, $id)
    {
        Paklaring::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function download($id)
    {
        $i = Paklaring::find($id)->doc_paklaring;

        return response()->download(storage_path('app/public/'. $i));
    }
}
