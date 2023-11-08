@extends('layouts.layoutRegister')

@section('content')

<div class="register-box d-flex" style="width:70vw;">
    <div class="card card-outline" style="width: 120vw;">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b style="font-family: 'Belleza', sans-serif;">Projects</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg" style="font-family: 'Belleza', sans-serif;">Inscrire un nouveau habitant</p>

            <form action="{{ route('inscription.user') }}" method="post">
                @csrf 
                @method('POST')
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nom" name="nom">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Prenom" name="prenom">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

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
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms" style="font-family: 'Belleza', sans-serif;">
                                J'accepte les <a href="#" style="font-family: 'Belleza', sans-serif;">conditions</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-4 mt-5">
                        <button type="submit" class="btn btn-block btn-primary"
                            style="font-family: 'Belleza', sans-serif;">Inscrire</button>
                    </div>
                </div>
            </form>



            <a href="{{ route('show.login') }}" class="text-center" style="font-family: 'Poppins', sans-serif;">J'ai déjà un
                compte</a>
        </div>
    </div>
</div>

@endsection