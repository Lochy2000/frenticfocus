<?php
/**
 * The template for displaying the front page
 *
 * @package FreneticFocus
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero section">
    <div class="container">
        <div class="hero-content">
            <h1><?php echo esc_html(get_theme_mod('hero_title', 'Comprehensive Management Services Tailored to Your Needs')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('hero_subtitle', 'Empowering businesses and individuals to enhance digital literacy and operational efficiency')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('hero_button_url', '/contact')); ?>" class="btn btn-light"><?php echo esc_html(get_theme_mod('hero_button_text', 'Book a Consultation')); ?></a>
        </div>
    </div>
    <a href="#about" class="scroll-down">
        <span>SCROLL DOWN</span>
        <div class="arrow"></div>
    </a>
</section>

<!-- About Section -->
<section id="about" class="about section">
    <div class="container">
        <h2><?php echo esc_html(get_theme_mod('about_title', 'About Lara van Rooyen')); ?></h2>
        <div class="about-content">
            <div class="about-text">
                <?php
                $about_content = get_theme_mod('about_content', '<p>Lara van Rooyen provides comprehensive and innovative workshops and focus to businesses and individuals seeking to enhance their digital literacy and operational efficiency. Based in Stockholm and Nice, she specializes in a variety of management services tailored to meet the diverse needs of clients.</p>
                <p>As a seasoned professional, Lara is committed to delivering excellence through a combination of expertise, experience, and cutting-edge strategies. She is proficient in both Swedish and English languages, allowing her to serve a diverse clientele.</p>
                <p>We founded Legora with the mission of changing how professionals work. Millions of professionals dedicate their lives to solving their clients\' and companies\' most pressing problems. It became our calling to help them achieve these missions faster, with even greater impact.</p>');
                echo wp_kses_post($about_content);
                ?>
                <a href="<?php echo esc_url(get_theme_mod('about_button_url', '/contact')); ?>" class="btn"><?php echo esc_html(get_theme_mod('about_button_text', 'Get in Touch')); ?></a>
            </div>
            <div class="about-image">
                <?php 
                $about_image = get_theme_mod('about_image', get_template_directory_uri() . '/assets/images/about-image.png');
                ?>
                <img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr(get_theme_mod('about_image_alt', 'Lara van Rooyen')); ?>">
            </div>
        </div>
    </div>
</section>

<!-- Services Preview Section -->
<section class="services-preview section">
    <div class="container">
        <h2><?php echo esc_html(get_theme_mod('services_title', 'Our Services')); ?></h2>
        <p><?php echo esc_html(get_theme_mod('services_subtitle', 'Specialized solutions designed to meet your unique business needs.')); ?></p>
        
        <div class="services-grid">
            <?php
            // Get services to display from customizer setting or default to 3
            $services_count = get_theme_mod('services_count', 3);
            
            // Query services
            $args = array(
                'post_type' => 'service',
                'posts_per_page' => $services_count,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            
            $services_query = new WP_Query($args);
            
            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post();
                    // Get service meta
                    $service_icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    $service_link = get_post_meta(get_the_ID(), '_service_link', true);
                    
                    if (empty($service_link)) {
                        $service_link = get_permalink();
                    }
            ?>
                <div class="service-card">
                    <div class="service-icon"><?php echo esc_html($service_icon); ?></div>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo get_the_excerpt(); ?></p>
                    <a href="<?php echo esc_url($service_link); ?>">Learn More →</a>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback if no services are created yet
            ?>
                <div class="service-card">
                    <div class="service-icon">⟳</div>
                    <h3>Change Management</h3>
                    <p>Helping organizations navigate the complexities of transformation and innovation with strategic guidance and hands-on support.</p>
                    <a href="' . esc_url(home_url('/services/')) . '">Services</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">📊</div>
                    <h3>Program Management</h3>
                    <p>Comprehensive program management services to oversee and coordinate multiple related projects aligned with organizational goals.</p>
                    <a href="services.html#program-management">Learn More →</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">🏢</div>
                    <h3>Real Estate Digital Literacy</h3>
                    <p>Enhancing digital literacy among real estate professionals through specialized training and resources.</p>
                    <a href="services.html#redili">Learn More →</a>
                </div>
            <?php endif; ?>
        </div>
        
        <div style="text-align: center; margin-top: 60px;">
            <a href="<?php echo esc_url(get_theme_mod('services_button_url', '/services')); ?>" class="btn"><?php echo esc_html(get_theme_mod('services_button_text', 'View All Services')); ?></a>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta section">
    <div class="container">
        <h2><?php echo esc_html(get_theme_mod('cta_title', 'Ready to Transform Your Business?')); ?></h2>
        <p><?php echo esc_html(get_theme_mod('cta_subtitle', 'Schedule a consultation today and discover how our comprehensive management services can help you achieve your goals.')); ?></p>
        <a href="<?php echo esc_url(get_theme_mod('cta_button_url', '/contact')); ?>" class="btn btn-light"><?php echo esc_html(get_theme_mod('cta_button_text', 'Book a Consultation')); ?></a>
    </div>
</section>



<?php get_footer(); ?>