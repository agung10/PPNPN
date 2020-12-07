<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Model\DataPelamar;
use Illuminate\Http\Request;

use App\Model\Jabatan;
use App\User;
use DB;
use Laravel\Ui\Presets\React;

class DataPelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['nm_jabatans']   = Jabatan::select('nm_jabatan')->groupBy('nm_jabatan')->get();
        $d['data_pelamars'] = DataPelamar::orderBy("ID", "DESC")->get();

        if (\Auth::user()->role != "User") {
            return view("app.dataPelamar.admin.index", $d);
        } else {
            return view("app.dataPelamar.user.index", $d);
        }
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
        $request->validate([
            'no_ktp' => 'required|unique:data_pelamars', 'min:6',
        ]);

        $d                = new DataPelamar;
        $d->no_ktp        = $request->input('no_ktp');
        $d->nama          = $request->input('nama');
        $d->tmpt_lahir    = $request->input('tmpt_lahir');
        $d->tgl_lahir     = $request->input('tgl_lahir');
        $d->jenis_kelamin = $request->input('jenis_kelamin');
        $d->no_ijazah     = $request->input('no_ijazah');
        $d->nm_sekolah    = $request->input('nm_sekolah');
        $d->jenjang       = $request->input('jenjang');
        $d->fakultas      = $request->input('fakultas');
        $d->jurusan       = $request->input('jurusan');
        $d->ipk           = $request->input('ipk');
        $d->jabatan_id    = $request->input('jabatan_id');

        $d->s_ktp          = "Belum Disetujui";
        $d->s_foto         = "Belum Disetujui";
        $d->s_ijazah       = "Belum Disetujui";
        $d->s_transkrip    = "Belum Disetujui";
        $d->s_srt_lamaran  = "Belum Disetujui";
        $d->s_lembar_isian = "Belum Disetujui";

        $foto = $request->file('foto');
        if (!empty($foto)) {
            $d->foto = $foto->getClientOriginalName();
            $foto->move(public_path('app-assets/images/berkas/FOTO'),$foto->getClientOriginalName());
        }

        $ktp = $request->file('ktp');
        if (!empty($ktp)) {
            $d->ktp = $ktp->getClientOriginalName();
            $ktp->move(public_path('app-assets/images/berkas/KTP'),$ktp->getClientOriginalName());
        }        

        $ijazah = $request->file('ijazah');
        if (!empty($ijazah)) {
            $d->ijazah = $ijazah->getClientOriginalName();
            $ijazah->move(public_path('app-assets/images/berkas/IJAZAH'),$ijazah->getClientOriginalName());
        }
        
        $transkrip = $request->file('transkrip');
        if (!empty($transkrip)) {
            $d->transkrip = $transkrip->getClientOriginalName();
            $transkrip->move(public_path('app-assets/images/berkas/TRANSKRIP'),$transkrip->getClientOriginalName());
        }
        
        $srt_lamaran = $request->file('srt_lamaran');
        if (!empty($srt_lamaran)) {
            $d->srt_lamaran = $srt_lamaran->getClientOriginalName();
            $srt_lamaran->move(public_path('app-assets/images/berkas/LAMARAN'),$srt_lamaran->getClientOriginalName());
        }

        $lembar_isian = $request->file('lembar_isian');
        if (!empty($lembar_isian)) {
            $d->lembar_isian = $lembar_isian->getClientOriginalName();
            $lembar_isian->move(public_path('app-assets/images/berkas/LEMBAR_ISIAN'),$lembar_isian->getClientOriginalName());
        }

        // Dapetin Nomor Registrasi
        $data = DataPelamar::orderby('id', 'desc')->first();
        if (empty($data)) {
            $d->registrationId = 1111; 
        }else{
            $after = $data->registrationId + 1;
            $d->registrationId = $after;     
        }

        $user_id = \Auth::user()->id;
        $data_user = User::find($user_id);
        $data_user->no_ktp = $request->input('no_ktp');

        $d->save();
        return redirect()->route("app.dataPelamar.user.hasil/$d->no_ktp")->with("alertStore", $request->input("nama"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\DataPelamar  $dataPelamar
     * @return \Illuminate\Http\Response
     */
    public function show($no_ktp)
    {
        $d['data_pelamars'] = DataPelamar::where('no_ktp', $no_ktp)->first();

        return view('app.dataPelamar.user.hasil', $d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\DataPelamar  $dataPelamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d['data_pelamars'] = DataPelamar::find($id);
        $d['nm_jabatans'] = DB::table('jabatans')->select('nm_jabatan')->groupBy('nm_jabatan')->get();

        return view('app.dataPelamar.user.edit', $d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\DataPelamar  $dataPelamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_ktp' => 'required|unique:data_pelamars', 'min:6',
        ]);

        $d                = DataPelamar::find($id);
        $d->no_ktp        = $request->input('no_ktp');
        $d->nama          = $request->input('nama');
        $d->tmpt_lahir    = $request->input('tmpt_lahir');
        $d->tgl_lahir     = $request->input('tgl_lahir');
        $d->jenis_kelamin = $request->input('jenis_kelamin');
        $d->no_ijazah     = $request->input('no_ijazah');
        $d->nm_sekolah    = $request->input('nm_sekolah');
        $d->jenjang       = $request->input('jenjang');
        $d->fakultas      = $request->input('fakultas');
        $d->jurusan       = $request->input('jurusan');
        $d->ipk           = $request->input('ipk');
        $d->jabatan_id    = $request->input('jabatan_id');

        $foto = $request->file('foto');
        if (!empty($foto)) {
            $d->foto = $foto->getClientOriginalName();
            $foto->move(public_path('app-assets/images/berkas/FOTO'),$foto->getClientOriginalName());
        }

        $ktp = $request->file('ktp');
        if (!empty($ktp)) {
            $d->ktp = $ktp->getClientOriginalName();
            $ktp->move(public_path('app-assets/images/berkas/KTP'),$ktp->getClientOriginalName());
        }

        $ijazah = $request->file('ijazah');
        if (!empty($ijazah)) {
            $d->ijazah = $ijazah->getClientOriginalName();
            $ijazah->move(public_path('app-assets/images/berkas/IJAZAH'),$ijazah->getClientOriginalName());
        }
        
        $transkrip = $request->file('transkrip');
        if (!empty($transkrip)) {
            $d->transkrip = $transkrip->getClientOriginalName();
            $transkrip->move(public_path('app-assets/images/berkas/TRANSKRIP'),$transkrip->getClientOriginalName());
        }
        
        $srt_lamaran = $request->file('srt_lamaran');
        if (!empty($srt_lamaran)) {
            $d->srt_lamaran = $srt_lamaran->getClientOriginalName();
            $srt_lamaran->move(public_path('app-assets/images/berkas/LAMARAN'),$srt_lamaran->getClientOriginalName());
        }

        $lembar_isian = $request->file('lembar_isian');
        if (!empty($lembar_isian)) {
            $d->lembar_isian = $lembar_isian->getClientOriginalName();
            $lembar_isian->move(public_path('app-assets/images/berkas/LEMBAR_ISIAN'),$lembar_isian->getClientOriginalName());
        }

        $user_id = \Auth::user()->id;
        $data_user = User::find($user_id);
        $data_user->no_ktp = $request->input('no_ktp');

        $d->save();
        return redirect()->route("app.dataPelamar.user.hasil/$d->no_ktp")->with("alertUpdate", $request->input("nama"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\DataPelamar  $dataPelamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Tambahan
    public function getNamaJabatan(Request $request)
    {
        $nama_jabatan = $request->nama_jabatan;
        $kd_jabatan   = Jabatan::where("nm_jabatan", $nama_jabatan)->select("kd_jabatan")->orderBy('kd_jabatan')->get();

        return response()->json($kd_jabatan);
    }

    public function getKodeJabatan(Request $request)
    {
        $kode_jabatan = $request->kode_jabatan;
        $hasil        = Jabatan::where("kd_jabatan", $kode_jabatan)->select("id", "kualifikasi_pend", "lokasi_jabatan")->get();

        return response()->json($hasil);
    }

    // oleh ADMIN
    public function verifikasi(Request $request, $id, $no_ktp)
    {
        $d = DataPelamar::find($id)->where('no_ktp', $no_ktp)->first();;

        if ($request->has('check_ktp')) 
        {
            $d->s_ktp = "Disetujui";
        }

        if ($request->has('check_ijazah')) 
        {
            $d->s_ijazah = "Disetujui";
        }

        if ($request->has('check_transkrip')) 
        {
            $d->s_transkrip = "Disetujui";
        }

        if ($request->has('check_lamaran')) 
        {
            $d->s_srt_lamaran = "Disetujui";
        }

        if ($request->has('check_lembar')) 
        {
            $d->s_lembar_isian = "Disetujui";
        }

        if ($request->has('check_ktp')       && 
            $request->has('check_ijazah')    && 
            $request->has('check_transkrip') && 
            $request->has('check_lamaran')   && 
            $request->has('check_lembar')) 
            
            {
                $ujian = DB::table('data_pelamars')->orderby('nomor_ujian', 'DESC')->limit(1)->first();
                if(!empty($ujian->nomor_ujian)){
                    $d->nomor_ujian = sprintf("%04d", $ujian->nomor_ujian + 1);
                }
                else{
                    $d->nomor_ujian = sprintf("%04d", 1);
                }
            }
            $d->save();

        return back()->with("alertVerifikasi", "___");
    }
}
