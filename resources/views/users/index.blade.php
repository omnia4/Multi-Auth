<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{__('Users')}}</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
            <div class="btn-group">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
        @endforeach
    </ul> 
    <!-- Add link to create a new user -->

@endsection