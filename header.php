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

    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            line-height: 1.8;
            color: #333;
            background-color: #f8f8f5;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Lora', serif;
            font-weight: 600;
            line-height: 1.3;
        }
        
        h1 {
            font-size: 64px;
            margin-bottom: 30px;
        }
        
        h2 {
            font-size: 48px;
            margin-bottom: 25px;
        }
        
        h3 {
            font-size: 32px;
            margin-bottom: 20px;
        }
        
        p {
            margin-bottom: 25px;
            font-size: 18px;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5%;
            width: 100%;
        }
        
        .btn {
            display: inline-block;
            background-color: #333;
            color: white;
            padding: 16px 36px;
            text-decoration: none;
            font-size: 18px;
            letter-spacing: 1px;
            border-radius: 0;
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            background-color: #555;
            transform: translateY(-3px);
        }
        
        .section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 80px 0;
            position: relative;
        }
        
        /* Header Styles */
        header {
            position: fixed;
            width: 100%;
            z-index: 1000;
            padding: 30px 0;
            transition: background-color 0.4s ease, padding 0.4s ease;
        }
        
        header.scrolled {
            background-color: #fff;
            padding: 15px 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-family: 'Lora', serif;
            font-size: 28px;
            font-weight: 600;
            color: #333;
            text-decoration: none;
            letter-spacing: 1px;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 40px;
        }
        
        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: color 0.3s;
            position: relative;
        }
        
        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #333;
            transition: width 0.3s;
        }
        
        nav ul li a:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo get_theme_mod('hero_background_image', get_template_directory_uri() . '/assets/images/hero-image-2.png'); ?>');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            padding: 0;
            color: white;
        }
        
        .hero-content {
            max-width: 800px;
        }
        
        .hero p {
            font-size: 24px;
            margin-bottom: 40px;
        }
        
        .btn-light {
            background-color: white;
            color: #333;
        }
        
        .btn-light:hover {
            background-color: #f0f0f0;
        }
        
        /* Scroll Down Indicator */
        .scroll-down {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
            text-decoration: none;
            font-size: 14px;
            letter-spacing: 1px;
        }
        
        .scroll-down span {
            margin-bottom: 10px;
        }
        
        .scroll-down .arrow {
            width: 30px;
            height: 30px;
            border-right: 2px solid white;
            border-bottom: 2px solid white;
            transform: rotate(45deg);
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0) rotate(45deg);
            }
            40% {
                transform: translateY(-15px) rotate(45deg);
            }
            60% {
                transform: translateY(-7px) rotate(45deg);
            }
        }
        
        /* Media Queries */
        @media (max-width: 992px) {
            h1 {
                font-size: 48px;
            }
            
            h2 {
                font-size: 36px;
            }
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 36px;
            }
            
            p {
                font-size: 16px;
            }
            
            .header-container {
                flex-direction: column;
            }
            
            nav {
                margin-top: 20px;
            }
            
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0 15px;
                margin-bottom: 10px;
            }
            
            .section {
                padding: 60px 0;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <!-- Header -->
    <header id="header">
        <div class="container header-container">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
            ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"><?php bloginfo('name'); ?></a>
            <?php
            }
            ?>
            <nav>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>
        </div>
    </header>