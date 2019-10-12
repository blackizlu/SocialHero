<?php

namespace App\Http\Controllers;

use App\Donacion;
use App\Http\Requests\StoreDonation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['beneficiarios', 'save']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }
    public function beneficiarios()
    {
        return view('beneficiarios');
    }

    function save(Request $request){
        $request->validate([
            'donador' => 'required',
            'beneficiario_id' => 'required',
            'cantidad' => 'required|numeric',
        ]);

        $donacion = new Donacion($request->all());
        $donacion->save();

        $message = "Donación exitosa";
        Session::flash('exitoso', $message);

        return redirect()->back();

    }
}
