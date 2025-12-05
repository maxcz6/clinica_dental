<?php

	require get_template_directory() . '/inc/dashboard/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function dental_insight_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Ovation Elements', 'dental-insight' ),
			'slug'             => 'ovation-elements',
			'required'         => false,
			'force_activation' => false,
		)
		
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'dental_insight_register_recommended_plugins' );