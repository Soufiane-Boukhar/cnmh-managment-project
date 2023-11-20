@extends('layouts.app')

@section('content')
    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->can('create projects')))

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Create Projects</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="content px-3">

            @include('adminlte-templates::common.errors')

            <div class="card">

                {!! Form::open(['route' => 'projects.store']) !!}

                <div class="card-body">

                    <div class="row">
                        @include('projects.fields')
                    </div>

                </div>

                <div class="card-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('projects.index') }}" class="btn btn-default">Cancel</a>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    @else
        <div class="container d-flex justify-content-center">
            <h1>You don't have access</h1>
        </div>
    @endif
@endsection
