<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Edelweiss_Gaishofen
 */

get_header(); ?>

<div id="error-404" class="section md-padding">
    <div class="container">
        <div class="row">
            <main id="main" class="col-md-8 col-md-offset-2">
                <div class="text-container text-center">
                    <h1 class="error-404-title">404</h1>
                    <h2><?php _e('Oops! That page can&rsquo;t be found.', 'edelweiss-gaishofen'); ?></h2>
                    <p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'edelweiss-gaishofen'); ?></p>

                    <div class="error-404-search">
                        <?php get_search_form(); ?>
                    </div>

                    <div class="error-404-navigation">
                        <h3><?php _e('Try looking in the monthly archives.', 'edelweiss-gaishofen'); ?></h3>
                        <?php
                        wp_get_archives(array(
                            'type'    => 'monthly',
                            'limit'   => 12,
                            'format'  => 'list',
                        ));
                        ?>

                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ));

                        if (!empty($recent_posts)) :
                        ?>
                            <h3><?php _e('Most Used Categories', 'edelweiss-gaishofen'); ?></h3>
                            <?php
                            wp_list_categories(array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            ));
                            ?>

                            <h3><?php _e('Recent Posts', 'edelweiss-gaishofen'); ?></h3>
                            <ul>
                                <?php foreach ($recent_posts as $recent) : ?>
                                    <li>
                                        <a href="<?php echo get_permalink($recent['ID']); ?>">
                                            <?php echo esc_html($recent['post_title']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="error-404-actions">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="main-btn">
                                <?php _e('Go to Homepage', 'edelweiss-gaishofen'); ?>
                            </a>
                            <?php $blog_page_id = get_option('page_for_posts'); ?>
                            <?php if ($blog_page_id) : ?>
                                <a href="<?php echo esc_url(get_permalink($blog_page_id)); ?>" class="white-btn">
                                    <?php _e('View Blog', 'edelweiss-gaishofen'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<style>
.error-404-title {
    font-size: 120px;
    margin-bottom: 20px;
    color: #6195FF;
}

.error-404-search {
    margin: 40px 0;
}

.error-404-navigation {
    text-align: left;
    margin-top: 40px;
}

.error-404-navigation ul {
    list-style: none;
    padding: 0;
}

.error-404-navigation ul li {
    margin-bottom: 10px;
}

.error-404-navigation ul li a {
    color: #6195FF;
    text-decoration: none;
}

.error-404-navigation ul li a:hover {
    color: #4A7FE6;
}

.error-404-actions {
    margin-top: 40px;
    text-align: center;
}

.error-404-actions .main-btn,
.error-404-actions .white-btn {
    margin: 10px;
}
</style>

<?php get_footer(); ?>