<?php
/**
 * The template for displaying archive pages
 *
 * @package Edelweiss_Gaishofen
 */

get_header(); ?>

<div id="blog" class="section" style="padding-top:40px;">
    <div class="container">
        <div class="row s-padding">
            <main id="main" class="col-md-8 col-md-offset-2">
                <div class="archive-header">
                    <?php
                    the_archive_title('<h1 class="archive-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </div>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="blog-box">
                            <article id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>
                                <div class="blog-img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                                        </a>
                                    <?php else : ?>
                                        <?php $default_image = get_theme_mod('edelweiss_default_header_image', get_template_directory_uri() . '/assets/img/schuetzenverein.jpg'); ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="img-responsive" src="<?php echo esc_url($default_image); ?>" alt="<?php the_title_attribute(); ?>">
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="blog-content">
                                    <ul class="blog-meta">
                                        <li><?php echo edelweiss_get_icon('user'); ?> <?php the_author(); ?></li>
                                        <li><?php echo edelweiss_get_icon('clock'); ?> <?php echo get_the_date('j F Y'); ?></li>
                                        <li style="float:right">
                                            <a href="<?php the_permalink(); ?>">
                                                <button class="main-btn">
                                                    <?php echo edelweiss_get_icon('external-link'); ?> <?php _e('Read More', 'edelweiss-gaishofen'); ?>
                                                </button>
                                            </a>
                                        </li>
                                    </ul>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php the_excerpt(); ?>
                                </div>

                                <?php if (has_tag()) : ?>
                                    <div class="blog-tags">
                                        <h5><?php _e('Tags:', 'edelweiss-gaishofen'); ?></h5>
                                        <?php
                                        $tags = get_the_tags();
                                        if ($tags) :
                                            foreach ($tags as $tag) :
                                        ?>
                                            <a href="<?php echo get_tag_link($tag->term_id); ?>">
                                                <?php echo edelweiss_get_icon('tag'); ?> <?php echo esc_html($tag->name); ?>
                                            </a>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </article>
                        </div>
                    <?php endwhile; ?>

                    <?php
                    // Pagination
                    the_posts_pagination(array(
                        'prev_text' => __('Previous', 'edelweiss-gaishofen'),
                        'next_text' => __('Next', 'edelweiss-gaishofen'),
                    ));
                    ?>

                <?php else : ?>
                    <div class="blog-box">
                        <div class="blog">
                            <div class="blog-content">
                                <h3><?php _e('Nothing found', 'edelweiss-gaishofen'); ?></h3>
                                <p><?php _e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'edelweiss-gaishofen'); ?></p>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>