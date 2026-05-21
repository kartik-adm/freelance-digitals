<section
  style={{
    position: "relative",
    overflow: "hidden",
    padding: "3rem 2rem",
    background: "transparent",  // ✅ koi background nahi
  }}
>
  {/* Sirf glow blobs — page bg se mix ho jaayenge */}
  <div
    style={{
      position: "absolute",
      inset: 0,
      background:
        "radial-gradient(ellipse 55% 40% at 20% 50%, rgba(124,58,237,0.12) 0%, transparent 70%), " +
        "radial-gradient(ellipse 45% 35% at 80% 50%, rgba(0,229,255,0.08) 0%, transparent 70%)",
      pointerEvents: "none",
    }}
  />
  {/* ...baaki same */}
</section>