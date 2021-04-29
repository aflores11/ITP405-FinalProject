@extends('layouts.main')

@section('title','')

@section('content')
    <style>
        .image_custom{
            width: 100%;
            height: auto;
        }
        .god_card{
            width: 20%; 
            height:50%;
        }

        .text_display{
            font-size:1.5vw;
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
        @foreach ($gods as $god)
            <div style="background-color:#6E6E6E;" class = "p-5 mt-5 ms-2 me-2 god_card">
                <h1 class="text_display" >{{ $god->name }}</h1>
                <img src="{{ URL::to('/') }}/images/{{ preg_replace('/\s+/', '-', strtolower(preg_replace('/\'/', '', $god->name))) }}.jpg" class="image_custom" alt="Image" />
                <p class="mt-2 text_display2">{{ $god->pantheon->name }}</p>
                <p class="text_display2">{{ $god->damage->damage_type }}</p>
                <p class="text_display2">{{ $god->type->role_type }}</p>
            </div>   
        @endforeach
    </div>
@endsection
