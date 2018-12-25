<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand mb-3" href="{{ url('/index') }}">Scheduler</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <!-- <li class="nav-item active mr-3">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link" href="#">about</a>
      </li> -->
      @if(Auth::check())
      <li class="nav-item mr-4">
        <p>Hello!! {{ Auth::user()->name }}</p>
      </li>
      @endif
      @guest
          <li class="nav-item mr-3"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item mr-3"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
      @else
          <li class="nav-item mr-3">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                {{ csrf_field() }}
            </form>
      @endguest
      </li>
    </ul>
  </div>
</nav>
