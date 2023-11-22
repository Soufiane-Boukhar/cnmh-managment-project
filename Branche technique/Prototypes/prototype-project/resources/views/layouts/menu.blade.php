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
      <p>Projects</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('task.index', ['id' => 1]) }}" class="nav-link {{ Request::is('task.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Tasks</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('member.index') }}" class="nav-link {{ Request::is('member.index') ? 'active' : '' }}">
      <i class="nav-icon fas fa-user"></i>
      <p>Member</p>
    </a>
</li>


