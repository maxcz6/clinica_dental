<?php 
/**
 * SKT Toothy functions and definitions
 *
 * @package SKT Toothy
 */
 
 global $content_width;
 if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */ 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'skt_toothy_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
 
function skt_toothy_setup() {
	load_theme_textdomain( 'skt-toothy', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 25,
		'width'       => 170,
		'flex-height' => true,
	) );	
 
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'skt-toothy' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // skt_toothy_setup

add_action( 'after_setup_theme', 'skt_toothy_setup' );


function skt_toothy_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'skt-toothy' ),
		'description'   => esc_html__( 'Appears on blog page sidebar', 'skt-toothy' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Header Right Widget', 'skt-toothy' ),
		'description'   => esc_html__( 'Appears on top of the header', 'skt-toothy' ),
		'id'            => 'header-right-widget',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title" style="display:none">',
		'after_title'   => '</h3>',
		'after_widget'  => '',
	) );		
	
}
add_action( 'widgets_init', 'skt_toothy_widgets_init' );


function skt_toothy_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$robotocondensed = _x('on','robotocondensed:on or off','skt-toothy');		
		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','skt-toothy');	
		
		if('off' !== $robotocondensed ){
			$font_family = array();
			
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function skt_toothy_scripts() {
	wp_enqueue_style('skt-toothy-font', skt_toothy_font_url(), array());
	wp_enqueue_style( 'skt-toothy-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt-toothy-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'skt-toothy-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'skt-toothy-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'skt-toothy-custom-js', get_template_directory_uri() . '/js/custom.js' );	
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_toothy_scripts' );

define('SKT_URL','https://www.sktthemes.org');
define('SKT_PRO_THEME_URL','https://www.sktthemes.org/shop/toothy-dentist-wordpress-theme/');
define('SKT_FREE_THEME_URL','https://www.sktthemes.org/shop/free-dentist-wordpress-theme/');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/toothy_documentation/');
define('SKT_LIVE_DEMO','https://www.sktthemes.org/demo/dentist/');
define('SKT_THEMES','https://www.sktthemes.org/themes/');

function skt_toothy_new_excerpt_length($length) {
    return 50;
}
add_filter('excerpt_length', 'skt_toothy_new_excerpt_length');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

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

// get slug by id
function skt_toothy_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

if ( ! function_exists( 'skt_toothy_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_toothy_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

// WordPress wp_body_open backward compatibility
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Include the Plugin_Activation class.
 */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'skt_toothy_register_required_plugins' );
 
function skt_toothy_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'SKT Templates',
			'slug'      => 'skt-templates',
			'required'  => false,
		) 				
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'skt-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}