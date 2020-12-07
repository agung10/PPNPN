<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Pendidikan;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['pendidikans'] = Pendidikan::orderBy("ID", "DESC")->get();

        return view('app.pendidikan.index', $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Pendidikan;
        $d->kd_pend = $request->input('kd_pend');
        $d->nm_pend = $request->input('nm_pend');

        $d->save();

        return back()->with("alertStore", $request->input("kd_pend"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $d = Pendidikan::find($id);
        $d->kd_pend = $request->input('kd_pend');
        $d->nm_pend = $request->input('nm_pend');

        $d->save();
        
        return back()->with("alertUpdate", $request->input("kd_pend"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Pendidikan  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        $d = $pendidikan;
        $nm_pend = $d->nm_pend;

        $d->delete();

        return back()->with("alertDestroy", $kd_pend);
    }
}
