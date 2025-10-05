<?php
/**
 * Team Members Custom Post Type for Edelweiss Gaishofen theme
 *
 * @package Edelweiss_Gaishofen
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register Team Members Custom Post Type
 */
function edelweiss_register_team_members_post_type() {
    $labels = array(
        'name'                  => _x('Team Members', 'Post type general name', 'edelweiss-gaishofen'),
        'singular_name'         => _x('Team Member', 'Post type singular name', 'edelweiss-gaishofen'),
        'menu_name'             => _x('Team Members', 'Admin Menu text', 'edelweiss-gaishofen'),
        'name_admin_bar'        => _x('Team Member', 'Add New on Toolbar', 'edelweiss-gaishofen'),
        'add_new'               => __('Add New', 'edelweiss-gaishofen'),
        'add_new_item'          => __('Add New Team Member', 'edelweiss-gaishofen'),
        'new_item'              => __('New Team Member', 'edelweiss-gaishofen'),
        'edit_item'             => __('Edit Team Member', 'edelweiss-gaishofen'),
        'view_item'             => __('View Team Member', 'edelweiss-gaishofen'),
        'all_items'             => __('All Team Members', 'edelweiss-gaishofen'),
        'search_items'          => __('Search Team Members', 'edelweiss-gaishofen'),
        'parent_item_colon'     => __('Parent Team Members:', 'edelweiss-gaishofen'),
        'not_found'             => __('No team members found.', 'edelweiss-gaishofen'),
        'not_found_in_trash'    => __('No team members found in Trash.', 'edelweiss-gaishofen'),
        'featured_image'        => _x('Team Photo', 'Overrides the "Featured Image" phrase', 'edelweiss-gaishofen'),
        'set_featured_image'    => _x('Set team photo', 'Overrides the "Set featured image" phrase', 'edelweiss-gaishofen'),
        'remove_featured_image' => _x('Remove team photo', 'Overrides the "Remove featured image" phrase', 'edelweiss-gaishofen'),
        'use_featured_image'    => _x('Use as team photo', 'Overrides the "Use as featured image" phrase', 'edelweiss-gaishofen'),
        'archives'              => _x('Team Member archives', 'The post type archive label', 'edelweiss-gaishofen'),
        'insert_into_item'      => _x('Insert into team member', 'Overrides the "Insert into post" phrase', 'edelweiss-gaishofen'),
        'uploaded_to_this_item' => _x('Uploaded to this team member', 'Overrides the "Uploaded to this post" phrase', 'edelweiss-gaishofen'),
        'filter_items_list'     => _x('Filter team members list', 'Screen reader text for the filter links', 'edelweiss-gaishofen'),
        'items_list_navigation' => _x('Team members list navigation', 'Screen reader text for the pagination', 'edelweiss-gaishofen'),
        'items_list'            => _x('Team members list', 'Screen reader text for the items list', 'edelweiss-gaishofen'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team-member'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('team_member', $args);
}
add_action('init', 'edelweiss_register_team_members_post_type');

/**
 * Register Team Member Categories
 */
function edelweiss_register_team_member_taxonomy() {
    $labels = array(
        'name'              => _x('Team Categories', 'taxonomy general name', 'edelweiss-gaishofen'),
        'singular_name'     => _x('Team Category', 'taxonomy singular name', 'edelweiss-gaishofen'),
        'search_items'      => __('Search Team Categories', 'edelweiss-gaishofen'),
        'all_items'         => __('All Team Categories', 'edelweiss-gaishofen'),
        'parent_item'       => __('Parent Team Category', 'edelweiss-gaishofen'),
        'parent_item_colon' => __('Parent Team Category:', 'edelweiss-gaishofen'),
        'edit_item'         => __('Edit Team Category', 'edelweiss-gaishofen'),
        'update_item'       => __('Update Team Category', 'edelweiss-gaishofen'),
        'add_new_item'      => __('Add New Team Category', 'edelweiss-gaishofen'),
        'new_item_name'     => __('New Team Category Name', 'edelweiss-gaishofen'),
        'menu_name'         => __('Team Categories', 'edelweiss-gaishofen'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'team-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('team_category', array('team_member'), $args);
}
add_action('init', 'edelweiss_register_team_member_taxonomy');

/**
 * Add custom meta boxes for team members
 */
function edelweiss_add_team_member_meta_boxes() {
    add_meta_box(
        'edelweiss_team_member_details',
        __('Team Member Details', 'edelweiss-gaishofen'),
        'edelweiss_team_member_details_callback',
        'team_member',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'edelweiss_add_team_member_meta_boxes');

/**
 * Team member details meta box callback
 */
function edelweiss_team_member_details_callback($post) {
    wp_nonce_field('edelweiss_save_team_member_meta_box_data', 'edelweiss_team_member_meta_box_nonce');

    $position = get_post_meta($post->ID, '_edelweiss_team_position', true);
    $results_link = get_post_meta($post->ID, '_edelweiss_team_results_link', true);
    $display_order = get_post_meta($post->ID, '_edelweiss_team_display_order', true);
    $show_on_homepage = get_post_meta($post->ID, '_edelweiss_team_show_homepage', true);

    echo '<table class="form-table">';

    echo '<tr>';
    echo '<th scope="row"><label for="edelweiss_team_position">' . __('Position/Role', 'edelweiss-gaishofen') . '</label></th>';
    echo '<td><input type="text" id="edelweiss_team_position" name="edelweiss_team_position" value="' . esc_attr($position) . '" class="regular-text" />';
    echo '<p class="description">' . __('e.g., "1. Mannschaft Pistole", "Vorstandschaft", "Jugendmannschaft"', 'edelweiss-gaishofen') . '</p></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row"><label for="edelweiss_team_results_link">' . __('Results Link', 'edelweiss-gaishofen') . '</label></th>';
    echo '<td><input type="url" id="edelweiss_team_results_link" name="edelweiss_team_results_link" value="' . esc_attr($results_link) . '" class="regular-text" />';
    echo '<p class="description">' . __('Optional link to competition results or external page', 'edelweiss-gaishofen') . '</p></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row"><label for="edelweiss_team_display_order">' . __('Display Order', 'edelweiss-gaishofen') . '</label></th>';
    echo '<td><input type="number" id="edelweiss_team_display_order" name="edelweiss_team_display_order" value="' . esc_attr($display_order ? $display_order : 0) . '" class="small-text" min="0" />';
    echo '<p class="description">' . __('Lower numbers appear first on the homepage (0 = first)', 'edelweiss-gaishofen') . '</p></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row"><label for="edelweiss_team_show_homepage">' . __('Show on Homepage', 'edelweiss-gaishofen') . '</label></th>';
    echo '<td><input type="checkbox" id="edelweiss_team_show_homepage" name="edelweiss_team_show_homepage" value="1" ' . checked(1, $show_on_homepage, false) . ' />';
    echo '<p class="description">' . __('Check to display this team member in the homepage teams section', 'edelweiss-gaishofen') . '</p></td>';
    echo '</tr>';

    echo '</table>';
}

/**
 * Save team member meta box data
 */
function edelweiss_save_team_member_meta_box_data($post_id) {
    if (!isset($_POST['edelweiss_team_member_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['edelweiss_team_member_meta_box_nonce'], 'edelweiss_save_team_member_meta_box_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['post_type']) && 'team_member' == $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    if (isset($_POST['edelweiss_team_position'])) {
        update_post_meta($post_id, '_edelweiss_team_position', sanitize_text_field($_POST['edelweiss_team_position']));
    }

    if (isset($_POST['edelweiss_team_results_link'])) {
        update_post_meta($post_id, '_edelweiss_team_results_link', esc_url_raw($_POST['edelweiss_team_results_link']));
    }

    if (isset($_POST['edelweiss_team_display_order'])) {
        update_post_meta($post_id, '_edelweiss_team_display_order', intval($_POST['edelweiss_team_display_order']));
    }

    if (isset($_POST['edelweiss_team_show_homepage'])) {
        update_post_meta($post_id, '_edelweiss_team_show_homepage', 1);
    } else {
        delete_post_meta($post_id, '_edelweiss_team_show_homepage');
    }
}
add_action('save_post', 'edelweiss_save_team_member_meta_box_data');

/**
 * Get team members for homepage display
 */
function edelweiss_get_homepage_team_members() {
    $args = array(
        'post_type' => 'team_member',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_edelweiss_team_show_homepage',
                'value' => '1',
                'compare' => '='
            )
        ),
        'meta_key' => '_edelweiss_team_display_order',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    );

    return new WP_Query($args);
}

/**
 * Add default team categories on activation
 */
function edelweiss_create_default_team_categories() {
    if (!term_exists('Vorstandschaft', 'team_category')) {
        wp_insert_term('Vorstandschaft', 'team_category', array(
            'description' => __('Board members and leadership', 'edelweiss-gaishofen'),
        ));
    }

    if (!term_exists('Pistolenmannschaften', 'team_category')) {
        wp_insert_term('Pistolenmannschaften', 'team_category', array(
            'description' => __('Pistol shooting teams', 'edelweiss-gaishofen'),
        ));
    }

    if (!term_exists('Gewehrmannschaften', 'team_category')) {
        wp_insert_term('Gewehrmannschaften', 'team_category', array(
            'description' => __('Rifle shooting teams', 'edelweiss-gaishofen'),
        ));
    }

    if (!term_exists('Jugendmannschaften', 'team_category')) {
        wp_insert_term('Jugendmannschaften', 'team_category', array(
            'description' => __('Youth teams', 'edelweiss-gaishofen'),
        ));
    }
}
add_action('after_switch_theme', 'edelweiss_create_default_team_categories');

/**
 * Customize team member columns in admin
 */
function edelweiss_team_member_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['featured_image'] = __('Photo', 'edelweiss-gaishofen');
    $new_columns['title'] = $columns['title'];
    $new_columns['team_position'] = __('Position', 'edelweiss-gaishofen');
    $new_columns['team_category'] = __('Category', 'edelweiss-gaishofen');
    $new_columns['show_homepage'] = __('On Homepage', 'edelweiss-gaishofen');
    $new_columns['display_order'] = __('Order', 'edelweiss-gaishofen');
    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter('manage_team_member_posts_columns', 'edelweiss_team_member_columns');

/**
 * Populate custom columns in team member admin
 */
function edelweiss_team_member_custom_column($column, $post_id) {
    switch ($column) {
        case 'featured_image':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            } else {
                echo '<span class="dashicons dashicons-format-image" style="font-size: 50px; color: #ccc;"></span>';
            }
            break;

        case 'team_position':
            $position = get_post_meta($post_id, '_edelweiss_team_position', true);
            echo esc_html($position ? $position : '—');
            break;

        case 'team_category':
            $terms = get_the_terms($post_id, 'team_category');
            if ($terms && !is_wp_error($terms)) {
                $term_names = array();
                foreach ($terms as $term) {
                    $term_names[] = $term->name;
                }
                echo esc_html(implode(', ', $term_names));
            } else {
                echo '—';
            }
            break;

        case 'show_homepage':
            $show_homepage = get_post_meta($post_id, '_edelweiss_team_show_homepage', true);
            echo $show_homepage ? '<span class="dashicons dashicons-yes-alt" style="color: green;"></span>' : '<span class="dashicons dashicons-minus" style="color: #ccc;"></span>';
            break;

        case 'display_order':
            $order = get_post_meta($post_id, '_edelweiss_team_display_order', true);
            echo esc_html($order !== '' ? $order : '0');
            break;
    }
}
add_action('manage_team_member_posts_custom_column', 'edelweiss_team_member_custom_column', 10, 2);

/**
 * Make team member columns sortable
 */
function edelweiss_team_member_sortable_columns($columns) {
    $columns['team_position'] = 'team_position';
    $columns['display_order'] = 'display_order';
    $columns['show_homepage'] = 'show_homepage';

    return $columns;
}
add_filter('manage_edit-team_member_sortable_columns', 'edelweiss_team_member_sortable_columns');

/**
 * Handle sorting of custom columns
 */
function edelweiss_team_member_column_orderby($query) {
    if (!is_admin()) {
        return;
    }

    $orderby = $query->get('orderby');

    if ('team_position' == $orderby) {
        $query->set('meta_key', '_edelweiss_team_position');
        $query->set('orderby', 'meta_value');
    }

    if ('display_order' == $orderby) {
        $query->set('meta_key', '_edelweiss_team_display_order');
        $query->set('orderby', 'meta_value_num');
    }

    if ('show_homepage' == $orderby) {
        $query->set('meta_key', '_edelweiss_team_show_homepage');
        $query->set('orderby', 'meta_value');
    }
}
add_action('pre_get_posts', 'edelweiss_team_member_column_orderby');