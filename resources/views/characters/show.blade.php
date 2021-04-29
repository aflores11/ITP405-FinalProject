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
                @if (Auth::check())
                    <button id="{{ preg_replace('/\s+/', '-', strtolower($god->name)) }}" type="button" class="btn btn-default btn-sm" style="margin-top: -5%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                          </svg>
                    </button>
                @endif
            </div>   
        @endforeach
    </div>
@endsection
