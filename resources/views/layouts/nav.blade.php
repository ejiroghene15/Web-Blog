<nav class="navbar navbar-expand fixed-top flex-wrap text-light px-3 py-2 gh-nav">

    @auth
    <button class="btn btn-dark text-light ml-n2 mr-2" type="button" data-toggle="sidebar">
        <i class="fa fa-bars"> </i>
    </button>
    @endauth

    <a class="navbar-brand font-weight-bold" href="/">
        <img src="{{ asset("images/logo.png") }}" height="40" alt="">
        {{-- <span class="brandfirst">Emmanuel</span><span class="brandlast">Ebenezer</span> --}}
    </a>

    @auth
    <ul class="navbar-nav mr-auto">
        {{-- <li class="nav-item toggle-category">
            <a class="nav-link dropdown-toggle">
                Categories
            </a>
        </li> --}}
    </ul>

    <p class="text-capitalize m-0 mt-1 ">
        <img src="/img/default.jpg" class="rounded-circle" height="30" width="30">
        <span class="_author">{{auth()->user()->username}}</span>
    </p>
    @else

    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
        </li>
        {{-- <li class="nav-item toggle-category">
            <a class="nav-link dropdown-toggle">
                Categories
            </a>
        </li> --}}
    </ul>


    <a href="/login" class="btn btn-sm btn-success gh-btn" style="font-size: 12px;"> <i
            class="fa fa-power-off"></i>&nbsp;&nbsp;<b>Log in</b>
    </a>


    @endauth

    <div class="categories bg-light position-relative w-100 mt-2">
        <ul class="nav">
            @foreach ($categories as $c)
            <li class="nav-item  p-2"><a href="{{url('category', $c->category)}}"
                    class="nav-link pl-2">{{$c->category}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</nav>
