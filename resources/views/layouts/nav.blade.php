<nav class="navbar navbar-expand fixed-top flex-wrap text-light px-3 py-2 gh-nav">

    @auth
    <button class="btn btn-dark text-light ml-n2 mr-2 d-lg-block d-md-block d-none" type="button" data-toggle="sidebar">
        <i class="fa fa-bars"> </i>
    </button>
    @endauth

    <a class="navbar-brand font-weight-bold" href="/">
        {{-- <img src="{{ asset("images/logo.png") }}" height="40" alt=""> --}}
        <span class="brandfirst">Writers</span><span class="brandlast">Hub</span>
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
        <img src="{{auth()->user()->profilepix}}" class="rounded-circle" height="30" width="30">
        <span class="_author">{{auth()->user()->username}}</span>
    </p>

    @else
    <ul class="navbar-nav mr-auto text-dark">
        {{--
		@if (request()->path() == "/")
		<li class="nav-item active">
			<a class="nav-link" href="/">Home</a>
		</li>
		 <li class="nav-item toggle-category">
			<a class="nav-link dropdown-toggle">
				Categories
			</a>
		</li>
		 @endif --}}
    </ul>

    @if (request()->path() != "login")
    <a href="/login" class="btn btn-sm btn-light gh-btn" style="font-size: 12px;">
        <img src="{{ asset("images/keyhole.png") }}" height="25" alt="">
        <b style="vertical-align:middle">Login</b>
    </a>
    @endif

    @if (request()->path() == "login")
    <a href="/register" class="btn btn-sm btn-success gh-btn ml-2" style="font-size: 12px;"> <i
            class="fa fa-user-plus"></i>&nbsp;&nbsp;<b>Register</b>
    </a>
    @endif

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
