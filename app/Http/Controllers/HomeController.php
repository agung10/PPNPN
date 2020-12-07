<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\DataPelamar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $d['administrators'] = User::where("role", "Administrator");
        $d['data_pelamars'] = DataPelamar::get()->first();

        return view('home', $d);
    }

    protected function authenticated(Request $request, $user)
    {
        $t = time();
        $request->session()->flash('success', 'You are logged in!');
        $request->session()->put('logged', $t);
    }
}
