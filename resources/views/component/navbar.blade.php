{{-- ============================================================
     resources/views/partials/navbar.blade.php
     ============================================================ --}}

<style>
    :root {
        --nav-height:   68px;
        --accent:       #00e5ff;
        --bg-primary:   #080b12;
        --text-primary: #f0f4ff;
        --text-muted:   #8a93a8;
        --border:       rgba(255, 255, 255, 0.08);
        --ease-out:     cubic-bezier(0.22, 1, 0.36, 1);
    }

    #navbar *, #mobile-menu * { box-sizing: border-box; margin: 0; padding: 0; }
    #navbar a, #mobile-menu a  { text-decoration: none; }
    #navbar ul { list-style: none; }

    /* ── NAVBAR ───────────────────────────────────────────────── */
    #navbar {
        position: fixed;
        top: 0; left: 0; right: 0;
        z-index: 1000;
        height: var(--nav-height);
        display: flex;
        align-items: center;
        padding: 0 5%;
        background: transparent;
        transition: background 0.5s var(--ease-out),
                    backdrop-filter 0.5s var(--ease-out),
                    box-shadow 0.5s var(--ease-out);
    }

    #navbar.scrolled {
        background: rgba(8, 11, 18, 0.82);
        backdrop-filter: blur(20px) saturate(160%);
        -webkit-backdrop-filter: blur(20px) saturate(160%);
        box-shadow: 0 1px 0 var(--border), 0 8px 32px rgba(0,0,0,0.45);
    }

    .nav-inner {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* ── LOGO ─────────────────────────────────────────────────── */
    .nav-logo {
        font-family: 'Segoe UI', system-ui, sans-serif;
        font-size: 1.35rem;
        font-weight: 800;
        letter-spacing: -0.02em;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-primary);
        transition: opacity 0.2s;
        flex-shrink: 0;
    }
    .nav-logo:hover { opacity: 0.85; }
    .nav-logo .logo-accent { color: var(--accent); text-shadow: 0 0 18px var(--accent); }
    .nav-logo .logo-dot {
        width: 8px; height: 8px;
        background: var(--accent);
        border-radius: 50%;
        box-shadow: 0 0 12px var(--accent);
        animation: pulse-dot 2.5s ease-in-out infinite;
    }

    @keyframes pulse-dot {
        0%, 100% { transform: scale(1);   opacity: 1; }
        50%       { transform: scale(1.4); opacity: 0.6; }
    }

    /* ── DESKTOP LINKS ────────────────────────────────────────── */
  .nav-links {
    display: flex;
    align-items: center;
    gap: clamp(1rem, 2vw, 2.2rem); /* ← was: gap: 2.2rem */
}

  .nav-links li a {
    font-size: clamp(0.75rem, 1vw, 0.875rem); /* ← was: font-size: 0.875rem */
    font-weight: 500;
    letter-spacing: 0.04em;
    color: var(--text-muted);
    position: relative;
    padding-bottom: 4px;
    font-family: 'Segoe UI', system-ui, sans-serif;
    transition: color 0.25s var(--ease-out);
    white-space: nowrap; /* ← ADD: links ko wrap hone se rokta hai */
}

    .nav-links li a::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0;
        width: 0; height: 1.5px;
        background: var(--accent);
        box-shadow: 0 0 8px var(--accent);
        border-radius: 2px;
        transition: width 0.35s var(--ease-out);
    }

    .nav-links li a:hover        { color: var(--text-primary); }
    .nav-links li a:hover::after { width: 100%; }
    .nav-links li a.active-link  { color: var(--text-primary); }
    .nav-links li a.active-link::after { width: 100%; }

    /* ── CTA WRAPPER + BUTTON ─────────────────────────────────── */
.nav-cta-wrapper {
    display: flex;
    align-items: center;
    flex-shrink: 0;
}

.nav-cta-btn {
    font-family: 'Segoe UI', system-ui, sans-serif;
    font-size: clamp(0.8rem, 1vw, 1.1rem);
    font-weight: 600;
    letter-spacing: 0.04em;
    text-transform: none;           /* ← UPPERCASE hata diya */
    padding: clamp(10px, 1.2vw, 16px) clamp(20px, 2.5vw, 32px);
    border-radius: 50px;            /* ← fully rounded pill shape */
    border: none;                   /* ← border hata diya */
    color: #080b12;                 /* ← dark text */
    background: var(--accent);      /* ← solid cyan fill */
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    white-space: nowrap;
    line-height: 1.2;
    min-width: unset;
    transition: background 0.3s var(--ease-out),
                box-shadow 0.3s var(--ease-out),
                transform   0.2s var(--ease-out);
}

.nav-cta-btn:hover {
    background: var(--accent);
    color: #080b12;
    box-shadow: 0 0 30px rgba(0, 229, 255, 0.5);
    transform: translateY(-1px);    /* ← hover pe thoda upar uthega */
}

    /* ── HAMBURGER ────────────────────────────────────────────── */
    .hamburger {
        display: none;
        flex-direction: column;
        justify-content: center;
        gap: 5px;
        width: 40px; height: 40px;
        cursor: pointer;
        padding: 4px;
        background: none;
        border: none;
        flex-shrink: 0;
    }

    .hamburger span {
        display: block;
        height: 2px;
        background: var(--text-primary);
        border-radius: 2px;
        transition: transform 0.4s var(--ease-out),
                    opacity   0.3s var(--ease-out),
                    width     0.3s var(--ease-out);
        transform-origin: center;
    }

    .hamburger span:nth-child(1) { width: 100%; }
    .hamburger span:nth-child(2) { width: 70%; }
    .hamburger span:nth-child(3) { width: 85%; }

    .hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg);  width: 100%; }
    .hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
    .hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); width: 100%; }

    /* ── MOBILE MENU ──────────────────────────────────────────── */
    #mobile-menu {
        position: fixed;
        top: var(--nav-height);
        left: 0; right: 0;
        background: rgba(8, 11, 18, 0.97);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border-bottom: 1px solid var(--border);
        padding: 1.5rem 5% 2rem;
        display: flex;
        flex-direction: column;
        gap: 0;
        z-index: 999;
        transform: translateY(-110%);
        opacity: 0;
        transition: transform 0.45s var(--ease-out),
                    opacity   0.35s var(--ease-out);
        pointer-events: none;
    }

    #mobile-menu.open {
        transform: translateY(0);
        opacity: 1;
        pointer-events: all;
    }

    #mobile-menu .mob-link {
        font-family: 'Segoe UI', system-ui, sans-serif;
        font-size: 1.1rem;
        font-weight: 600;
        letter-spacing: 0.02em;
        color: var(--text-muted);
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: color 0.25s, padding-left 0.3s var(--ease-out);
    }

    #mobile-menu .mob-link::before {
        content: '→';
        font-size: 0.95rem;
        color: var(--accent);
        opacity: 0;
        transition: opacity 0.25s, transform 0.3s var(--ease-out);
        transform: translateX(-8px);
        flex-shrink: 0;
    }

    #mobile-menu .mob-link:hover              { color: var(--text-primary); padding-left: 1rem; }
    #mobile-menu .mob-link:hover::before      { opacity: 1; transform: translateX(0); }

    /* Big CTA inside mobile menu */
    #mobile-menu .mob-cta-wrapper {
        margin-top: 1.75rem;
        display: flex;
    }

    #mobile-menu .mob-cta-btn {
        font-family: 'Segoe UI', system-ui, sans-serif;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 16px 0;
        border-radius: 0;
        border: 3.5px solid var(--accent);
        color: var(--accent);
        background: transparent;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        line-height: 1;
        transition: background 0.3s var(--ease-out),
                    color      0.3s var(--ease-out),
                    box-shadow 0.3s var(--ease-out);
    }

    #mobile-menu .mob-cta-btn:hover {
        background: var(--accent);
        color: var(--bg-primary);
        box-shadow: 0 0 30px rgba(0, 229, 255, 0.4);
    }

    /* ── RESPONSIVE ───────────────────────────────────────────── */
  @media (max-width: 960px) {
    .nav-links,
    .nav-cta-wrapper { display: none; }
    .hamburger        { display: flex; }
}

    body { padding-top: var(--nav-height); }
</style>


{{-- ── NAVBAR ──────────────────────────────────────────────────── --}}
<nav id="navbar" role="navigation" aria-label="Main navigation">
    <div class="nav-inner">

        <a href="{{ url('/') }}" class="nav-logo" aria-label="Freelance Digitals Home">
            <div class="logo-dot" aria-hidden="true"></div>
            Freelance<span class="logo-accent">Digitals</span>
        </a>

        <ul class="nav-links" role="list">
            <li><a href="{{ url('/') }}"          @class(['active-link' => request()->is('/')])>Home</a></li>
            <li><a href="{{ route('about') }}"    @class(['active-link' => request()->routeIs('about')])>About Us</a></li>
            <li><a href="{{ route('ourservices') }}"  @class(['active-link' => request()->routeIs('ourservices')])>Our Services</a></li>
            <li><a href="{{ url('/portfolio') }}" @class(['active-link' => request()->is('portfolio')])>Work Portfolio</a></li>
            <li><a href="{{ url('/contact') }}"   @class(['active-link' => request()->is('contact')])>Contact Us</a></li>
        </ul>

        <div class="nav-cta-wrapper">
            <a href="{{ url('/contact') }}" class="nav-cta-btn" aria-label="Get started">
                Get Started <span aria-hidden="true">→</span>
            </a>
        </div>

        <button
            class="hamburger"
            id="hamburger"
            aria-label="Toggle mobile menu"
            aria-expanded="false"
            aria-controls="mobile-menu"
        >
            <span></span><span></span><span></span>
        </button>

    </div>
</nav>


{{-- ── MOBILE MENU ──────────────────────────────────────────────── --}}
<div id="mobile-menu" role="dialog" aria-label="Mobile navigation" aria-hidden="true">
    <a href="{{ url('/') }}"          class="mob-link">Home</a>
    <a href="{{ route('about') }}"    class="mob-link">About Us</a>
    <a href="{{ url('/services') }}"  class="mob-link">Our Services</a>
    <a href="{{ url('/portfolio') }}" class="mob-link">Work Portfolio</a>
    <a href="{{ url('/contact') }}"   class="mob-link">Contact Us</a>

    <div class="mob-cta-wrapper">
        <a href="{{ url('/contact') }}" class="mob-cta-btn">
            Get Started →
        </a>
    </div>
</div>


{{-- ── SCRIPT ───────────────────────────────────────────────────── --}}
<script>
(function () {
    'use strict';

    const navbar  = document.getElementById('navbar');
    let   ticking = false;

    function onScroll() {
        if (!ticking) {
            requestAnimationFrame(function () {
                navbar.classList.toggle('scrolled', window.scrollY > 40);
                ticking = false;
            });
            ticking = true;
        }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    const hamburger  = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    let   menuOpen   = false;

    function toggleMenu(force) {
        menuOpen = (force !== undefined) ? !!force : !menuOpen;
        hamburger.classList.toggle('open',  menuOpen);
        mobileMenu.classList.toggle('open', menuOpen);
        hamburger.setAttribute('aria-expanded', String(menuOpen));
        mobileMenu.setAttribute('aria-hidden',  String(!menuOpen));
        document.body.style.overflow = menuOpen ? 'hidden' : '';
    }

    hamburger.addEventListener('click', function () { toggleMenu(); });

    mobileMenu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () { toggleMenu(false); });
    });

    document.addEventListener('click', function (e) {
        if (menuOpen && !mobileMenu.contains(e.target) && !hamburger.contains(e.target)) {
            toggleMenu(false);
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && menuOpen) toggleMenu(false);
    });
}());
</script>