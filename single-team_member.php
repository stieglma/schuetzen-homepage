<?php
/**
 * The template for displaying single team member posts
 *
 * @package Edelweiss_Gaishofen
 */

get_header(); ?>

<div id="team-member" class="section" style="padding-top:40px;">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="row s-padding">
                <main id="main" class="col-md-8 col-md-offset-2">
                    <article id="team-member-<?php the_ID(); ?>" <?php post_class('team-member-single'); ?>>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="team-member-image text-center">
                                <?php the_post_thumbnail('large', array('class' => 'img-responsive', 'style' => 'max-width: 400px; height: auto; margin: 0 auto;')); ?>
                            </div>
                        <?php endif; ?>

                        <div class="team-member-content">
                            <div class="team-member-header text-center">
                                <h1 class="team-member-title"><?php the_title(); ?></h1>

                                <?php
                                $position = get_post_meta(get_the_ID(), '_edelweiss_team_position', true);
                                if ($position) :
                                ?>
                                    <h2 class="team-member-position"><?php echo esc_html($position); ?></h2>
                                <?php endif; ?>

                                <?php
                                // Display team categories
                                $terms = get_the_terms(get_the_ID(), 'team_category');
                                if ($terms && !is_wp_error($terms)) :
                                ?>
                                    <div class="team-member-categories">
                                        <?php foreach ($terms as $term) : ?>
                                            <span class="team-category-badge">
                                                <?php echo esc_html($term->name); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="team-member-description">
                                <?php the_content(); ?>

                                <?php
                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'edelweiss-gaishofen'),
                                    'after'  => '</div>',
                                ));
                                ?>
                            </div>

                            <?php
                            $results_link = get_post_meta(get_the_ID(), '_edelweiss_team_results_link', true);
                            if ($results_link) :
                            ?>
                                <div class="team-member-results text-center">
                                    <a href="<?php echo esc_url($results_link); ?>" class="main-btn" target="_blank">
                                        <?php echo edelweiss_get_icon('external-link'); ?>
                                        <?php _e('View Competition Results', 'edelweiss-gaishofen'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="team-member-navigation">
                                <?php
                                // Previous/Next team member navigation
                                $prev_post = get_previous_post(true, '', 'team_category');
                                $next_post = get_next_post(true, '', 'team_category');

                                if ($prev_post || $next_post) :
                                ?>
                                    <div class="row">
                                        <?php if ($prev_post) : ?>
                                            <div class="col-md-6 text-left">
                                                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="team-nav-link">
                                                    <span class="nav-direction"><?php _e('Previous Team Member', 'edelweiss-gaishofen'); ?></span>
                                                    <span class="nav-title"><?php echo get_the_title($prev_post->ID); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($next_post) : ?>
                                            <div class="col-md-6 text-right">
                                                <a href="<?php echo get_permalink($next_post->ID); ?>" class="team-nav-link">
                                                    <span class="nav-direction"><?php _e('Next Team Member', 'edelweiss-gaishofen'); ?></span>
                                                    <span class="nav-title"><?php echo get_the_title($next_post->ID); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="team-member-back text-center">
                                <a href="<?php echo esc_url(home_url('/#impressions')); ?>" class="white-btn">
                                    <?php _e('Back to Teams Overview', 'edelweiss-gaishofen'); ?>
                                </a>
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<style>
.team-member-single {
    background: #FFF;
    padding: 40px;
    box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}

.team-member-image {
    margin-bottom: 30px;
}

.team-member-header {
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #6195FF;
}

.team-member-title {
    color: #10161A;
    margin-bottom: 10px;
}

.team-member-position {
    color: #6195FF;
    font-size: 24px;
    margin-bottom: 20px;
}

.team-member-categories {
    margin-top: 15px;
}

.team-category-badge {
    display: inline-block;
    background: #6195FF;
    color: #FFF;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: bold;
    margin: 0 5px;
}

.team-member-description {
    margin-bottom: 30px;
    line-height: 1.8;
}

.team-member-results {
    margin-bottom: 40px;
}

.team-member-navigation {
    margin: 40px 0;
    padding: 20px 0;
    border-top: 1px solid #EEEEEE;
    border-bottom: 1px solid #EEEEEE;
}

.team-nav-link {
    display: block;
    text-decoration: none;
    color: #10161A;
    padding: 15px 0;
}

.team-nav-link:hover {
    color: #6195FF;
    text-decoration: none;
}

.nav-direction {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    color: #868F9B;
    margin-bottom: 5px;
}

.nav-title {
    display: block;
    font-weight: bold;
    font-size: 16px;
}

.team-member-back {
    margin-top: 30px;
}

@media (max-width: 767px) {
    .team-member-single {
        padding: 20px;
    }

    .team-member-position {
        font-size: 20px;
    }

    .team-nav-link {
        text-align: center !important;
        margin-bottom: 20px;
    }
}
</style>

<?php get_footer(); ?>