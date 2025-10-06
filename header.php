<?php
/**
 * The header for pages other than front page
 *
 * @package Edelweiss_Gaishofen
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <nav id="nav" class="navbar grey">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Schützenverein Edelweiß Gaishofen" class="logo">
                    </a>
                </div>
                <!-- responsive navigation for small devices-->
                <div class="nav-collapse">
                    <span></span>
                </div>
            </div>

            <?php
            // Display different menus based on user login status
            if (is_user_logged_in()) {
                wp_nav_menu(array(
                    'theme_location' => 'primary-logged-in',
                    'menu_class' => 'main-nav nav navbar-nav navbar-right',
                    'container' => false,
                    'fallback_cb' => 'edelweiss_fallback_menu',
                ));
            } else {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'main-nav nav navbar-nav navbar-right',
                    'container' => false,
                    'fallback_cb' => 'edelweiss_fallback_menu',
                ));
            }
            ?>
        </div>
    </nav>
</header>