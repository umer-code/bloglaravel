<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        return view('home');

 //storing key value pair in session

    //    $request->session()->put(['c'=>'789']);
    //    $request->session()->put(['a'=>'123']);
    //    $request->session()->put(['b'=>'45']);
       
    //global storing data in session

    //    session(['k1', 'value2']);
    //    session(['k2', 'valu3']);
       // session(['k3', 'value4']);
     //  $request->session()->flush();
    //    print_r(session()->all());
    //    print_r($request->session()->get('0'));
    //    print_r($request->session()->get('b'));
    }
}
