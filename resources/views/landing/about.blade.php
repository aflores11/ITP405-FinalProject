
@extends('layouts.main')

@section('title','About This Page')

@section('content')
    <div class="d-flex flex-column text-center">
        <div style="background-color:#6E6E6E;" class="m-5 p-5">  
            <h1>About This Page</h1>  
            <h5>What's the purpose of this site?</h5>
                <p>This website was created for fans of Hirez's Smite Game as part of a final project for the course ITP405 offered at the University of Southern California.</p>
                <p>It's main purpose was for it to assign you a random god that can be used in any game mode</p>
                <p>It was then made to have more functionality for users that are signed in.</p>
            <h5>How does this website work?</h5>
                <p>You do not need to sign in to choose a random god. Just choose the randomize link on the navigation menu and it will present you
                    with a random god. You can also view all the available gods in Smite without having to sign in.
                </p>
            <h5>What are the benefits of creating an account? Is it safe?</h5>
                <p>The benefits of creating an account are that you can keep a list of all your favorite gods. When signed in, you can click on any god's image which will then take you to a page 
                    specific for them. There you can participate in community discussion in the comments section or you can click links that will redirect you to possible builds you can follow.
                </p>
                <p>Creating an account is totally safe! Proper password management is used and your raw password is never stored.</p>
        </div> 
    </div>
@endsection
