"use client";
import React, { useEffect, useRef } from "react";

interface Testimonial {
  text: string;
  image: string;
  name: string;
  role: string;
}

export const TestimonialsColumn = ({
  className,
  testimonials,
  duration = 10,
}: {
  className?: string;
  testimonials: Testimonial[];
  duration?: number;
}) => {
  const trackRef = useRef<HTMLDivElement>(null);
  const posRef = useRef(0);
  const lastRef = useRef<number | null>(null);
  const rafRef = useRef<number>(0);

  useEffect(() => {
    const track = trackRef.current;
    if (!track) return;

    const cardH = 200;
    const gap = 14;
    const totalH = testimonials.length * (cardH + gap);

    const tick = (ts: number) => {
      if (lastRef.current !== null) {
        const dt = (ts - lastRef.current) / 1000;
        posRef.current += (totalH / duration) * dt;
        if (posRef.current >= totalH) posRef.current -= totalH;
        track.style.transform = `translateY(-${posRef.current}px)`;
      }
      lastRef.current = ts;
      rafRef.current = requestAnimationFrame(tick);
    };

    rafRef.current = requestAnimationFrame(tick);
    return () => cancelAnimationFrame(rafRef.current);
  }, [testimonials, duration]);

  const doubled = [...testimonials, ...testimonials];

  return (
    <div className={className} style={{ overflow: "hidden" }}>
      <div
        ref={trackRef}
        style={{ display: "flex", flexDirection: "column", gap: "14px" }}
      >
        {doubled.map(({ text, image, name, role }, i) => (
          <div
            key={i}
            style={{
              background: "rgba(255,255,255,0.04)",
              backdropFilter: "blur(12px)",
              WebkitBackdropFilter: "blur(12px)",
              border: "1px solid rgba(255,255,255,0.08)",
              borderRadius: "16px",
              padding: "18px",
              color: "#cbd5e1",
              fontSize: "13.5px",
              lineHeight: "1.65",
              width: "220px",
              position: "relative",
              overflow: "hidden",
            }}
          >
            <span
              style={{
                position: "absolute",
                top: "6px",
                right: "14px",
                fontSize: "48px",
                lineHeight: 1,
                color: "rgba(139,92,246,0.15)",
                fontFamily: "Georgia, serif",
                pointerEvents: "none",
              }}
            >
              "
            </span>
            <p>{text}</p>
            <div
              style={{
                display: "flex",
                alignItems: "center",
                gap: "10px",
                marginTop: "14px",
                paddingTop: "12px",
                borderTop: "1px solid rgba(255,255,255,0.06)",
              }}
            >
              <img
                src={image}
                alt={name}
                width={36}
                height={36}
                style={{
                  borderRadius: "50%",
                  objectFit: "cover",
                  border: "1.5px solid rgba(139,92,246,0.3)",
                  flexShrink: 0,
                }}
              />
              <div>
                <div
                  style={{
                    fontSize: "13px",
                    fontWeight: 600,
                    color: "#e2e8f0",
                    lineHeight: 1.3,
                  }}
                >
                  {name}
                </div>
                <div
                  style={{
                    fontSize: "11.5px",
                    color: "#475569",
                    lineHeight: 1.3,
                  }}
                >
                  {role}
                  // Card div style — replace karo
<div
  key={i}
  style={{
    background: "rgba(255,255,255,0.06)",       // ✅ thoda zyada opacity
    backdropFilter: "blur(16px)",
    WebkitBackdropFilter: "blur(16px)",
    border: "1px solid rgba(255,255,255,0.14)",  // ✅ visible border
    borderRadius: "16px",
    padding: "20px",
    color: "#cbd5e1",
    fontSize: "13.5px",
    lineHeight: "1.65",
    width: "260px",                              // ✅ thodi wide cards
    position: "relative",
    overflow: "hidden",
    boxShadow: "0 4px 24px rgba(0,0,0,0.3), inset 0 1px 0 rgba(255,255,255,0.08)", // ✅ inner glow
  }}
>
                </div>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};