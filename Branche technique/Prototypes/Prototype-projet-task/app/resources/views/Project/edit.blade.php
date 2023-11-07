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
    <h2>Modification de projet</h2>
</div>

<div class="container">
    <div class="mt-4">
        <form method="post" action="{{ route('update.projet', $projet->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="titre" class="form-control" name="nom" value="{{ $projet->nom }}">
            </div>
            <div class="form-group">
                <label for="mytextarea">Description</label>
                <textarea id="mytextarea" name="description">{!! $projet->description !!}</textarea>
            </div>
            <label for="dateDebut">Date de debut</label>
                <input type="date" id="dateDebut" class="form-control" name="date_debut" value="{{ $projet->date_debut }}">
            </div>
            <div class="form-group">
                <label for="dateFin">Date de fin</label>
                <input type="date" id="dateFin" class="form-control" name="date_fin" value="{{ $projet->date_fin }}">
            </div>
            <input type="hidden" name="id_user" value="{{ $projet->id_user }}">
            <button type="submit" class="btn btn-primary">Editer</button>
            <button type="button" class="btn btn-danger ml-4" data-toggle="modal" data-target="#projet">
                Supprimer
            </button>
        </form>
    </div>

</div>

<div class="modal fade" id="projet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Projet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('delete.projet' , $projet->id) }}">
                @csrf
                @method('POST')
                <div class="modal-body">
                   <p>Voulez-vous vraiment supprimer ce projet ?</p>
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