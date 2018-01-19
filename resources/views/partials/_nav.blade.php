<!--Start of Navbar_-->
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Laravel Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{Request::is('/') ? "active" : ""}}"><a href="/">Home</a></li>
        <li class="{{Request::is('blog') ? "active" : ""}}"><a href="/blog">Blog</a></li>
        <li class="{{Request::is('about') ? "active" : ""}}"><a href="/about">About</a></li>
        <li class="{{Request::is('contact') ? "active" : ""}}"><a href="/contact">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- Right Side Of Navbar -->
                    
        <!-- Authentication Links -->
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="{{route('posts.index')}}">Posts</a></li>
                    <li><a href="{{route('categories.create')}}">Categories</a></li>
                    <li><a href="{{route('tags.create')}}">Tags</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--End of Navbar-->
