<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; //追記
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
     * @return \Illuminate\Contracts\Support\Renderable;
     */
    public function index()
    {
        $posts = DB::table('posts')->get();
        return view('home', ['posts' => $posts]);
    }
}
