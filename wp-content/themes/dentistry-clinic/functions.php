<?php
/**
 * Theme functions and definitions
 *
 * @package dentistry_clinic
 */

// enque files
if ( ! function_exists( 'dentistry_clinic_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function dentistry_clinic_enqueue_styles() {
		wp_enqueue_style( 'dental-insight-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'dentistry-clinic-style', get_stylesheet_directory_uri() . '/style.css', array( 'dental-insight-style-parent' ), '1.0.0' );
        // Theme Customize CSS.
        require get_parent_theme_file_path( 'inc/extra_customization.php' );
        wp_add_inline_style( 'dentistry-clinic-style',$dental_insight_custom_style );
        require get_theme_file_path( 'inc/extra_customization.php' );
        wp_add_inline_style( 'dentistry-clinic-style',$dental_insight_custom_style );

        // blocks css
        wp_enqueue_style( 'dentistry-clinic-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'dentistry-clinic-style' ), '1.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'dentistry_clinic_enqueue_styles', 99 );

// theme setup
function dentistry_clinic_setup() {
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
    add_image_size( 'dentistry-clinic-featured-image', 2000, 1200, true );
    add_image_size( 'dentistry-clinic-thumbnail-avatar', 100, 100, true );

    $GLOBALS['content_width'] = 525;

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

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
     */
    add_editor_style( array( 'assets/css/editor-style.css') );

    if ( ! defined( 'DENTAL_INSIGHT_SUPPORT' ) ) {
    define('DENTAL_INSIGHT_SUPPORT',__('https://wordpress.org/support/theme/dentistry-clinic','dentistry-clinic'));
    }
    if ( ! defined( 'DENTAL_INSIGHT_REVIEW' ) ) {
    define('DENTAL_INSIGHT_REVIEW',__('https://wordpress.org/support/theme/dentistry-clinic/reviews/#new-post','dentistry-clinic'));
    }
    if ( ! defined( 'DENTAL_INSIGHT_LIVE_DEMO' ) ) {
    define('DENTAL_INSIGHT_LIVE_DEMO',__('https://trial.ovationthemes.com/dentistry-clinic/','dentistry-clinic'));
    }
    if ( ! defined( 'DENTAL_INSIGHT_BUY_PRO' ) ) {
    define('DENTAL_INSIGHT_BUY_PRO',__('https://www.ovationthemes.com/products/wordpress-dental-theme','dentistry-clinic'));
    }
    if ( ! defined( 'DENTAL_INSIGHT_PRO_DOC' ) ) {
    define('DENTAL_INSIGHT_PRO_DOC',__('https://trial.ovationthemes.com/docs/ot-dentistry-clinic-pro-doc/','dentistry-clinic'));
    }
    if ( ! defined( 'DENTAL_INSIGHT_THEME_NAME' ) ) {
    define('DENTAL_INSIGHT_THEME_NAME',__('Premium Dentistry Theme','dentistry-clinic'));
    }
    if ( ! defined( 'DENTAL_INSIGHT_FREE_DOC' ) ) {
    define('DENTAL_INSIGHT_FREE_DOC',__('https://trial.ovationthemes.com/docs/ot-dentistry-clinic-free-doc/','dentistry-clinic'));
    }

}
add_action( 'after_setup_theme', 'dentistry_clinic_setup' );

// widgets
function dentistry_clinic_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'dentistry-clinic' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'dentistry-clinic' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your pages and posts', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'dentistry-clinic' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 1', 'dentistry-clinic' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 2', 'dentistry-clinic' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 3', 'dentistry-clinic' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 4', 'dentistry-clinic' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'dentistry_clinic_widgets_init' );

// remove sections
function dentistry_clinic_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'dental_insight_pro' );

    $wp_customize->remove_setting('dental_insight_footer_text');
    $wp_customize->remove_control('dental_insight_footer_text');

    $wp_customize->remove_setting('dental_insight_primary_color');
    $wp_customize->remove_control('dental_insight_primary_color');

    $wp_customize->remove_setting('dental_insight_header_bg_color');
    $wp_customize->remove_control('dental_insight_header_bg_color');

    $wp_customize->remove_setting('dental_insight_heading_color');
    $wp_customize->remove_control('dental_insight_heading_color');

    $wp_customize->remove_setting('dental_insight_text_color');
    $wp_customize->remove_control('dental_insight_text_color');

    $wp_customize->remove_setting('dental_insight_primary_fade');
    $wp_customize->remove_control('dental_insight_primary_fade');

    $wp_customize->remove_setting('dental_insight_footer_bg');
    $wp_customize->remove_control('dental_insight_footer_bg');

    $wp_customize->remove_setting('dental_insight_slider_heading_color');
    $wp_customize->remove_control('dental_insight_slider_heading_color');

    $wp_customize->remove_setting('dental_insight_slider_excerpt_color');
    $wp_customize->remove_control('dental_insight_slider_excerpt_color');
}
add_action( 'customize_register', 'dentistry_clinic_customize_register', 11 );

function dentistry_clinic_customize( $wp_customize ) {

wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

    // pro section
    $wp_customize->add_section('dentistry_clinic_pro', array(
        'title'    => __('UPGRADE DENTISTRY CLICNIC PREMIUM', 'dentistry-clinic'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('dentistry_clinic_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Dentistry_Clinic_Pro_Control($wp_customize, 'dentistry_clinic_pro', array(
        'label'    => __('DENTISTRY CLICNIC PREMIUM', 'dentistry-clinic'),
        'section'  => 'dentistry_clinic_pro',
        'settings' => 'dentistry_clinic_pro',
        'priority' => 1,
    )));

    $wp_customize->add_setting('dentistry_clinic_slider_heading_color', array(
        'default' => '#343434',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dentistry_clinic_slider_heading_color', array(
        'section' => 'dental_insight_slider_section',
        'label' => esc_html__('Slider Title Span Color', 'dentistry-clinic'),
        'priority'    => 2,
    )));

    $wp_customize->add_setting('dentistry_clinic_slider_excerpt_color', array(
        'default' => '#343434',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dentistry_clinic_slider_excerpt_color', array(
        'section' => 'dental_insight_slider_section',
        'label' => esc_html__('Slider Excerpt Color', 'dentistry-clinic'),
        'priority'    => 4,
    )));

    $wp_customize->add_setting('dentistry_clinic_footer_text',array(
        'default'   => 'Dentistry WordPress Theme',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('dentistry_clinic_footer_text',array(
        'label' => esc_html__('Copyright Text','dentistry-clinic'),
        'section'   => 'dental_insight_footer_copyright',
        'type'      => 'textarea'
    ));
    $wp_customize->selective_refresh->add_partial( 'dentistry_clinic_footer_text', array(
        'selector' => '.site-info a',
        'render_callback' => 'dental_insight_customize_partial_dentistry_clinic_footer_text',
    ) );

    $wp_customize->add_setting('dentistry_clinic_primary_color', array(
        'default' => '#00bcd5',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dentistry_clinic_primary_color', array(
        'section' => 'colors',
        'label' => esc_html__('Theme Color', 'dentistry-clinic'),
     
    )));

    $wp_customize->add_setting('dentistry_clinic_primary_light', array(
        'default' => '#aceefe',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dentistry_clinic_primary_light', array(
        'section' => 'colors',
        'label' => esc_html__('theme Color light', 'dentistry-clinic'),
     
    )));

    $wp_customize->add_setting('dentistry_clinic_heading_color', array(
        'default' => '#343434',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dentistry_clinic_heading_color', array(
        'section' => 'colors',
        'label' => esc_html__('Theme Heading Color', 'dentistry-clinic'),
     
    )));

    $wp_customize->add_setting('dentistry_clinic_text_color', array(
        'default' => '#959595',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dentistry_clinic_text_color', array(
        'section' => 'colors',
        'label' => esc_html__('Theme Text Color', 'dentistry-clinic'),
     
    )));

    $wp_customize->add_setting('dentistry_clinic_primary_fade', array(
        'default' => '#e8fcff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dentistry_clinic_primary_fade', array(
        'section' => 'colors',
        'label' => esc_html__('theme Color fade', 'dentistry-clinic'),
     
    )));

    $wp_customize->add_setting('dentistry_clinic_footer_bg', array(
        'default' => '#343434',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dentistry_clinic_footer_bg', array(
        'section' => 'colors',
        'label' => esc_html__('Footer Bg color', 'dentistry-clinic'),
    )));
}
add_action( 'customize_register', 'dentistry_clinic_customize' );

// comments
function dentistry_clinic_enqueue_comments_reply() {
    if( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'comment_form_before', 'dentistry_clinic_enqueue_comments_reply' );

// Footer Text
function dentistry_clinic_copyright_link() {
    $footer_text = get_theme_mod('dentistry_clinic_footer_text', esc_html__('Dentistry WordPress Theme', 'dentistry-clinic'));
    $credit_link = esc_url('https://www.ovationthemes.com/products/free-dentistry-wordpress-theme');

    echo '<a href="' . $credit_link . '" target="_blank">' . esc_html($footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'dentistry-clinic') . '</span></a>';
}

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Dentistry_Clinic_Pro_Control')):
    class Dentistry_Clinic_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( DENTAL_INSIGHT_BUY_PRO ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE DENTISTRY CLICNIC PREMIUM','dentistry-clinic');?> </a>
            </div>
            <div class="col-md">
                <img class="dentistry_clinic_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; font-size:12px; text-decoration:underline; color:#333;"><?php esc_html_e('DENTISTRY CLICNIC PREMIUM - Features', 'dentistry-clinic'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'dentistry-clinic');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( DENTAL_INSIGHT_BUNDLE_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('WP Theme Bundle (120+ Themes)','dentistry-clinic');?> </a>
            </div>
        </label>
    <?php } }
endif;