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
        $commits = $gitClientObj->execQuery();
        $commits = json_decode($commits,true);
        return view('home', [
            'commits' => $commits
        ]);
    }

    public static function getInfo($array, $property)
    {
        switch($property){
            case 'id': 
                $result = $array['node_id'];
                break;
           case 'name': 
                $result = $array['commit']['committer']['name'];
                break;
           case 'email':
                $result = $array['commit']['committer']['email'];
                break;
           case 'date':
                $result = $array['commit']['committer']['date'];
                break;
            case 'message':
                $result = $array['commit']['message'];
                break;
            case 'repo_url':
                $result = $array['committer']['repos_url'];
                break;
            case 'org_url':
                $result = $array['committer']['organizations_url'];
                break;
            case 'avatar':
                $result = $array['committer']['avatar_url'];
                break;
            case 'profile':
                $result = $array['committer']['url'];
                break;
        }
        return $result;    
    }
}
