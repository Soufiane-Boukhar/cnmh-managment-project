@extends('layouts.layout')
@extends('layouts.nav')
@section('content')

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
    <h2>Ajouter un projet</h2>
</div>

<div class="container">
    <div class="mt-4">
        <form method="post" action="{{ route('create.projet') }}">
            @csrf
            @method('POST')
            <input type="hidden" name="id_user" value="{{ auth()->check() ? Auth::user()->id : '' }}">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="nom" class="form-control" name="nom">
            </div>
            <div class="form-group">
                <label for="mytextarea">Description</label>
                <textarea id="mytextarea" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="dateDebut">Date de debut</label>
                <input type="date" id="dateDebut" class="form-control" name="date_debut">
            </div>
            <div class="form-group">
                <label for="dateFin">Date de fin</label>
                <input type="date" id="dateFin" class="form-control" name="date_fin">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

</div>

@endsection