
@extends('layouts.main')

@section('title','API Stats')

@section('content')
    <div class="d-flex flex-column text-center">
        <div style="background-color:#6E6E6E;" class="m-5">  
            <h1>API Stats</h1> 
            <table class="table table-borderless">
                <thead>
                    <tr class="row">
                        <th class="col-sm-3">Current Admin</th>
                        <th class="col-sm-3">Active Sessions</th>
                        <th class="col-sm-3">Requests Used</th>
                        <th class="col-sm-3">Sessions Used</th>
                    </tr>
                </thead>
                    <tr class="row">
                        <td class="col-sm-3">{{ Auth::user()->name }}</td>
                        <td class="col-sm-3">{{ $check[0]->Active_Sessions }}/{{ $check[0]->Concurrent_Sessions }}</td>
                        <td class="col-sm-3">{{ $check[0]->Total_Requests_Today }}/{{ $check[0]->Request_Limit_Daily }}</td>
                        <td class="col-sm-3">{{ $check[0]->Total_Sessions_Today }}/{{ $check[0]->Session_Cap }}</td>
                    </tr>
            </table>
        </div> 
    </div>
@endsection
