
{{--  @extends('layouts.app')

@section('content')
<form action="{{ url('/users/'.$user->id.'/assign-role') }}" method="POST">
    @csrf
    <select name="role_id">
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <button type="submit">Assign Role</button>
</form>
@endsection  --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Assign Role to User</h1>

        <!-- Display any success/error messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('users.assign-role', ['user' => $user->id]) }}">
            @csrf
            <div class="form-group">
                <label for="role">Select Role:</label>
                <select name="role_id" id="role" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign Role</button>
        </form>
    </div>
@endsection
