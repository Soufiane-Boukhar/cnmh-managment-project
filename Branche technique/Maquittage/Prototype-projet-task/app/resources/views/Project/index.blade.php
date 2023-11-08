@extends('layouts.layout')
@extends('layouts.nav')
@section('content')

<div class="container">
    <div class="mt-4">
        @if(session('success'))
        <div class="alert alert-success">
            <p>{{session('success')}}</p>
        </div>
        @endif
    </div>


    @if(session('error'))
    <div class="alert alert-danger">
        <p>{{ session('error') }}</p>
    </div>
    @endif
</div>

<div class="d-flex justify-content-between p-4">
    <div class="d-flex">
        <h2>Liste des task</h2>
        <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#modal-default">
            Ajouter
        </button>
    </div>

    <div class="d-flex">

        <form action="{{ route('task.export') }}" method="post">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-success">Exporter</button>
        </form>

        <form class="ml-4" action="{{ route('task.import', $id) }}" method="post" id="importForm"
            enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="file" id="fileInputImporter" name="file" style="display: none;">
            <button type="button" class="btn btn-primary" id="chooseFileButtonImporter">Importer</button>
        </form>
    </div>

</div>
<div class="ml-4 mb-4">

    <input type="text" id="searchTask" class="form-control" data-inputmask-alias="datetime"
        data-inputmask-inputformat="mm/dd/yyyy" data-mask>
</div>
<div class="ml-4 mb-4 mt-4 d-flex">
    <div class="form-group">
        <label>Filtre</label>
        <select class="custom-select">
            <option value="" selected>Choisir le titre</option>
            @foreach($tasks as $task)
            <option value="{{ $task->titre }}">{{ $task->titre }}</option>
            @endforeach
        </select>

    </div>

</div>
<div class="container">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Titre de task</th>
                <th>Description de task</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBodyTask">

            @foreach($tasks as $task)
            <tr>
                <td>{{$task->titre}}</td>
                <td>{!! $task->description !!}</td>
                @can('update',$task)
                <td>
                    <form action="{{ route('edit.task', $task->id ) }}" method="post">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-success">Editer</button>
                    </form>
                </td>
                @endcan
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-center" id="pagination-links-task">
        {{ $tasks->links() }}
    </div>
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('create.task', $id) }}">
                @csrf
                @method('POST')

                <div class="modal-body">
                    <input type="hidden" name="id_projet" value="{{$id}}">

                    <div class="form-group">
                        <label for="name">Titre</label>
                        <input type="text" id="titre" class="form-control" name="titre">
                    </div>
                    <div class="form-group">
                        <label for="mytextarea">Description</label>
                        <textarea id="mytextarea" name="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('#searchTask').on('keyup', function() {
        var searchInputTask = $('#searchTask').val();
        console.log(searchInputTask);
        $.ajax({
            type: 'POST',
            url: '{{ route('task.search') }}',
            data: {
                search: searchInputTask,
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                $('#tableBodyTask').empty();
                $('#pagination-links-task').empty();
                console.log(response.data);
                response.data.forEach(function(task) {
                    var taskId = task.id;

                    var editLinkHrefTask = editTaskLink(taskId);

                    var rowHtmlTask = `
                        <tr>
                            <td>${task.titre}</td>
                            <td>${task.description}</td>
                            <td>
                                @can('update',$task)
                                    <form action="${editLinkHrefTask}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success">Editer</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    `;
                    $('#tableBodyTask').append(rowHtmlTask);
                });
                $('#pagination-links-task').append(response.links);
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
    });
});

function editTaskLink(taskId) {
    return `{{ route('edit.task', ['id' => ':value']) }}`.replace(':value', taskId);
}
</script>
@endsection