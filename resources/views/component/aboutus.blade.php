
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>About Us – Freelance Digitals</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{
  --accent:#00e5ff;
  --accent-dim:rgba(0,229,255,0.08);
  --accent-border:rgba(0,229,255,0.15);
  --bg:#06090f;
  --bg2:#0a0e18;
  --surface:rgba(255,255,255,0.03);
  --surface-hover:rgba(255,255,255,0.055);
  --border:rgba(255,255,255,0.07);
  --border-hover:rgba(255,255,255,0.14);
  --text-primary:#f0f2f7;
  --text-secondary:rgba(240,242,247,0.5);
  --text-muted:rgba(240,242,247,0.3);
  --pad:clamp(1.5rem,6vw,5rem);
  --serif:'Syne',sans-serif;
  --sans:'DM Sans',system-ui,sans-serif;
}
html{scroll-behavior:smooth}
body{
  background:var(--bg);
  color:var(--text-primary);
  font-family:var(--sans);
  font-weight:400;
  overflow-x:hidden;
  line-height:1.6;
  -webkit-font-smoothing:antialiased;
}

/* ── AMBIENT GLOW (subtle, not bubbly) ── */
.ambient{position:fixed;top:0;left:0;width:100%;height:100%;z-index:0;pointer-events:none;overflow:hidden}
.glow-orb{position:absolute;border-radius:50%;filter:blur(80px);opacity:.18}
.orb1{width:600px;height:600px;background:radial-gradient(circle,#00e5ff,transparent 70%);top:-200px;right:-100px;animation:drift1 18s ease-in-out infinite}
.orb2{width:400px;height:400px;background:radial-gradient(circle,#0af5d8,transparent 70%);bottom:10%;left:-100px;opacity:.1;animation:drift2 22s ease-in-out infinite}
@keyframes drift1{0%,100%{transform:translate(0,0)}50%{transform:translate(-60px,40px)}}
@keyframes drift2{0%,100%{transform:translate(0,0)}50%{transform:translate(40px,-30px)}}

/* floating particles */
.particles{position:fixed;top:0;left:0;width:100%;height:100%;z-index:0;pointer-events:none}
.particle{position:absolute;width:1px;height:1px;background:var(--accent);border-radius:50%;opacity:0;animation:particleDrift linear infinite}
@keyframes particleDrift{
  0%{transform:translateY(100vh);opacity:0}
  10%{opacity:.6}
  90%{opacity:.2}
  100%{transform:translateY(-10vh);opacity:0}
}

/* ── NAV ── */
nav{
  position:fixed;top:0;left:0;right:0;z-index:100;
  display:flex;align-items:center;justify-content:space-between;
  padding:1.1rem var(--pad);
  background:rgba(6,9,15,0.8);
  backdrop-filter:blur(24px);
  border-bottom:1px solid var(--border);
  gap:1.5rem;
}
.logo{
  display:flex;align-items:center;gap:.5rem;
  font-family:var(--sans);font-size:1rem;font-weight:600;
  letter-spacing:-.01em;white-space:nowrap;flex-shrink:0;
  color:var(--text-primary);text-decoration:none;
}
.logo-dot{width:6px;height:6px;background:var(--accent);border-radius:50%;flex-shrink:0}
.logo em{color:var(--accent);font-style:normal}

.nav-links{display:flex;gap:2rem;list-style:none}
.nav-links a{
  color:var(--text-secondary);text-decoration:none;
  font-size:.83rem;font-weight:500;letter-spacing:.01em;
  transition:color .25s;
}
.nav-links a:hover{color:var(--text-primary)}
.nav-links a.active{color:var(--text-primary)}

.btn-nav{
  border:1px solid var(--accent-border);
  color:var(--accent);background:var(--accent-dim);
  padding:.45rem 1.3rem;border-radius:4px;
  font-family:var(--sans);font-size:.78rem;
  font-weight:600;cursor:pointer;letter-spacing:.06em;
  text-transform:uppercase;transition:all .3s;white-space:nowrap;flex-shrink:0;
}
.btn-nav:hover{background:rgba(0,229,255,0.14);border-color:rgba(0,229,255,0.35)}

.hamburger{display:none;flex-direction:column;gap:4px;cursor:pointer;padding:.4rem;flex-shrink:0}
.hamburger span{display:block;width:20px;height:1.5px;background:var(--text-secondary);border-radius:2px;transition:all .3s}
.hamburger.open span:nth-child(1){transform:rotate(45deg) translate(4px,4px)}
.hamburger.open span:nth-child(2){opacity:0}
.hamburger.open span:nth-child(3){transform:rotate(-45deg) translate(4px,-4px)}

.mobile-menu{
  display:none;position:fixed;top:60px;left:0;right:0;z-index:99;
  background:rgba(6,9,15,0.98);backdrop-filter:blur(24px);
  border-bottom:1px solid var(--border);
  padding:2rem var(--pad);flex-direction:column;gap:0;
}
.mobile-menu.open{display:flex}
.mobile-menu a{
  color:var(--text-secondary);text-decoration:none;
  font-size:.95rem;font-weight:500;
  padding:.9rem 0;border-bottom:1px solid var(--border);
  transition:color .25s;
}
.mobile-menu a:last-of-type{border-bottom:none}
.mobile-menu a.active,.mobile-menu a:hover{color:var(--text-primary)}
.mobile-menu .btn-nav{margin-top:1.2rem;width:fit-content}

/* ── MAIN ── */
main{position:relative;z-index:10;padding-top:62px}

/* ── HERO ── */
.hero{
  padding:7rem var(--pad) 5rem;
  position:relative;
  border-bottom:1px solid var(--border);
}
.hero-eyebrow{
  display:inline-flex;align-items:center;gap:.6rem;
  font-size:.72rem;font-weight:600;letter-spacing:.14em;
  text-transform:uppercase;color:var(--text-muted);
  margin-bottom:2rem;
}
.hero-eyebrow::before{content:'';display:block;width:24px;height:1px;background:var(--text-muted)}
h1.hero-title{
  font-family:var(--serif);
  font-size:clamp(2.8rem,6.5vw,6rem);
  font-weight:400;line-height:1.08;
  letter-spacing:-.02em;
  color:var(--text-primary);
  max-width:780px;
}
h1.hero-title em{font-style:italic;color:var(--text-secondary)}
.hero-body{
  margin-top:2rem;max-width:480px;
  color:var(--text-secondary);font-size:.95rem;
  line-height:1.85;font-weight:400;
}
.hero-rule{
  width:60px;height:1px;
  background:var(--accent);
  margin-top:2.5rem;
  opacity:.6;
}

/* ── DIVIDER ── */
.divider{height:1px;background:var(--border);margin:0}

/* ── SECTIONS ── */
section{padding:6rem var(--pad);border-bottom:1px solid var(--border)}
section:last-child{border-bottom:none}

.eyebrow{
  font-size:.68rem;font-weight:600;letter-spacing:.14em;
  text-transform:uppercase;color:var(--text-muted);
  margin-bottom:1.2rem;display:flex;align-items:center;gap:.5rem;
}
.eyebrow::before{content:'';display:block;width:20px;height:1px;background:var(--text-muted)}

.section-title{
  font-family:var(--serif);
  font-size:clamp(1.9rem,3.5vw,3rem);
  font-weight:400;line-height:1.15;
  letter-spacing:-.02em;
  color:var(--text-primary);
  max-width:540px;
}

/* ── GLASS CARD ── */
.card{
  background:var(--surface);
  border:1px solid var(--border);
  border-radius:12px;
  padding:clamp(1.4rem,3vw,2.2rem);
  transition:background .3s,border-color .3s;
  position:relative;
}
.card:hover{
  background:var(--surface-hover);
  border-color:var(--border-hover);
}

/* ── WHO WE ARE ── */
.who-grid{display:grid;grid-template-columns:1fr 1fr;gap:2rem;margin-top:3.5rem;align-items:start}
.who-left .card p{
  color:var(--text-secondary);line-height:1.9;
  font-size:.93rem;margin-bottom:1rem;
}
.who-left .card p:last-of-type{margin-bottom:0}
.who-left .card p strong{color:var(--text-primary);font-weight:500}

.stats-row{
  display:grid;grid-template-columns:repeat(3,1fr);
  gap:1px;margin-top:2.5rem;
  background:var(--border);border-radius:10px;overflow:hidden;
}
.stat-block{
  background:var(--surface);padding:1.6rem 1.2rem;text-align:center;
  transition:background .3s;
}
.stat-block:hover{background:var(--surface-hover)}
.stat-num{
  font-family:var(--serif);
  font-size:clamp(2rem,4vw,2.8rem);
  font-weight:400;color:var(--text-primary);
  letter-spacing:-.02em;line-height:1;
}
.stat-suffix{color:var(--accent);font-family:var(--sans);font-size:1.2rem}
.stat-label{
  font-size:.72rem;font-weight:500;letter-spacing:.1em;
  text-transform:uppercase;color:var(--text-muted);margin-top:.5rem;
}

.who-right{display:flex;flex-direction:column;gap:1rem}
.who-feature{
  padding:1.4rem 1.6rem;
  display:flex;align-items:flex-start;gap:1rem;
}
.feature-num{
  font-family:var(--serif);font-size:1.1rem;
  color:var(--text-muted);flex-shrink:0;line-height:1.4;
  font-style:italic;
}
.feature-content h4{
  font-size:.9rem;font-weight:600;
  color:var(--text-primary);margin-bottom:.3rem;
  letter-spacing:-.01em;
}
.feature-content p{font-size:.83rem;color:var(--text-secondary);line-height:1.7}

/* ── VALUES ── */
.values-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;margin-top:3.5rem;background:var(--border);border-radius:12px;overflow:hidden}
.value-card{
  background:var(--surface);padding:2rem 1.8rem;
  transition:background .3s;
}
.value-card:hover{background:var(--surface-hover)}
.value-index{
  font-family:var(--serif);font-style:italic;
  font-size:.85rem;color:var(--text-muted);
  margin-bottom:1.2rem;display:block;
}
.value-card h3{
  font-size:.92rem;font-weight:600;
  color:var(--text-primary);margin-bottom:.6rem;
  letter-spacing:-.01em;
}
.value-card p{font-size:.83rem;color:var(--text-secondary);line-height:1.75}

/* ── TEAM ── */
.team-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;margin-top:3.5rem;background:var(--border);border-radius:12px;overflow:hidden}
.team-card{
  background:var(--surface);padding:2rem 1.5rem;
  text-align:center;transition:background .3s;
}
.team-card:hover{background:var(--surface-hover)}
.avatar-wrap{
  width:56px;height:56px;border-radius:50%;
  background:var(--surface-hover);
  border:1px solid var(--border-hover);
  display:flex;align-items:center;justify-content:center;
  font-size:1.4rem;margin:0 auto 1.2rem;
}
.team-card h3{
  font-size:.88rem;font-weight:600;
  color:var(--text-primary);margin-bottom:.25rem;letter-spacing:-.01em;
}
.team-role{
  font-size:.72rem;font-weight:500;letter-spacing:.08em;
  text-transform:uppercase;color:var(--accent);
  margin-bottom:.7rem;opacity:.8;
}
.team-bio{font-size:.78rem;color:var(--text-muted);line-height:1.65}

/* ── PROCESS ── */
.process-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;margin-top:3.5rem;background:var(--border);border-radius:12px;overflow:hidden}
.step-card{
  background:var(--surface);padding:2rem 1.5rem;
  transition:background .3s;
}
.step-card:hover{background:var(--surface-hover)}
.step-index{
  font-family:var(--serif);font-style:italic;
  font-size:.83rem;color:var(--text-muted);
  margin-bottom:1rem;display:block;
}
.step-card h3{
  font-size:.9rem;font-weight:600;
  color:var(--text-primary);margin-bottom:.5rem;letter-spacing:-.01em;
}
.step-card p{font-size:.8rem;color:var(--text-secondary);line-height:1.7}

/* ── CTA ── */
.cta-wrap{padding:6rem var(--pad) 5rem}
.cta-inner{
  background:var(--surface);
  border:1px solid var(--border);
  border-radius:16px;
  padding:clamp(2.5rem,5vw,4.5rem);
  position:relative;overflow:hidden;
  text-align:center;
}
.cta-inner::before{
  content:'';position:absolute;
  top:-120px;right:-80px;
  width:320px;height:320px;border-radius:50%;
  background:radial-gradient(circle,rgba(0,229,255,0.06),transparent 70%);
  pointer-events:none;
}
.cta-inner .eyebrow{justify-content:center}
.cta-inner .eyebrow::before{display:none}
.cta-title{
  font-family:var(--serif);
  font-size:clamp(2rem,4.5vw,3.5rem);
  font-weight:400;line-height:1.1;
  letter-spacing:-.02em;margin-bottom:1rem;
}
.cta-body{
  color:var(--text-secondary);max-width:440px;
  margin:0 auto 2.5rem;font-size:.92rem;line-height:1.85;
}
.btn-group{display:flex;gap:.9rem;justify-content:center;flex-wrap:wrap}
.btn-primary{
  background:var(--accent);color:#06090f;
  border:none;padding:.8rem 2rem;border-radius:4px;
  font-family:var(--sans);font-weight:600;font-size:.85rem;
  cursor:pointer;letter-spacing:.03em;
  transition:opacity .3s,transform .3s;
}
.btn-primary:hover{opacity:.88;transform:translateY(-1px)}
.btn-secondary{
  background:transparent;color:var(--text-secondary);
  border:1px solid var(--border-hover);
  padding:.8rem 2rem;border-radius:4px;
  font-family:var(--sans);font-weight:500;font-size:.85rem;
  cursor:pointer;transition:all .3s;
}
.btn-secondary:hover{color:var(--text-primary);border-color:rgba(255,255,255,0.25)}

/* ══ RESPONSIVE ══ */
@media(max-width:1100px){
  .values-grid{grid-template-columns:repeat(2,1fr)}
  .team-grid{grid-template-columns:repeat(2,1fr)}
  .process-grid{grid-template-columns:repeat(2,1fr)}
}
@media(max-width:860px){
  .nav-links,.btn-nav{display:none}
  .hamburger{display:flex}
  .who-grid{grid-template-columns:1fr}
  .values-grid{grid-template-columns:repeat(2,1fr)}
}
@media(max-width:560px){
  section{padding:4rem var(--pad)}
  .cta-wrap{padding:4rem var(--pad) 3rem}
  .values-grid{grid-template-columns:1fr}
  .team-grid{grid-template-columns:repeat(2,1fr)}
  .process-grid{grid-template-columns:1fr}
  .stats-row{grid-template-columns:1fr;gap:1px}
  .hero{padding:5rem var(--pad) 3.5rem}
}
@media(max-width:380px){
  .team-grid{grid-template-columns:1fr}
  h1.hero-title{font-size:2.4rem}
}
</style>
</head>
<body>

<div class="ambient">
  <div class="glow-orb orb1"></div>
  <div class="glow-orb orb2"></div>
</div>
<div class="particles" id="particles"></div>

@include("component.navbar")

  <!-- HERO -->
  <div class="hero">
    <div class="hero-eyebrow">About the agency</div>
    <h1 class="hero-title">We build digital products<br><em>that drive real growth.</em></h1>
    <p class="hero-body">Freelance Digitals is a full-service digital agency combining strategy, design, and engineering into one seamless process. We've helped 150+ brands build their digital presence from the ground up.</p>
    <div class="hero-rule"></div>
  </div>

  <!-- WHO WE ARE -->
  <section id="who">
    <div class="eyebrow">Our story</div>
    <h2 class="section-title">A studio built on craft and intention.</h2>
    <div class="who-grid">
      <div>
        <div class="card">
          <p>Founded with a clear purpose, <strong>Freelance Digitals</strong> has grown from a small creative studio into a trusted digital partner for over 150 businesses worldwide.</p>
          <p>We don't take on every project — only the ones where we can create something genuinely exceptional. That selectivity means our clients get our full attention, our best thinking, and work that outlasts the brief.</p>
          <p>Our team blends <strong>strategic thinking</strong>, <strong>design excellence</strong>, and <strong>technical precision</strong>. Three disciplines working as one, in service of your goals.</p>
          <div class="stats-row">
            <div class="stat-block">
              <div class="stat-num"><span class="counter" data-target="150">0</span><span class="stat-suffix">+</span></div>
              <div class="stat-label">Projects</div>
            </div>
            <div class="stat-block">
              <div class="stat-num"><span class="counter" data-target="98">0</span><span class="stat-suffix">%</span></div>
              <div class="stat-label">Satisfaction</div>
            </div>
            <div class="stat-block">
              <div class="stat-num"><span class="counter" data-target="6">0</span><span class="stat-suffix">+</span></div>
              <div class="stat-label">Years</div>
            </div>
          </div>
        </div>
      </div>
      <div class="who-right">
        <div class="card who-feature">
          <div class="feature-num">01</div>
          <div class="feature-content">
            <h4>Strategy before execution</h4>
            <p>Every project begins with a discovery phase. We learn your business, your audience, and the competitive landscape before a single pixel is drawn.</p>
          </div>
        </div>
        <div class="card who-feature">
          <div class="feature-num">02</div>
          <div class="feature-content">
            <h4>Design that converts</h4>
            <p>Our interfaces are built to perform. Aesthetic excellence and conversion optimisation aren't opposing forces — in our hands, they amplify each other.</p>
          </div>
        </div>
        <div class="card who-feature">
          <div class="feature-num">03</div>
          <div class="feature-content">
            <h4>Technology built to scale</h4>
            <p>We engineer for the long term. Clean code, scalable architecture, and rigorous QA mean your product grows with your business without friction.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- VALUES -->
  <section id="values">
    <div class="eyebrow">What drives us</div>
    <h2 class="section-title">The principles we won't compromise on.</h2>
    <div class="values-grid">
      <div class="value-card">
        <span class="value-index">01 — Innovation</span>
        <h3>Future-proof thinking</h3>
        <p>We stay ahead of industry shifts and emerging technologies so our clients are positioned for what's next, not just what's now.</p>
      </div>
      <div class="value-card">
        <span class="value-index">02 — Outcomes</span>
        <h3>Results over aesthetics</h3>
        <p>Beautiful work that doesn't perform is a failure. Every creative and technical decision we make is anchored to business outcomes.</p>
      </div>
      <div class="value-card">
        <span class="value-index">03 — Trust</span>
        <h3>Radical transparency</h3>
        <p>No inflated timelines, no vague reporting. You'll always know exactly where your project stands and why every decision was made.</p>
      </div>
      <div class="value-card">
        <span class="value-index">04 — Quality</span>
        <h3>Uncompromising craft</h3>
        <p>We care deeply about the details other agencies skip. From typography to load time to error states — everything receives the same level of care.</p>
      </div>
      <div class="value-card">
        <span class="value-index">05 — Partnership</span>
        <h3>Long-term relationships</h3>
        <p>We don't disappear after launch. Our most successful work comes from ongoing partnerships where we grow alongside the businesses we serve.</p>
      </div>
      <div class="value-card">
        <span class="value-index">06 — Perspective</span>
        <h3>Globally-informed work</h3>
        <p>Having worked across continents and industries, our team brings a breadth of experience that consistently sharpens our thinking.</p>
      </div>
    </div>
  </section>

  <!-- TEAM -->
  <section id="team">
    <div class="eyebrow">The people</div>
    <h2 class="section-title">A small team. An outsized impact.</h2>
    <div class="team-grid">
      <div class="team-card">
        <div class="avatar-wrap">👨‍💼</div>
        <h3>Ahmed Raza</h3>
        <div class="team-role">Founder & CEO</div>
        <p class="team-bio">10+ years guiding digital transformation for brands across three continents. Sets the vision, holds the standard.</p>
      </div>
      <div class="team-card">
        <div class="avatar-wrap">👩‍🎨</div>
        <h3>Sara Khan</h3>
        <div class="team-role">Creative Director</div>
        <p class="team-bio">Trained in product design and brand systems. Believes every interface is a conversation between a business and its users.</p>
      </div>
      <div class="team-card">
        <div class="avatar-wrap">👨‍💻</div>
        <h3>Bilal Aslam</h3>
        <div class="team-role">Lead Engineer</div>
        <p class="team-bio">Full-stack architect with a preference for clean, maintainable code. Has shipped products used by hundreds of thousands of people.</p>
      </div>
      <div class="team-card">
        <div class="avatar-wrap">👩‍📊</div>
        <h3>Maryam Noor</h3>
        <div class="team-role">Growth Strategist</div>
        <p class="team-bio">Turns data into decisions. Specialises in sustainable acquisition, retention mechanics, and conversion optimisation.</p>
      </div>
    </div>
  </section>

  <!-- PROCESS -->
  <section id="process">
    <div class="eyebrow">How we work</div>
    <h2 class="section-title">A process refined over six years.</h2>
    <div class="process-grid">
      <div class="step-card">
        <span class="step-index">Step 01</span>
        <h3>Discovery</h3>
        <p>We start by listening. Understanding your goals, constraints, audience, and competitive landscape before anything else.</p>
      </div>
      <div class="step-card">
        <span class="step-index">Step 02</span>
        <h3>Strategy</h3>
        <p>A detailed roadmap covering positioning, architecture, design direction, and delivery milestones — agreed before work begins.</p>
      </div>
      <div class="step-card">
        <span class="step-index">Step 03</span>
        <h3>Execution</h3>
        <p>Design and engineering working in parallel, with regular check-ins. No surprises at handoff — you're involved throughout.</p>
      </div>
      <div class="step-card">
        <span class="step-index">Step 04</span>
        <h3>Growth</h3>
        <p>Launch is the beginning, not the end. We monitor performance, iterate on what the data tells us, and scale what works.</p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <div class="cta-wrap">
    <div class="cta-inner">
      <div class="eyebrow">Work with us</div>
      <h2 class="cta-title">Let's build something<br><em>worth remembering.</em></h2>
      <p class="cta-body">Whether you're launching something new or evolving something existing — we'd like to hear about it.</p>
      <div class="btn-group">
        <button class="btn-primary">Start a project</button>
        <button class="btn-secondary">View our work ↗</button>
      </div>
    </div>
  </div>
</main>

<script>
gsap.registerPlugin(ScrollTrigger);

/* particles */
(function(){
  const c=document.getElementById('particles');
  for(let i=0;i<30;i++){
    const p=document.createElement('div');
    p.className='particle';
    const s=Math.random()*2+1;
    p.style.cssText=`
      width:${s}px;height:${s}px;
      left:${Math.random()*100}%;
      animation-duration:${Math.random()*30+20}s;
      animation-delay:-${Math.random()*20}s;
      opacity:0;
    `;
    c.appendChild(p);
  }
})();

/* mobile nav */
function toggleMenu(){
  document.getElementById('hamburger').classList.toggle('open');
  document.getElementById('mobileMenu').classList.toggle('open');
}
document.querySelectorAll('.mobile-menu a').forEach(a=>a.addEventListener('click',()=>{
  document.getElementById('hamburger').classList.remove('open');
  document.getElementById('mobileMenu').classList.remove('open');
}));

/* gsap */
gsap.from('#navbar',{y:-60,opacity:0,duration:.9,ease:'power3.out'});
gsap.from('.hero-eyebrow',{y:20,opacity:0,duration:.7,delay:.3,ease:'power3.out'});
gsap.from('.hero-title',{y:30,opacity:0,duration:.9,delay:.5,ease:'power3.out'});
gsap.from('.hero-body',{y:20,opacity:0,duration:.7,delay:.75,ease:'power3.out'});
gsap.from('.hero-rule',{scaleX:0,opacity:0,duration:.8,delay:1,ease:'power3.out',transformOrigin:'left'});

const revealEls=['.eyebrow','.section-title','.card','.value-card','.team-card','.step-card','.cta-inner'];
revealEls.forEach(sel=>{
  gsap.utils.toArray(sel).forEach((el,i)=>{
    gsap.from(el,{
      scrollTrigger:{trigger:el,start:'top 92%'},
      y:24,opacity:0,duration:.65,
      delay:(i%4)*0.07,
      ease:'power3.out'
    });
  });
});

/* counter */
const counters=document.querySelectorAll('.counter');
const suffixes={'150':'+','98':'%','6':'+'};
const obs=new IntersectionObserver(entries=>{
  entries.forEach(e=>{
    if(!e.isIntersecting) return;
    const el=e.target;
    const target=+el.dataset.target;
    const suffix=suffixes[target]||'';
    let start=null;
    const dur=1600;
    const tick=ts=>{
      if(!start) start=ts;
      const p=Math.min((ts-start)/dur,1);
      const ease=1-Math.pow(1-p,3);
      el.textContent=Math.floor(ease*target);
      if(p<1) requestAnimationFrame(tick);
      else el.textContent=target;
    };
    requestAnimationFrame(tick);
    obs.unobserve(el);
  });
},{threshold:.6});
counters.forEach(c=>obs.observe(c));
</script>
</body>
</html>