<?php
/**
 * The header for front page with hero section
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

<header id="home">
    <?php
    $hero_bg_image = get_theme_mod('edelweiss_hero_bg_image', get_template_directory_uri() . '/assets/img/schuetzenverein_sw.jpg');
    ?>
    <div class="bg-img" style="background-image: url('<?php echo esc_url($hero_bg_image); ?>');">
        <div class="overlay"></div>
    </div>
    <nav id="nav" class="navbar nav-transparent">
        <div class="container">
            <!-- responsive navigation for small devices-->
            <div class="navbar-header">
                <div class="nav-collapse">
                    <span></span>
                </div>
            </div>
            <!-- normal navigation -->
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

    <div class="home-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <?php echo edelweiss_get_icon('logo-gaishofen'); ?>
                        <br />
                        <br />
                        <?php
                        $hero_button_1_text = get_theme_mod('edelweiss_hero_button_1_text', __('Who are we', 'edelweiss-gaishofen'));
                        $hero_button_1_link = get_theme_mod('edelweiss_hero_button_1_link', '#about');
                        $hero_button_2_text = get_theme_mod('edelweiss_hero_button_2_text', __('To Training', 'edelweiss-gaishofen'));
                        $hero_button_2_link = get_theme_mod('edelweiss_hero_button_2_link', '#training');

                        if (!empty($hero_button_1_text)) :
                        ?>
                            <a href="<?php echo esc_url($hero_button_1_link); ?>">
                                <button class="white-btn"><?php echo esc_html($hero_button_1_text); ?></button>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($hero_button_2_text)) : ?>
                            <a href="<?php echo esc_url($hero_button_2_link); ?>">
                                <button class="main-btn"><?php echo esc_html($hero_button_2_text); ?></button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>