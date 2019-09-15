@extends('layouts.app')

@section('content')
<style type="text/css">
    .commit-container{
        margin-top: 30px;
    }
    .commit-table{
        border-style: none;
        border-color: transparent;;
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
            @foreach ($data as $dataIndex => $dataArray)
              <div class="card">
                <div class="card-header" id="headingOne">
                    <table class="table commit-table">
                            <tr>
                                <td>id</td>
                                <td>name</td>
                                <td>email</td>
                                <td>profile</td>
                                <td>date</td>
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
                            id
                        </div>
                        <div>
                            <h6>Message:</h6>
                            <p>message goes here</p>
                        </div>
                        <div>
                            <a href="">Repo</a>
                        </div>
                        <div>
                            <a href="">Org</a>
                        </div>
                        <div>
                            <img src=""><p>name</p>
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
