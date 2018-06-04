<?php
/**
 * Wordsmith functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wordsmith
 */

if ( ! function_exists( 'feistner_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function feistner_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Wordsmith, use a find and replace
	 * to change 'feistner' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'feistner', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'feistner' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'feistner_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'feistner_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function feistner_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'feistner_content_width', 640 );
}
add_action( 'after_setup_theme', 'feistner_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function feistner_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'feistner' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'feistner' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s content-wrap">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
			'name'          => __( 'Right Widget', 'feistner' ),
			'id'            => 'sidebar-2',
			'description'   => __('Appears as the right widget', 'feistner'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
}
add_action( 'widgets_init', 'feistner_widgets_init' );

/**
 * Filter the stylesheet_uri to putput the minified CSS file.
 */
function feistner_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}
	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'feistner_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function feistner_scripts() {

	wp_enqueue_style( 'feistner-style', get_stylesheet_uri() );
	wp_enqueue_style( 'feistner-body-font', 'https://fonts.googleapis.com/css?family=Raleway:300,400,400i,700' );
	wp_enqueue_style( 'feistner-headline-font', 'https://fonts.googleapis.com/css?family=Arvo:400,700' );

	wp_enqueue_style( 'font-awesome-cdn' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), '4.4.0');

	wp_enqueue_script( 'feistner-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'feistner-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'feistner_scripts' );

/**
* Implement infinite scroll
*/

function be_load_more_js() {
	global $wp_query;
	if( !is_home() && is_singular() )
		return;

	$args = array(
		'nonce' => wp_create_nonce( 'be-load-more-nonce' ),
		'url'   => admin_url( 'admin-ajax.php' ),
		'query' => $wp_query->query,
	);

	wp_enqueue_script( 'be-load-more', get_template_directory_uri() . '/js/load-more.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'be-load-more', 'beloadmore', $args );

}
add_action( 'wp_enqueue_scripts', 'be_load_more_js' );

/**
 * AJAX Load More
 *
 */
function be_ajax_load_more() {
	check_ajax_referer( 'be-load-more-nonce', 'nonce' );

	$args = isset( $_POST['query'] ) ? $_POST['query'] : array();
	$args['post_type'] = isset( $args['post_type'] ) ? $args['post_type'] : 'post';
	$args['paged'] = $_POST['page'];
	$args['post_status'] = 'publish';
	ob_start();
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();

			echo '<section class="posts post-section">
							<div class="content-wrap general-info">
								<article>
									<div class="post-content">';
			echo '<h2 class="entry-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
			echo '<div class="entry-meta"> Posted on <a href="' . get_permalink() . '">' . get_the_time('F j, Y') . '</a> by ' . get_the_author_posts_link() .	'</div>';
			echo the_excerpt();
			echo '</div>
				</article>
				</div>
			</section>';

	endwhile; endif; wp_reset_postdata();
	$data = ob_get_clean();
	wp_send_json_success( $data );
}
add_action( 'wp_ajax_be_ajax_load_more', 'be_ajax_load_more' );
add_action( 'wp_ajax_nopriv_be_ajax_load_more', 'be_ajax_load_more' );

function vf_posts_format() {

	get_template_part( 'template-parts/content');

};

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
