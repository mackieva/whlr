<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
// if ( function_exists( 'genesis_register_responsive_menus' ) ) {
// 	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
// }

add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function genesis_sample_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style( // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- see https://core.trac.wordpress.org/ticket/49742
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		null
	);

	wp_enqueue_style( 'dashicons' );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}
	
	wp_enqueue_script( 'kreativ-responsive-oc-menu', get_stylesheet_directory_uri() . '/js/off-canvas-menu.min.js', array( 'jquery' ), PARENT_THEME_VERSION, true );
	wp_enqueue_style( 'bs-stylesheet', CHILD_URL . '/css/bootstrap.min.css', array(), PARENT_THEME_VERSION );


	wp_enqueue_script( 'bs-js', CHILD_URL . '/js/bootstrap.min.js', array(), PARENT_THEME_VERSION);

}

add_filter( 'body_class', 'genesis_sample_body_classes' );
/**
 * Add additional classes to the body element.
 *
 * @since 3.4.1
 *
 * @param array $classes Classes array.
 * @return array $classes Updated class array.
 */
function genesis_sample_body_classes( $classes ) {

	if ( ! genesis_is_amp() ) {
		// Add 'no-js' class to the body class values.
		$classes[] = 'no-js';
	}
	return $classes;
}

add_action( 'genesis_before', 'genesis_sample_js_nojs_script', 1 );
/**
 * Echo the script that changes 'no-js' class to 'js'.
 *
 * @since 3.4.1
 */
function genesis_sample_js_nojs_script() {

	if ( genesis_is_amp() ) {
		return;
	}

	?>
	<script>
	//<![CDATA[
	(function(){
		var c = document.body.classList;
		c.remove( 'no-js' );
		c.add( 'js' );
	})();
	//]]>
	</script>
	<?php
}

add_filter( 'wp_resource_hints', 'genesis_sample_resource_hints', 10, 2 );
/**
 * Add preconnect for Google Fonts.
 *
 * @since 3.4.1
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function genesis_sample_resource_hints( $urls, $relation_type ) {

	if ( wp_style_is( genesis_get_theme_handle() . '-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = [
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		];
	}

	return $urls;
}

add_action( 'after_setup_theme', 'genesis_sample_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'genesis_sample_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
add_image_size( 'genesis-singular-images', 702, 526, true );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

add_filter( 'genesis_attr_site-header', 'whlr_scroll_header_data' );
function whlr_scroll_header_data( $attributes ) {
 
 $attributes['data-scroll-section'] = ' ';
 return $attributes;
}

add_filter( 'genesis_attr_footer-widgets', 'whlr_scroll_footer_data' );
function whlr_scroll_footer_data( $attributes ) {
 
 $attributes['data-scroll-section'] = ' ';
 return $attributes;
}

// Add Page Header
add_action( 'genesis_after_header', 'showcase_page_header', 8 );
function showcase_page_header() {
	$output = false;
	if( is_page() || !is_home() || is_page('careers') || is_page('team') || !is_singular('post') ) {

		$image = get_post_thumbnail_id();

		if( $image ) {

			$image = wp_get_attachment_image_src( $image, 'showcase_hero' );
			$background_image_class = 'with-background-image';
			$title = the_title( '<h2>', '</h2>', false );

			$output .= '<div class="page-header with-background-image"><div class="wrap"><img src="'.$image[0].'" class="thumbnail" class="WHLR ' . $title . '">';
			$output .= '</div></div><script src="'.get_stylesheet_directory_uri().'/js/simpleParallax.js"></script><script>var image = document.getElementsByClassName("thumbnail");
new simpleParallax(image);</script>';
		}
	}

	if( $output )
		echo $output;
}


add_filter( 'body_class', 'showcase_page_header_body_class' );
function showcase_page_header_body_class( $classes ) {

	if( is_page() && has_post_thumbnail() )
    	$classes[] = 'with-page-header';

    return $classes;

}

function wp_trim_excerpt_modified($text, $content_length = 55, $remove_breaks = false) {
    if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = excerpt_remove_blocks( $text );
        $text = apply_filters( 'the_content', $text );
        $text = str_replace(']]>', ']]&gt;', $text);
        $num_words = $content_length;
        $more = $excerpt_more ? $excerpt_more : null;
        if ( null === $more ) {
            $more = __( '&hellip;' );
        }
        $original_text = $text;
        $text = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $text );

        // Here is our modification
        // Allow <p> and <strong>
        $text = strip_tags($text, '<p>,<strong>');

        if ( $remove_breaks )
            $text = preg_replace('/[\r\n\t ]+/', ' ', $text);
        $text = trim( $text );
        if ( strpos( _x( 'words', 'Word count type. Do not translate!' ), 'characters' ) === 0 && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
            $text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
            preg_match_all( '/./u', $text, $words_array );
            $words_array = array_slice( $words_array[0], 0, $num_words + 1 );
            $sep = '';
        } else {
            $words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
            $sep = ' ';
        }
        if ( count( $words_array ) > $num_words ) {
            array_pop( $words_array );
            $text = implode( $sep, $words_array );
            $text = $text . $more;
        } else {
            $text = implode( $sep, $words_array );
        }
    }
    return $text;
}

add_action('genesis_header', 'off_canvas_items', 10);
function off_canvas_items() {
	?>
	<aside class="icon-open-row">
		<div class="icon-open-container">
			<div class="icon-open-col-1">
				☰
			</div>
		</div>
	</aside>
	<div class="off-canvas">
		<div class="off-canvas-header">
			<img src="<?php echo get_bloginfo('wpurl') ?>/wp-content/uploads/wheeler-logo-test.png" class="custom-logo" alt="WHLR" width="150" height="61">
		</div>
		<div data-bs-dismiss="off-canvas" aria-label="Close">
			<div class="icon-close"></div>
		</div>

		<div class="off-canvas-body">
			<nav class="mobile-menu">
			<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_class' => 'menu genesis-nav-menu menu-primary'
			) ); ?>
			</nav>
			<!-- <ul class="bh-links">
				<li>
					<a href="#">Like Us! <i class="bi-linkedin" aria-hidden="true"></i></a>
				</li>
			</ul> -->
		</div>
	</div>
	<?php
}