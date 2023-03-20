<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Edit body classes.
 */
function custom_class($classes)
{
    if (is_front_page()) {
        $classes[] = 'martillo';
    }
    return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\custom_class');

/**
 * Disable Admin Top bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Admin cleanup
 */
function admin_menu_cleanup()
{
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', __NAMESPACE__ . '\\admin_menu_cleanup');

/**
 * Disable Post Categories and Tags
 */
add_action('init', function () {
    unregister_taxonomy_for_object_type('post_tag', 'post');
    // unregister_taxonomy_for_object_type('category', 'post');
});

/**
 * Google maps api key
 */
// define('GOOGLE_MAPS_API_KEY', 'AIzaSyBHS6Q2FoLbNtlkDa_A7qjkaVAJU1erXYw'); // haytormurillo

/**
 * ACF Maps
 */
function my_acf_init()
{
    acf_update_setting('google_api_key', GOOGLE_MAPS_API_KEY);
}
// add_action('acf/init', __NAMESPACE__ . '\\my_acf_init');

/**
 * ACF json files autosave
 */
add_filter('acf/settings/save_json', function () {
    return get_template_directory() . '/resources/acf-json';
});

/**
 * Disable JSON+LD Yoast SEO header
 */
add_filter('disable_wpseo_json_ld_search', '__return_true');

/**
 * Customize wp-login.php logo
 */
add_action('login_enqueue_scripts', function () {
?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/resources/images/admin-logo.svg);
            width: auto;
            height: 56px;
            background-size: auto 100%;
            background-repeat: no-repeat;
            padding-bottom: 0;
        }
    </style>
<?php
});

/**
 * Custom Admin footer text
 */
add_action('admin_init', function () {
    add_filter('admin_footer_text', function () {
        return 'Powered by <a href="https://martillo.studio" target="blank">martillo</a>';
    }, 11);
    add_filter('update_footer', '__return_false', 11);
});

/**
 * JPG quality filter
 */
add_filter('jpeg_quality', function ($arg) {
    return 100;
});

/**
 * Allow SVG Uploads
 */
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    global $wp_version;
    if ($wp_version == '4.7' || ((float) $wp_version < 4.7)) {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', __NAMESPACE__ . '\\cc_mime_types');

function fix_svg()
{
    echo '  <style type="text/css">
                .attachment-266x266, .thumbnail img {
                    width: 100% !important;
                    height: auto !important;
                }
            </style>';
}
add_action('admin_head', __NAMESPACE__ . '\\fix_svg');

/**
 * Custom WP Nav Menu classnames
 */
function add_current_nav_class($classes, $item)
{
    global $post;

    $id = (isset($post->ID) ? get_the_ID() : NULL);

    if (isset($id)) {
        $current_post_type = get_post_type_object(get_post_type($post->ID));
        $ancestor_slug = $current_post_type->rewrite ? $current_post_type->rewrite['slug'] : '';
        $ancestors = explode('/', $ancestor_slug);
        $parent = array_pop($ancestors);
        $menu_slug = strtolower(trim($item->url));
        $menu_slug = str_replace($_SERVER['SERVER_NAME'], "", $menu_slug);

        if (!empty($menu_slug) && !empty($parent) && strpos($menu_slug, $parent) !== false) {
            $classes[] = 'current-menu-item';
        }

        foreach ($ancestors as $ancestor) {
            if (!empty($menu_slug) && !empty($ancestor) && strpos($menu_slug, $ancestor) !== false) {
                $classes[] = 'current-page-ancestor';
            }
        }
    }
    return $classes;
}
add_action('nav_menu_css_class', __NAMESPACE__ . '\\add_current_nav_class', 10, 2);

/**
 * Custom menu admin position
 */
add_filter('custom_menu_order', '__return_true');
add_filter('menu_order', function () {
    return array('index.php', 'upload.php', 'separator1', 'edit.php?post_type=page', 'edit.php', 'edit.php?post_type=project', 'separator2', 'themes.php', 'plugins.php', 'users.php', 'tools.php',  'separator-last');
});
