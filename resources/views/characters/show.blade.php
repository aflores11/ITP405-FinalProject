@extends('layouts.main')

@section('title', $god->name)

@section('content')
    <style>
        .image_custom{
            width: 100%;
            height: auto;
            border-radius: 50px;
        }
        .god_card{
            width: 35%; 
            height:50%;
            border-radius: 5px 95px 5px;
        }
        .text_display{
            display: block;
            font-size:1.2vw;
        }
        .text_display2{
            font-size:1vw;
        }
        .text_comment{
            background-color: white;
        }
        .externalLinks{
            display: block;
            text-decoration: none !important;
            color: black;
        }
        .commentTitle{
            position: sticky;
            top: 0%;
            z-index: 3;
            
        }
        .commentsContainer{
            height: 33%;
            width: 76%;
            overflow: hidden;
        }
        .commentsInputCont{
            height: 20%;
            width: 76%;
            overflow: scroll;
        }
        .commentinnercon{
            position: sticky;
            width: 100%;
            height: 100%;
            overflow: scroll !important;
        }
        .commentinnercon::-webkit-scrollbar {
            display: none;
        }
        .commentsContainer::-webkit-scrollbar {
            display: none;
        }
        .commentsInputCont::-webkit-scrollbar {
            display: none;
        }
        .cbtn{
            background-color: black;
        }
        a:hover{
            color:white;
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
                <h1 class="text_display" >{{ $god->name }}</h1>
                <img src="{{ URL::to('/') }}/images/{{ preg_replace('/\s+/', '-', strtolower($god->name)) }}.jpg" class="image_custom" alt="Image" />
                <p class="mt-2 text_display2">Pantheon: {{ $god->pantheon->name }}</p>
                <p class="text_display2">Damage Type: {{ $god->damage->damage_type }}</p>
                <p class="text_display2">Default Role: {{ $god->type->role_type }}</p>
                @if (Auth::check())
                    <button type="button" class="btn btn-default btn-lg" style="margin-top: -5%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                          </svg>
                    </button>
                @endif
        </div>
        <div class="flex-column">
            <div style="background-color:#6E6E6E;" class = "p-5 m-5">
                <h1 class="text_display" >Need help making a build?</h1>
                <a href="{{ 'https://smite.guru/builds/'.$god->name }}" class="externalLinks">{{ $god->name }} Smite Guru Builds</a>
                <a href="https://www.smitefire.com/smite/gods" class="externalLinks">Smite Fire</a>
            </div>
            <div style="background-color:#6E6E6E;" class = "pt-3 m-5 commentsInputCont">
                <div class="commentTitle flex-column" >    
                    <h4>Add Comment</h4>
                    @error('comment')
                        <small class="text-danger bg-light">{{ $message }}</small>
                    @enderror
                    <form action="{{ route('handle_comment',['id' => $god->id]) }}" method="POST">
                        @csrf
                        <input id="req" type="hidden" name="req" value="new"/>
                        <input type="hidden" name="godID" value="{{ $god->id }}" id="{{ $god->id }}">
                        <input type="hidden" name="userID" value="{{ Auth::user()->id }}" id="userID">
                        <div>
                            <textarea id="comment" name="comment" rows="3" style="resize:none;" placeholder="Your comment here...">{{ old('comment') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary cbtn">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            <div style="background-color:#6E6E6E;" class = "p-5 m-5 commentsContainer">
                @if (count($god->comments) == 0)
                    <div class="text_display">
                        <p>Be the first to comment!</p>
                    </div>  
                @else
                    <div class="commentinnercon mb-5">
                        @foreach ($god->comments as $comment )
                            <div class="text_display">
                                <p style="display:block" class="text_comment">{{ $comment->text }}</p>
                                <form method="POST" action="{{ route('handle_comment',['id' => $god->id]) }}">
                                    @csrf
                                    <input id="req" type="hidden" name="req" value="delete"/>
                                    <input id="commentID" type="hidden" name="commentID" value="{{ $comment->id }}"/>
                                    <input id="godID" type="hidden" name="godID" value="{{ $god->id }}"/>
                                    <input type="hidden" name="commentID" value="{{ $comment->id }}"/>
                                    <div style="display:block; margin-top: -19px;">
                                        <p style="display: inline-flex; font-size:0.5vw; color:white;">By: {{ $comment->user->name }}</p>
                                        @can('delete', $comment)
                                            <button class="btn btn-link externalLinks" style="display: inline-flex; font-size:0.5vw; color:white; margin-top:3px;" href="/">Delete</button>
                                        @endcan
                                    </div>
                                </form>
                            </div>  
                        @endforeach
                    </div>   
                @endif
            </div>
        </div>
    </div>
@endsection