<nav class="text-center position-fixed" id="sidebar">
  <ul class="m-0 list-unstyled">
    <li>
      <a href="/">
        <i class="nav-icon fa fa-home"></i>
        <span class="nav-text">Home</span>
      </a>
    </li>
    @auth
    @if (auth()->user()->is_admin)

    <li>
      <a href="{{ url('newpost') }}">
        <i class="nav-icon fa fa-pencil"></i>
        <span class="nav-text">New post</span>
      </a>
    </li>
    <li>
      <a href="{{ url('admin') }}">
        <i class="nav-icon fa fa-cog"></i>
        <span class="nav-text">Admin</span>
      </a>
    </li>
    @endif
    <li>
      <a href="{{ url('archive') }}">
        <i class="nav-icon fa fa-archive"></i>
        <span class="nav-text">Archive</span>
      </a>
    </li>
    <li>
      <a href="{{ url('forum') }}">
        <i class="nav-icon fa fa-group"></i>
        <span class="nav-text">Forum</span>
      </a>
    </li>
    <li>
      <a href="{{ url('profile') }}">
        <i class="nav-icon fa fa-user-o"></i>
        <span class="nav-text">Profile</span>
      </a>
    </li>
    <li>
      <a href="{{ url('logout') }}">
        <i class="nav-icon fa fa-power-off"></i>
        <span class="nav-text">Log Out</span>
      </a>
    </li>
    @endauth
  </ul>
</nav>
