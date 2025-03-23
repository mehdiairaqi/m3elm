
<head>
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
      <div class="container">
          <div class="header-top-inner">
              <div class="cnt-account">
                  <ul class="list-unstyled">
                      <!-- Account Section: Register & Login Buttons -->
                      <div class="container">
                          <div class="row justify-content-end">
                              <div class="col-auto">
                                  @if (Route::has('login'))
                                      <div class="flex space-x-4">
                                          @auth
                                              <a href="{{ url('/dashboard') }}" class="text-white bg-blue-500 px-4 py-2 rounded-full hover:bg-blue-400">My Account</a>
                                              <form method="POST" action="{{ route('logout') }}" class="inline">
                                                  @csrf
                                                  <button type="submit" class="text-white bg-yellow-500 px-4 py-2 rounded-full hover:bg-yellow-400">Logout</button>
                                              </form>
                                          @else
                                              <a href="{{ route('login') }}" class="text-white bg-blue-500 px-4 py-2 rounded-full hover:bg-blue-400">Login</a>
                                              <a href="{{ route('register') }}" class="text-white bg-yellow-500 px-4 py-2 rounded-full hover:bg-yellow-400">Register</a>
                                          @endauth
                                      </div>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <!-- Main Header -->
  <div class="main-header">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                  <div class="logo"> <a href="home.html"> <img src="images/logo.png" alt="logo"> </a> </div>
              </div>
              <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder">
                  <div class="search-area">
                      <form>
                          <div class="control-group">
                              <input class="search-field" placeholder="Search here..." />
                              <a class="search-button" href="#"></a>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row">
                  <div>
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button" style="color: black; background-color: #ffd912;">vos commandes <i class="fa fa-shopping-cart"></i></button>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- NAVBAR -->
  <div class="header-nav animate-dropdown">
      <div class="container">
          <div class="yamm navbar navbar-default" role="navigation">
              <div class="navbar-header">
                  <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                      <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                  </button>
              </div>
              <div class="nav-bg-class">
                  <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                      <div class="nav-outer">
                          <ul class="nav navbar-nav">
                            <li class=""><a href="{{ url('/') }}">Home</a></li>
                              <li class=""><a href="{{ url('plombier') }}">plombier</a></li>
                              <li class="active dropdown"><a href="{{ url('chaufagisste') }}">Chauffagiste <span class="menu-label hot-menu hidden-xs">hot</span></a></li>
                              <li class="dropdown hidden-sm"><a href="Expert.html">Soudeur <span class="menu-label new-menu hidden-xs">new</span></a></li>
                              <li class="dropdown hidden-sm"><a href="Expert.html">Monteur électricien</a></li>
                              <li class="dropdown"><a href="contact.html">électromécanicien</a></li>
                              <li class="dropdown"><a href="contact.html">Câbleur</a></li>
                              <li class="dropdown"><a href="contact.html">mécanicien</a></li>
                              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">ménuisier</a></li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</head>
