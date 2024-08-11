<header>
    <div class="content-area">
        <div class="navbar-container" id="container">
            <nav class="navbar" id= "navbar">
                <div class="nav-links">
                    <a href="/">HOME</a>
                </div>
                <div class="nav-links">
                    <a href="/it-venture">IT-VENTURE</a>
                </div>
                <div class="nav-links">
                    <a href="/semnas">SEMNAS</a>
                </div>
                <div class="nav-links">
                    <a href="/">ABOUT</a>
                </div>
            </nav>
            @if (Route::has('login'))
            <div class="login-btn">
                @auth
                <a href="{{ route('register') }}"><button>TURU</button></a>

                @else
                    <a href="{{ route('register') }}"><button>REGISTER</button></a>
                @endauth
            </div>
            @endif
        </div>
        <button class="expand-btn" id="expandBtn"> &#9776 </button>
    </div>
</header>