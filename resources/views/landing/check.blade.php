
@extends('layouts.main')

@section('title','API Status')

@section('content')
    <div class="d-flex flex-column text-center">
        <div style="background-color:#6E6E6E;" class="m-5">  
            {{ $check }}
        </div> 
        <div>
            {{ $motd }}
        </div>
    </div>
@endsection
