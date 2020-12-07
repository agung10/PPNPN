<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Str;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        if (!empty($q)) {
            $d['administrators'] = User::query()->where('name', 'LIKE', "%{$q}%")->orWhere('email', 'LIKE', "%{$q}%")->paginate(6);
        } else {
            $d['administrators'] = User::orderBy("ID", "DESC")->where('role', 'AdminUtama')->orWhere('role', 'Administrator')->paginate(6);
        }

        return view('app.r_admin.index', $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.r_admin.create');
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
            'name'     => 'required',
            'email'    => 'required|unique:users',
            'password' => ['required', 'string', 'min:6'],
        ]);

        $d = new User;
        $d->name      = $request->input('name');
        $d->email     = $request->input('email');
        $d->password  = Hash::make($request->input('password'));
        $d->password_ = $request->input('password');
        $d->role      = "Administrator";
        $d->api_token = Str::random(100);

        $profile = $request->file('profile');
        if (!empty($profile)) {
            $rand       = bin2hex(openssl_random_pseudo_bytes(50)) . "." . $profile->extension();
            $rand_md5   = md5($rand) . "." . $profile->extension();
            $d->profile = $rand_md5;

            $profile->move(public_path('app-assets/images/profile/img_upload/Administrator'), $rand_md5);
        }

        $d->save();
        return redirect()->route("tambahAdmin.index")->with("alertStore", $request->input("name"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d['administrators'] = User::find($id);

        return view('app.r_admin.edit', $d);
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
        $d        = User::find($id);
        $d->name  = $request->input('name');

        if (!empty($request->input('password'))) {
            $d->password  = \Hash::make($request->input('password'));
            $d->password_ = $request->input('password');
        }
        $d->api_token = Str::random(100);
        $d->role      = "Administrator";

        $profile = $request->file('profile');
        if (!empty($profile)) {
            $rand       = bin2hex(openssl_random_pseudo_bytes(50)) . "." . $profile->extension();
            $rand_md5   = md5($rand) . "." . $profile->extension();
            $d->profile = $rand_md5;

            $profile->move(public_path('app-assets/images/profile/img_upload/Administrator'), $rand_md5);
        }

        $d->save();
        return redirect()->route("tambahAdmin.index")->with("alertUpdate", $request->input("name"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d    = User::find($id);
        $name = $d->name;

        $d->delete();
        return back()->with("alertDestroy", $name);
    }
}
