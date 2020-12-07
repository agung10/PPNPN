<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("app.profile.index");
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
        abort(404);
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
        abort(404);
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
        $d            = User::find($id);
        $d->name      = $request->input('name');
        $d->api_token = \Str::random(100);

        $profile = $request->file('profile');
        if (!empty($profile)) {
            $rand       = bin2hex(openssl_random_pseudo_bytes(50)) . "." . $profile->extension();
            $rand_md5   = md5($rand) . "." . $profile->extension();
            $d->profile = $rand_md5;
            
            if (\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator"){
                $profile->move(public_path('app-assets/images/profile/img_upload/Administrator'), $rand_md5);
            } elseif (\Auth::user()->role == "User"){
                $profile->move(public_path('app-assets/images/profile/img_upload/User'), $rand_md5);
            }
        }

        $d->save();
        return back()->with("alertUpdate", $request->input('name'));
    }

    public function update_kataSandi(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $d = User::find($id);
        if (!empty($request->input('password'))) {
            $d->password  = \Hash::make($request->input('password'));
            $d->password_ = $request->input('password');
        }

        $d->save();
        return back()->with("alertUpdateKS", ".....");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
