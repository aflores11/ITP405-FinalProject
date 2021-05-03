
@extends('layouts.main')

@section('title','Admin - Block/Unblock')

@section('content')
    <div class="d-flex flex-column text-center">
        <div style="background-color:#6E6E6E;" class="m-5 p-5">  
            <form action="{{ route('block-unblock') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user" class="form-label">Allowed Users</label>
                    <select name="user" 
                            id="user" 
                            class="form-select"
                            >
                        <option value="">-- Select User --</option>
                        @foreach($not_blocked as $user)
                            <option 
                            value="{{$user->id}}"
                            {{ $user->id === (int)old('user', $user->id) ? "selected" : "" }}
                            >
                                {{$user->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('user')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    BLOCK
                </button>
            </form>
        </div> 
        <div style="background-color:#6E6E6E;" class="m-5 p-5">  
            <form action="{{ route('block-unblock') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user" class="form-label">Blocked Users</label>
                    <select name="user" 
                            id="user" 
                            class="form-select"
                            >
                        <option value="">-- Select User --</option>
                        @foreach($blocked as $user)
                            <option 
                            value="{{$user->id}}"
                            {{ $user->id === (int)old('user', $user->id) ? "selected" : "" }}
                            >
                                {{$user->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('user')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    UNBLOCK
                </button>
            </form>
        </div> 
    </div>
@endsection
