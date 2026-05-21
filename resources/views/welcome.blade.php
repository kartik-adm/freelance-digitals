<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Freelance Digitals – Premium digital solutions for modern businesses">
    <title>Freelance Digitals</title>

    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])

    <style>

        /* ─── HERO SECTION ───────────────────────────── */
.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: calc(var(--nav-height) + 2rem) 5% 5rem;
    position: relative;
    overflow: hidden;
}

.hero-bg {
    position: absolute;
    inset: 0;
    z-index: 0;
    overflow: hidden;
}

.hero-bg::before {
    content: '';
    position: absolute;
    top: -30%; left: -20%;
    width: 70%; height: 70%;
    background: radial-gradient(ellipse at center, rgba(124, 58, 237, 0.22) 0%, transparent 65%);
    animation: drift1 12s ease-in-out infinite alternate;
    border-radius: 50%;
}

.hero-bg::after {
    content: '';
    position: absolute;
    bottom: -20%; right: -10%;
    width: 60%; height: 60%;
    background: radial-gradient(ellipse at center, rgba(0, 229, 255, 0.15) 0%, transparent 65%);
    animation: drift2 15s ease-in-out infinite alternate;
    border-radius: 50%;
}

.hero-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
    background-size: 60px 60px;
    mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 0%, transparent 100%);
}

@keyframes drift1 {
    from { transform: translate(0,0) scale(1); }
    to   { transform: translate(6%, 8%) scale(1.12); }
}
@keyframes drift2 {
    from { transform: translate(0,0) scale(1); }
    to   { transform: translate(-5%, -6%) scale(1.1); }
}

/* ─── HERO LAYOUT ─────────────────────────────── */
.hero-inner {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 3rem;
}

.hero-content {
    flex: 1 1 48%;
    max-width: 560px;
    text-align: left;
}

/* ─── SPLINE ROBOT ────────────────────────────── */
.hero-robot {
    flex: 1 1 48%;
    max-width: 620px;
    height: 640px;
    position: relative;
    border-radius: 28px;
    overflow: hidden;
    flex-shrink: 0;
}

/* Animated glow border */
.hero-robot::before {
    content: '';
    position: absolute;
    inset: -1px;
    border-radius: 29px;
    background: linear-gradient(135deg,
        rgba(0,229,255,0.4) 0%,
        rgba(124,58,237,0.4) 50%,
        rgba(0,229,255,0.4) 100%
    );
    background-size: 200% 200%;
    animation: border-rotate 4s linear infinite, ring-pulse 3s ease-in-out infinite alternate;
    z-index: 0;
}

/* Inner mask to clip the gradient border */
.hero-robot::after {
    content: '';
    position: absolute;
    inset: 1px;
    border-radius: 27px;
    background: var(--bg-primary);
    z-index: 1;
}

@keyframes border-rotate {
    0%   { background-position: 0% 50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes ring-pulse {
    from { opacity: 0.5; }
    to   { opacity: 1; }
}

/* Spline viewer */
spline-viewer {
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0;
    z-index: 2;
    border-radius: 27px;
    background: transparent;
}

/* Loading spinner */
.robot-loader {
    position: absolute;
    inset: 2px;
    z-index: 3;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    background: rgba(8, 11, 18, 0.85);
    border-radius: 26px;
    backdrop-filter: blur(8px);
    transition: opacity 0.8s ease, visibility 0.8s ease;
}

.robot-loader.hidden {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}

.loader-ring {
    width: 52px; height: 52px;
    border: 3px solid rgba(0, 229, 255, 0.1);
    border-top-color: var(--accent);
    border-right-color: rgba(124,58,237,0.6);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin { to { transform: rotate(360deg); } }

.loader-text {
    font-size: 0.72rem;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--accent);
    opacity: 0.6;
}

/* Outer glow effect behind robot container */
.robot-glow {
    position: absolute;
    inset: -40px;
    border-radius: 50%;
    background: radial-gradient(
        ellipse at center,
        rgba(0, 229, 255, 0.08) 0%,
        rgba(124, 58, 237, 0.06) 40%,
        transparent 70%
    );
    z-index: 0;
    animation: glow-pulse 4s ease-in-out infinite alternate;
    pointer-events: none;
}

@keyframes glow-pulse {
    from { transform: scale(0.95); opacity: 0.6; }
    to   { transform: scale(1.05); opacity: 1; }
}

/* Chat bubbles */
.chat-bubble {
    position: absolute;
    background: rgba(8, 11, 18, 0.75);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255,255,255,0.1);
    padding: 12px 18px;
    border-radius: 18px;
    font-size: 0.82rem;
    color: #e2e8f0;
    z-index: 4;
    max-width: 210px;
    opacity: 0;
    animation: bubble-fade-in 0.6s var(--ease-out) forwards;
    pointer-events: none;
    line-height: 1.5;
}

.chat-bubble.customer {
    border-bottom-left-radius: 4px;
    border-color: rgba(0, 229, 255, 0.3);
    box-shadow: 0 8px 24px rgba(0,229,255,0.08);
}

.chat-bubble.company {
    border-bottom-right-radius: 4px;
    border-color: rgba(124, 58, 237, 0.35);
    background: rgba(20, 10, 40, 0.75);
    box-shadow: 0 8px 24px rgba(124,58,237,0.1);
}

.chat-bubble .author {
    font-size: 0.68rem;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    margin-bottom: 4px;
    font-weight: 700;
}

.chat-bubble.customer .author { color: var(--accent); }
.chat-bubble.company  .author { color: #a78bfa; }

.cb-1 { top: 10%; left: -5%; animation-delay: 1.8s; }
.cb-2 { top: 40%; right: -5%; animation-delay: 3.2s; }
.cb-3 { bottom: 15%; left: -3%; animation-delay: 4.8s; }

@keyframes bubble-fade-in {
    from { opacity: 0; transform: translateY(12px) scale(0.93); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}

@media (max-width: 1024px) {
    .chat-bubble { display: none; }
}
        /* ─── CSS Variables ─────────────────────────── */
        :root {
            --bg-primary:    #080b12;
            --bg-secondary:  #0d1220;
            --bg-card:       #111827;
            --accent:        #00e5ff;
            --accent-2:      #7c3aed;
            --accent-glow:   rgba(0, 229, 255, 0.18);
            --text-primary:  #f0f4ff;
            --text-muted:    #7a8ba8;
            --border:        rgba(255,255,255,0.07);
            --nav-height:    72px;
            --font-head:     -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
            --font-body:     -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
            --ease-out:      cubic-bezier(0.16, 1, 0.3, 1);
            --ease-in-out:   cubic-bezier(0.65, 0, 0.35, 1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; font-size: 16px; }

        body {
            font-family: var(--font-body);
            background-color: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        img { display: block; max-width: 100%; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-primary); }
        ::-webkit-scrollbar-thumb { background: var(--accent-2); border-radius: 3px; }

        /* ─── NAVBAR ─────────────────────────────────── */
      
        /* ─── HERO SECTION ───────────────────────────── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: calc(var(--nav-height) + 2rem) 5% 5rem;
            position: relative;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
            overflow: hidden;
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            top: -30%; left: -20%;
            width: 70%; height: 70%;
            background: radial-gradient(ellipse at center, rgba(124, 58, 237, 0.22) 0%, transparent 65%);
            animation: drift1 12s ease-in-out infinite alternate;
            border-radius: 50%;
        }

        .hero-bg::after {
            content: '';
            position: absolute;
            bottom: -20%; right: -10%;
            width: 60%; height: 60%;
            background: radial-gradient(ellipse at center, rgba(0, 229, 255, 0.15) 0%, transparent 65%);
            animation: drift2 15s ease-in-out infinite alternate;
            border-radius: 50%;
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
            background-size: 60px 60px;
            mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 0%, transparent 100%);
        }

        @keyframes drift1 {
            from { transform: translate(0,0) scale(1); }
            to   { transform: translate(6%, 8%) scale(1.12); }
        }
        @keyframes drift2 {
            from { transform: translate(0,0) scale(1); }
            to   { transform: translate(-5%, -6%) scale(1.1); }
        }

        .particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 1;
        }

        .particle {
            position: absolute;
            width: 2px; height: 2px;
            background: var(--accent);
            border-radius: 50%;
            box-shadow: 0 0 6px var(--accent);
            animation: float-particle linear infinite;
            opacity: 0;
        }

        @keyframes float-particle {
            0%   { transform: translateY(100vh) scale(0); opacity: 0; }
            10%  { opacity: 0.7; }
            90%  { opacity: 0.5; }
            100% { transform: translateY(-10vh) scale(1); opacity: 0; }
        }

        /* ─── HERO LAYOUT: split left text / right robot ── */
        .hero-inner {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .hero-content {
            flex: 1 1 50%;
            max-width: 580px;
            text-align: left;
        }

        /* ─── Spline Robot Container ─────────────────── */
        .hero-robot {
            flex: 1 1 50%;
            max-width: 600px;
            height: 620px;
            position: relative;
            border-radius: 24px;
            overflow: hidden;
        }

        /* Subtle glow ring behind the robot */
        .hero-robot::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 26px;
            background: linear-gradient(135deg, rgba(0,229,255,0.15), rgba(124,58,237,0.15));
            z-index: 0;
            animation: ring-pulse 4s ease-in-out infinite alternate;
        }

        @keyframes ring-pulse {
            from { opacity: 0.4; }
            to   { opacity: 0.9; }
        }

        spline-viewer {
            display: block;
            width: 100%;
            height: 100%;
            position: relative;
            z-index: 1;
            border-radius: 24px;
            background: transparent;
        }

        /* Loading placeholder shown before Spline loads */
        .robot-loader {
            position: absolute;
            inset: 0;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            background: rgba(8,11,18,0.6);
            border-radius: 24px;
            transition: opacity 0.6s ease;
            pointer-events: none;
        }

        .robot-loader.hidden { opacity: 0; }

        .loader-ring {
            width: 48px; height: 48px;
            border: 3px solid rgba(0,229,255,0.15);
            border-top-color: var(--accent);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        .loader-text {
            font-size: 0.78rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--accent);
            opacity: 0.7;
        }

        /* ─── Chat Bubbles ───────────────────────────── */
        .chat-bubble {
            position: absolute;
            background: rgba(15, 20, 35, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 18px;
            border-radius: 18px;
            font-size: 0.85rem;
            color: #e2e8f0;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            z-index: 3;
            max-width: 220px;
            opacity: 0;
            animation: bubble-fade-in 0.6s var(--ease-out) forwards;
            pointer-events: none;
        }

        .chat-bubble.customer {
            border-bottom-left-radius: 4px;
            border-color: rgba(0, 229, 255, 0.3);
        }

        .chat-bubble.company {
            border-bottom-right-radius: 4px;
            border-color: rgba(124, 58, 237, 0.3);
            background: rgba(25, 15, 45, 0.7);
        }

        .chat-bubble .author {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 4px;
            font-weight: 600;
        }

        .chat-bubble.customer .author { color: var(--accent); }
        .chat-bubble.company .author { color: var(--accent-2); }

        .cb-1 { top: 12%; left: 5%; animation-delay: 1.5s; }
        .cb-2 { top: 38%; right: 5%; animation-delay: 3s; }
        .cb-3 { top: 62%; left: 8%; animation-delay: 4.5s; }

        @keyframes bubble-fade-in {
            from { opacity: 0; transform: translateY(15px) scale(0.95); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        @media (max-width: 1024px) {
            .chat-bubble { display: none; /* Hide on smaller screens to keep focus on robot */ }
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--accent);
            background: rgba(0, 229, 255, 0.08);
            border: 1px solid rgba(0, 229, 255, 0.2);
            padding: 6px 16px;
            border-radius: 100px;
            margin-bottom: 2rem;
            animation: fade-up 0.8s var(--ease-out) both;
        }

        .hero-eyebrow .eyebrow-dot {
            width: 5px; height: 5px;
            background: var(--accent);
            border-radius: 50%;
            box-shadow: 0 0 8px var(--accent);
        }

        .hero-title {
            font-family: var(--font-head);
            font-size: clamp(2.6rem, 5.5vw, 5rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.03em;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            animation: fade-up 0.9s 0.1s var(--ease-out) both;
        }

        .hero-title .gradient-text {
            background: linear-gradient(135deg, var(--accent) 0%, #a78bfa 60%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: clamp(0.95rem, 1.8vw, 1.1rem);
            color: var(--text-muted);
            max-width: 500px;
            margin: 0 0 3rem;
            font-weight: 300;
            line-height: 1.75;
            animation: fade-up 0.9s 0.2s var(--ease-out) both;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            animation: fade-up 0.9s 0.3s var(--ease-out) both;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            padding: 14px 32px;
            border-radius: 8px;
            background: var(--accent);
            color: var(--bg-primary);
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: box-shadow 0.35s var(--ease-out), transform 0.25s var(--ease-out);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.25), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .btn-primary:hover {
            box-shadow: 0 0 40px rgba(0, 229, 255, 0.55), 0 8px 24px rgba(0,0,0,0.4);
            transform: translateY(-2px);
        }

        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:active { transform: translateY(0); }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 14px 32px;
            border-radius: 8px;
            border: 1.5px solid var(--border);
            color: var(--text-muted);
            background: rgba(255,255,255,0.03);
            cursor: pointer;
            transition: border-color 0.3s, color 0.3s, background 0.3s, transform 0.25s;
        }

        .btn-secondary:hover {
            border-color: rgba(255,255,255,0.2);
            color: var(--text-primary);
            background: rgba(255,255,255,0.06);
            transform: translateY(-2px);
        }

        .btn-arrow { transition: transform 0.3s var(--ease-out); }
        .btn-primary:hover .btn-arrow,
        .btn-secondary:hover .btn-arrow { transform: translateX(4px); }

        /* Hero stats */
        .hero-stats {
            display: flex;
            align-items: center;
            gap: 2.5rem;
            margin-top: 4rem;
            padding-top: 2.5rem;
            border-top: 1px solid var(--border);
            animation: fade-up 0.9s 0.5s var(--ease-out) both;
            flex-wrap: wrap;
        }

        .stat-item { text-align: left; }

        .stat-number {
            font-size: 1.9rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.03em;
            line-height: 1;
        }

        .stat-number span { color: var(--accent); }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .stat-divider {
            width: 1px;
            height: 36px;
            background: var(--border);
        }

        /* ─── SERVICES ───────────────────────────── */
        .services {
            padding: 8rem 5%;
            background: var(--bg-primary);
            position: relative;
            overflow: hidden;
        }

        .services::before {
            content: '';
            position: absolute;
            top: 0; left: 50%;
            transform: translateX(-50%);
            width: 600px; height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
        }

        .section-header {
            text-align: center;
            max-width: 640px;
            margin: 0 auto 5rem;
        }

        .section-tag {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .section-desc {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.7;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            cursor: default;
            transition: transform 0.4s var(--ease-out), border-color 0.4s var(--ease-out), box-shadow 0.4s var(--ease-out);
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent), var(--accent-2));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.45s var(--ease-out);
        }

        .service-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 30%, rgba(0,229,255,0.05) 0%, transparent 65%);
            opacity: 0;
            transition: opacity 0.45s;
        }

        .service-card:hover {
            transform: translateY(-6px);
            border-color: rgba(0, 229, 255, 0.25);
            box-shadow: 0 20px 60px rgba(0,0,0,0.5), 0 0 40px rgba(0,229,255,0.07);
        }

        .service-card:hover::before { transform: scaleX(1); }
        .service-card:hover::after  { opacity: 1; }

        .service-icon {
            width: 52px; height: 52px;
            border-radius: 12px;
            background: rgba(0, 229, 255, 0.1);
            border: 1px solid rgba(0, 229, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
            transition: background 0.3s, border-color 0.3s, box-shadow 0.3s;
        }

        .service-card:hover .service-icon {
            background: rgba(0, 229, 255, 0.18);
            box-shadow: 0 0 20px rgba(0, 229, 255, 0.25);
        }

        .service-name {
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            position: relative;
            z-index: 1;
        }

        .service-desc {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        /* ─── CTA SECTION ────────────────────────────── */
        .cta-section {
            padding: 10rem 5%;
            text-align: center;
            position: relative;
            overflow: hidden;
            background: var(--bg-primary);
        }

        .cta-section::before,
        .cta-section::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(80px);
        }

        .cta-section::before {
            width: 800px; height: 800px;
            top: -20%; left: -10%;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.18) 0%, transparent 60%);
            animation: cta-drift1 14s ease-in-out infinite alternate;
        }

        .cta-section::after {
            width: 700px; height: 700px;
            bottom: -30%; right: -10%;
            background: radial-gradient(circle, rgba(0, 229, 255, 0.18) 0%, transparent 60%);
            animation: cta-drift2 18s ease-in-out infinite alternate;
        }

        @keyframes cta-drift1 {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(80px, 60px) scale(1.1); }
        }

        @keyframes cta-drift2 {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(-60px, -80px) scale(1.15); }
        }

        .cta-box {
            position: relative;
            z-index: 1;
            max-width: 760px;
            margin: 0 auto;
            background: rgba(10, 10, 10, 0.6); /* Translucent black glass */
            backdrop-filter: blur(24px) saturate(150%);
            -webkit-backdrop-filter: blur(24px) saturate(150%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 32px;
            padding: 5rem 4rem;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6), 0 0 40px rgba(0, 229, 255, 0.05);
            transition: transform 0.4s var(--ease-out), box-shadow 0.4s var(--ease-out), border-color 0.4s var(--ease-out);
        }

        .cta-box:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 229, 255, 0.3);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.8), 0 0 60px rgba(0, 229, 255, 0.15);
        }

        .cta-box::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0,229,255,0.08) 0%, rgba(124,58,237,0.03) 100%);
            pointer-events: none;
            opacity: 0.5;
            transition: opacity 0.4s var(--ease-out);
        }
        
        .cta-box:hover::before {
            opacity: 1;
        }

        .cta-box .section-title { margin-bottom: 1.25rem; }
        .cta-box .section-desc  { margin-bottom: 2.5rem; }

        .cta-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        /* ─── FOOTER ─────────────────────────────────── */
        .footer {
            padding: 3rem 5%;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-copy { font-size: 0.82rem; color: var(--text-muted); }
        .footer-copy span { color: var(--accent); }

        .footer-links { display: flex; gap: 1.5rem; }

        .footer-links a {
            font-size: 0.82rem;
            color: var(--text-muted);
            transition: color 0.2s;
        }

        .footer-links a:hover { color: var(--accent); }

        /* ─── Animations ─────────────────────────────── */
        @keyframes fade-up {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .reveal {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.75s var(--ease-out), transform 0.75s var(--ease-out);
        }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        .reveal:nth-child(2) { transition-delay: 0.1s; }
        .reveal:nth-child(3) { transition-delay: 0.2s; }
        .reveal:nth-child(4) { transition-delay: 0.3s; }
        .reveal:nth-child(5) { transition-delay: 0.4s; }
        .reveal:nth-child(6) { transition-delay: 0.5s; }

        /* ─── Responsive ─────────────────────────────── */
        @media (max-width: 1024px) {
            .hero-inner {
                flex-direction: column;
                text-align: center;
            }

            .hero-content {
                max-width: 100%;
                text-align: center;
            }

            .hero-subtitle { margin: 0 auto 3rem; }

            .hero-actions { justify-content: center; }

            .hero-stats {
                justify-content: center;
            }

            .stat-item { text-align: center; }

            .hero-robot {
                width: 100%;
                max-width: 500px;
                height: 480px;
                margin: 0 auto;
            }

            /* Navbar collapse earlier to prevent collision */
            .nav-links, .nav-cta { display: none; }
            .hamburger { display: flex; }
        }

        @media (max-width: 768px) {
            :root { --nav-height: 64px; }

            .hero-stats { gap: 1.5rem; flex-wrap: wrap; }
            .stat-divider { display: none; }

            .cta-box { padding: 3rem 2rem; }

            .footer { flex-direction: column; text-align: center; }

            .hero-robot { height: 380px; }
        }

        @media (max-width: 480px) {
            .hero-actions { flex-direction: column; width: 100%; }
            .btn-primary, .btn-secondary { width: 100%; justify-content: center; }
            .hero-robot { height: 320px; }
        }
    </style>
</head>

<body>

@include("component.navbar")
    <!-- ════════════════════════════════════════
         HERO  (split layout: text left / robot right)
    ════════════════════════════════════════ -->
    <section class="hero" id="home">
        <div class="hero-bg" aria-hidden="true">
            <div class="hero-grid"></div>
        </div>

        <div class="particles" aria-hidden="true" id="particles"></div>

        <div class="hero-inner">

            <!-- LEFT — text content -->
            <div class="hero-content">
                <div class="hero-eyebrow">
                    <div class="eyebrow-dot"></div>
                    Premium Digital Agency
                </div>

                <h1 class="hero-title">
                    We Craft <span class="gradient-text">Digital Experiences</span><br>
                    That Convert
                </h1>

                <p class="hero-subtitle">
                    Strategy, design, and development fused into one seamless process.
                    We turn your vision into powerful digital products that captivate
                    audiences and drive real results.
                </p>

                <div class="hero-actions">
                    <a href="https://www.freelancedigitals.in/services" class="btn-primary">
                        Explore Services
                        <span class="btn-arrow" aria-hidden="true">→</span>
                    </a>
                    <a href="https://www.freelancedigitals.in/portfolio" class="btn-secondary">
                        View Our Work
                        <span class="btn-arrow" aria-hidden="true">↗</span>
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">150<span>+</span></div>
                        <div class="stat-label">Projects Done</div>
                    </div>
                    <div class="stat-divider" aria-hidden="true"></div>
                    <div class="stat-item">
                        <div class="stat-number">98<span>%</span></div>
                        <div class="stat-label">Client Satisfaction</div>
                    </div>
                    <div class="stat-divider" aria-hidden="true"></div>
                    <div class="stat-item">
                        <div class="stat-number">6<span>+</span></div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                    <div class="stat-divider" aria-hidden="true"></div>
                    <div class="stat-item">
                        <div class="stat-number">40<span>+</span></div>
                        <div class="stat-label">Global Clients</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════
         SERVICES
    ════════════════════════════════════════ -->
    @include('component.services')


    <!-- ════════════════════════════════════════
         CTA
    ════════════════════════════════════════ -->
    <section class="cta-section">
        <div class="cta-box reveal">
            <div class="section-tag">Ready to Launch?</div>
            <h2 class="section-title">
                Let's Build Something <span style="color:var(--accent)">Extraordinary</span>
            </h2>
            <p class="section-desc">
                Your next big idea deserves a team that's as ambitious as you are.
                Let's talk about how we can elevate your digital presence.
            </p>
            <div class="cta-actions">
                <a href="https://www.freelancedigitals.in/contact" class="btn-primary">
                    Start a Project
                    <span class="btn-arrow" aria-hidden="true">→</span>
                </a>
                <a href="https://www.freelancedigitals.in/portfolio" class="btn-secondary">
                    See Our Portfolio
                    <span class="btn-arrow" aria-hidden="true">↗</span>
                </a>
            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════
         REACT TESTIMONIALS (Mounted here)
    ════════════════════════════════════════ -->
    @include('component.testimonials')
    @include('component.footer')

    <!-- ════════════════════════════════════════
         SCRIPTS
    ════════════════════════════════════════ -->
    <script>(function () {
        'use strict';

        /* ── Scroll-reveal ────────────────────────── */
        var revealEls = document.querySelectorAll('.reveal');

        if ('IntersectionObserver' in window) {
            var revealObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -48px 0px' });

            revealEls.forEach(function (el) { revealObserver.observe(el); });
        } else {
            revealEls.forEach(function (el) { el.classList.add('visible'); });
        }

        /* ── Floating Particles ───────────────────── */
        var container = document.getElementById('particles');
        var PARTICLE_COUNT = 22;

        function createParticle() {
            var p = document.createElement('div');
            p.className = 'particle';
            var size  = Math.random() * 2 + 1;
            var left  = Math.random() * 100;
            var delay = Math.random() * 18;
            var dur   = Math.random() * 10 + 12;
            p.style.cssText = [
                'left:'   + left + '%',
                'width:'  + size + 'px',
                'height:' + size + 'px',
                'animation-duration:' + dur   + 's',
                'animation-delay:'    + delay + 's',
            ].join(';');
            container.appendChild(p);
        }

        for (var i = 0; i < PARTICLE_COUNT; i++) { createParticle(); }



        /* ── Active nav highlight ─────────────────── */
        var navLinks    = document.querySelectorAll('.nav-links a');
        var currentPath = window.location.pathname;

        navLinks.forEach(function (link) {
            if (link.pathname === currentPath) {
                link.style.color = 'var(--text-primary)';
                link.setAttribute('aria-current', 'page');
            }
        });

    }());
    </script>

</body>
</html>