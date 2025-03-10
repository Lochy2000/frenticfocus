<?php
/**
 * Template Name: Contact Page
 *
 * @package FreneticFocus
 */

get_header();
?>

<!-- Contact Hero Section -->
<section class="contact-hero section">
    <div class="container">
        <div class="contact-hero-content">
            <h1><?php echo esc_html(get_theme_mod('contact_page_title', 'Get in Touch')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('contact_page_subtitle', 'Have a question or want to work together? Reach out to us today.')); ?></p>
        </div>
    </div>
    <a href="#contact-form" class="scroll-down">
        <span>SCROLL DOWN</span>
        <div class="arrow"></div>
    </a>
</section>

<!-- Contact Form Section -->
<section id="contact-form" class="contact-form-section">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h2><?php echo esc_html(get_theme_mod('contact_info_title', 'Contact Information')); ?></h2>
                <p><?php echo esc_html(get_theme_mod('contact_info_description', 'We\'d love to hear from you. Fill out the form or reach out through any of the channels below.')); ?></p>
                
                <div class="contact-details">
                    <div class="contact-detail">
                        <h3>Address</h3>
                        <p><?php echo esc_html(get_theme_mod('footer_address', 'Stockholm and Nice')); ?></p>
                    </div>
                    
                    <div class="contact-detail">
                        <h3>Email</h3>
                        <p><?php echo esc_html(get_theme_mod('contact_email', 'info@freneticfocus.com')); ?></p>
                    </div>
                    
                    <div class="contact-detail">
                        <h3>Connect</h3>
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
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <h2>Send a Message</h2>
                <?php 
                // Check if Contact Form 7 is active
                if (shortcode_exists('contact-form-7')) {
                    $contact_form_id = get_theme_mod('contact_form_id');
                    if ($contact_form_id) {
                        echo do_shortcode('[contact-form-7 id="' . esc_attr($contact_form_id) . '"]');
                    } else {
                        echo '<p>Please set a Contact Form 7 ID in the Customizer under the Contact Page settings.</p>';
                    }
                } else {
                    // Basic form fallback if Contact Form 7 is not installed
                    ?>
                    <form action="#" method="post" class="basic-contact-form">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn">Send Message</button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>