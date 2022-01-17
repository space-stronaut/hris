<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journals = Journal::where('user_id', Auth::user()->id)->get();

        return view('journals.index', compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('journals.create');
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

        if ($request->file('foto') != NULL) {
            $data['foto'] = $request->file('foto')->store('foto_journal', 'public');
        }
        if ($request->file('document') != NULL) {
            $data['document'] = $request->file('document')->store('document_journal', 'public');
        }

        Journal::create($data);

        return redirect()->route('journal.index');
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
        $journal = Journal::find($id);

        return view('journals.edit', compact('journal'));
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

        if ($request->file('foto') != NULL) {
            $data['foto'] = $request->file('foto')->store('foto_journal', 'public');
        }
        if ($request->file('document') != NULL) {
            $data['document'] = $request->file('document')->store('document_journal', 'public');
        }

        Journal::find($id)->update($data);

        return redirect()->route('journal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Journal::find($id)->delete();

        return redirect()->back();
    }

    public function confirm(Request $request, $id)
    {
        Journal::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function download($id)
    {
        $i = Journal::find($id)->foto;

        return response()->download(storage_path('app/public/'. $i));
    }
}
