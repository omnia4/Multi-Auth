
{{--  @extends('layouts.app')

@section('content')
<form action="{{ url('/roles/'.$role->id.'/assign-permission') }}" method="POST">
    @csrf
    <select name="permission_id">
        @foreach ($permissions as $permission)
            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
        @endforeach
    </select>
    <button type="submit">Assign Permission</button>
</form>
@endsection  --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Assign Permissions to Role</h1>

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

        <form method="POST" action="{{ route('roles.assign-permission', ['role' => $role->id]) }}">
            @csrf
            <div class="form-group">
                <label for="permission">Select Permission:</label>
                <select name="permission_id" id="permission" class="form-control">
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign Permission</button>
        </form>
    </div>
@endsection