<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Services | Freelance Digitals</title>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Bebas+Neue&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --bg: #030a0f;
    --bg2: #040d14;
    --surface: rgba(255,255,255,0.03);
    --surface-hover: rgba(255,255,255,0.06);
    --border: rgba(255,255,255,0.06);
    --border-hover: rgba(56,189,248,0.3);
    --text: #e2f0ff;
    --text-dim: #7ba8c4;
    --text-dimmer: #3d6b89;
    --blue: #38bdf8;
    --blue2: #0ea5e9;
    --green: #34d399;
    --green2: #10b981;
    --purple: #818cf8;
    --cyan: #22d3ee;
    --glow-blue: rgba(56,189,248,0.15);
    --glow-green: rgba(52,211,153,0.15);
  }

  html { scroll-behavior: smooth; }

  body {
    background: var(--bg);
    color: var(--text);
    font-family: 'Space Grotesk', sans-serif;
    overflow-x: hidden;
    min-height: 100vh;
  }

  /* BACKGROUND ATMOSPHERE */
  .bg-atmosphere {
    position: fixed;
    inset: 0;
    z-index: 0;
    pointer-events: none;
    overflow: hidden;
  }

  .orb {
    position: absolute;
    border-radius: 40%;
    filter: blur(120px);
    opacity: 0.4;
    animation: drift 20s ease-in-out infinite;
  }

  .orb-1 {
    width: 700px; height: 700px;
    background: radial-gradient(circle, #0369a1 0%, #0c4a6e 50%, transparent 70%);
    top: -200px; left: -200px;
    animation-delay: 0s;
  }

  .orb-2 {
    width: 600px; height: 600px;
    background: radial-gradient(circle, #065f46 0%, #047857 40%, transparent 70%);
    bottom: -100px; right: -150px;
    animation-delay: -7s;
  }

  .orb-3 {
    width: 400px; height: 400px;
    background: radial-gradient(circle, #1e40af 0%, transparent 70%);
    top: 50%; right: 20%;
    transform: translateY(-50%);
    animation-delay: -14s;
  }

  .orb-4 {
    width: 300px; height: 300px;
    background: radial-gradient(circle, #064e3b 0%, transparent 70%);
    top: 30%; left: 15%;
    animation-delay: -3s;
  }

  @keyframes drift {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(40px, -30px) scale(1.05); }
    66% { transform: translate(-20px, 40px) scale(0.95); }
  }

  .noise-overlay {
    position: fixed;
    inset: 0;
    z-index: 1;
    pointer-events: none;
    opacity: 0.025;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
    background-repeat: repeat;
    background-size: 128px;
  }

  /* GRID LINES */
  .grid-lines {
    position: fixed;
    inset: 0;
    z-index: 0;
    pointer-events: none;
    background-image:
      linear-gradient(rgba(56,189,248,0.03) 1px, transparent 1px),
      linear-gradient(90deg, rgba(56,189,248,0.03) 1px, transparent 1px);
    background-size: 80px 80px;
  }

  

  /* HERO */
  .hero {
    min-height: 100vh;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    padding: 100px 48px 80px;
    max-width: 1400px;
    margin: 0 auto;
    gap: 80px;
  }

  .hero-content { max-width: 640px; }

  .hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(56,189,248,0.08);
    border: 1px solid rgba(56,189,248,0.2);
    padding: 8px 16px;
    border-radius: 100px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--blue);
    margin-bottom: 32px;
    font-family: 'JetBrains Mono', monospace;
  }

  .hero-eyebrow::before {
    content: '';
    width: 6px; height: 6px;
    background: var(--green);
    border-radius: 50%;
    box-shadow: 0 0 8px var(--green);
    animation: pulse 2s ease-in-out infinite;
  }

  @keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(0.8); }
  }

  .hero-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(56px, 7vw, 96px);
    line-height: 1;
    letter-spacing: 2px;
    margin-bottom: 24px;
    color: #ffffff;
  }

  .hero-title .gradient-text {
    background: linear-gradient(135deg, var(--blue) 0%, var(--green) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .hero-desc {
    font-size: 17px;
    line-height: 1.7;
    color: var(--text-dim);
    margin-bottom: 48px;
    font-weight: 300;
  }

  .hero-actions {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
  }

  .btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #0369a1, #0d9488);
    color: white;
    padding: 16px 36px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.5px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s;
    position: relative;
    overflow: hidden;
    box-shadow: 0 0 40px rgba(56,189,248,0.2);
  }

  .btn-primary::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
    transform: translateX(-100%);
    transition: transform 0.5s;
  }

  .btn-primary:hover::before { transform: translateX(100%); }
  .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 40px rgba(56,189,248,0.3); }

  .btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: transparent;
    color: var(--text);
    padding: 16px 36px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.5px;
    border: 1px solid var(--border);
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s;
  }

  .btn-secondary:hover {
    border-color: rgba(56,189,248,0.3);
    background: rgba(56,189,248,0.05);
    color: var(--blue);
  }

  /* ORBIT CANVAS */
  .orbit-container {
    position: relative;
    width: 100%;
    height: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .orbit-center {
    position: absolute;
    width: 120px; height: 120px;
    background: linear-gradient(135deg, rgba(56,189,248,0.1), rgba(52,211,153,0.1));
    border: 1px solid rgba(56,189,248,0.2);
    border-radius: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    box-shadow: 0 0 60px rgba(56,189,248,0.1), inset 0 0 40px rgba(56,189,248,0.05);
  }

  .orbit-center img {
    width: 80px; height: 80px;
    border-radius: 12px;
    object-fit: contain;
  }

  /* ORBIT RING (visual only) */
  .orbit-ring {
    position: absolute;
    border-radius: 50%;
    border: 1px dashed rgba(56,189,248,0.08);
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    pointer-events: none;
  }

  .orbit-stage { position: absolute; width: 100%; height: 100%; }

  .orbit-node {
    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    cursor: default;
    will-change: transform;
  }

  .orbit-icon-wrap {
    width: 72px; height: 72px;
    background: rgba(3,10,15,0.9);
    border: 1px solid rgba(56,189,248,0.15);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 24px rgba(0,0,0,0.4);
    backdrop-filter: blur(10px);
    transition: all 0.3s;
  }

  .orbit-node:hover .orbit-icon-wrap {
    border-color: rgba(56,189,248,0.5);
    box-shadow: 0 0 30px rgba(56,189,248,0.2);
    transform: scale(1.1);
  }

  .orbit-icon-wrap .material-symbols-outlined {
    font-size: 32px;
    font-variation-settings: 'FILL' 1;
  }

  .orbit-label {
    font-family: 'JetBrains Mono', monospace;
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: var(--text-dimmer);
    white-space: nowrap;
    transition: color 0.3s;
  }

  .orbit-node:hover .orbit-label { color: var(--blue); }

  /* GLOW DOTS */
  .glow-dot {
    width: 4px; height: 4px;
    border-radius: 50%;
    position: absolute;
    background: var(--blue);
    box-shadow: 0 0 8px var(--blue);
  }

  /* SERVICES SECTION */
  .services-section {
    padding: 120px 48px;
    max-width: 1400px;
    margin: 0 auto;
  }

  .section-header {
    text-align: center;
    margin-bottom: 80px;
  }

  .section-tag {
    font-family: 'JetBrains Mono', monospace;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--green);
    display: block;
    margin-bottom: 16px;
  }

  .section-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(40px, 5vw, 64px);
    letter-spacing: 2px;
    color: #ffffff;
    line-height: 1;
    margin-bottom: 20px;
  }

  .section-desc {
    font-size: 16px;
    color: var(--text-dim);
    max-width: 560px;
    margin: 0 auto;
    line-height: 1.7;
    font-weight: 300;
  }

  /* CAROUSEL */
  .carousel-wrapper {
    position: relative;
  }

  .carousel-fade-left, .carousel-fade-right {
    position: absolute;
    top: 0; bottom: 0;
    width: 80px;
    z-index: 10;
    pointer-events: none;
  }

  .carousel-fade-left {
    left: 0;
    background: linear-gradient(to right, var(--bg2), transparent);
  }

  .carousel-fade-right {
    right: 0;
    background: linear-gradient(to left, var(--bg2), transparent);
  }

  .carousel-viewport {
    overflow: hidden;
    padding: 16px 0 40px;
  }

  .carousel-track {
    display: flex;
    gap: 24px;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .service-card {
    flex: 0 0 calc(33.333% - 16px);
    background: rgba(4,13,20,0.8);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 40px;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    backdrop-filter: blur(10px);
  }

  @media (max-width: 1024px) {
    .service-card { flex: 0 0 calc(50% - 12px); }
  }

  @media (max-width: 640px) {
    .service-card { flex: 0 0 calc(100% - 0px); }
  }

  .service-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 0%, var(--card-glow, rgba(56,189,248,0.06)), transparent 70%);
    opacity: 0;
    transition: opacity 0.4s;
  }

  .service-card:hover {
    border-color: var(--card-accent, rgba(56,189,248,0.3));
    transform: translateY(-6px);
    box-shadow: 0 24px 60px rgba(0,0,0,0.4), 0 0 40px var(--card-shadow, rgba(56,189,248,0.08));
  }

  .service-card:hover::before { opacity: 1; }

  .card-top-line {
    position: absolute;
    top: 0; left: 40px; right: 40px;
    height: 1px;
    background: linear-gradient(to right, transparent, var(--card-accent, rgba(56,189,248,0.5)), transparent);
    opacity: 0;
    transition: opacity 0.4s;
  }

  .service-card:hover .card-top-line { opacity: 1; }

  .card-icon {
    width: 60px; height: 60px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 28px;
    position: relative;
    z-index: 1;
  }

  .card-icon .material-symbols-outlined {
    font-size: 28px;
    font-variation-settings: 'FILL' 1;
  }

  .card-number {
    position: absolute;
    top: 32px; right: 32px;
    font-family: 'JetBrains Mono', monospace;
    font-size: 11px;
    color: var(--text-dimmer);
    letter-spacing: 1px;
  }

  .card-title {
    font-size: 22px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 14px;
    letter-spacing: -0.3px;
    position: relative; z-index: 1;
  }

  .card-desc {
    font-size: 14px;
    line-height: 1.7;
    color: var(--text-dim);
    font-weight: 300;
    margin-bottom: 28px;
    position: relative; z-index: 1;
  }

  .card-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    position: relative; z-index: 1;
  }

  .tag {
    font-size: 11px;
    font-weight: 600;
    font-family: 'JetBrains Mono', monospace;
    letter-spacing: 0.5px;
    padding: 5px 12px;
    border-radius: 6px;
    border: 1px solid;
  }

  .card-visual {
    margin: 28px 0 0;
    height: 80px;
    border-radius: 10px;
    background: rgba(255,255,255,0.02);
    border: 1px solid var(--border);
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: flex-end;
    padding: 12px;
    gap: 6px;
  }

  .bar {
    flex: 1;
    border-radius: 4px 4px 0 0;
    transition: height 0.8s ease;
  }

  /* STATS */
  .stats-section {
    padding: 80px 48px;
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    background: rgba(4,13,20,0.6);
  }

  .stats-inner {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 48px;
  }

  @media (max-width: 768px) {
    .stats-inner { grid-template-columns: repeat(2, 1fr); }
  }

  .stat-item {
    text-align: center;
    padding: 40px 20px;
    border: 1px solid var(--border);
    border-radius: 16px;
    background: var(--surface);
    position: relative;
    overflow: hidden;
    transition: all 0.3s;
  }

  .stat-item:hover {
    border-color: rgba(56,189,248,0.2);
    background: rgba(56,189,248,0.03);
    transform: translateY(-4px);
  }

  .stat-value {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 56px;
    letter-spacing: 2px;
    line-height: 1;
    margin-bottom: 8px;
  }

  .stat-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--text-dimmer);
    font-family: 'JetBrains Mono', monospace;
  }

  /* CTA */
  .cta-section {
    padding: 120px 48px;
    max-width: 1400px;
    margin: 0 auto;
  }

  .cta-card {
    background: rgba(4,13,20,0.9);
    border: 1px solid var(--border);
    border-radius: 28px;
    padding: 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
  }

  .cta-card::before {
    content: '';
    position: absolute;
    top: -1px; left: 10%; right: 10%;
    height: 1px;
    background: linear-gradient(to right, transparent, var(--blue), var(--green), transparent);
    opacity: 0.6;
  }

  .cta-glow-1 {
    position: absolute;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(56,189,248,0.08) 0%, transparent 70%);
    top: -150px; right: -100px;
    border-radius: 50%;
    animation: drift 15s ease-in-out infinite;
  }

  .cta-glow-2 {
    position: absolute;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(52,211,153,0.08) 0%, transparent 70%);
    bottom: -150px; left: -100px;
    border-radius: 50%;
    animation: drift 15s ease-in-out infinite reverse;
  }

  .cta-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(40px, 5vw, 72px);
    letter-spacing: 2px;
    color: #fff;
    margin-bottom: 20px;
    position: relative;
    z-index: 1;
  }

  .cta-desc {
    font-size: 16px;
    color: var(--text-dim);
    max-width: 560px;
    margin: 0 auto 48px;
    line-height: 1.7;
    font-weight: 300;
    position: relative;
    z-index: 1;
  }

  .cta-actions {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
    z-index: 1;
  }

  /* CAROUSEL CONTROLS */
  .carousel-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 24px;
    margin-top: 20px;
  }

  .carousel-btn {
    width: 48px; height: 48px;
    border-radius: 50%;
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text-dim);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
  }

  .carousel-btn:hover {
    border-color: rgba(56,189,248,0.4);
    color: var(--blue);
    background: rgba(56,189,248,0.08);
  }

  .carousel-dots {
    display: flex;
    gap: 8px;
  }

  .dot {
    width: 8px; height: 8px;
    border-radius: 100px;
    background: rgba(255,255,255,0.15);
    cursor: pointer;
    transition: all 0.3s;
    border: none;
  }

  .dot.active {
    background: var(--blue);
    width: 24px;
    box-shadow: 0 0 10px rgba(56,189,248,0.4);
  }

  /* REVEALS */
  .reveal {
    opacity: 0;
    transform: translateY(24px);
    transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
  }
  .reveal.visible { opacity: 1; transform: translateY(0); }

  /* FOOTER LINE */
  footer {
    border-top: 1px solid var(--border);
    padding: 32px 48px;
    text-align: center;
    font-family: 'JetBrains Mono', monospace;
    font-size: 11px;
    letter-spacing: 1px;
    color: var(--text-dimmer);
    position: relative;
    z-index: 2;
  }

  /* RESPONSIVE */
  @media (max-width: 1024px) {
    nav { padding: 0 24px; }
    .nav-links { display: none; }
    .hero { grid-template-columns: 1fr; padding: 100px 24px 60px; gap: 60px; }
    .orbit-container { height: 400px; }
    .services-section { padding: 80px 24px; }
    .stats-section { padding: 60px 24px; }
    .cta-section { padding: 80px 24px; }
    .cta-card { padding: 60px 32px; }
  }

  /* LINE CONNECTOR */
  .line-h {
    position: absolute;
    height: 1px;
    background: linear-gradient(to right, transparent, rgba(56,189,248,0.2), transparent);
    pointer-events: none;
  }

  .line-v {
    position: absolute;
    width: 1px;
    background: linear-gradient(to bottom, transparent, rgba(56,189,248,0.2), transparent);
    pointer-events: none;
  }
</style>
</head>
<body>
@include('component.navbar')
<!-- BG ATMOSPHERE -->
<div class="bg-atmosphere">
  <div class="orb orb-1"></div>
  <div class="orb orb-2"></div>
  <div class="orb orb-3"></div>
  <div class="orb orb-4"></div>
</div>
<div class="grid-lines"></div>
<div class="noise-overlay"></div>



<main>
  <!-- HERO -->
  <section class="hero">
    <div class="hero-content reveal">
      <div class="hero-eyebrow">Agency-Grade · Freelance Speed</div>
      <h1 class="hero-title">
        Build Fast.<br>
        <span class="gradient-text">Scale Smarter.</span>
      </h1>
      <p class="hero-desc">
        Empowering SMEs with custom MERN stack development, Shopify integration, and ROI-driven performance marketing — delivered with the precision of a studio.
      </p>
      <div class="hero-actions">
        <a href="#" class="btn-primary">
          View Pricing
          <span class="material-symbols-outlined" style="font-size:18px;">arrow_forward</span>
        </a>
        <a href="#" class="btn-secondary">
          <span class="material-symbols-outlined" style="font-size:18px;">play_circle</span>
          Book a Call
        </a>
      </div>
    </div>

    <!-- ORBIT VISUAL -->
    <div class="orbit-container">
      <!-- Rings -->
      <div class="orbit-ring" style="width:760px;height:760px;"></div>
      <div class="orbit-ring" style="width:620px;height:620px;opacity:0.5;border-style:solid;"></div>

     

      <!-- Orbiting Nodes -->
      <div id="orbit-stage" class="orbit-stage"></div>
    </div>
  </section>

  <!-- SERVICES -->
  <section class="services-section">
    <div class="section-header reveal">
      <span class="section-tag">// Our Expertise</span>
      <h2 class="section-title">Precision-Engineered<br>Solutions</h2>
      <p class="section-desc">End-to-end digital services built with modern stacks and strategic thinking.</p>
    </div>

    <div class="carousel-wrapper reveal">
      <div class="carousel-fade-left"></div>
      <div class="carousel-fade-right"></div>
      <div class="carousel-viewport">
        <div class="carousel-track" id="carousel-track">

          <!-- Card 1: Web Dev -->
          <div class="service-card" style="--card-glow: rgba(56,189,248,0.08); --card-accent: rgba(56,189,248,0.3); --card-shadow: rgba(56,189,248,0.1);">
            <div class="card-top-line"></div>
            <span class="card-number">01</span>
            <div class="card-icon" style="background: rgba(56,189,248,0.08);">
              <span class="material-symbols-outlined" style="color: #38bdf8;">code</span>
            </div>
            <h3 class="card-title">Web Development</h3>
            <p class="card-desc">Enterprise-grade web applications built with the modern MERN stack for speed, scalability and performance.</p>
            <div class="card-tags">
              <span class="tag" style="color:#38bdf8; border-color:rgba(56,189,248,0.2); background:rgba(56,189,248,0.06);">MongoDB</span>
              <span class="tag" style="color:#38bdf8; border-color:rgba(56,189,248,0.2); background:rgba(56,189,248,0.06);">Express</span>
              <span class="tag" style="color:#38bdf8; border-color:rgba(56,189,248,0.2); background:rgba(56,189,248,0.06);">React</span>
              <span class="tag" style="color:#38bdf8; border-color:rgba(56,189,248,0.2); background:rgba(56,189,248,0.06);">Node.js</span>
            </div>
          </div>

          <!-- Card 2: E-commerce -->
          <div class="service-card" style="--card-glow: rgba(52,211,153,0.08); --card-accent: rgba(52,211,153,0.3); --card-shadow: rgba(52,211,153,0.1);">
            <div class="card-top-line"></div>
            <span class="card-number">02</span>
            <div class="card-icon" style="background: rgba(52,211,153,0.08);">
              <span class="material-symbols-outlined" style="color: #34d399;">shopping_cart</span>
            </div>
            <h3 class="card-title">E-Commerce</h3>
            <p class="card-desc">High-converting Shopify storefronts tailored for your brand's growth and customer experience at every touchpoint.</p>
            <div class="card-tags">
              <span class="tag" style="color:#34d399; border-color:rgba(52,211,153,0.2); background:rgba(52,211,153,0.06);">Shopify</span>
              <span class="tag" style="color:#34d399; border-color:rgba(52,211,153,0.2); background:rgba(52,211,153,0.06);">Liquid</span>
              <span class="tag" style="color:#34d399; border-color:rgba(52,211,153,0.2); background:rgba(52,211,153,0.06);">Storefront API</span>
            </div>
          </div>

          <!-- Card 3: Backend -->
          <div class="service-card" style="--card-glow: rgba(129,140,248,0.08); --card-accent: rgba(129,140,248,0.3); --card-shadow: rgba(129,140,248,0.1);">
            <div class="card-top-line"></div>
            <span class="card-number">03</span>
            <div class="card-icon" style="background: rgba(129,140,248,0.08);">
              <span class="material-symbols-outlined" style="color: #818cf8;">database</span>
            </div>
            <h3 class="card-title">Backend Systems</h3>
            <p class="card-desc">Robust, secure, and lightning-fast backend architectures using industry-standard Laravel frameworks and REST APIs.</p>
            <div class="card-tags">
              <span class="tag" style="color:#818cf8; border-color:rgba(129,140,248,0.2); background:rgba(129,140,248,0.06);">PHP 8.2</span>
              <span class="tag" style="color:#818cf8; border-color:rgba(129,140,248,0.2); background:rgba(129,140,248,0.06);">Laravel 11</span>
              <span class="tag" style="color:#818cf8; border-color:rgba(129,140,248,0.2); background:rgba(129,140,248,0.06);">REST APIs</span>
            </div>
          </div>

          <!-- Card 4: Marketing -->
          <div class="service-card" style="--card-glow: rgba(34,211,238,0.08); --card-accent: rgba(34,211,238,0.3); --card-shadow: rgba(34,211,238,0.1);">
            <div class="card-top-line"></div>
            <span class="card-number">04</span>
            <div class="card-icon" style="background: rgba(34,211,238,0.08);">
              <span class="material-symbols-outlined" style="color: #22d3ee;">trending_up</span>
            </div>
            <h3 class="card-title">Performance Marketing</h3>
            <p class="card-desc">Strategic, data-led campaigns that maximize ROI and drive sustainable digital growth across all paid channels.</p>
            <div class="card-tags">
              <span class="tag" style="color:#22d3ee; border-color:rgba(34,211,238,0.2); background:rgba(34,211,238,0.06);">SEO</span>
              <span class="tag" style="color:#22d3ee; border-color:rgba(34,211,238,0.2); background:rgba(34,211,238,0.06);">Google Ads</span>
              <span class="tag" style="color:#22d3ee; border-color:rgba(34,211,238,0.2); background:rgba(34,211,238,0.06);">Meta Ads</span>
            </div>
            <div class="card-visual">
              <div class="bar" style="height:40%;background:rgba(34,211,238,0.2);" data-h="40"></div>
              <div class="bar" style="height:55%;background:rgba(34,211,238,0.35);" data-h="55"></div>
              <div class="bar" style="height:70%;background:rgba(34,211,238,0.5);" data-h="70"></div>
              <div class="bar" style="height:50%;background:rgba(34,211,238,0.4);" data-h="50"></div>
              <div class="bar" style="height:85%;background:rgba(34,211,238,0.65);" data-h="85"></div>
              <div class="bar" style="height:95%;background:#22d3ee;" data-h="95"></div>
            </div>
          </div>

        </div>
      </div>

      <!-- Controls -->
      <div class="carousel-controls">
        <button class="carousel-btn" id="prev-btn">
          <span class="material-symbols-outlined" style="font-size:20px;">chevron_left</span>
        </button>
        <div class="carousel-dots" id="dots"></div>
        <button class="carousel-btn" id="next-btn">
          <span class="material-symbols-outlined" style="font-size:20px;">chevron_right</span>
        </button>
      </div>
    </div>
  </section>

  <!-- STATS -->
  <section class="stats-section">
    <div class="stats-inner">
      <div class="stat-item reveal" style="transition-delay:0.1s">
        <div class="stat-value" style="color:#38bdf8;"><span class="counter" data-target="150">0</span>+</div>
        <div class="stat-label">Projects Delivered</div>
      </div>
      <div class="stat-item reveal" style="transition-delay:0.2s">
        <div class="stat-value" style="color:#34d399;"><span class="counter" data-target="300">0</span>%</div>
        <div class="stat-label">Avg. ROI Boost</div>
      </div>
      <div class="stat-item reveal" style="transition-delay:0.3s">
        <div class="stat-value" style="color:#818cf8;"><span class="counter" data-target="12">0</span>ms</div>
        <div class="stat-label">Server Latency</div>
      </div>
      <div class="stat-item reveal" style="transition-delay:0.4s">
        <div class="stat-value" style="color:#22d3ee;">24/7</div>
        <div class="stat-label">Expert Support</div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section">
    <div class="cta-card reveal">
      <div class="cta-glow-1"></div>
      <div class="cta-glow-2"></div>
      <h2 class="cta-title">Ready to Scale Your<br><span style="background: linear-gradient(135deg, #38bdf8, #34d399); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Digital Presence?</span></h2>
      <p class="cta-desc">Join the ranks of successful SMEs who have transformed their digital strategy with our agency-grade expertise.</p>
      <div class="cta-actions">
        <a href="#" class="btn-primary">
          Start Your Project
          <span class="material-symbols-outlined" style="font-size:18px;">rocket_launch</span>
        </a>
        <a href="#" class="btn-secondary">Check Our Portfolio</a>
      </div>
    </div>
  </section>

</main>
@include('component.footer')


<script>
// ─── ORBIT ANIMATION ───────────────────────────────────────────
const orbitData = [
  { label: 'React', icon: 'code', color: '#38bdf8' },
  { label: 'Node.js', icon: 'javascript', color: '#34d399' },
  { label: 'MongoDB', icon: 'database', color: '#22d3ee' },
  { label: 'Shopify', icon: 'shopping_cart', color: '#34d399' },
  { label: 'Laravel', icon: 'deployed_code', color: '#818cf8' },
  { label: 'Marketing', icon: 'trending_up', color: '#38bdf8' },
];

const stage = document.getElementById('orbit-stage');
const nodes = [];
let angleOffset = 0;

orbitData.forEach((data, i) => {
  const node = document.createElement('div');
  node.className = 'orbit-node';
  node.innerHTML = `
    <div class="orbit-icon-wrap">
      <span class="material-symbols-outlined" style="color:${data.color};">${data.icon}</span>
    </div>
    <span class="orbit-label">${data.label}</span>
  `;
  stage.appendChild(node);
  nodes.push(node);
});

function animateOrbit() {
  angleOffset += 0.004;
  const cx = stage.offsetWidth / 2;
  const cy = stage.offsetHeight / 2;
  const rX = Math.min(cx * 0.85, 210);
  const rY = Math.min(cy * 0.60, 130);

  nodes.forEach((node, i) => {
    const angle = angleOffset + (i / nodes.length) * Math.PI * 2;
    const x = cx + Math.cos(angle) * rX;
    const y = cy + Math.sin(angle) * rY;
    const z = Math.sin(angle);
    const scale = 0.75 + (z + 1) * 0.175; // 0.75 – 1.1
    const opacity = 0.45 + (z + 1) * 0.275;
    const bob = Math.sin(Date.now() * 0.001 + i * 1.2) * 8;

    node.style.left = `${x}px`;
    node.style.top = `${y + bob}px`;
    node.style.transform = `translate(-50%, -50%) scale(${scale})`;
    node.style.opacity = opacity;
    node.style.zIndex = Math.round((z + 1) * 10);
  });

  requestAnimationFrame(animateOrbit);
}
animateOrbit();

// ─── CAROUSEL ────────────────────────────────────────────────
const track = document.getElementById('carousel-track');
const cards = Array.from(track.children);
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
const dotsEl = document.getElementById('dots');
let currentIdx = 0;

function getVisible() {
  if (window.innerWidth >= 1024) return 3;
  if (window.innerWidth >= 640) return 2;
  return 1;
}

function getMax() { return Math.max(0, cards.length - getVisible()); }

function buildDots() {
  dotsEl.innerHTML = '';
  const n = getMax() + 1;
  for (let i = 0; i < n; i++) {
    const d = document.createElement('button');
    d.className = 'dot' + (i === currentIdx ? ' active' : '');
    d.addEventListener('click', () => { currentIdx = i; update(); });
    dotsEl.appendChild(d);
  }
}

function update() {
  const visible = getVisible();
  const pct = 100 / visible;
  track.style.transform = `translateX(-${currentIdx * pct}%)`;
  Array.from(dotsEl.children).forEach((d, i) => {
    d.className = 'dot' + (i === currentIdx ? ' active' : '');
  });
}

prevBtn.addEventListener('click', () => {
  if (currentIdx > 0) { currentIdx--; update(); }
});
nextBtn.addEventListener('click', () => {
  if (currentIdx < getMax()) { currentIdx++; update(); }
});

window.addEventListener('resize', () => {
  if (currentIdx > getMax()) currentIdx = getMax();
  buildDots(); update();
});

buildDots(); update();

// ─── REVEAL ON SCROLL ─────────────────────────────────────────
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      // Counter animation
      entry.target.querySelectorAll('.counter').forEach(el => {
        const target = parseInt(el.dataset.target);
        let current = 0;
        const step = target / 60;
        const tick = () => {
          current = Math.min(current + step, target);
          el.textContent = Math.round(current);
          if (current < target) requestAnimationFrame(tick);
        };
        tick();
      });
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// ─── NAV HIDE ON SCROLL ───────────────────────────────────────
let lastY = 0;
window.addEventListener('scroll', () => {
  const nav = document.getElementById('main-nav');
  const y = window.scrollY;
  if (y > 100 && y > lastY) {
    nav.style.transform = 'translateY(-100%)';
  } else {
    nav.style.transform = '';
  }
  lastY = y;
}, { passive: true });

// ─── CARD MOUSE GLOW ──────────────────────────────────────────
document.querySelectorAll('.service-card').forEach(card => {
  card.addEventListener('mousemove', e => {
    const rect = card.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;
    card.style.setProperty('--mouse-x', `${x}%`);
    card.style.setProperty('--mouse-y', `${y}%`);
  });
});
</script>
</body>
</html>