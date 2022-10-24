<header id="header">
    <!-- Top menu -->
    <div id="topNav">
        <span class="top-menu" id="plus">+</span>
        <span class="top-menu hide" id="minus">-</span>
        <div class="list hide">
            <a href="{{ route('welcome') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact us</a>
            @guest
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Sign up') }}</a>
                @endif
            @endguest
        </div>
        
        <a href="{{ route('welcome') }}" class="logo-link w-50"><img class="logo-main" src="{{ asset('images/logo.png') }}" alt="Miss Vee" /></a>
        <h5 class="payoff animate-charcter">Famous Look!</h5>

        <!-- Right Side Of Navbar -->
        <div class="input-container hide">
            <input type="text" id="search-input" class="search-input" />
            <label for="search-input" unselectable="on">Search</label>
            <span id="search-error" class="error hide">Unfortunately, there's nothing to search!</span>
        </div>
        <ul class="top-icons">
            <!-- Authentication Links -->
            <li><img id="site-search" class="icon" src="{{ asset('images/icons/search.png') }}" /></li>
            <li>
                <a class="{{ request()->route()->getName() == 'cart.index' ? 'active': '' }}" href="{{ route('cart.index') }}">
                    <img class="icon" src="{{ asset('images/icons/cart.png') }}" />
                    <span class="cart-badge">
                        @if (Cart::instance('default')->count() > 0)
                            {{ Cart::instance('default')->count() }}
                        @else
                            0
                        @endif
                    </span>
                </a>
            </li>
            @guest
                <li>
                    <a href="{{ route('login') }}"><img class="icon icon-signin" src="{{ asset('images/icons/signin.svg') }}" alt="{{ __('Login') }}" /></a>
                </li>
            @else
                <li class="dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="icon" src="{{ asset('images/users/profile.png') }}" alt="{{ Auth::user()->name }}" /> <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <span>Welcome back, <strong>{{ Auth::user()->name }}</strong></span>
                        @if (auth()->user()->can('browse_admin'))
                            <a target="_blank" class="dropdown-item" href="{{ url('/admin') }}">
                            {{ __('Admin panel') }} <img src="{{ asset('images/icons/icon-admin.svg') }}" class="icon icon-loggedin" />
                        </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Sign out') }} <img src="{{ asset('images/icons/signout.png') }}" class="icon icon-loggedin" />
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
        <div class="hamburger">
            <input class="menu-btn" type="checkbox" id="menu-btn" /> 
            <label class="menu-icon" for="menu-btn">
                <span class="navicon"></span>
            </label>
            <ul class="menu">
                <hr />
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact us</a></li>
                <li>
                @guest
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ __('Sign up') }}</a>
                    @endif
                @endguest
                </li>
                <hr />
                <li>
                    <a class="{{ request()->route()->getName() == 'cart.index' ? 'active': '' }}" href="{{ route('cart.index') }}">
                        Cart
                    </a>
                    <span class="cart-badge flyout">
                        @if (Cart::instance('default')->count() > 0)
                            {{ Cart::instance('default')->count() }}
                        @else
                            0
                        @endif
                    </span>
                </li> 
            </ul>
        </div>
    </div>
</header>
