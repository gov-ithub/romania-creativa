<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('5.6.4', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 5.6.4 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!file_exists($composer = __DIR__.'/vendor/autoload.php') && !class_exists('Roots\\Sage\\Container')) {
    $sage_error(
        __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
        __('Autoloader not found.', 'sage')
    );
}
require_once $composer;

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "src/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/templates
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage
 *
 * We do this so that the Template Hierarchy will look in themes/sage/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/templates
 */
if (is_customize_preview() && isset($_GET['theme'])) {
    $sage_error(__('Theme must be activated prior to using the customizer.', 'sage'));
}
add_filter('template', function ($stylesheet) {
    return dirname($stylesheet);
});
if (basename($stylesheet = get_option('template')) !== 'templates') {
    update_option('template', "{$stylesheet}/templates");
    wp_redirect($_SERVER['REQUEST_URI']);
    exit();
}


/**
 * Theme functions and filters
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package rocreativa
 * @since 0.1
 */

/**
 * This theme only works in WordPress 4.6 or later.
 *
 * @since 0.1
 */

if ( version_compare( $GLOBALS['wp_version'], '4.6-alpha', '<' ) ) {
    require get_template_directory() . '/include/back-compat.php';
}

/**
 * Sets up theme defaults.
 *
 * Create your own rocreativa_setup() function to override in a child theme.
 *
 * @since 0.1
 */

add_action( 'after_setup_theme', 'rocreativa_setup' );

if ( !function_exists( 'rocreativa_setup' ) ) :
function rocreativa_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/rocreativa
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change 'rocreativa' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'rocreativa' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'rocreativa-featured-image', 2000, 1200, true );
    add_image_size( 'rocreativa-thumbnail-avatar', 100, 100, true );
    add_image_size( 'rocreativa-thumbnail-contact', 80, 80, true );
    add_image_size( 'rocreativa-event-featured', 206, 307, true );
    add_image_size( 'rocreativa-case-study-featured', 380, 245, true );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'top'    => __( 'Top Menu', 'rocreativa' ),
        'footer' => __( 'Footer Links Menu', 'rocreativa' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Add theme support for visual editor style
    add_editor_style( array( 'assets/css/editor-style.css' ) );

}
endif;


/**
 * Registers the widget areas.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since 0.1
 */

add_action( 'widgets_init', 'rocreativa_widgets_init' );

if ( !function_exists( 'rocreativa_widgets_init' ) ) :
function rocreativa_widgets_init() {
    
    register_sidebar( array(
        'id'                => 'sidebar-1',
        'name'              => __( 'Sidebar', 'rocreativa' ),
        'description'       => __( 'Add widgets here to appear in your sidebar.', 'rocreativa' ),
        'before_widget'     => '<section class="widget %2$s %1$s">',
        'after_widget'      => '</section>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ) );

    register_sidebar( array(
        'id'                => 'sidebar-2',
        'name'              => __( 'Footer widgets', 'rocreativa' ),
        'description'       => __( 'Widgets from here will appear in your footer.', 'rocreativa' ),
        'before_widget'     => '<section class="widget %2$s %1$s">',
        'after_widget'      => '</section>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ) );
    
}
endif; // rocreativa_register_widget_areas

/**
 * Enqueues scripts and styles.
 *
 * @since 0.1
 */

add_action( 'wp_enqueue_scripts', 'rocreativa_enqueue_styles' );

if ( !function_exists( 'rocreativa_enqueue_styles' ) ) :
function rocreativa_enqueue_styles() {
    
    // Enqueue the theme stylesheets
    wp_enqueue_style( 'rocreativa-style', get_stylesheet_uri() );
    
    // Enqueue the theme scripts
    wp_enqueue_script( 'rocreativa-global', get_template_directory_uri() . '/assets/scripts/global.js', array( 'jquery' ), false, true );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

}
endif; // rocreativa_enqueue_styles

/**
 * Loads theme template tags
 */
require_once get_template_directory() . '/includes/template-tags.php';

/**
 * Loads theme template functions
 */
require_once get_template_directory() . '/includes/template-functions.php';

/**
 * Loads theme plugin-territory functions
 */
require_once get_template_directory() . '/includes/rocreativa-plugin/rocreativa-plugin.php';

/**
 * Loads class for required plugins
 */
require_once get_template_directory() . '/includes/rocreativa-plugin/required-plugins.php';

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 * Action template_redirect so we can check against current template.
 *
 * @global int $content_width
 */

add_action( 'template_redirect', 'rocreativa_content_width', 0 );

function rocreativa_content_width() {

    $content_width = 992;

    if ( rocreativa_has_sidebar() ) {
        $content_width = 660;
    }

    /**
     * Filter Twenty Seventeen content width of the theme.
     *
     * @since Twenty Seventeen 1.0
     *
     * @param $content_width integer
     */
    $GLOBALS['content_width'] = apply_filters( 'rocreativa_content_width', $content_width );
}


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */

add_action( 'wp_head', 'rocreativa_javascript_detection', 0 );

function rocreativa_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}


/**
 * Filter the archive title.
 */

add_filter( 'get_the_archive_title', 'rocreativa_get_the_archive_title' );

function rocreativa_get_the_archive_title( $title ) {

    if ( is_category() )
        $title = single_cat_title( '', false );
    
    return $title;
    
}


/**
 * Sets up the actions and filters used by this theme.
 *
 * @since 0.1
 */

add_filter( 'get_the_archive_description', 'wpautop' );

/**
 * Provide a custom hook at the end of this file.
 *
 * If you want to remove or modify filters or theme support added so far,
 * hook them to the 'rocreativa_after_functions' called next.
 *
 * @since 0.1
 */

do_action( 'rocreativa_after_functions' );
