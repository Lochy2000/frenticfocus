<?php
/**
 * The header for our theme
 *
 * @package FreneticFocus
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <!-- Header -->
    <header id="header">
        <div class="container header-container">
            <?php
            if (has_custom_logo()) {
                // Custom logo
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if ($logo) {
                    echo '<a href="' . esc_url(home_url('/')) . '" class="custom-logo-link" rel="home">';
                    echo '<img src="' . esc_url($logo[0]) . '" class="custom-logo" alt="' . get_bloginfo('name') . '">';
                    echo '</a>';
                }
            } else {
            ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"><?php bloginfo('name'); ?></a>
            <?php
            }
            ?>
            <nav>
                <?php
                if (has_nav_menu('primary')) {
                    // If a menu is assigned to the primary location, use it
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => '',
                        'fallback_cb'    => false,
                    ));
                } else {
                    // Fallback menu if no menu is assigned
                    echo '<ul id="primary-menu">';
                    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
                    
                    // Get services page URL dynamically
                    $services_page = get_page_by_path('services');
                    if ($services_page) {
                        echo '<li><a href="' . esc_url(get_permalink($services_page->ID)) . '">Services</a></li>';
                    } else {
                        echo '<li><a href="' . esc_url(home_url('/services/')) . '">Services</a></li>';
                    }
                    
                    // Get contact page URL dynamically
                    $contact_page = get_page_by_path('contact');
                    if ($contact_page) {
                        echo '<li><a href="' . esc_url(get_permalink($contact_page->ID)) . '">Contact</a></li>';
                    } else {
                        echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
                    }
                    
                    echo '</ul>';
                }
                ?>
            </nav>
        </div>
    </header>