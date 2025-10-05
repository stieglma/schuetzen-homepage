<?php
/**
 * The template for displaying all pages
 *
 * @package Edelweiss_Gaishofen
 */

get_header(); ?>

<div id="content" class="section" style="padding-top:40px;">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="row s-padding">
                <main id="main" class="col-md-8 col-md-offset-2">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="page-header-image">
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                            </div>
                        <?php endif; ?>

                        <div class="page-content">
                            <h1 class="page-title"><?php the_title(); ?></h1>
                            <?php the_content(); ?>

                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'edelweiss-gaishofen'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                    </article>

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