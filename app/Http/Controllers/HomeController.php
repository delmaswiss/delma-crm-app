<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

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
        Alert::info('test');
        return view('home');
    }
}
