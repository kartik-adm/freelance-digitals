

<style>
    /* ── Reset & base ──────────────────────────────────────── */
    *, *::before, *::after { box-sizing: border-box; }


    :root {
        --accent:       #00e5ff;
        --accent-2:     #7c3aed;
        --accent-3:     #ec4899;
        --bg-primary:   #080b12;
        --text-primary: #f0f4ff;
        --text-muted:   #7a8ba8;
        --border:       rgba(255,255,255,0.07);
        --ease-out:     cubic-bezier(0.16, 1, 0.3, 1);
        --font:         -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
    }

    /* ── Section wrapper ───────────────────────────────────── */
    .sg-section {
        padding: 7rem 5%;
        background: var(--bg-primary);
        position: relative;
        overflow: hidden;
        font-family: var(--font);
    }

    /* Ambient background blobs */
    .sg-section::before,
    .sg-section::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }
    .sg-section::before {
        width: 600px; height: 600px;
        top: -200px; left: -150px;
        background: radial-gradient(circle, rgba(124,58,237,0.12) 0%, transparent 70%);
        animation: sg-blob1 18s ease-in-out infinite alternate;
    }
    .sg-section::after {
        width: 500px; height: 500px;
        bottom: -150px; right: -100px;
        background: radial-gradient(circle, rgba(0,229,255,0.10) 0%, transparent 70%);
        animation: sg-blob2 22s ease-in-out infinite alternate;
    }

    @keyframes sg-blob1 {
        from { transform: translate(0,0) scale(1); }
        to   { transform: translate(60px, 80px) scale(1.15); }
    }
    @keyframes sg-blob2 {
        from { transform: translate(0,0) scale(1); }
        to   { transform: translate(-50px,-60px) scale(1.12); }
    }

    /* ── Section header ────────────────────────────────────── */
    .sg-header {
        text-align: center;
        max-width: 600px;
        margin: 0 auto 4.5rem;
        position: relative;
        z-index: 1;
    }

    .sg-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--accent);
        background: rgba(0,229,255,0.07);
        border: 1px solid rgba(0,229,255,0.18);
        padding: 6px 16px;
        border-radius: 100px;
        margin-bottom: 1.5rem;
    }

    .sg-tag-dot {
        width: 5px; height: 5px;
        background: var(--accent);
        border-radius: 50%;
        box-shadow: 0 0 8px var(--accent);
        animation: sg-pulse 2.5s ease-in-out infinite;
    }

    @keyframes sg-pulse {
        0%,100% { transform: scale(1); opacity: 1; }
        50%      { transform: scale(1.5); opacity: 0.5; }
    }

    .sg-title {
        font-size: clamp(2rem, 4.5vw, 3rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        line-height: 1.1;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }

    .sg-title span {
        background: linear-gradient(130deg, var(--accent) 0%, #a78bfa 55%, var(--accent-3) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .sg-desc {
        font-size: 1rem;
        color: var(--text-muted);
        line-height: 1.75;
    }

    /* ── Grid ──────────────────────────────────────────────── */
    .sg-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    /* ── Card ──────────────────────────────────────────────── */
    .sg-card {
        position: relative;
        border-radius: 20px;
        padding: 2.5rem 2rem;
        cursor: default;
        overflow: hidden;
        isolation: isolate;

        /* Glass base */
        background: rgba(255,255,255,0.035);
        border: 1px solid rgba(255,255,255,0.10);
        backdrop-filter: blur(16px) saturate(140%);
        -webkit-backdrop-filter: blur(16px) saturate(140%);

        transition:
            transform        0.45s var(--ease-out),
            border-color     0.45s var(--ease-out),
            box-shadow       0.45s var(--ease-out),
            background       0.45s var(--ease-out);

        will-change: transform;
    }

    /* Hover lift + glow */
    .sg-card:hover {
        transform: translateY(-8px) scale(1.01);
        background: rgba(255,255,255,0.055);
        border-color: rgba(0,229,255,0.30);
        box-shadow:
            0 0 0 1px rgba(0,229,255,0.12),
            0 8px 32px rgba(0,0,0,0.5),
            0 0 60px rgba(0,229,255,0.10),
            0 0 120px rgba(124,58,237,0.07);
    }

    /* Top shimmer line */
    .sg-card::before {
        content: '';
        position: absolute;
        top: 0; left: 10%; right: 10%;
        height: 1px;
        background: linear-gradient(90deg,
            transparent 0%,
            rgba(255,255,255,0.35) 40%,
            rgba(255,255,255,0.35) 60%,
            transparent 100%);
        border-radius: 0 0 2px 2px;
        transition: opacity 0.4s;
        opacity: 0.6;
    }

    .sg-card:hover::before { opacity: 1; }

    /* Mouse-follow spotlight (injected via JS) */
    .sg-card__spotlight {
        position: absolute;
        inset: 0;
        border-radius: inherit;
        pointer-events: none;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.35s;
        background: radial-gradient(
            circle 180px at var(--mx, 50%) var(--my, 50%),
            rgba(0,229,255,0.07) 0%,
            transparent 70%
        );
    }

    .sg-card:hover .sg-card__spotlight { opacity: 1; }

    /* Accent color bar on top */
    .sg-card__bar {
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 2px;
        border-radius: 20px 20px 0 0;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.5s var(--ease-out);
    }

    .sg-card:hover .sg-card__bar { transform: scaleX(1); }

    /* Individual bar colors */
    .sg-card:nth-child(1) .sg-card__bar { background: linear-gradient(90deg, #00e5ff, #7c3aed); }
    .sg-card:nth-child(2) .sg-card__bar { background: linear-gradient(90deg, #7c3aed, #ec4899); }
    .sg-card:nth-child(3) .sg-card__bar { background: linear-gradient(90deg, #ec4899, #f59e0b); }
    .sg-card:nth-child(4) .sg-card__bar { background: linear-gradient(90deg, #10b981, #00e5ff); }
    .sg-card:nth-child(5) .sg-card__bar { background: linear-gradient(90deg, #f59e0b, #ef4444); }
    .sg-card:nth-child(6) .sg-card__bar { background: linear-gradient(90deg, #6366f1, #00e5ff); }

    /* ── Icon wrapper ──────────────────────────────────────── */
    .sg-card__icon-wrap {
        width: 56px; height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 1.5rem;
        position: relative;
        transition: transform 0.4s var(--ease-out), box-shadow 0.4s;

        /* Glass icon bg */
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.12);
        backdrop-filter: blur(8px);
    }

    /* Per-card icon glow */
    .sg-card:nth-child(1) .sg-card__icon-wrap { box-shadow: 0 0 0 0 rgba(0,229,255,0); }
    .sg-card:nth-child(1):hover .sg-card__icon-wrap { box-shadow: 0 0 20px rgba(0,229,255,0.4); border-color: rgba(0,229,255,0.35); }
    .sg-card:nth-child(2):hover .sg-card__icon-wrap { box-shadow: 0 0 20px rgba(124,58,237,0.4); border-color: rgba(124,58,237,0.35); }
    .sg-card:nth-child(3):hover .sg-card__icon-wrap { box-shadow: 0 0 20px rgba(236,72,153,0.4); border-color: rgba(236,72,153,0.35); }
    .sg-card:nth-child(4):hover .sg-card__icon-wrap { box-shadow: 0 0 20px rgba(16,185,129,0.4); border-color: rgba(16,185,129,0.35); }
    .sg-card:nth-child(5):hover .sg-card__icon-wrap { box-shadow: 0 0 20px rgba(245,158,11,0.4); border-color: rgba(245,158,11,0.35); }
    .sg-card:nth-child(6):hover .sg-card__icon-wrap { box-shadow: 0 0 20px rgba(99,102,241,0.4); border-color: rgba(99,102,241,0.35); }

    .sg-card:hover .sg-card__icon-wrap { transform: scale(1.08) rotate(-3deg); }

    /* ── Card text ─────────────────────────────────────────── */
    .sg-card__name {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        letter-spacing: -0.01em;
    }

    .sg-card__desc {
        font-size: 0.88rem;
        color: var(--text-muted);
        line-height: 1.75;
    }

    /* ── Arrow link hint ───────────────────────────────────── */
    .sg-card__arrow {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 1.25rem;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--accent);
        opacity: 0;
        transform: translateX(-6px);
        transition:
            opacity   0.35s var(--ease-out),
            transform 0.35s var(--ease-out);
    }

    .sg-card__arrow svg {
        transition: transform 0.3s var(--ease-out);
    }

    .sg-card:hover .sg-card__arrow {
        opacity: 1;
        transform: translateX(0);
    }

    .sg-card:hover .sg-card__arrow svg { transform: translateX(3px); }

    /* ── Scroll reveal ─────────────────────────────────────── */
    .sg-reveal {
        opacity: 0;
        transform: translateY(36px);
        transition:
            opacity   0.7s var(--ease-out),
            transform 0.7s var(--ease-out);
    }
    .sg-reveal.sg-visible {
        opacity: 1;
        transform: translateY(0);
    }
    .sg-reveal:nth-child(1) { transition-delay: 0.05s; }
    .sg-reveal:nth-child(2) { transition-delay: 0.13s; }
    .sg-reveal:nth-child(3) { transition-delay: 0.21s; }
    .sg-reveal:nth-child(4) { transition-delay: 0.29s; }
    .sg-reveal:nth-child(5) { transition-delay: 0.37s; }
    .sg-reveal:nth-child(6) { transition-delay: 0.45s; }

    /* ── Responsive ────────────────────────────────────────── */
    @media (max-width: 1024px) {
        .sg-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 600px) {
        .sg-section  { padding: 5rem 4%; }
        .sg-grid     { grid-template-columns: 1fr; gap: 1rem; }
        .sg-card     { padding: 2rem 1.5rem; }
        .sg-card:hover { transform: translateY(-4px) scale(1.005); }
    }
</style>


{{-- ── Services section ────────────────────────────────────── --}}
<section class="sg-section" id="services" aria-labelledby="sg-heading">

    {{-- Header --}}
    <div class="sg-header sg-reveal">
        <div class="sg-tag" role="text">
            <div class="sg-tag-dot" aria-hidden="true"></div>
            What We Do
        </div>
        <h2 class="sg-title" id="sg-heading">
            End-to-End <span>Digital Solutions</span>
        </h2>
        <p class="sg-desc">
            From pixel-perfect design to scalable development — everything your
            brand needs to dominate the digital space.
        </p>
    </div>

    {{-- Grid --}}
    <div class="sg-grid" role="list">

        {{-- 1 · UI/UX Design --}}
        <div class="sg-card sg-reveal" role="listitem">
            <div class="sg-card__bar" aria-hidden="true"></div>
            <div class="sg-card__spotlight" aria-hidden="true"></div>
            <div class="sg-card__icon-wrap" aria-hidden="true">🎨</div>
            <h3 class="sg-card__name">UI/UX Design</h3>
            <p class="sg-card__desc">
                Interfaces that don't just look stunning — they convert.
                Grounded in user psychology and modern design principles.
            </p>
            <span class="sg-card__arrow" aria-hidden="true">
                Learn more
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 6h8M6 2l4 4-4 4"/>
                </svg>
            </span>
        </div>

        {{-- 2 · Web Development --}}
        <div class="sg-card sg-reveal" role="listitem">
            <div class="sg-card__bar" aria-hidden="true"></div>
            <div class="sg-card__spotlight" aria-hidden="true"></div>
            <div class="sg-card__icon-wrap" aria-hidden="true">⚡</div>
            <h3 class="sg-card__name">Web Development</h3>
            <p class="sg-card__desc">
                Lightning-fast, SEO-ready websites built with cutting-edge
                tech stacks — Laravel, React, Vue &amp; beyond.
            </p>
            <span class="sg-card__arrow" aria-hidden="true">
                Learn more
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 6h8M6 2l4 4-4 4"/>
                </svg>
            </span>
        </div>

        {{-- 3 · Mobile Apps --}}
        <div class="sg-card sg-reveal" role="listitem">
            <div class="sg-card__bar" aria-hidden="true"></div>
            <div class="sg-card__spotlight" aria-hidden="true"></div>
            <div class="sg-card__icon-wrap" aria-hidden="true">📱</div>
            <h3 class="sg-card__name">Mobile Apps</h3>
            <p class="sg-card__desc">
                Native &amp; cross-platform apps crafted for iOS and Android
                that users love to engage with every day.
            </p>
            <span class="sg-card__arrow" aria-hidden="true">
                Learn more
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 6h8M6 2l4 4-4 4"/>
                </svg>
            </span>
        </div>

        {{-- 4 · Digital Marketing --}}
        <div class="sg-card sg-reveal" role="listitem">
            <div class="sg-card__bar" aria-hidden="true"></div>
            <div class="sg-card__spotlight" aria-hidden="true"></div>
            <div class="sg-card__icon-wrap" aria-hidden="true">📈</div>
            <h3 class="sg-card__name">Digital Marketing</h3>
            <p class="sg-card__desc">
                Data-driven campaigns across SEO, PPC, and social media
                that turn clicks into loyal, paying customers.
            </p>
            <span class="sg-card__arrow" aria-hidden="true">
                Learn more
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 6h8M6 2l4 4-4 4"/>
                </svg>
            </span>
        </div>

        {{-- 5 · E-Commerce --}}
        <div class="sg-card sg-reveal" role="listitem">
            <div class="sg-card__bar" aria-hidden="true"></div>
            <div class="sg-card__spotlight" aria-hidden="true"></div>
            <div class="sg-card__icon-wrap" aria-hidden="true">🛒</div>
            <h3 class="sg-card__name">E-Commerce</h3>
            <p class="sg-card__desc">
                High-converting storefronts powered by Shopify, WooCommerce,
                or fully custom — built to scale.
            </p>
            <span class="sg-card__arrow" aria-hidden="true">
                Learn more
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 6h8M6 2l4 4-4 4"/>
                </svg>
            </span>
        </div>

        {{-- 6 · AI Integration --}}
        <div class="sg-card sg-reveal" role="listitem">
            <div class="sg-card__bar" aria-hidden="true"></div>
            <div class="sg-card__spotlight" aria-hidden="true"></div>
            <div class="sg-card__icon-wrap" aria-hidden="true">🤖</div>
            <h3 class="sg-card__name">AI Integration</h3>
            <p class="sg-card__desc">
                Supercharge your product with intelligent automation,
                chatbots, and AI-powered features that set you apart.
            </p>
            <span class="sg-card__arrow" aria-hidden="true">
                Learn more
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 6h8M6 2l4 4-4 4"/>
                </svg>
            </span>
        </div>

    </div>{{-- /grid --}}

</section>


<script>
(function () {
    'use strict';

    /* ── Scroll reveal ──────────────────────────────────────── */
    var els = document.querySelectorAll('.sg-reveal');

    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('sg-visible');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        els.forEach(function (el) { io.observe(el); });
    } else {
        els.forEach(function (el) { el.classList.add('sg-visible'); });
    }

    /* ── Mouse-follow spotlight ─────────────────────────────── */
    var cards = document.querySelectorAll('.sg-card');

    cards.forEach(function (card) {
        card.addEventListener('mousemove', function (e) {
            var rect = card.getBoundingClientRect();
            var x    = ((e.clientX - rect.left) / rect.width)  * 100;
            var y    = ((e.clientY - rect.top)  / rect.height) * 100;
            card.style.setProperty('--mx', x + '%');
            card.style.setProperty('--my', y + '%');
        }, { passive: true });
    });

})();
</script>