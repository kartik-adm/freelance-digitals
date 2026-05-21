{{-- ============================================================
     resources/views/partials/footer.blade.php
     Usage in your layout: @include('partials.footer')
     ============================================================ --}}

<style>
    /* ─── CSS variable fallbacks ────────────────────────────────
       These are already defined in your main layout's :root block.
       Keeping them here as fallbacks so the footer works standalone
       during development / Blade component previews.
    ─────────────────────────────────────────────────────────── */
    :root {
        --bg-secondary:  #0d1220;
        --accent:        #00e5ff;
        --text-primary:  #f0f4ff;
        --text-muted:    #7a8ba8;
        --border:        rgba(255,255,255,0.07);
        --font-head:     -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
        --ease-out:      cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* ─── Footer shell ───────────────────────────────────────── */
    .fd-footer {
        background: var(--bg-secondary);
        border-top: 1px solid var(--border);
        position: relative;
        overflow: hidden;
        font-family: var(--font-head);
    }

    /* Glowing top edge line */
    .fd-footer::before {
        content: '';
        position: absolute;
        top: 0; left: 50%;
        transform: translateX(-50%);
        width: 500px; height: 1px;
        background: linear-gradient(90deg, transparent, var(--accent), transparent);
        pointer-events: none;
    }

    /* ─── Top grid ───────────────────────────────────────────── */
    .fd-footer__top {
        display: grid;
        grid-template-columns: 1.8fr 1fr 1fr 1fr 1fr;
        gap: 3rem;
        max-width: 1280px;
        margin: 0 auto;
        padding: 5rem 5% 4rem;
    }

    /* ─── Brand column ───────────────────────────────────────── */
    .fd-footer__logo {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--text-primary);
        text-decoration: none;
        margin-bottom: 1.25rem;
    }

    .fd-footer__logo-dot {
        width: 7px; height: 7px;
        background: var(--accent);
        border-radius: 50%;
        box-shadow: 0 0 10px var(--accent);
        flex-shrink: 0;
    }

    .fd-footer__logo-accent { color: var(--accent); }

    .fd-footer__tagline {
        font-size: 0.875rem;
        color: var(--text-muted);
        line-height: 1.75;
        max-width: 280px;
        margin-bottom: 2rem;
    }

    /* ─── Social buttons ─────────────────────────────────────── */
    .fd-footer__socials {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .fd-footer__social-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px; height: 38px;
        border-radius: 10px;
        border: 1px solid var(--border);
        background: rgba(255,255,255,0.03);
        color: var(--text-muted);
        text-decoration: none;
        transition: border-color 0.3s var(--ease-out),
                    color       0.3s var(--ease-out),
                    background  0.3s var(--ease-out),
                    box-shadow  0.3s var(--ease-out),
                    transform   0.25s var(--ease-out);
    }

    .fd-footer__social-btn:hover {
        border-color: var(--accent);
        color: var(--accent);
        background: rgba(0,229,255,0.08);
        box-shadow: 0 0 16px rgba(0,229,255,0.2);
        transform: translateY(-3px);
    }

    /* ─── Link columns ───────────────────────────────────────── */
    .fd-footer__col h4 {
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--text-primary);
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--border);
        position: relative;
    }

    /* Cyan accent underline on heading */
    .fd-footer__col h4::after {
        content: '';
        position: absolute;
        bottom: -1px; left: 0;
        width: 28px; height: 1px;
        background: var(--accent);
        box-shadow: 0 0 6px var(--accent);
    }

    .fd-footer__col ul {
        list-style: none;
        padding: 0; margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }

    .fd-footer__col ul li a {
        font-size: 0.875rem;
        color: var(--text-muted);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: color 0.25s var(--ease-out),
                    gap   0.25s var(--ease-out);
    }

    /* Arrow that slides in on hover */
    .fd-footer__col ul li a::before {
        content: '›';
        color: var(--accent);
        opacity: 0;
        font-size: 1rem;
        line-height: 1;
        transition: opacity   0.2s var(--ease-out),
                    transform 0.25s var(--ease-out);
        transform: translateX(-4px);
    }

    .fd-footer__col ul li a:hover {
        color: var(--text-primary);
        gap: 0.65rem;
    }

    .fd-footer__col ul li a:hover::before {
        opacity: 1;
        transform: translateX(0);
    }

    /* ─── Bottom bar ─────────────────────────────────────────── */
    .fd-footer__bottom {
        border-top: 1px solid var(--border);
        padding: 1.5rem 5%;
    }

    .fd-footer__bottom-inner {
        max-width: 1280px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .fd-footer__copy {
        font-size: 0.8rem;
        color: var(--text-muted);
    }

    .fd-footer__copy .heart { color: #f43f5e; }
    .fd-footer__copy .city  { color: var(--accent); }

    .fd-footer__legal-links {
        display: flex;
        gap: 1.5rem;
    }

    .fd-footer__legal-links a {
        font-size: 0.8rem;
        color: var(--text-muted);
        text-decoration: none;
        transition: color 0.2s;
    }

    .fd-footer__legal-links a:hover { color: var(--accent); }

    /* ─── Responsive ─────────────────────────────────────────── */
    @media (max-width: 768px) {
        .fd-footer__top {
            grid-template-columns: 1fr 1fr;
            gap: 2.5rem;
        }

        .fd-footer__brand { grid-column: 1 / -1; }

        .fd-footer__bottom-inner {
            flex-direction: column;
            text-align: center;
        }

        .fd-footer__legal-links { justify-content: center; flex-wrap: wrap; }
    }

    @media (max-width: 480px) {
        .fd-footer__top {
            grid-template-columns: 1fr;
            padding: 3rem 5% 2.5rem;
        }

        .fd-footer__brand { grid-column: auto; }
    }
</style>


<footer class="fd-footer" role="contentinfo">

    {{-- ── Top grid ─────────────────────────────────────────── --}}
    <div class="fd-footer__top">

        {{-- Brand --}}
        <div class="fd-footer__brand">
            <a href="https://www.freelancedigitals.in/" class="fd-footer__logo">
                <div class="fd-footer__logo-dot" aria-hidden="true"></div>
                Freelance<span class="fd-footer__logo-accent">Digitals</span>
            </a>

            <p class="fd-footer__tagline">
                AI-powered digital marketing agency helping brands grow profitably
                with data-driven campaigns, creative content, and influencer partnerships.
                Based in Lucknow, serving India.
            </p>

            <div class="fd-footer__socials">

                {{-- Instagram --}}
                <a href="https://instagram.com/" class="fd-footer__social-btn"
                   aria-label="Instagram" target="_blank" rel="noopener noreferrer">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>

                {{-- LinkedIn --}}
                <a href="https://linkedin.com/" class="fd-footer__social-btn"
                   aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                </a>

                {{-- Facebook --}}
                <a href="https://facebook.com/" class="fd-footer__social-btn"
                   aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>

                {{-- Twitter / X --}}
                <a href="https://twitter.com/" class="fd-footer__social-btn"
                   aria-label="Twitter / X" target="_blank" rel="noopener noreferrer">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.259 5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>

                {{-- WhatsApp --}}
                <a href="https://wa.me/919XXXXXXXXX" class="fd-footer__social-btn"
                   aria-label="WhatsApp" target="_blank" rel="noopener noreferrer">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </a>

            </div>{{-- /socials --}}
        </div>{{-- /brand --}}


        {{-- Company --}}
        <div class="fd-footer__col">
            <h4>Company</h4>
            <ul>
                <li><a href="https://www.freelancedigitals.in/">Home</a></li>
                <li><a href="https://www.freelancedigitals.in/about">About Us</a></li>
                <li><a href="https://www.freelancedigitals.in/portfolio">Work Portfolio</a></li>
                <li><a href="https://www.freelancedigitals.in/contact">Contact Us</a></li>
            </ul>
        </div>

        {{-- Services --}}
        <div class="fd-footer__col">
            <h4>Services</h4>
            <ul>
                <li><a href="https://www.freelancedigitals.in/services">Performance Marketing</a></li>
                <li><a href="https://www.freelancedigitals.in/services">Social Media</a></li>
                <li><a href="https://www.freelancedigitals.in/services">SEO &amp; Growth</a></li>
                <li><a href="https://www.freelancedigitals.in/services">Influencer Marketing</a></li>
                <li><a href="https://www.freelancedigitals.in/services">Web Development</a></li>
            </ul>
        </div>

        {{-- Legal --}}
        <div class="fd-footer__col">
            <h4>Legal</h4>
            <ul>
                <li><a href="https://www.freelancedigitals.in/terms">Terms &amp; Conditions</a></li>
                <li><a href="https://www.freelancedigitals.in/privacy">Privacy Policy</a></li>
                <li><a href="https://www.freelancedigitals.in/shipping">Shipping Policy</a></li>
                <li><a href="https://www.freelancedigitals.in/refunds">Cancellation &amp; Refunds</a></li>
            </ul>
        </div>

        {{-- Connect --}}
        <div class="fd-footer__col">
            <h4>Connect</h4>
            <ul>
                <li><a href="https://instagram.com/" target="_blank" rel="noopener noreferrer">Instagram</a></li>
                <li><a href="https://linkedin.com/" target="_blank" rel="noopener noreferrer">LinkedIn</a></li>
                <li><a href="https://facebook.com/" target="_blank" rel="noopener noreferrer">Facebook</a></li>
                <li><a href="https://twitter.com/" target="_blank" rel="noopener noreferrer">Twitter</a></li>
                <li><a href="https://wa.me/919XXXXXXXXX" target="_blank" rel="noopener noreferrer">WhatsApp</a></li>
            </ul>
        </div>

    </div>{{-- /footer-top --}}


    {{-- ── Bottom bar ───────────────────────────────────────── --}}
    <div class="fd-footer__bottom">
        <div class="fd-footer__bottom-inner">

            <p class="fd-footer__copy">
                &copy; {{ date('Y') }} Freelance Digitals. All rights reserved.
                Made with <span class="heart">❤️</span> in <span class="city">Lucknow</span>
            </p>

            <nav class="fd-footer__legal-links" aria-label="Legal navigation">
                <a href="https://www.freelancedigitals.in/terms">Terms</a>
                <a href="https://www.freelancedigitals.in/privacy">Privacy</a>
                <a href="https://www.freelancedigitals.in/shipping">Shipping</a>
                <a href="https://www.freelancedigitals.in/refunds">Refunds</a>
            </nav>

        </div>
    </div>

</footer>