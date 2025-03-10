/**
 * FreneticFocus Services Page JavaScript
 */

(function($) {
    'use strict';

    /**
     * Handle scrolled header with transparent to white transition
     */
    function handleServiceHeaderScroll() {
        const header = document.getElementById('header');
        
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    /**
     * Handle active state for service navigation
     */
    function handleServiceNavHighlight() {
        const sections = document.querySelectorAll('.service-section');
        const navItems = document.querySelectorAll('.service-nav ul li a');
        
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (window.pageYOffset >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });
        
        navItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('href').substring(1) === current) {
                item.classList.add('active');
            }
        });
    }

    /**
     * Setup smooth scrolling for anchor links
     */
    function setupSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                    return false;
                }
            }
        });
    }

    /**
     * Initialize when document is ready
     */
    $(document).ready(function() {
        setupSmoothScroll();

        // Run on initial load
        handleServiceHeaderScroll();
        handleServiceNavHighlight();

        // Add scroll event listeners
        $(window).on('scroll', function() {
            handleServiceHeaderScroll();
            handleServiceNavHighlight();
        });
    });

})(jQuery);