@extends('layouts.app')

@section('content')
<?php use \App\Http\Controllers\HomeController; ?>
<style type="text/css">
    .commit-container{
        margin-top: 30px;
    }
    .commit-table{
        border-style: none;
        border-color: transparent;;
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
                    Total Commits: 
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
                <div class="card-header" id="headingOne">
                    <table class="table commit-table">
                            <tr>
                                <td>id</td>
                                <td>{{HomeController::getInfo($commitArray, 'name')}}</td>
                                <td>{{HomeController::getInfo($commitArray, 'email')}}</td>
                                <td><a href="{{HomeController::getInfo($commitArray, 'profile')}}">View Profile</a></td>
                                <td>{{HomeController::getInfo($commitArray, 'date')}}</td>
                                <td>
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Details
                                    </button>
                                </td>
                            </tr>
                    </table>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                        <div>
                            <strong>Node:</strong> {{HomeController::getInfo($commitArray, 'id')}}
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
                            <img src="{{HomeController::getInfo($commitArray, 'avatar')}}" class="avatar"><p  style="display: inline">{{HomeController::getInfo($commitArray, 'name')}}</p>
                        </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
