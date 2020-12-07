<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Model\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['jabatans'] = Jabatan::orderBy("ID", "DESC")->get();

        return view('app.jabatan.index', $d);
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
        $d = new Jabatan;
        $d->kd_jabatan = $request->input('kd_jabatan');
        $d->nm_jabatan = $request->input('nm_jabatan');
        $d->kualifikasi_pend = $request->input('kualifikasi_pend');
        $d->lokasi_jabatan = $request->input('lokasi_jabatan');

        $d->save();

        return back()->with("alertStore", $request->input("kd_jabatan"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $d = Jabatan::find($id);
        $d->kd_jabatan = $request->input('kd_jabatan');
        $d->nm_jabatan = $request->input('nm_jabatan');
        $d->kualifikasi_pend = $request->input('kualifikasi_pend');
        $d->lokasi_jabatan = $request->input('lokasi_jabatan');

        $d->save();
        return back()->with("alertUpdate", $request->input('kd_jabatan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        $d = $jabatan;
        $kd_jabatan = $d->kd_jabatan;

        $d->delete();

        return back()->with("alertDestroy", $kd_jabatan);
    }
}
