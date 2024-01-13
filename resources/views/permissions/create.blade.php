@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Permission</h1>

        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Permission Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Create Permission</button>
        </form>
    </div>
@endsection