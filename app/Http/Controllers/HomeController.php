<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\gitClient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gitClientObj = new gitClient();
        $data = $gitClientObj->execQuery();
        // var_dump(json_decode($data));
        return view('home');
    }
}
