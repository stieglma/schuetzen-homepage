<?php
/**
 * The template for displaying team category taxonomy pages
 *
 * @package Edelweiss_Gaishofen
 */

get_header(); ?>

<div id="team-category-archive" class="section" style="padding-top:40px;">
    <div class="container">
        <div class="row s-padding">
            <main id="main" class="col-md-12">
                <div class="archive-header text-center">
                    <?php
                    $term = get_queried_object();
                    ?>
                    <h1 class="archive-title"><?php echo esc_html($term->name); ?></h1>

                    <?php if ($term->description) : ?>
                        <p class="archive-description"><?php echo esc_html($term->description); ?></p>
                    <?php endif; ?>

                    <div class="category-info">
                        <span class="team-count">
                            <?php
                            printf(
                                _n('%s team member', '%s team members', $term->count, 'edelweiss-gaishofen'),
                                $term->count
                            );
                            ?>
                        </span>
                    </div>
                </div>

                <?php
                // Get all team categories for navigation
                $all_categories = get_terms(array(
                    'taxonomy' => 'team_category',
                    'hide_empty' => true,
                ));

                if ($all_categories && !is_wp_error($all_categories) && count($all_categories) > 1) :
                ?>
                    <div class="category-navigation text-center">
                        <h3><?php _e('Other Categories', 'edelweiss-gaishofen'); ?></h3>
                        <div class="category-links">
                            <a href="<?php echo get_post_type_archive_link('team_member'); ?>" class="category-btn">
                                <?php _e('All Teams', 'edelweiss-gaishofen'); ?>
                            </a>
                            <?php foreach ($all_categories as $category) : ?>
                                <?php if ($category->term_id !== $term->term_id) : ?>
                                    <a href="<?php echo get_term_link($category); ?>" class="category-btn">
                                        <?php echo esc_html($category->name); ?>
                                        <span class="count">(<?php echo $category->count; ?>)</span>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (have_posts()) : ?>
                    <div class="team-members-grid">
                        <div class="row">
                            <?php while (have_posts()) : the_post(); ?>
                                <?php
                                $position = get_post_meta(get_the_ID(), '_edelweiss_team_position', true);
                                $results_link = get_post_meta(get_the_ID(), '_edelweiss_team_results_link', true);
                                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'edelweiss-same-size-thumb');

                                if (!$featured_image) {
                                    $featured_image = get_template_directory_uri() . '/assets/img/placeholder-team.svg';
                                }
                                ?>
                                <div class="col-md-4 col-sm-6 team-member-card">
                                    <article id="team-member-<?php the_ID(); ?>" <?php post_class('team-member-item'); ?>>
                                        <div class="image-container">
                                            <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="team-member-photo">
                                            <div class="overlay"></div>
                                            <div class="image-container-content">
                                                <?php if ($position) : ?>
                                                    <span><?php echo esc_html($position); ?></span>
                                                <?php endif; ?>
                                                <h3><?php the_title(); ?></h3>
                                                <?php if (has_excerpt()) : ?>
                                                    <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 15)); ?></p>
                                                <?php endif; ?>
                                                <div class="team-member-links">
                                                    <a href="<?php the_permalink(); ?>" class="team-link">
                                                        <?php echo edelweiss_get_icon('user'); ?>
                                                    </a>
                                                    <?php if ($results_link) : ?>
                                                        <a href="<?php echo esc_url($results_link); ?>" class="results-link" target="_blank">
                                                            <?php echo edelweiss_get_icon('external-link'); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="team-member-info">
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <?php if ($position) : ?>
                                                <p class="team-position"><?php echo esc_html($position); ?></p>
                                            <?php endif; ?>

                                            <?php if (has_excerpt()) : ?>
                                                <p class="team-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                                            <?php endif; ?>

                                            <div class="team-actions">
                                                <a href="<?php the_permalink(); ?>" class="read-more">
                                                    <?php _e('Learn More', 'edelweiss-gaishofen'); ?>
                                                </a>
                                                <?php if ($results_link) : ?>
                                                    <a href="<?php echo esc_url($results_link); ?>" class="results-link" target="_blank">
                                                        <?php _e('Results', 'edelweiss-gaishofen'); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <?php
                    // Pagination
                    the_posts_pagination(array(
                        'prev_text' => __('Previous', 'edelweiss-gaishofen'),
                        'next_text' => __('Next', 'edelweiss-gaishofen'),
                    ));
                    ?>

                <?php else : ?>
                    <div class="no-team-members text-center">
                        <h3><?php _e('No team members found in this category', 'edelweiss-gaishofen'); ?></h3>
                        <p><?php _e('There are currently no team members in this category.', 'edelweiss-gaishofen'); ?></p>
                        <?php if (current_user_can('edit_posts')) : ?>
                            <a href="<?php echo admin_url('post-new.php?post_type=team_member'); ?>" class="main-btn">
                                <?php _e('Add Team Member', 'edelweiss-gaishofen'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="navigation-links text-center">
                    <a href="<?php echo get_post_type_archive_link('team_member'); ?>" class="white-btn">
                        <?php _e('View All Teams', 'edelweiss-gaishofen'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/#impressions')); ?>" class="white-btn">
                        <?php _e('Back to Homepage', 'edelweiss-gaishofen'); ?>
                    </a>
                </div>
            </main>
        </div>
    </div>
</div>

<style>
.archive-header {
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 2px solid #6195FF;
}

.category-info {
    margin-top: 15px;
}

.team-count {
    display: inline-block;
    background: #6195FF;
    color: #FFF;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
}

.category-navigation {
    margin-bottom: 40px;
    padding: 30px;
    background: #FAFBFC;
    border-radius: 10px;
}

.category-links {
    margin-top: 20px;
}

.category-btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    background: #FFF;
    color: #868F9B;
    text-decoration: none;
    border-radius: 25px;
    font-weight: bold;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.category-btn:hover {
    background: #6195FF;
    color: #FFF;
    text-decoration: none;
    transform: translateY(-2px);
}

.category-btn .count {
    font-size: 12px;
    opacity: 0.8;
}

.team-members-grid {
    margin-bottom: 40px;
}

.team-member-card {
    margin-bottom: 30px;
}

.team-member-item {
    background: #FFF;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.team-member-item:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.15);
}

.team-member-photo {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.team-member-links a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: #FFF;
    border-radius: 50%;
    color: #6195FF;
    margin: 0 5px;
    transition: all 0.3s ease;
}

.team-member-links a:hover {
    background: #6195FF;
    color: #FFF;
}

.team-member-info {
    padding: 20px;
}

.team-member-info h4 {
    margin-bottom: 10px;
}

.team-member-info h4 a {
    color: #10161A;
    text-decoration: none;
}

.team-member-info h4 a:hover {
    color: #6195FF;
}

.team-position {
    color: #6195FF;
    font-weight: bold;
    margin-bottom: 15px;
}

.team-excerpt {
    color: #868F9B;
    margin-bottom: 15px;
    line-height: 1.6;
}

.team-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.read-more,
.results-link {
    font-size: 14px;
    font-weight: bold;
    color: #6195FF;
    text-decoration: none;
}

.read-more:hover,
.results-link:hover {
    color: #4A7FE6;
    text-decoration: none;
}

.no-team-members {
    padding: 60px 0;
}

.navigation-links {
    margin-top: 40px;
    padding-top: 40px;
    border-top: 1px solid #EEEEEE;
}

.navigation-links .white-btn {
    margin: 0 10px;
}

@media (max-width: 767px) {
    .team-member-card {
        margin-bottom: 20px;
    }

    .category-btn {
        display: block;
        margin: 5px auto;
        width: 200px;
    }

    .team-actions {
        flex-direction: column;
        align-items: flex-start;
    }

    .results-link {
        margin-top: 10px;
    }

    .navigation-links .white-btn {
        display: block;
        margin: 10px auto;
        width: 200px;
    }
}
</style>

<?php get_footer(); ?>