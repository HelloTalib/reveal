<?php
/**
 * reveal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package reveal
 */

if ( !defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

if ( !function_exists( 'reveal_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function reveal_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on reveal, use a find and replace
         * to change 'reveal' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'reveal', get_template_directory() . '/languages' );

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

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Primary', 'reveal' )
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script'
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'reveal_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => ''
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true
            )
        );

        register_nav_menu( 'top_menu', __( "Top Menu", 'reveal' ) );
    }
endif;
add_action( 'after_setup_theme', 'reveal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function reveal_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'reveal_content_width', 640 );
}
add_action( 'after_setup_theme', 'reveal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function reveal_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'reveal' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'reveal' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        )
    );
}
add_action( 'widgets_init', 'reveal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function reveal_scripts() {
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/vendor/bootstrap/css/bootstrap.min.css' ) );
    wp_enqueue_style( 'ionicons', get_theme_file_uri( 'assets/vendor/ionicons/css/ionicons.min.css' ) );
    wp_enqueue_style( 'animate', get_theme_file_uri( 'assets/vendor/animate.css/animate.min.css' ) );
    wp_enqueue_style( 'font-awesome', get_theme_file_uri( 'assets/vendor/font-awesome/css/font-awesome.min.css' ) );
    wp_enqueue_style( 'venobox', get_theme_file_uri( 'assets/vendor/venobox/venobox.min.css' ) );
    wp_enqueue_style( 'owl-carousel', get_theme_file_uri( 'assets/vendor/owl.carousel/assets/owl.carousel.min.css' ) );
    wp_enqueue_style( 'boxicons', get_theme_file_uri( 'assets/vendor/boxicons/css/boxicons.min.css' ) );
    wp_enqueue_style( 'theme-style', get_theme_file_uri( 'assets/css/style.css', null, time() ) );
    wp_enqueue_style( 'reveal-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'reveal-style', 'rtl', 'replace' );

    // js
    wp_enqueue_script( 'bootatrap-js', get_theme_file_uri( 'assets/vendor/bootstrap/js/bootstrap.min.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'bootatrap-bundle-js', get_theme_file_uri( 'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( 'assets/vendor/owl.carousel/owl.carousel.min.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'easing-js', get_theme_file_uri( 'assets/vendor/jquery.easing/jquery.easing.min.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'php-email-form-js', get_theme_file_uri( 'assets/vendor/php-email-form/validate.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'wow-js', get_theme_file_uri( 'assets/vendor/wow/wow.min.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'sticky-js', get_theme_file_uri( 'assets/vendor/jquery-sticky/jquery.sticky.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'superfish-js', get_theme_file_uri( 'assets/vendor/superfish/superfish.min.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'hoverIntent-js', get_theme_file_uri( 'assets/vendor/hoverIntent/hoverIntent.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'isotope-js', get_theme_file_uri( 'assets/vendor/isotope-layout/isotope.pkgd.min.js' ), ['jquery'], _S_VERSION, true );
    wp_enqueue_script( 'venobox-js', get_theme_file_uri( 'assets/vendor/venobox/venobox.min.js' ), ['jquery'], _S_VERSION, true );

    wp_enqueue_script( 'main-js', get_theme_file_uri( 'assets/js/main.js' ), ['jquery'], _S_VERSION, true );

    wp_enqueue_script( 'reveal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'reveal_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/tgm.php';
require_once get_template_directory() . '/inc/theme-options.php';
require_once get_template_directory() . '/inc/header-social-links.php';
require_once get_template_directory() . '/inc/custom-post.php';
require_once get_template_directory() . '/inc/custom_fields.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

function redux_value( $key, $default = '' ) {
    if ( class_exists( 'Redux' ) ) {
        return Redux::get_option( 'reveal_theme_options', $key, $default );
    } else {
        return $default;
    }
}

function register_header_social_links() {
    register_sidebar( array(
        'name'          => __( 'Header Social Links', 'theme_name' ),
        'id'            => 'header-social-links',
        'Description'   => __( 'header Social links', 'reveal' ),
        'before_widget' => ' <div class="social-links float-right">',
        'after_widget'  => '</div>'
    ) );
}
add_action( 'widgets_init', 'register_header_social_links' );

// google shortcode
function google_map_shortcode( $atts ) {
    ob_start();
    extract( shortcode_atts( [
        'location' => 'Dhaka',
        'width'    => '100%',
        'height'   => '500',
        'zoom'     => '14'

    ], $atts, 'google-masp' ) );
    echo sprintf( '<div><iframe width="%s" height="%s"src="https://maps.google.com/maps?q=%s&z=%s&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> </iframe></div>', $width, $height, $location, $zoom );
    return ob_get_clean();
}
add_shortcode( 'google-map', 'google_map_shortcode' );

function portfolio_tags( $post_id ) {
    $tags  = get_the_terms( $post_id, 'portfolio_tag' );
    $_tags = [];
    if ( is_array( $tags ) || is_object( $tags ) ) {
        foreach ( $tags as $tag ) {
            $_tags[$tag->term_id] = $tag->slug;
        }
        return implode( ' ', $_tags );
    }
}

add_filter( 'acf/settings/show_admin', '__return_false');