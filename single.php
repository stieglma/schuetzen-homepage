<?php
/**
 * The template for displaying all single posts
 *
 * @package Edelweiss_Gaishofen
 */

get_header(); ?>

<div id="blog" class="section" style="padding-top:40px;">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="row s-padding">
                <main id="main" class="col-md-8 col-md-offset-2 blog-box">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>
                        <div class="blog-img">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                            <?php else : ?>
                                <?php $default_image = get_theme_mod('edelweiss_default_header_image', get_template_directory_uri() . '/assets/img/schuetzenverein.jpg'); ?>
                                <img class="img-responsive" src="<?php echo esc_url($default_image); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="blog-content">
                            <ul class="blog-meta">
                                <li><?php echo edelweiss_get_icon('user'); ?> <?php the_author(); ?></li>
                                <li><?php echo edelweiss_get_icon('clock'); ?> <?php echo get_the_date('j F Y'); ?></li>
                            </ul>
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>

                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'edelweiss-gaishofen'),
                                'after'  => '</div>',
                            ));
                            ?>
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

                    <?php
                    // Post navigation
                    the_post_navigation(array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'edelweiss-gaishofen') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'edelweiss-gaishofen') . '</span> <span class="nav-title">%title</span>',
                    ));
                    ?>

                    <?php
                    // Comments
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </main>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>