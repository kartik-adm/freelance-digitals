import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import { Testimonials } from '@/components/ui/demo';

const testimonialsContainer = document.getElementById('react-testimonials');
if (testimonialsContainer) {
    const root = createRoot(testimonialsContainer);
    root.render(<Testimonials />);
}
