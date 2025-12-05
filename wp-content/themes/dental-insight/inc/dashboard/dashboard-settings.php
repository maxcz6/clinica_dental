<?php
/**
 * Settings for demo import
 *
 */

/**
 * Define constants
 **/
if ( ! defined( 'WHIZZIE_DIR' ) ) {
	define( 'WHIZZIE_DIR', dirname( __FILE__ ) );
}
require trailingslashit( WHIZZIE_DIR ) . 'dashboard-contents.php';
$dental_insight_current_theme = wp_get_theme();
$dental_insight_theme_title = $dental_insight_current_theme->get( 'Name' );


/**
 * Make changes below
 **/

// Change the title and slug of your wizard page
$config['dental_insight_page_slug'] 	= 'dental-insight';
$config['dental_insight_page_title']	= 'Begin Installation';

$config['steps'] = array(
	'plugins' => array(
		'id'			=> 'plugins',
		'title'			=> __( 'Install and Activate Recommended Plugins', 'dental-insight' ),
		'icon'			=> 'admin-plugins',
		'button_text'	=> __( 'Install Recommended Plugins', 'dental-insight' ),
		'can_skip'		=> true
	),
	'widgets' => array(
		'id'			=> 'widgets',
		'title'			=> __( 'Begin With Demo Import', 'dental-insight' ),
		'icon'			=> 'welcome-widgets-menus',
		'button_text'	=> __( 'Begin With Demo Import', 'dental-insight' ),
		'can_skip'		=> true
	),
	'done' => array(
		'id'			=> 'done',
		'title'			=> __( 'Customize Your Site', 'dental-insight' ),
		'icon'			=> 'yes',
	)
);

/**
 * This kicks off the wizard
 **/
if( class_exists( 'Dental_Insight_Whizzie' ) ) {
	$Dental_Insight_Whizzie = new Dental_Insight_Whizzie( $config );
}