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

$(document).ready(function() {

    // const newDiv = $('<div class="col-12"></div>');

    // Wrap the content of .footer-iv with the new div
    // $('.footer-iv').wrapInner(newDiv);

    $(".right-button-scroll").on( "click", function(e) {
        e.preventDefault();
        $('#hidden-form').addClass('active');
    });

    $(".popup-modal").on( "click", function(e) {
        e.preventDefault();
        $('#hidden-form').addClass('active');
    });

    $(".enquire-button").on( "click", function(e) {
        e.preventDefault();
        $('#hidden-form').addClass('active');
    });

    $(".meeting-button").on( "click", function(e) {
        e.preventDefault();
        $('#hidden-form').addClass('active');
    });
});
