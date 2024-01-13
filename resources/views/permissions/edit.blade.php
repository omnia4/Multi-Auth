@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Permission</h1>

        <form method="POST" action="{{ route('permissions.update', $permission) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Permission Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Permission</button>
        </form>
    </div>
@endsection