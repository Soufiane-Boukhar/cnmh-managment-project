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

<div class="p-4">
    <h2>Mon profil</h2>
</div>

<div class="container">

    <form action="{{ route('update.user' , $profile->id) }}" method="post">
        @csrf 
        @method('PATCH')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" value="{{ $profile->nom }}" name="nom">
        </div>
        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" value="{{ $profile->prenom }}" name="prenom">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" value="{{ $profile->email }}" name="email">
        </div>
       
        <button type="submit" class="btn btn-primary">Editer</button>
    </form>

</div>
@endsection