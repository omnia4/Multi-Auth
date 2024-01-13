@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Role</h1>

        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Role Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Create Role</button>
        </form>
    </div>
@endsection