<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('projects.index') }}" class="nav-link {{ Request::is('projects*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Projects</p>
    </a>
</li>


@role('admin')

<li class="nav-item">
    <a href="{{ route('users.list') }}" class="nav-link {{ Request::is('manage.role.permission') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Manage authorize</p>
    </a>
</li>

@endrole




