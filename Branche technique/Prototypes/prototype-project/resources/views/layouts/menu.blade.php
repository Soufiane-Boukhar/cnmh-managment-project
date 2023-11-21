<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('project.index') }}" class="nav-link {{ Request::is('project.index') ? 'active' : '' }}">
      <i class="nav-icon fas fa-plus"></i>
      <p>Project</p>
    </a>
</li>


