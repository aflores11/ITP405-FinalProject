@extends('layouts.main')

@section('title', 'Blocked')

@section('content')
    <div class = "d-flex flex-row flex-wrap text-center justify-content-center">
        <div style="background-color:#6E6E6E;" class = "p-5 mt-5 ms-2 me-2">
            <p>{{ Auth::user()->name }}, you have been blocked from accessing site features.</p>
        </div>
    </div>
@endsection