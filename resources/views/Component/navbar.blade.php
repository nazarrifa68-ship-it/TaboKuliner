<!-- Navbar -->
<nav class="navbar">
    <div class="logo">
        <img src="{{asset('image/LOGO.png')}}" alt="Logo Tabo Kuliner">
        <span>Tabo Kuliner</span>
    </div>

    <div class="menu-toggle" id="menu-toggle">&#9776;</div>

    <ul class="nav-links" id="nav-links">
        <li><a href="{{ route('Home') }}" class="{{ Route::is('Home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('Menu') }}" class="{{ Route::is('Menu') ? 'active' : '' }}">Menu</a></li>
        <li><a href="{{ route('About') }}" class="{{ Route::is('About') ? 'active' : '' }}">About</a></li>
        <li><a href="{{ route('Contact') }}" class="{{ Route::is('Contact') ? 'active' : '' }}">Contact</a></li>
    </ul>

    <div class="auth-buttons">
        @guest
            {{-- Tampil jika BELUM LOGIN --}}
            <a style="text-decoration: none" href="{{ route('loginpage') }}" class="btn login">Login</a>
            <a style="text-decoration: none" href="{{ route('registerpage') }}" class="btn register">Register</a>
        @endguest

        @auth
            @if(Auth::user()->role === 'admin')
                {{-- Tampil jika LOGIN SEBAGAI ADMIN --}}
                <a style="text-decoration: none" href="{{ route('admin.dashboard') }}" class="btn dashboard">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 5px;">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn logout">Logout</button>
                </form>
            @else
                {{-- Tampil jika LOGIN SEBAGAI CUSTOMER --}}
                <a style="text-decoration: none" href="#" class="btn cart">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="cart-badge">0</span>
                </a>
                
                <div class="user-dropdown">
                    <button class="btn user-profile" id="user-menu-toggle">
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) ?? asset('image/default-avatar.png') }}" alt="Profile">
                        <span>{{ Auth::user()->name }}</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    
                    <div class="dropdown-menu" id="user-dropdown-menu">
                        <a href="Profile" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Profil Saya
                        </a>
                        <a href="#" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg>
                            Pesanan Saya
                        </a>
                        <a href="#" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Alamat
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item logout-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endauth
    </div>
</nav>