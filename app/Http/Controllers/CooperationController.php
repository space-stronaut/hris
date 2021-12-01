<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use App\Models\Partnership;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class CooperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coops = Cooperation::all();

        return view('cooperation.index', compact('coops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parts = Partnership::all();

        return view('cooperation.create', compact('parts'));
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

        if ($request->file('file_req')) {
            $data['file_req'] = $request->file('file_req')->store('file_req', 'public');
        }

        Cooperation::create($data);

        return redirect()->route('cooperation.index');
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
        $parts = Partnership::all();
        $coop = Cooperation::find($id);

        return view('cooperation.edit', compact('coop', 'parts'));
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

        if ($request->file('file_req')) {
            $data['file_req'] = $request->file('file_req')->store('file_req', 'public');
        }

        Cooperation::find($id)->update($data);

        return redirect()->route('cooperation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cooperation::find($id)->delete();

        return redirect()->back();
    }

    public function confirm(Request $request, $id)
    {
        Cooperation::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function download($id)
    {
        $i = Cooperation::find($id)->file_req;

        return response()->download(storage_path('app/public/'. $i));
    }
}
