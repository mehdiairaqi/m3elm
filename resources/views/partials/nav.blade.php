<!-- Add this to the <head> section of your HTML for Bootstrap and Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- TOP MENU -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                  
                                    @if (Route::has('login'))
                                        <div class="d-flex space-x-4">
                                            @auth
                                                <!-- My Account Button -->
                                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-warning border-2 border-yellow-500 text-white-500 px-4 py-2 rounded-full hover:bg-blue-500 hover:text-white">
                                                    My Account
                                                </a>
                                                
                                                <!-- Logout Button -->
                                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-warning border-2 border-yellow-500 text-yellow-500 px-4 py-2 rounded-full hover:bg-yellow-500 hover:text-white">
                                                        Logout
                                                    </button>
                                                </form>
                                            @else
                                                <!-- Login Button -->
                                                <a href="{{ route('login') }}" class="btn btn-outline-warning border-2 border-yellow-500 text-yellow-500 px-4 py-2 rounded-full hover:bg-blue-500 hover:text-white">
                                                    Login
                                                </a>
                                                
                                                <!-- Register Button -->
                                                <a href="{{ route('register') }}" class="btn btn-outline-warning border-2 border-yellow-500 text-yellow-500 px-4 py-2 rounded-full hover:bg-yellow-500 hover:text-white">
                                                    Register
                                                </a>
                                            @endauth
                                              <!-- Send Message Button (Visible only if the user is authenticated) -->
                                    @if(auth()->check()) <!-- Check if the user is authenticated -->
                                    <a href="{{ route('messages.index', ['userId' => auth()->user()->id]) }}" class="btn btn-outline-warning border-2 border-yellow-500 text-yellow-500 px-4 py-2 rounded-full hover:bg-yellow-500 hover:text-white">
                                        Send Message
                                    </a>
                                    @endif

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
                    <div class="logo"> 
                        <a href="home.html"> 
                            <img src="images/logo.png" alt="logo"> 
                        </a> 
                    </div>
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
    
    <!-- NAVBAR (Horizontal Menu) -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="navbar navbar-expand-lg navbar-default" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggler" data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav d-flex justify-content-center">
                                <li class="active dropdown"><a href="home.html">Home</a></li>
                                <li class="dropdown yamm mega-menu"><a href="{{ url('/plombier') }}">Plombier</a></li>
                                <li class="dropdown mega-menu"><a href="{{ url('/chaufagisste') }}">Chauffagiste <span class="menu-label hot-menu hidden-xs">hot</span></a></li>
                                <li class="dropdown hidden-sm"><a href="Expert.html">Soudeur <span class="menu-label new-menu hidden-xs">new</span></a></li>
                                <li class="dropdown hidden-sm"><a href="Expert.html">Monteur électricien</a></li>
                                <li class="dropdown"><a href="contact.html">électromécanicien</a></li>
                                <li class="dropdown"><a href="contact.html">Câbleur</a></li>
                                <li class="dropdown mega-menu"><a href="{{ url('/service') }}">afficher tout les service <span class="menu-label hot-menu hidden-xs">hot</span></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    