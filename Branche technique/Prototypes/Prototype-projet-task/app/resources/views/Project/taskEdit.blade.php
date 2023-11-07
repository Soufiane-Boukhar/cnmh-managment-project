@extends('layouts.layout')
@extends('layouts.nav')
@section('content')

<div class="mt-4">
    @if(session('success'))
    <div class="alert alert-success">
        <p>{{session('success')}}</p>
    </div>
    @endif
</div>


@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="p-4">
    <h2>Modification de task</h2>
</div>

<div class="container">
    <div class="mt-4">
        <form method="post" action="{{ route('update.task', $tasks->id) }}">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id_projet" value="{{ $tasks->id_projet }}">
            <div class="form-group">
                <label for="name">Titre</label>
                <input type="text" id="titre" class="form-control" name="titre" value="{{ $tasks->titre }}">
            </div>
            <div class="form-group">
                <label for="mytextarea">Description</label>
                <textarea id="mytextarea" name="description">{!! $tasks->description !!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Editer</button>
            <button type="button" class="btn btn-danger ml-4" data-toggle="modal" data-target="#task">
                Supprimer
            </button>
        </form>
    </div>

</div>

<div class="modal fade" id="task">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('delete.task' , $tasks->id) }}">
                @csrf
                @method('POST')
                <input type="hidden" name="id_projet" value="{{ $tasks->id_projet }}">

                <div class="modal-body">
                   <p>Voulez-vous vraiment supprimer ce task ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-primary">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection