<?php
/**
 * The template for displaying the footer
 *
 * @package FreneticFocus
 */

?>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <h3><?php bloginfo('name'); ?></h3>
                        <p>Comprehensive management services tailored to meet your unique business needs.</p>
                        <div class="social-links">
                            <?php if (get_theme_mod('linkedin_url')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('linkedin_url')); ?>" target="_blank">LinkedIn</a>
                            <?php endif; ?>
                            
                            <?php if (get_theme_mod('twitter_url')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" target="_blank">Twitter</a>
                            <?php endif; ?>
                            
                            <?php if (get_theme_mod('facebook_url')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank">Facebook</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="footer-col">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <h3>Quick Links</h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => false,
                            'menu_class'     => '',
                            'fallback_cb'    => false,
                        ));
                        ?>
                    <?php endif; ?>
                </div>
                
                <div class="footer-col">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <h3>Contact Us</h3>
                        <p><?php echo esc_html(get_theme_mod('footer_address', 'Stockholm and Nice')); ?></p>
                        <p>Email: <?php echo esc_html(get_theme_mod('contact_email', 'info@freneticfocus.com')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript to handle the transparent header
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

<?php wp_footer(); ?>

</body>
</html>