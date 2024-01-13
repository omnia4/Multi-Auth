@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Permissions</h1>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create New Permission</a>
        <hr>

        <ul class="list-group">
            @foreach ($permissions as $permission)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $permission->name }}
                    <div class="btn-group">
                        <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
@endsection