<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\gitClient;
use Illuminate\Pagination\LengthAwarePaginator;

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
    public function index(Request $request)
    {
        $gitClientObj = new gitClient();
        $commits = $gitClientObj->execQuery();
        $commits = json_decode($commits,true);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        $commitCollection = collect($commits);
        $perPage = 10;
        $currentPageCommits = $commitCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedCommits = new LengthAwarePaginator($currentPageCommits , count($commitCollection), $perPage);
        $paginatedCommits->setPath($request->url());

        return view('home', [
            'commits' => $paginatedCommits
        ]);
    }

    public static function getInfo($array, $property)
    {
        switch($property){
            case 'node_id': 
                $result = $array['node_id'];
                break;
            case 'id': 
                $result = $array['author']['id'];
                if($result == ""){
                    $result = "-";
                }
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
                $result = $array['committer']['html_url'];
                break;
        }
        return $result;    
    }
}
