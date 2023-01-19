<?php

namespace App;

/**
 * Cutom post types
 */
// add_action('init', function () {
//     register_extended_post_type(
//         'project',
//         array(
//             'show_in_feed' => true,
//             'show_in_rest' => true,
//             'archive' => [
//                 'nopaging' => true,
//             ],
//             'admin_cols' => array(
//                 'title' => array(
//                     'title' => 'Title',
//                     'link'  => true,
//                 ),
//                 'author' => array(
//                     'title' => 'Author',
//                     'width' => 100,
//                 ),
//                 'date' => array(
//                     'title' => 'Date',
//                     'width' => 100,
//                 ),
//             ),
//             'menu_icon' => 'dashicons-format-aside',
//         ),
//         array(
//             'singular' => 'Project',
//             'plural'   => 'Projects',
//             'slug'     => 'projects'
//         )
//     );
// });

/**
 * Rename Posts fields
 */
function update_post_label()
{
    global $menu;
    global $submenu;
    $submenu['edit.php'][5][0] =  __('Projects', 'martillo');
    $submenu['edit.php'][10][0] = __('Add project', 'martillo');
    $menu[5][0] = __('Projects', 'martillo');
    $menu[5][6] = 'dashicons-admin-page';
}
add_action('admin_menu', __NAMESPACE__ . '\\update_post_label');

function update_post_name()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = __('Projects', 'martillo');
    $labels->singular_name = __('Projects', 'martillo');
    $labels->add_new = __('Add Project', 'martillo');
    $labels->add_new_item = __('Add Project', 'martillo');
    $labels->edit_item = __('Edit Project', 'martillo');
    $labels->new_item = __('Project', 'martillo');
    $labels->view_item = __('View Project', 'martillo');
    $labels->search_items = __('Search Project', 'martillo');
    $labels->not_found = __('No Projects found', 'martillo');
    $labels->not_found_in_trash = __('No Projects found in Trash', 'martillo');
    $labels->all_items = __('All Projects', 'martillo');
    $labels->menu_name = __('Projects', 'martillo');
    $labels->name_admin_bar = __('Projects', 'martillo');
}
add_action('init', __NAMESPACE__ . '\\update_post_name');

/**
 * Cutom options pages
 */
add_action('acf/init', function () {

    // Add parent.
    $parent = acf_add_options_page(array(
        'page_title'  => __('Common', 'martillo'),
        'menu_title'  => __('Common', 'martillo'),
        'redirect'    => true,
        'position'    => '80',
        'icon_url'    => 'dashicons-editor-table',

    ));

    // Add sub page.
    acf_add_options_sub_page(array(
        'page_title'  => __('Contact', 'martillo'),
        'menu_title'  => __('Contact', 'martillo'),
        'parent_slug' => $parent['menu_slug'],
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Newsletters', 'martillo'),
        'menu_title'  => __('Newsletters', 'martillo'),
        'parent_slug' => $parent['menu_slug'],
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Page 404', 'martillo'),
        'menu_title'  => __('Page 404', 'martillo'),
        'parent_slug' => $parent['menu_slug'],
    ));
});