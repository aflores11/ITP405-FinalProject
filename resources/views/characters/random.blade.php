@extends('layouts.main')

@section('title', 'Random God Chosen')

@section('content')
    <style>
        .image_custom{
            width: 100%;
            height: auto;
        }
        .god_card{
            width: 35%; 
            height:50%;
        }

        @media (max-width: 775px){
            .god_card{
                width: max-content;
                height: auto;
            }
        }
  </style>
    <div class = "d-flex flex-row flex-wrap text-center justify-content-center">
        <div style="background-color:#6E6E6E;" class = "p-5 m-5 god_card">
                <h1 style="font-size:2vw;" >{{ $name }}</h1>
                <img src="{{ URL::to('/') }}/images/{{ preg_replace('/\s+/', '-', strtolower($name)) }}.jpg" class="image_custom" alt="Image" />
                <p class="mt-2" style="font-size:1vw;">Pantheon: {{ $pantheon }}</p>
                <p style="font-size:1vw;">Damage Type: {{ $damage }}</p>
                <p style="font-size:1vw;">Default Role: {{ $type }}</p>
        </div>
    </div>
@endsection