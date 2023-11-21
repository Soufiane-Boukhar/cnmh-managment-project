@extends('layouts.layout')
@extends('layouts.nav')
@section('content')

<div class="container" style="margin-top:30px;"> @if(session('success')) <div style="margin-bottom:30px;"> <span
    class="font-medium text-success">{{session('success')}}</span> </div>
    @elseif(session("failed"))
    <div style="margin-bottom:30px;">
    <span class="font-medium text-danger">{{session('failed')}}</span>
    </div> @endif <form method="POST" action="{{ route('update.stagiaire', ['id' => $profil->id]) }}">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="Nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $profil->nom }}">
    </div>
    <div class="mb-3">
    <label for="Prenom" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="Prenom" name="prenom" value="{{ $profil->prenom }}">
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $profil->email }}">
    </div>

    <button type="submit" class="btn btn-primary">Editer</button>
    </form>

    </div> @endsection