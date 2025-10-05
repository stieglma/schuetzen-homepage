<?php
/**
 * The template for displaying search form
 *
 * @package Edelweiss_Gaishofen
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Search for:', 'edelweiss-gaishofen'); ?></span>
        <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search...', 'edelweiss-gaishofen'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <?php echo edelweiss_get_icon('zoom'); ?>
        <span class="screen-reader-text"><?php _e('Search', 'edelweiss-gaishofen'); ?></span>
    </button>
</form>