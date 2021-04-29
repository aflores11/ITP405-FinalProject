@extends('layouts.main')

@section('title', 'Random God Chosen')

@section('content')
    <style>
        .image_custom{
            width: 100%;
            height: auto;
        }
  </style>
    <div class = "d-flex flex-row flex-wrap text-center justify-content-center">
        <div style="background-color:#6E6E6E; width: 25%; height:20%" class = "p-5 m-5">
                <h1 style="font-size:2vw;" >{{ $name }}</h1>
                <img src="{{ URL::to('/') }}/images/{{ preg_replace('/\s+/', '-', strtolower($name)) }}.jpg" class="image_custom" alt="Image" />
                <p style="font-size:1vw;">{{ $pantheon }} {{ $damage }} {{ $type }}</p>
        </div>
    </div>
@endsection