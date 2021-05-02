@extends('layouts.main')

@section('title', 'Random')

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
                <a href="{{ route('god', ['id' => $id]) }}">
                    <img src="{{ URL::to('/') }}/images/{{ preg_replace('/\s+/', '-', strtolower($name)) }}.jpg" class="image_custom" alt="Image" />
                </a>
                <p class="mt-2 text_display2">Pantheon: {{ $pantheon }}</p>
                <p class="text_display2">Damage Type: {{ $damage }}</p>
                <p class="text_display2">Default Role: {{ $type }}</p>
                @if (Auth::check())
                    <form method="post" action="{{ route('favorite') }}">
                        @csrf
                        @if( !is_null($favorites) && in_array($id, $favorites))
                            <button id="{{ preg_replace('/\s+/', '-', strtolower($name)) }}" type="submit" name="favorite" value={{ $id }} class="btn btn-default btn-sm" style="margin-top: -5%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                            </button>
                        @else
                            <button id="{{ preg_replace('/\s+/', '-', strtolower($name)) }}" type="submit" name="favorite" value={{ $id }} class="btn btn-default btn-sm" style="margin-top: -5%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                            </button>
                        @endif
                    </form>
                @endif
        </div>
    </div>
@endsection