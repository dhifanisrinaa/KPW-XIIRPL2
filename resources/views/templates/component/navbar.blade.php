<div class="movies_nav">
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      
      <!-- HAPUS class navbar-right di sini agar menu sejajar -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <nav>
          <!-- Gunakan navbar-right di UL agar menu otomatis ke kanan -->
          <ul class="nav navbar-nav navbar-right">
            
            {{-- MENU HOME --}}
            <li class="w3_home_act {{ request()->routeIs('home') ? 'active' : '' }}">
              <a href="{{ route('home') }}">Home</a>
            </li>

            {{-- MENU GENRES --}}
            <li class="dropdown {{ request()->routeIs('genre') ? 'active' : '' }}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
              <ul class="dropdown-menu multi-column columns-3">
                <li>
                  <div class="col-sm-4">
                    <ul class="multi-column-dropdown">
                      @forelse ($genres as $index => $genre)
                        <li><a href="{{ route('genre', $genre->id) }}">{{ $genre->name }}</a></li>
                        @if (($index + 1) % 7 == 0 && !$loop->last)
                          </ul>
                          </div>
                          <div class="col-sm-4">
                          <ul class="multi-column-dropdown">
                        @endif
                      @empty
                        <li><a href="#">Belum ada genre</a></li>
                      @endforelse
                    </ul>
                  </div>
                  <div class="clearfix"></div>
                </li>
              </ul>
            </li>

            {{-- MENU MOVIES --}}
            <li class="w3_home_act {{ request()->routeIs('movies') ? 'active' : '' }}">
              <a href="{{ route('movies') }}">Movies</a>
            </li>

            {{-- MENU AUTH --}}
            @auth
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i> {{ auth()->user()->name }} <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  @if(auth()->user()->isAdmin())
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard Admin</a></li>
                    <li class="divider"></li>
                  @endif
                  <li>
                    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                      @csrf
                      <button type="submit" style="display:block;width:100%;text-align:left;padding:3px 20px;border:none;background:none;color:#333;">
                        <i class="fa fa-sign-out"></i> Logout
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            @else
              <li>
                <a href="#" data-toggle="modal" data-target="#myModal">
                  <i class="fa fa-sign-in"></i> Login / Register
                </a>
              </li>
            @endauth

          </ul>
        </nav>
      </div>
    </nav>	
  </div>
</div>