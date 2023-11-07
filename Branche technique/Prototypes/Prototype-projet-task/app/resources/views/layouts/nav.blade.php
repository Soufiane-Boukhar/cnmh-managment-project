@section('nav')

<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay" id="loader">
        <i class="fas fa-spinner fa-spin fa-3x"></i>
    </div>
</div>

<nav class="main-header navbar navbar-expand navbar-gray">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link text-light">Acceuil</a>
        </li>

        @if(Auth::user())
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('show.create_projet') }}" class="nav-link text-light">Ajouter un projet</a>
        </li>
        <form action="{{ route('logout') }}" method="post">
            @csrf 
            @method('POST')
            <button type="submit" class="btn btn-danger">Deconnecter</button>
        </form>
        
        @else
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('show.login') }}" class="nav-link text-light">
                <p>
                    Se connecter
                </p>
            </a>
        </li>

        @endif
    </ul>


</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{asset('adminlte/dist/img/logo.avif')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Projetcs</span>
    </a>

    <div class="sidebar">
        @if(Auth::user())
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminlte/dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block nameStyle"><span>{{Auth::user()->nom}}</span> {{Auth::user()->prenom}}</a>
            </div>

        </div>
        @else

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminlte/dist/img/visiteur.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block nameStyle">Visiteur</a>
            </div>
        </div>
        @endif



        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(Auth::user())
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active activeBtn">
                        <i class="far fa-user nav-icon"></i>
                        <p>
                            Profil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('profile' , Auth::user()->id) }}" class="nav-link">
                                <i class="nav-icon far fa-edit"></i>
                                <p>
                                    Edit
                                </p>
                            </a>
                        </li>


                    </ul>
                </li>
                @endif

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">
                        <p>
                            A propos de nous
                        </p>
                        <i class="fa-solid fa-question"></i>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>


@endsection