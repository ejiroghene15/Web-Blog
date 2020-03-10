<nav class="text-center mt-n2 position-fixed h-100 pt-3" id="sidebar">
    <ul class="m-0 list-unstyled">
        <li>
            <a href="/">
                <i class="nav-icon fa fa-home"></i>
                <span class="nav-text">Home</span>
            </a>
        </li>
        {{-- <li>
            <a href=".">
                <i class="nav-icon fa fa-envelope"></i>
                <span class="nav-text">Inbox</span>
            </a>
        </li> --}}
        <li>
            <a href="{{ route('archive') }}">
                <i class="nav-icon fa fa-archive"></i>
                <span class="nav-text">Archive</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profile') }}">
                <i class="nav-icon fa fa-user-o"></i>
                <span class="nav-text">Profile</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}">
                <i class="nav-icon fa fa-power-off"></i>
                <span class="nav-text">Log Out</span>
            </a>
        </li>
    </ul>
</nav>
