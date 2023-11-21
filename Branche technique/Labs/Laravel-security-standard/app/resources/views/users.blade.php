@extends('layouts.app')

@section('content')

@role('admin')

<div class="p-4">
    <h2>List of users</h2>
</div>
<div class="container">
    <div class="card">

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table" id="projects-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td style="width: 300px">
                                <div class='btn-group'>
                                    <a href="{{ route('manage.role.permission', [$user->id]) }}"
                                        class='btn btn-primary '>
                                        Manage Role and permission
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <div class="float-right">
                    @include('adminlte-templates::common.paginate', ['records' => $users])
                </div>
            </div>
        </div>
    </div>
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