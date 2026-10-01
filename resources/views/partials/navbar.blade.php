<style>
    /* Hamburger button */
    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        padding: 0.5rem;
        background: none;
        border: none;
    }
    
    .hamburger span {
        width: 25px;
        height: 3px;
        background-color: #344966;
        margin: 3px 0;
        transition: 0.3s;
    }

    nav {
        font-family: 'Poppins', sans-serif;
    }
    
    /* Desktop */
    nav ul {
        list-style: none;
        display: flex;
        justify-content: left;
        gap: 3.13rem;
        margin: 0;
        padding: 0;
    }
    nav ul li {
        position: relative; 
    }
    nav ul li a {
        padding: 0.5rem;
        display: block;
    }
    nav ul li a:hover {
        background-color: lightgrey;
        border-radius: 0.3rem;
    }
    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: lightgrey;
        top: 100%;
        left: 0;
        list-style: none;
        padding: 0.5rem 0;
        margin: 0;
        border-radius: 0.25rem;
        min-width: 10rem;
        z-index: 100;
    }
    .dropdown-menu li a {
        padding: 0.5rem 1rem;
        display: block;
    }
    .dropdown-menu li a:hover {
        background-color: darkgrey;
    }
    .dropdown:hover .dropdown-menu {
        display: block;
    }
    .nav-link.active {
        text-decoration: underline;
        text-decoration-color: #9EE493;
        text-decoration-thickness: 0.25rem;
        text-underline-offset: 0.5rem;
        font-weight: 500;
    }
    
    /* Mobile */
    @media (max-width: 768px) {
        .hamburger {
            display: flex;
        }
        
        nav ul {
            display: none;
            flex-direction: column;
            gap: 0;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 50;
        }
        
        nav ul.mobile-open {
            display: flex;
        }
        
        nav ul li {
            width: 100%;
        }
        
        nav ul li a {
            padding: 1rem;
        }
        
        .dropdown-menu {
            position: static;
            display: none;
            box-shadow: none;
            background-color: #ffffffff;
            min-width: 100%;
        }
        
        .dropdown.mobile-open .dropdown-menu {
            display: block;
        }
        
        /* Change hover behavior to click on mobile */
        .dropdown:hover .dropdown-menu {
            display: none;
        }
    }
</style>

<nav style="position: relative;">
    <button class="hamburger" onclick="toggleMobileMenu()">
        <span></span>
        <span></span>
        <span></span>
    </button>
    
    @guest 
    <ul id="mobileNav">
        <li class="dropdown" onclick="toggleDropdown(event)">
            <a href="{{ route('home') }}">ABOUT AUDIENCE REACTOR</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('home') }}#what-is-it">What is Audience Reactor?</a></li>
                <li><a href="{{ route('home') }}#why-it-matters">Why it matters?</a></li>
                <li><a href="{{ route('home') }}#how-it-works"> How it works?</a></li>
                <li><a href="{{ route('home') }}#practice">How to practice?</a></li>
            </ul>
        </li>
    </ul>
    @endguest
    @auth
    <ul id="mobileNav">
        <li class="dropdown">
            <a href="{{ route('session.start') }}" class="nav-link {{ Route::is('session.*') ? 'active' : '' }}">START PRACTICE</a>
        </li>
        <li class="dropdown">
            <a href="{{ route('tips') }}" class="nav-link {{ Route::is('tips') ? 'active' : '' }}">PRACTICE TIPS</a>
        </li>
        <li class="dropdown">
            <a href="{{ route('result.list') }}" class="nav-link {{ Route::is('result.list') ? 'active' : '' }}">VIEW PAST FEEDBACK</a>
        </li>
        <li class="dropdown">
            <a href="{{ route('export') }}" class="nav-link {{ Route::is('export') ? 'active' : '' }}">EXPORT(JSON)</a>
        </li>
    </ul>
    @endauth 
</nav>

<script>
    function toggleMobileMenu() {
        const nav = document.getElementById('mobileNav');
        nav.classList.toggle('mobile-open');
    }
    
    function toggleDropdown(event) {
        // Only on mobile
        if (window.innerWidth <= 768) {
            event.stopPropagation();
            const dropdown = event.currentTarget;
            dropdown.classList.toggle('mobile-open');
        }
    }
    
    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        const nav = document.getElementById('mobileNav');
        const hamburger = document.querySelector('.hamburger');
        
        if (window.innerWidth <= 768 && 
            !nav.contains(event.target) && 
            !hamburger.contains(event.target)) {
            nav.classList.remove('mobile-open');
        }
    });
</script>