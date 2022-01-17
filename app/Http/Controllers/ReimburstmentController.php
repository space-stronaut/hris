<?php

namespace App\Http\Controllers;

use App\Models\Reimburstment;
use Illuminate\Http\Request;
use PDF;
use function GuzzleHttp\Promise\all;

class ReimburstmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reims = Reimburstment::all();

        return view('reimburstment.index', compact('reims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reimburstment.create');
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

        if ($request->file('nota')) {
            $data['nota'] = $request->file('nota')->store('nota', 'public');
        }
        Reimburstment::create($data);

        return redirect()->route('reimburstment.index');
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
        $reim = Reimburstment::find($id);

        return view('reimburstment.edit', compact('reim'));
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

        if ($request->file('nota')) {
            $data['nota'] = $request->file('nota')->store('nota', 'public');
        }
        Reimburstment::find($id)->update($data);

        return redirect()->route('reimburstment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reimburstment::find($id)->delete();

        return redirect()->back();
    }

    public function export()
    {
        $reimburstments = Reimburstment::all();
 
    	$pdf = PDF::loadview('pdf.reimburstment',['reimburstments'=>$reimburstments]);
    	return $pdf->download('laporan-reimburstments.pdf');
    }

    public function confirm(Request $request, $id)
    {
        Reimburstment::find($id)->update([
            'status' => $request->status
        ]);

        return back();
    }

    public function download($id)
    {
        $i = Reimburstment::find($id)->nota;

        return response()->download(storage_path('app/public/'. $i));
    }
}
