/**
 * FreneticFocus Header JavaScript
 * Controls the header's scroll behavior
 */

(function() {
    'use strict';
    
    // Function to update header styling on scroll
    function updateHeaderOnScroll() {
        const header = document.getElementById('header');
        const logo = document.querySelector('.custom-logo');
        
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
            if (logo) {
                logo.style.filter = 'none';
            }
        } else {
            header.classList.remove('scrolled');
            if (logo) {
                logo.style.filter = 'brightness(0) invert(1)';
            }
        }
    }
    
    // When the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Initial call
        updateHeaderOnScroll();
        
        // Add scroll event listener
        window.addEventListener('scroll', updateHeaderOnScroll);
    });
    
})();