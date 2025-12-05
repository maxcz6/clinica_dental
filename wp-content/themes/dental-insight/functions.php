<?php
/**
 * Dental Insight functions and definitions
 *
 * @subpackage Dental Insight
 * @since 1.0
 */


// theme setup
function dental_insight_setup() {
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'dental-insight-featured-image', 2000, 1200, true );
	add_image_size( 'dental-insight-thumbnail-avatar', 100, 100, true );

	define( 'THEME_DIR', dirname( __FILE__ ) );

	load_theme_textdomain( 'dental-insight', get_template_directory() . '/languages' );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'dental-insight' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio','quote',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', dental_insight_fonts_url() ) );

		if ( ! defined( 'DENTAL_INSIGHT_SUPPORT' ) ) {
	define('DENTAL_INSIGHT_SUPPORT',__('https://wordpress.org/support/theme/dental-insight/','dental-insight'));
	}
	if ( ! defined( 'DENTAL_INSIGHT_REVIEW' ) ) {
	define('DENTAL_INSIGHT_REVIEW',__('https://wordpress.org/support/theme/dental-insight/reviews/','dental-insight'));
	}
	if ( ! defined( 'DENTAL_INSIGHT_LIVE_DEMO' ) ) {
	define('DENTAL_INSIGHT_LIVE_DEMO',__('https://trial.ovationthemes.com/dental-insight-pro/','dental-insight'));
	}
	if ( ! defined( 'DENTAL_INSIGHT_BUY_PRO' ) ) {
	define('DENTAL_INSIGHT_BUY_PRO',__('https://www.ovationthemes.com/products/dental-clinic-wordpress-theme','dental-insight'));
	}
	if ( ! defined( 'DENTAL_INSIGHT_PRO_DOC' ) ) {
	define('DENTAL_INSIGHT_PRO_DOC',__('https://trial.ovationthemes.com/docs/ot-dental-insight-pro-doc/','dental-insight'));
	}
	if ( ! defined( 'DENTAL_INSIGHT_FREE_DOC' ) ) {
	define('DENTAL_INSIGHT_FREE_DOC',__('https://trial.ovationthemes.com/docs/ot-dental-insight-free-doc/','dental-insight'));
	}
	if ( ! defined( 'DENTAL_INSIGHT_THEME_NAME' ) ) {
	define('DENTAL_INSIGHT_THEME_NAME',__('Premium Dental Theme','dental-insight'));
	}
	if ( ! defined( 'DENTAL_INSIGHT_BUNDLE_LINK' ) ) {
	define('DENTAL_INSIGHT_BUNDLE_LINK',__('https://www.ovationthemes.com/products/wordpress-bundle','dental-insight'));
	}
	require get_template_directory() . '/inc/dashboard/dashboard-settings.php';
}
	
add_action( 'after_setup_theme', 'dental_insight_setup' );

//woocommerce//
//shop page no of columns
function dental_insight_woocommerce_loop_columns() {
	
	$retrun = get_theme_mod( 'dental_insight_archieve_item_columns', 3 );
    
    return $retrun;
}
add_filter( 'loop_shop_columns', 'dental_insight_woocommerce_loop_columns' );
function dental_insight_woocommerce_products_per_page() {

		$retrun = get_theme_mod( 'dental_insight_archieve_shop_perpage', 6 );
    
    return $retrun;
}
add_filter( 'loop_shop_per_page', 'dental_insight_woocommerce_products_per_page' );
// related products
function dental_insight_related_products_args( $args ) {
    $defaults = array(
        'posts_per_page' => get_theme_mod( 'dental_insight_related_shop_perpage', 3 ),
        'columns'        => get_theme_mod( 'dental_insight_related_item_columns', 3),
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'dental_insight_related_products_args' );

// breadcrumb seperator
function dental_insight_woocommerce_breadcrumb_separator($dental_insight_defaults) {
    $dental_insight_separator = get_theme_mod('woocommerce_breadcrumb_separator', ' / ');

    // Update the separator
    $dental_insight_defaults['delimiter'] = $dental_insight_separator;

    return $dental_insight_defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'dental_insight_woocommerce_breadcrumb_separator');

//add animation class
if ( class_exists( 'WooCommerce' ) ) { 
	add_filter('post_class', function($dental_insight_classes, $class, $product_id) {
	    if( is_shop() || is_product_category() ){
	        
	        $dental_insight_classes = array_merge(['wow','zoomIn'], $dental_insight_classes);
	    }
	    return $dental_insight_classes;
	},10,3);
}
//woocommerce-end//

// Get start function

// Enqueue scripts and styles
function dental_insight_enqueue_admin_script($hook) {
    // Admin JS
    wp_enqueue_script('dental-insight-admin-js', get_theme_file_uri('/assets/js/dental-insight-admin.js'), array('jquery'), true);
    wp_localize_script(
		'dental-insight-admin-js',
		'dental_insight',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('dental_insight_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('dental-insight-admin-js');

    wp_localize_script( 'dental-insight-admin-js', 'dental_insight_scripts_localize',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action('admin_enqueue_scripts', 'dental_insight_enqueue_admin_script');

//dismiss function 
add_action( 'wp_ajax_dental_insight_dismissed_notice_handler', 'dental_insight_ajax_notice_dismiss_fuction' );

function dental_insight_ajax_notice_dismiss_fuction() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'dental_insight_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

//get start box
function dental_insight_custom_admin_notice() {
    // Check if the notice is dismissed
    if ( ! get_option('dismissed-get_started_notice', FALSE ) )  {
        // Check if not on the theme documentation page
        $dental_insight_current_screen = get_current_screen();
        $dental_insight_theme = wp_get_theme();
        $dental_insight_theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $dental_insight_theme->get( 'Name' ) ) );
		$dental_insight_demo_page_slug = apply_filters( $dental_insight_theme_name . '_theme_setup_wizard_dental_insight_page_slug', $dental_insight_theme_name . '-wizard' );
		$dental_insight_expected_screen_id = 'appearance_page_' . $dental_insight_demo_page_slug;
        if ( $dental_insight_current_screen && $dental_insight_current_screen->id !== $dental_insight_expected_screen_id ) { ?>
            <div class="notice notice-info is-dismissible" data-notice="get_started_notice">
                <div class="notice-div">
                    <div>
                        <p class="theme-name"><?php echo esc_html($dental_insight_theme->get('Name')); ?></p>
                        <p><?php _e('For information and detailed instructions, check out our theme documentation.', 'dental-insight'); ?></p>
                    </div>
                    <div class="notice-buttons-box">
                        <a class="button-primary livedemo" href="<?php echo esc_url( DENTAL_INSIGHT_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'dental-insight'); ?></a>
                        <a class="button-primary buynow" href="<?php echo esc_url( DENTAL_INSIGHT_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'dental-insight'); ?></a>
                        <a class="button-primary theme-install" href="<?php echo esc_url( 'themes.php?page=' . $dental_insight_demo_page_slug ); ?>"><?php _e( 'Begin Installation', 'dental-insight' ); ?></a>
                    </div>
                </div>
            </div>
        <?php
        }
    }
}
add_action('admin_notices', 'dental_insight_custom_admin_notice');

//after switch theme
add_action('after_switch_theme', 'dental_insight_after_switch_theme');
function dental_insight_after_switch_theme () {
    update_option('dismissed-get_started_notice', FALSE );
}
//get-start-function-end//

// tag count
function dental_insight_display_post_tag_count() {
    $dental_insight_tags = get_the_tags();
    $dental_insight_tag_count = ($dental_insight_tags) ? count($dental_insight_tags) : 0;
    $dental_insight_tag_text = ($dental_insight_tag_count === 1) ? 'tag' : 'tags';
    echo $dental_insight_tag_count . ' ' . $dental_insight_tag_text;
}

// Date formatting
function dental_insight_display_shop_date() {
    // Get the date type option
    $dental_insight_date_type = get_theme_mod( 'dental_insight_date_type', 'published' );

    // Determine the date to display based on the type
    if ( $dental_insight_date_type === 'modified' && get_the_modified_time( 'U' ) !== get_the_time( 'U' ) ) {
        $dental_insight_date_to_display = get_the_modified_date( get_option( 'date_format' ) );
    } else {
        $dental_insight_date_to_display = get_the_date( get_option( 'date_format' ) );
    }

    // Output the date HTML

    echo esc_html( $dental_insight_date_to_display );
}

//media post format
function dental_insight_get_media($dental_insight_type = array()){
	$dental_insight_content = apply_filters( 'the_content', get_the_content() );
  	$output = false;

  // Only get media from the content if a playlist isn't present.
  if ( false === strpos( $dental_insight_content, 'wp-playlist-script' ) ) {
    $output = get_media_embedded_in_content( $dental_insight_content, $dental_insight_type );
    return $output;
  }
}

// front page template
function dental_insight_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'dental_insight_front_page_template' );

// excerpt function
function dental_insight_custom_excerpt() {
    $dental_insight_excerpt = get_the_excerpt();
    $dental_insight_plain_text_excerpt = wp_strip_all_tags($dental_insight_excerpt);
    
    // Get dynamic word limit from theme mod
    $dental_insight_word_limit = esc_attr(get_theme_mod('dental_insight_post_excerpt', '30'));
    
    // Limit the number of words
    $dental_insight_limited_excerpt = implode(' ', array_slice(explode(' ', $dental_insight_plain_text_excerpt), 0, $dental_insight_word_limit));

    echo esc_html($dental_insight_limited_excerpt);
}

// typography
function dental_insight_fonts_scripts() {
	$headings_font = esc_html(get_theme_mod('dental_insight_headings_text'));
	$body_font = esc_html(get_theme_mod('dental_insight_body_text'));

	if( $headings_font ) {
		wp_enqueue_style( 'dental-insight-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
	} else {
		wp_enqueue_style( 'dental-insight-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $body_font ) {
		wp_enqueue_style( 'dental-insight-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );
	} else {
		wp_enqueue_style( 'dental-insight-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}
}
add_action( 'wp_enqueue_scripts', 'dental_insight_fonts_scripts' );

// Footer Text
function dental_insight_copyright_link() {
    $dental_insight_footer_text = get_theme_mod('dental_insight_footer_text', esc_html__('Dental WordPress Theme', 'dental-insight'));
    $dental_insight_credit_link = esc_url('https://www.ovationthemes.com/products/free-dental-wordpress-theme');

    echo '<a href="' . $dental_insight_credit_link . '" target="_blank">' . esc_html($dental_insight_footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'dental-insight') . '</span></a>';
}

// custom sanitizations
// dropdown
function dental_insight_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}
// slider custom control
if ( ! function_exists( 'dental_insight_sanitize_integer' ) ) {
	function dental_insight_sanitize_integer( $input ) {
		return (int) $input;
	}
}
// range contol
function dental_insight_sanitize_number_absint( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
// select post page
function dental_insight_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
// toggle switch
function dental_insight_callback_sanitize_switch( $value ) {
	// Switch values must be equal to 1 of off. Off is indicator and should not be translated.
	return ( ( isset( $value ) && $value == 1 ) ? 1 : 'off' );
}
//choices control
function dental_insight_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
// phone number
function dental_insight_sanitize_phone_number( $phone ) {
  return preg_replace( '/[^\d+]/', '', $phone );
}
// Sanitize Sortable control.
function dental_insight_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

// widgets
function dental_insight_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'dental-insight' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'dental-insight' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'dental-insight' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'dental-insight' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'dental-insight' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'dental-insight' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'dental-insight' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'dental-insight' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'dental-insight' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'dental-insight' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'dental-insight' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'dental-insight' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'dental-insight' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'dental-insight' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'dental_insight_widgets_init' );

// fonts
function dental_insight_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$font_family[] = 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

//Enqueue scripts and styles.
function dental_insight_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'dental-insight-fonts', dental_insight_fonts_url(), array());

	//Bootstarp
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'dental-insight-style', get_stylesheet_uri() );

	wp_style_add_data('dental-insight-style', 'rtl', 'replace');

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'dental-insight-style',$dental_insight_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	//Block Style
	wp_enqueue_style( 'dental-insight-block-style', esc_url( get_template_directory_uri() ).'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'dental-insight-custom.js', get_theme_file_uri( '/assets/js/dental-insight-custom.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'dental-insight-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if (get_option('dental_insight_animation_enable', false) !== 'off') {
		//wow.js
		wp_enqueue_script( 'dental-insight-wow-js', get_theme_file_uri( '/assets/js/wow.js' ), array( 'jquery' ), true );

		//animate.css
		wp_enqueue_style( 'dental-insight-animate-css', get_template_directory_uri().'/assets/css/animate.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'dental_insight_scripts' );

// Enqueue editor styles for Gutenberg
function dental_insight_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'dental-insight-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'dental-insight-fonts', dental_insight_fonts_url(), array());
}
add_action( 'enqueue_block_editor_assets', 'dental_insight_block_editor_styles' );

# Load scripts and styles.(fontawesome)
add_action( 'customize_controls_enqueue_scripts', 'dental_insight_customize_controls_register_scripts' );

function dental_insight_customize_controls_register_scripts() {
	wp_enqueue_style( 'dental-insight-ctypo-customize-controls-style', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
}

// enque files
require get_parent_theme_file_path( '/inc/custom-header.php' );
require get_parent_theme_file_path( '/inc/template-tags.php' );
require get_parent_theme_file_path( '/inc/template-functions.php' );
require get_parent_theme_file_path( '/inc/customizer.php' );
require get_parent_theme_file_path( '/inc/wptt-webfont-loader.php' );
require get_parent_theme_file_path( '/inc/breadcrumb.php' );
require get_parent_theme_file_path( '/inc/typofont.php' );
require get_parent_theme_file_path( 'inc/sortable/sortable_control.php' );
