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
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function home()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

    public function index()
    {
        return view('layouts/master');
    }

    public function master()
    {
        return view('layouts/master');
    }

    public function next()
    {
        return view('next');
    }

    public function newsletter()
    {
       return view('newsletter');
    }

    public function teams()
    {
        return view('teams');
    }

}
