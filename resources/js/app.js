import './bootstrap.js';
import Alpine from 'alpinejs';

import 'animate.css';

window.Alpine = Alpine;
Alpine.start();

jQuery('#why-portugal-homes-section-pm').addClass('animate-on-scroll');

const sections = document.querySelectorAll('.animate-on-scroll');
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', 'animate__fadeIn');
            observer.unobserve(entry.target);
        }
    });
});

sections.forEach(section => {
    observer.observe(section);
});
