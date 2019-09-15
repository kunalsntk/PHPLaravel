@extends('layouts.app')

@section('content')
<?php use \App\Http\Controllers\HomeController; ?>
<style type="text/css">
    .commit-container{
        margin-top: 30px;
    }
    .commit-table{
        border-style: none;
        border-color: transparent;
        margin-bottom: 0px;
    }
    .commit-row{
        padding:0px;
    }
    .commit-wrapper{
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 4px;
    }
    .avatar{
        width: 50px;
        display: inline;
        border-radius: 50%;
        margin-right: 10px;
        margin-top: 10px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Total Commits: {{$total_commits}}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center commit-container">
        <div class="col-sm-12">
         <h3>Commits</h3>
        </div>
        <div class="col-md-12">
            <div id="accordion">
            @foreach($commits as $commitArray)
                
              <div class="card">
                <div class="card-header commit-row" id="headingOne">
                    <div class="row commit-wrapper">
                        <div class="col-sm-2">{{HomeController::getInfo($commitArray, 'id')}}</div>
                        <div class="col-sm-2">{{HomeController::getInfo($commitArray, 'name')}}</div>
                        <div class="col-sm-2">{{HomeController::getInfo($commitArray, 'email')}}</div>
                        <div class="col-sm-2"><a href="{{HomeController::getInfo($commitArray, 'profile')}}" target="_blank">View Profile</a></div>
                        <div class="col-sm-2 col-md-3">{{HomeController::getInfo($commitArray, 'date')}}</div>
                        <div class="col-sm-1">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{HomeController::getInfo($commitArray, 'node_id')}}" aria-expanded="true" aria-controls="collapse{{HomeController::getInfo($commitArray, 'node_id')}}">Details</button>
                        </div>
                    </div>
                </div>
                <div id="collapse{{HomeController::getInfo($commitArray, 'node_id')}}" class="collapse" aria-labelledby="heading{{HomeController::getInfo($commitArray, 'node_id')}}" data-parent="#accordion">
                  <div class="card-body">
                        <div>
                            <strong>Node:</strong> {{HomeController::getInfo($commitArray, 'node_id')}}
                        </div>
                        <div>
                            <strong>ID:</strong> {{HomeController::getInfo($commitArray, 'id')}}
                        </div>
                        <div>
                            <h6>Message:</h6>
                            <p>{{HomeController::getInfo($commitArray, 'message')}}</p>
                        </div>
                        <div>
                            <strong>Repository:</strong> <a href="{{HomeController::getInfo($commitArray, 'repo_url')}}">{{HomeController::getInfo($commitArray, 'repo_url')}}</a>
                        </div>
                        <div>
                            <strong>Organisation:</strong> <a href="{{HomeController::getInfo($commitArray, 'org_url')}}">{{HomeController::getInfo($commitArray, 'org_url')}}</a>
                        </div>
                        <div>
                            <a href="{{HomeController::getInfo($commitArray, 'profile')}}" target="_blank"><img src="{{HomeController::getInfo($commitArray, 'avatar')}}" class="avatar"><p  style="display: inline"><strong>{{HomeController::getInfo($commitArray, 'name')}}</strong></p></a>
                        </div>
                  </div>
                </div>
              </div>
              @endforeach
              <br>
              {{ $commits->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
