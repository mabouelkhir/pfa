<?php

namespace App\Http\Controllers;
use App\Models\Chapitre;
use App\Projet;
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
    public function index()
    {
        return view('home');
    }
    public function homepage()
    {
        return View('index')
        ->with('projet', Projet::all())
        ->with('chapitre', Chapitre::all());
    
    }
}
