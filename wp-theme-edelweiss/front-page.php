<?php
/**
 * The front page template for Edelweiss Gaishofen theme
 *
 * @package Edelweiss_Gaishofen
 */

get_header('front'); ?>

<!-- About Section -->
<div id="about" class="section md-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="title"><?php echo esc_html(get_theme_mod('edelweiss_about_title', __('About Us', 'edelweiss-gaishofen'))); ?></h2>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php
                $about_content = get_theme_mod('edelweiss_about_content', '');
                if (!empty($about_content)) {
                    echo wpautop($about_content);
                } else {
                    // Default content
                ?>
                    <p><?php _e('We, the Edelweißschützen Gaishofen have been around since 1963. We are a sports-oriented club that participates in many competitions and championships.', 'edelweiss-gaishofen'); ?></p>
                    <p><?php _e('But the social aspect is not neglected either. We recently organized a great winter festival in Gaishofen together with the volunteer fire brigade, which was attended by well over 100 guests.', 'edelweiss-gaishofen'); ?></p>
                    <p><?php _e('If you are interested in getting to know us, just stop by on one of our training days, or contact one of our contacts directly. We look forward to every guest!', 'edelweiss-gaishofen'); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div id="numbers" class="section sm-padding stats-section">
    <?php $stats_bg_image = get_theme_mod('edelweiss_stats_bg_image', get_template_directory_uri() . '/assets/img/bogen_sw.jpg'); ?>
    <div class="stats-bg-img" style="background-image: url('<?php echo esc_url($stats_bg_image); ?>');">
        <div class="stats-overlay"></div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            // Get statistics from customizer
            $stats = array(
                'active_shooters' => get_theme_mod('edelweiss_stat_active_shooters', '> 30'),
                'pistol_teams' => get_theme_mod('edelweiss_stat_pistol_teams', '4'),
                'rifle_teams' => get_theme_mod('edelweiss_stat_rifle_teams', '2'),
                'rifle_supported_teams' => get_theme_mod('edelweiss_stat_rifle_supported_teams', '2'),
                'youth_teams' => get_theme_mod('edelweiss_stat_youth_teams', '1'),
            );

            $stat_labels = array(
                'active_shooters' => __('Aktive Schützen', 'edelweiss-gaishofen'),
                'pistol_teams' => __('Pistolenmannschaften', 'edelweiss-gaishofen'),
                'rifle_teams' => __('Luftgewehrmannschaften', 'edelweiss-gaishofen'),
                'rifle_supported_teams' => __('Luftgewehrmannschaften aufgelegt', 'edelweiss-gaishofen'),
                'youth_teams' => __('Jugendmannschaft', 'edelweiss-gaishofen'),
            );

            $stat_icons = array(
                'active_shooters' => 'users',
                'pistol_teams' => 'crosshairs',
                'rifle_teams' => 'crosshairs',
                'rifle_supported_teams' => 'crosshairs',
                'youth_teams' => 'crosshairs',
            );

            $col_classes = array('col-5', 'col-sm-3 col-xs-6', 'col-sm-3 col-xs-6', 'col-sm-3 col-xs-6', 'col-sm-3 col-xs-6');
            $i = 0;

            foreach ($stats as $key => $value) :
                if (!empty($value)) :
            ?>
                <div class="<?php echo esc_attr($col_classes[$i]); ?>">
                    <div class="number">
                        <?php echo edelweiss_get_icon($stat_icons[$key]); ?>
                        <h3 class="white-text"><span class="counter"><?php echo esc_html($value); ?></span></h3>
                        <span class="white-text"><?php echo $stat_labels[$key]; ?></span>
                    </div>
                </div>
            <?php
                endif;
                $i++;
            endforeach;
            ?>
        </div>
    </div>
</div>

<!-- Training Section -->
<div id="training" class="section md-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="title"><?php echo esc_html(get_theme_mod('edelweiss_training_title', __('Training', 'edelweiss-gaishofen'))); ?></h2>
        </div>

        <?php
        // Check content source setting
        $content_source = get_theme_mod('edelweiss_training_content_source', 'customizer');

        if ($content_source === 'page') {
            // Use WordPress page content
            $training_page_id = get_theme_mod('edelweiss_training_page', 0);

            if ($training_page_id && get_post_status($training_page_id) === 'publish') {
                $training_page = get_post($training_page_id);
                if ($training_page) {
                    echo '<div class="training-page-content">';
                    echo apply_filters('the_content', $training_page->post_content);
                    echo '</div>';
                }
            } else {
                // Fallback if no page selected or page doesn't exist
                echo '<div class="training-page-error text-center">';
                echo '<p>' . __('No training page selected or page not found.', 'edelweiss-gaishofen') . '</p>';
                if (current_user_can('customize')) {
                    echo '<a href="' . admin_url('customize.php?autofocus[section]=edelweiss_training_section') . '" class="main-btn">';
                    echo __('Configure Training Section', 'edelweiss-gaishofen');
                    echo '</a>';
                }
                echo '</div>';
            }
        } else {
            // Use customizer settings (default)
        ?>
            <div class="row">
                <!-- Training Times -->
                <div class="col-md-12 col-sm-18 src">
                    <div class="text-container" id="textlike">
                        <?php echo edelweiss_get_icon('clock'); ?>
                        <h3><?php echo esc_html(get_theme_mod('edelweiss_training_times_title', __('Current Training Times', 'edelweiss-gaishofen'))); ?></h3>

                        <?php
                        // Build training times content
                        $location = get_theme_mod('edelweiss_training_location', '');
                        $has_times = false;

                        if (!empty($location)) {
                            echo '<p>' . sprintf(__('We shoot at %s at the following times:', 'edelweiss-gaishofen'), '<b>' . esc_html($location) . '</b>') . '</p>';
                        }

                        echo '<ul>';
                        for ($i = 1; $i <= 5; $i++) {
                            $day = get_theme_mod("edelweiss_training_day_{$i}", '');
                            $time = get_theme_mod("edelweiss_training_time_{$i}", '');

                            if (!empty($day) && !empty($time)) {
                                echo '<li><b>' . esc_html($day) . ':</b> ' . esc_html($time) . '</li>';
                                $has_times = true;
                            }
                        }

                        if (!$has_times) {
                            // Default fallback
                            echo '<li><b>' . __('Tuesday', 'edelweiss-gaishofen') . ':</b> ' . __('from 18:00', 'edelweiss-gaishofen') . '</li>';
                            echo '<li><b>' . __('Friday', 'edelweiss-gaishofen') . ':</b> ' . __('from 18:00 (Youth training!)', 'edelweiss-gaishofen') . '</li>';
                        }
                        echo '</ul>';

                        // Additional information
                        $additional_info = get_theme_mod('edelweiss_training_additional_info', '');
                        if (!empty($additional_info)) {
                            echo '<div class="training-additional-info">';
                            echo wpautop($additional_info);
                            echo '</div>';
                        } elseif (!$has_times) {
                            // Default additional info
                            echo '<p><b>' . __('Our home competitions also take place at the same location.', 'edelweiss-gaishofen') . '</b></p>';
                        }
                        ?>
                    </div>
                </div>

                <?php
                // Get training images from customizer
                for ($i = 1; $i <= 3; $i++) :
                    $image = get_theme_mod("edelweiss_training_image_{$i}");
                    $title = get_theme_mod("edelweiss_training_image_{$i}_title");
                    $description = get_theme_mod("edelweiss_training_image_{$i}_description");

                    if (!empty($image)) :
                ?>
                    <div class="col-md-4 col-sm-6 image-container">
                        <img class="image-process-same-size-thumb" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                        <div class="overlay"></div>
                        <div class="image-container-content">
                            <span><?php echo esc_html($title); ?></span>
                            <h3><?php echo esc_html($description); ?></h3>
                            <div class="image-container-link">
                                <a href="<?php echo esc_url($image); ?>" target="_blank" rel="noopener">
                                    <?php echo edelweiss_get_icon('external-link'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                    endif;
                endfor;
                ?>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Teams Section -->
<div id="impressions" class="section md-padding bg-grey">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="title"><?php echo esc_html(get_theme_mod('edelweiss_teams_title', __('People / Teams', 'edelweiss-gaishofen'))); ?></h2>
        </div>
        <div class="row">
            <?php
            // Get team members from custom post type
            $team_members = edelweiss_get_homepage_team_members();

            if ($team_members->have_posts()) :
                while ($team_members->have_posts()) : $team_members->the_post();
                    $position = get_post_meta(get_the_ID(), '_edelweiss_team_position', true);
                    $results_link = get_post_meta(get_the_ID(), '_edelweiss_team_results_link', true);
                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'edelweiss-same-size-thumb');

                    if (!$featured_image) {
                        $featured_image = get_template_directory_uri() . '/assets/img/placeholder-team.svg';
                    }
            ?>
                <div class="col-md-4 col-sm-6 team-member-card">
                    <div class="team-image-container">
                        <img class="image-process-same-size-thumb" src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    </div>
                    <div class="team-member-info">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php if ($position) : ?>
                            <p class="team-position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($results_link)) : ?>
                            <p class="team-results"><a href="<?php echo esc_url($results_link); ?>" class="team-results-link" target="_blank"><?php _e('Results', 'edelweiss-gaishofen'); ?></a></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback message if no team members are configured
            ?>
                <div class="col-md-12 text-center">
                    <p><?php _e('No team members configured yet. Create team member posts in the WordPress admin.', 'edelweiss-gaishofen'); ?></p>
                    <?php if (current_user_can('edit_posts')) : ?>
                        <a href="<?php echo admin_url('post-new.php?post_type=team_member'); ?>" class="main-btn">
                            <?php _e('Add Team Member', 'edelweiss-gaishofen'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div id="contact" class="section md-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="title"><?php echo esc_html(get_theme_mod('edelweiss_contact_title', __('Contact & Imprint', 'edelweiss-gaishofen'))); ?></h2>
        </div>

        <div class="row">
            <!-- Board Members -->
            <?php
            for ($i = 1; $i <= 3; $i++) :
                $title = get_theme_mod("edelweiss_contact_{$i}_title");
                $name = get_theme_mod("edelweiss_contact_{$i}_name");
                $contact = get_theme_mod("edelweiss_contact_{$i}_contact");
                $icon = get_theme_mod("edelweiss_contact_{$i}_icon", 'crown');

                if (!empty($title)) :
            ?>
                <div class="col-md-4 col-sm-6">
                    <div class="text-container">
                        <?php echo edelweiss_get_icon($icon); ?>
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($name); ?></p>
                        <p><?php echo edelweiss_get_icon('phone'); ?> <?php echo esc_html($contact); ?></p>
                    </div>
                </div>
            <?php
                endif;
            endfor;
            ?>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-9">
                <div class="text-container">
                    <?php echo edelweiss_get_icon('list-alt'); ?>
                    <h3><?php echo esc_html(get_theme_mod('edelweiss_imprint_title', __('Imprint', 'edelweiss-gaishofen'))); ?></h3>
                    <?php
                    $imprint_content = get_theme_mod('edelweiss_imprint_content', '');
                    if (!empty($imprint_content)) {
                        echo wpautop($imprint_content);
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6 col-sm-9">
                <div class="text-container">
                    <?php echo edelweiss_get_icon('list-alt'); ?>
                    <h3><?php echo esc_html(get_theme_mod('edelweiss_privacy_title', __('Privacy Policy', 'edelweiss-gaishofen'))); ?></h3>
                    <?php
                    $privacy_content = get_theme_mod('edelweiss_privacy_content', '');
                    if (!empty($privacy_content)) {
                        echo wpautop($privacy_content);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>