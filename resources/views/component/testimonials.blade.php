
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  .tSection {
    padding: 3rem 1rem;
    background: linear-gradient(135deg, #0a0e1a 0%, #0d1224 50%, #070b16 100%);
    border-radius: 16px;
    overflow: hidden;
    position: relative;
    min-height: 600px;
  }
  .tSection::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 60% 40% at 20% 20%, rgba(99,102,241,0.12) 0%, transparent 70%),
      radial-gradient(ellipse 50% 35% at 80% 75%, rgba(139,92,246,0.10) 0%, transparent 70%);
    pointer-events: none;
  }
  .tBadge {
    display: inline-block;
    padding: 4px 16px;
    border-radius: 999px;
    border: 1px solid rgba(139,92,246,0.4);
    color: #a78bfa;
    font-size: 13px;
    letter-spacing: 0.04em;
    background: rgba(99,102,241,0.08);
    margin-bottom: 1rem;
  }
  .tTitle {
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 700;
    color: #f1f5f9;
    line-height: 1.2;
    margin-bottom: 0.75rem;
    letter-spacing: -0.02em;
  }
  .tSub {
    font-size: 15px;
    color: #64748b;
  }
  .tHeader {
    text-align: center;
    position: relative;
    z-index: 2;
    margin-bottom: 2.5rem;
  }
  .tGrid {
    display: flex;
    gap: 16px;
    justify-content: center;
    position: relative;
    z-index: 2;
    -webkit-mask-image: linear-gradient(to bottom, transparent 0%, black 15%, black 85%, transparent 100%);
    mask-image: linear-gradient(to bottom, transparent 0%, black 15%, black 85%, transparent 100%);
    max-height: 480px;
    overflow: hidden;
  }
  .tCol {
    display: flex;
    flex-direction: column;
    gap: 14px;
    width: 220px;
    flex-shrink: 0;
  }
  @media (max-width: 560px) {
    .tCol:not(:first-child) { display: none; }
    .tCol { width: 100%; max-width: 300px; }
  }
  @media (max-width: 780px) {
    .tCol:nth-child(3) { display: none; }
  }
  .tCard {
    background: rgba(255,255,255,0.04);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 16px;
    padding: 18px;
    color: #cbd5e1;
    font-size: 13.5px;
    line-height: 1.65;
    transition: border-color 0.3s, background 0.3s;
    position: relative;
    overflow: hidden;
  }
  .tCard::before {
    content: '"';
    position: absolute;
    top: 6px;
    right: 14px;
    font-size: 48px;
    line-height: 1;
    color: rgba(139,92,246,0.15);
    font-family: Georgia, serif;
    pointer-events: none;
  }
  .tCard:hover {
    border-color: rgba(139,92,246,0.3);
    background: rgba(255,255,255,0.07);
  }
  .tCardFooter {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 14px;
    padding-top: 12px;
    border-top: 1px solid rgba(255,255,255,0.06);
  }
  .tAvatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
    border: 1.5px solid rgba(139,92,246,0.3);
    flex-shrink: 0;
  }
  .tName {
    font-size: 13px;
    font-weight: 600;
    color: #e2e8f0;
    line-height: 1.3;
  }
  .tRole {
    font-size: 11.5px;
    color: #475569;
    line-height: 1.3;
  }
  .tTrack { display: flex; flex-direction: column; gap: 14px; }
</style>

<div class="tSection">
  <div class="tHeader">
    <span class="tBadge">Testimonials</span>
    <h2 class="tTitle">What our users say</h2>
    <p class="tSub">See what our customers have to say about us.</p>
  </div>
  <div class="tGrid" id="tGrid">
    <div class="tCol" id="col0"></div>
    <div class="tCol" id="col1"></div>
    <div class="tCol" id="col2"></div>
  </div>
</div>

<script>
const testimonials = [
  { text: "This ERP revolutionized our operations, streamlining finance and inventory. The cloud-based platform keeps us productive, even remotely.", image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=80&auto=format&fit=crop", name: "Briana Patton", role: "Operations Manager" },
  { text: "Implementing this ERP was smooth and quick. The customizable, user-friendly interface made team training effortless.", image: "https://images.unsplash.com/photo-1599566150163-29194dcaad36?q=80&w=80&auto=format&fit=crop", name: "Bilal Ahmed", role: "IT Manager" },
  { text: "The support team is exceptional, guiding us through setup and providing ongoing assistance, ensuring our satisfaction.", image: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=80&auto=format&fit=crop", name: "Saman Malik", role: "Customer Support Lead" },
  { text: "Seamless integration enhanced our business operations and efficiency. Highly recommend for its intuitive interface.", image: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=80&auto=format&fit=crop", name: "Omar Raza", role: "CEO" },
  { text: "Its robust features and quick support have transformed our workflow, making us significantly more efficient.", image: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=80&auto=format&fit=crop", name: "Zainab Hussain", role: "Project Manager" },
  { text: "The smooth implementation exceeded expectations. It streamlined processes, improving overall business performance.", image: "https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=80&auto=format&fit=crop", name: "Aliza Khan", role: "Business Analyst" },
  { text: "Our business functions improved with a user-friendly design and positive customer feedback across all regions.", image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=80&auto=format&fit=crop", name: "Farhan Siddiqui", role: "Marketing Director" },
  { text: "They delivered a solution that exceeded expectations, understanding our needs and enhancing our operations greatly.", image: "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=80&auto=format&fit=crop", name: "Sana Sheikh", role: "Sales Manager" },
  { text: "Using this ERP, our online presence and conversions significantly improved, boosting overall business performance.", image: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=80&auto=format&fit=crop", name: "Hassan Ali", role: "E-commerce Manager" },
];

function makeCard(t) {
  return `<div class="tCard">
    <p>${t.text}</p>
    <div class="tCardFooter">
      <img class="tAvatar" src="${t.image}" alt="${t.name}" loading="lazy" />
      <div>
        <div class="tName">${t.name}</div>
        <div class="tRole">${t.role}</div>
      </div>
    </div>
  </div>`;
}

const cols = [
  testimonials.slice(0, 3),
  testimonials.slice(3, 6),
  testimonials.slice(6, 9),
];

const speeds = [28, 36, 32];

cols.forEach((group, i) => {
  const col = document.getElementById('col' + i);
  const doubled = [...group, ...group];
  const track = document.createElement('div');
  track.className = 'tTrack';
  track.innerHTML = doubled.map(makeCard).join('');
  col.appendChild(track);

  const cardH = 170;
  const gap = 14;
  const totalH = group.length * (cardH + gap);
  let pos = 0;
  let last = null;

  function tick(ts) {
    if (last) {
      const dt = (ts - last) / 1000;
      pos += (totalH / speeds[i]) * dt;
      if (pos >= totalH) pos -= totalH;
      track.style.transform = `translateY(-${pos}px)`;
    }
    last = ts;
    requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
});
</script>
