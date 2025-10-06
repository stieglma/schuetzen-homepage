<?php
/**
 * The main template file for Edelweiss Gaishofen theme
 *
 * @package Edelweiss_Gaishofen
 */

get_header(); ?>

<div id="blog" class="section" style="padding-top:40px;">
    <div class="container">
        <?php if (have_posts()) : ?>
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
                                <?php if (is_home() || is_archive()) : ?>
                                    <?php the_excerpt(); ?>
                                    <?php if (!get_post_meta(get_the_ID(), '_edelweiss_short_post', true)) : ?>
                                        <div class="blog-read-more" style="margin-top: 20px;">
                                            <a href="<?php the_permalink(); ?>" class="main-btn">
                                                <?php echo edelweiss_get_icon('external-link'); ?> Weiterlesen
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php the_content(); ?>
                                <?php endif; ?>
                            </div>

                            <?php if (has_tag()) : ?>
                                <div class="blog-tags">
                                    <h5>Tags:</h5>
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
                    </main>
                </div>
            <?php endwhile; ?>

            <?php
            // Pagination
            the_posts_pagination(array(
                'prev_text' => 'Vorherige',
                'next_text' => 'Nächste',
            ));
            ?>

        <?php else : ?>
            <div class="row s-padding">
                <main id="main" class="col-md-8 col-md-offset-2 blog-box">
                    <div class="blog">
                        <div class="blog-content">
                            <h3>Nichts gefunden</h3>
                            <p>Es scheint, wir können nicht finden, was Sie suchen. Vielleicht kann die Suche helfen.</p>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </main>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>