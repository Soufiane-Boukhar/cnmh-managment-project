@extends('layouts.layoutRegister')

@section('content')

<div class="register-box d-flex" style="width:70vw;">

    <div class="card card-outline" style="width: 120vw;">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b
                    style="font-family: 'Belleza', sans-serif;color:#414e69;">Projects</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg" style="font-family: 'Belleza', sans-serif;color:#414e69;">Restez en contact avec
                nous</p>
            <div class="mt-4">
                @if(session('success'))
                <div class="alert alert-success">
                    <p>{{session('success')}}</p>
                </div>
                @endif
            </div>

            <div class="mt-4">
                @if(session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                </div>
                @endif
            </div>

            <form action="{{ route('login') }}" method="post">
                @csrf
                @method('POST')

                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="col-4 mt-5">
                    <button type="submit" class="btn btnINS btn-block btn-primary"
                        style="font-family: 'Belleza', sans-serif;">Connexion</button>
                </div>
        </div>
        </form>
        <a href="{{ route('show.home') }}" class="text-center" style="font-family: 'Belleza', sans-serif;">Acceuil
            page</a>

        <a href="{{ route('show.inscription') }}" class="text-center" style="font-family: 'Belleza', sans-serif;">Vous
            n'avez pas un compte ?</a>

    </div>
</div>
</div>

@endsection