@extends('layouts.app')

@section('content')
    <h1>Roles</h1>
    <ul>
        @foreach ($roles as $role)
            <li>{{ $role->name }}</li>
            <!-- Add buttons or links for edit and delete -->
             <div class="btn-group">
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('roles.destroy', $role) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
        @endforeach
    </ul>
    <!-- Add link to create a new role -->
@endsection