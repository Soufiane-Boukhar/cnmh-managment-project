@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}.
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error') }}.
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of projects</h1>
                </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            <a href="{{ route('project.create') }}"
                                class="btn btn-sm btn-primary">Add New</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class="d-flex justify-content-end align-items-center  p-0">
                                {{-- <div class="form-group input-group-sm mb-0 col-md-2">
                                    <select class="form-control">
                                        <option selected="">Select Projet...</option>
                                        <option>projet 1</option>
                                        <option>projet 2</option>
                                        <option>projet 3</option>
                                    </select>
                                </div> --}}
                                <div class="input-group input-group-sm col-md-3 p-0">
                                    <input id="searchProject" type="text" name="table_search"
                                        class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 table-data">
                            {{-- @include('project.table') --}}
                            @include('project.table', ['projects' => $projects])
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center">
                                    <form action="{{ route('project.import') }}" method="post" enctype="multipart/form-data"
                                        id="importForm">
                                        @csrf
                                        <label for="upload" class="btn btn-default btn-sm mb-0 font-weight-normal">
                                            <i class="fa-solid fa-file-arrow-down"></i>
                                            Importer
                                        </label>
                                        <input type="file" id="upload" name="file" style="display:none;"
                                            onchange="submitForm()" />
                                    </form>
                                <a href="{{ route('project.export') }}" class="btn  btn-default btn-sm mt-0 mx-2">
                                    <i class="fa-solid fa-file-export"></i>
                                    Exporter
                                </a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
