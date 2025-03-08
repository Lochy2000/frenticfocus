/**
 * FreneticFocus Theme JavaScript
 *
 * @package FreneticFocus
 */

(function($) {
    'use strict';

    /**
     * Handle scrolled header
     */
    function handleScrolledHeader() {
        const header = document.getElementById('header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
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
        handleScrolledHeader();

        // Add scroll event listener
        $(window).on('scroll', handleScrolledHeader);
    });

})(jQuery);