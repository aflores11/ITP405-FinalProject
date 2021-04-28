@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <p>Hello, {{ $user->name }}</p>
@endsection