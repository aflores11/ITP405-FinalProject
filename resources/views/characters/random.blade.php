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
        .text_display{
            font-size:2vw;
        }
        .text_display2{
            font-size:1vw;
        }

        @media (max-width: 775px){
            .god_card{
                width: max-content;
                height: auto;
            }
            .text_display{
                font-size:5vw;
            }
            .text_display2{
                font-size:3vw;
            }
        }
  </style>
    <div class = "d-flex flex-row flex-wrap text-center justify-content-center">
        <div style="background-color:#6E6E6E;" class = "p-5 m-5 god_card">
                <h1 class="text_display" >{{ $name }}</h1>
                <img src="{{ URL::to('/') }}/images/{{ preg_replace('/\s+/', '-', strtolower($name)) }}.jpg" class="image_custom" alt="Image" />
                <p class="mt-2 text_display2">Pantheon: {{ $pantheon }}</p>
                <p class="text_display2">Damage Type: {{ $damage }}</p>
                <p class="text_display2">Default Role: {{ $type }}</p>
        </div>
    </div>
@endsection