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
    $submenu['edit.php'][5][0] = 'Projects';
    $submenu['edit.php'][10][0] = 'Add project';
    $menu[5][0] = 'Projects';
    $menu[5][6] = 'dashicons-format-aside';
}
add_action('admin_menu', __NAMESPACE__ . '\\update_post_label');

function update_post_name()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Projects';
    $labels->singular_name = 'Project';
    $labels->add_new = 'Add Project';
    $labels->add_new_item = 'Add Project';
    $labels->edit_item = 'Edit Project';
    $labels->new_item = 'Project';
    $labels->view_item = 'View Project';
    $labels->search_items = 'Search Project';
    $labels->not_found = 'No Projects found';
    $labels->not_found_in_trash = 'No Projects found in Trash';
    $labels->all_items = 'All Projects';
    $labels->menu_name = 'Projects';
    $labels->name_admin_bar = 'Projects';
}
add_action('init', __NAMESPACE__ . '\\update_post_name');

/**
 * Cutom options pages
 */
add_action('acf/init', function () {

    // Add parent.
    $parent = acf_add_options_page(array(
        'page_title'  => __('Thme Settings', 'martillo'),
        'menu_title'  => __('Thme Settings', 'martillo'),
        'redirect'    => true,
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