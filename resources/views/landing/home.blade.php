@extends('layouts.main')

@section('title','')

@section('content')
    <div class="d-flex flex-column text-center">
        <div style="background-color:#6E6E6E;" class="m-5">  
            <h1>Match of the Day</h1>  
            <h5>{{ $motd->title }}</h5>  
            <p class="ps-5 pe-5">{{  preg_replace ('/<li>/', ' ', preg_replace ('/<\/li>/', '.', $motd->description)) }}</p>
        </div> 
        <div style="background-color:#6E6E6E;" class="m-5">  
            <h1>Server Status</h1>  
            <table class="table table-borderless">
                <thead>
                    <tr class="row">
                        <th class="col-sm-3">Platform</th>
                        <th class="col-sm-3">Status</th>
                        <th class="col-sm-3">Current Patch Version</th>
                    </tr>
                </thead>
                @foreach ($servers as $server)
                    <tr class="row">
                        <td class="col-sm-3">{{ $server->platform }}</td>
                        <td class="col-sm-3">{{ $server->status }}</td>
                        <td class="col-sm-3">{{ $server->version }}</td>
                    </tr>
                @endforeach
            </table>
           
        </div>  
    </div>
@endsection
