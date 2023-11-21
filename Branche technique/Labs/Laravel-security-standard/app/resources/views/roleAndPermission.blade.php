@extends('layouts.app')

@section('content')

@role('admin')
<div class="p-4">
    <h2>Assign Role and Permissions to {{$user->name}}</h2>
</div>
<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('assign.role.permission') }}">
        @csrf

        <div class="form-group">
            <label for="user">Select User:</label>
            <select name="user" id="user" class="form-control">
                <option value="{{ $user->name }}">{{ $user->name }}</option>
            </select>
        </div>


        <div class="form-group">
            <label for="role">Select Role:</label>
            <select name="role" id="role" class="form-control">
                @if($userRole->isEmpty())
                <option value="">Select Role</option>
                @else
                @foreach($userRole as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
                @endif

                @foreach($roles as $roleId => $roleName)
                @if(!$userRole->contains('id', $roleId))
                <option value="{{ $roleId }}">{{ $roleName }}</option>
                @endif
                @endforeach


                <option value="">clear role</option>
            </select>


        </div>

        <div class="form-group">
            <label for="permission">Select Permission:</label>
            @foreach($permissions as $permissionId => $permissionName)
            <div class="form-check">
                <input type="checkbox" name="permissions[]" id="permission{{ $permissionId }}"
                    value="{{ $permissionId }}" class="form-check-input"
                    {{ in_array($permissionId, $userPermissions) ? 'checked' : '' }}>
                <label for="permission{{ $permissionId }}" class="form-check-label">{{ $permissionName }}</label>
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Assign Role and Permission</button>
    </form>
</div>
@else

<div class="container-wrapper">
    <div class="div">
        <div class="container">
            <img src="{{ asset('assets/denied.png') }}" alt="" srcset="" width="700vw">
        </div>
        <div class="title">
          <h3>You don't have access to this page</h3>
        </div>
    </div>
</div>

@endrole
@endsection