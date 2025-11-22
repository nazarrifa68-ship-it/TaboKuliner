<!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="image/LOGO.png" alt="Logo Tabo Kuliner">
            <span>Tabo Kuliner</span>
        </div>

        <div class="menu-toggle" id="menu-toggle">&#9776;</div>

        <ul class="nav-links" id="nav-links">
            <li><a href="{{ route('Home') }}" class="{{ Route::is('Home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('Menu') }}" class="{{ Route::is('Menu') ? 'active' : '' }}">Menu</a></li>
            <li><a href="{{ route('About') }}" class="{{ Route::is('About') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('Contact') }}" class="{{ Route::is('Contact') ? 'active' : '' }}">Contact</a></li>
        </ul>

        <div class="auth-buttons">
            <a style="text-decoration: none" href="{{ route('loginpage') }}" class="btn login">Login</a>
            <a style="text-decoration: none" href="{{ route('registerpage') }}" class="btn register">Register</a>
        </div>
    </nav>