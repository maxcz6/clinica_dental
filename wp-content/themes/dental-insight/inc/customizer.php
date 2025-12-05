<?php
/**
 * Dental Insight: Customizer
 *
 * @subpackage Dental Insight
 * @since 1.0
 */

function dental_insight_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

	require get_parent_theme_file_path( 'inc/custom-control.php' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Dental_Insight_Control_Sortable' );
	
	// Add homepage customizer file
  	require get_template_directory() . '/inc/customizer-home-page.php';

  	add_action( 'customize_controls_enqueue_scripts', function() {
    	wp_enqueue_script(
	        'dental-insight-customizer-reset',
	        get_theme_file_uri() . '/assets/js/color-reset.js', // Ensure the JS file exists in your theme
	        array( 'customize-controls', 'jquery' ),
	        '1.0',
	        true
    	);
	} );

  	// pro section 
 	$wp_customize->add_section('dental_insight_pro', array(
        'title'    => __('UPGRADE DENTAL PREMIUM', 'dental-insight'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('dental_insight_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Dental_Insight_Pro_Control($wp_customize, 'dental_insight_pro', array(
        'label'    => __('DENTAL PREMIUM', 'dental-insight'),
        'section'  => 'dental_insight_pro',
        'settings' => 'dental_insight_pro',
        'priority' => 1,
    )));

    //Logo
    $wp_customize->add_setting('dental_insight_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'dental_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Dental_Insight_Slider_Custom_Control( $wp_customize, 'dental_insight_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','dental-insight'),
		'section'=> 'title_tagline',
		'settings'=>'dental_insight_logo_max_height',
		'input_attrs' => array(
			'reset'            => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
	)));
	$wp_customize->add_setting('dental_insight_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_logo_title',
			array(
				'settings'        => 'dental_insight_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_site_title_fontsize',array(
		'default'=> 25,
		'transport' => 'refresh',
		'sanitize_callback' => 'dental_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Dental_Insight_Slider_Custom_Control( $wp_customize, 'dental_insight_site_title_fontsize',array(
		'label' => esc_html__( 'Site Title font size','dental-insight' ),
		'section'=> 'title_tagline',
		'settings'=>'dental_insight_site_title_fontsize',
		'input_attrs' => array(
			'reset'			   => 25,
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('dental_insight_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_logo_text',
			array(
				'settings'        => 'dental_insight_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_site_tagline_fontsize',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'dental_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Dental_Insight_Slider_Custom_Control( $wp_customize, 'dental_insight_site_tagline_fontsize',array(
		'label' => esc_html__( 'Site Tagline font size','dental-insight' ),
		'section'=> 'title_tagline',
		'settings'=>'dental_insight_site_tagline_fontsize',
		'input_attrs' => array(
			'reset'			   => 15,
            'step'             => 1,
			'min'              => 0,
			'max'              => 30,
        ),
	)));


	//colors
	if ( $wp_customize->get_section( 'colors' ) ) {
        $wp_customize->get_section( 'colors' )->title = __( 'Global Colors', 'dental-insight' );
        $wp_customize->get_section( 'colors' )->priority = 2;
    }

    $wp_customize->add_setting( 'dental_insight_global_color_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_global_color_heading', array(
			'label'       => esc_html__( 'Global Colors', 'dental-insight' ),
			'section'     => 'colors',
			'settings'    => 'dental_insight_global_color_heading',
			'priority'       => 1,

	) ) );

	$wp_customize->add_setting( 'dental_insight_reset_colors', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'transport'         => 'postMessage', 
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dental_insight_reset_colors', array(
	    'label'       => esc_html__( 'Reset Colors', 'dental-insight' ),
	    'section'     => 'colors',
	    'settings'    => 'dental_insight_reset_colors',
	    'type'        => 'button',
	    'input_attrs' => array(
	        'class' => 'button color-reset-btn',
	        'onclick' => 'resetColorsToDefault();', // Attach custom JS function
	    ),
	    'priority' => '2'
	) ) );

    $wp_customize->add_setting('dental_insight_primary_color', array(
	    'default' => '#fe8086',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_primary_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Color', 'dental-insight'),
	 
	)));

	$wp_customize->add_setting('dental_insight_header_bg_color', array(
	    'default' => '#f3f4f9',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_header_bg_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Header Bg Color', 'dental-insight'),
	 
	)));

	$wp_customize->add_setting('dental_insight_heading_color', array(
	    'default' => '#02314f',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_heading_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Heading Color', 'dental-insight'),
	 
	)));

	$wp_customize->add_setting('dental_insight_text_color', array(
	    'default' => '#858d92',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_text_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Text Color', 'dental-insight'),
	 
	)));

	$wp_customize->add_setting('dental_insight_primary_fade', array(
	    'default' => '#fff4f5',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_primary_fade', array(
	    'section' => 'colors',
	    'label' => esc_html__('theme Color Fade', 'dental-insight'),
	 
	)));

	$wp_customize->add_setting('dental_insight_footer_bg', array(
	    'default' => '#02314f',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_footer_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('Footer Bg color', 'dental-insight'),
	)));

	$wp_customize->add_setting('dental_insight_post_bg', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_post_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('sidebar/Blog Post Bg color', 'dental-insight'),
	)));

  	// typography
	$wp_customize->add_section( 'dental_insight_typography_settings', array(
		'title'       => __( 'Typography', 'dental-insight' ),
		'priority'       => 2,
	) );
	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	$wp_customize->add_setting( 'dental_insight_section_typo_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Setting', 'dental-insight' ),
		'section'     => 'dental_insight_typography_settings',
		'settings'    => 'dental_insight_section_typo_heading',
	) ) );
	$wp_customize->add_setting( 'dental_insight_headings_text', array(
		'sanitize_callback' => 'dental_insight_sanitize_fonts',
	));
	$wp_customize->add_control( 'dental_insight_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'dental-insight'),
		'section' => 'dental_insight_typography_settings',
		'choices' => $font_choices

	));
	$wp_customize->add_setting( 'dental_insight_body_text', array(
		'sanitize_callback' => 'dental_insight_sanitize_fonts'
	));
	$wp_customize->add_control( 'dental_insight_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'dental-insight' ),
		'section' => 'dental_insight_typography_settings',
		'choices' => $font_choices
	) );

    // Theme General Settings
    $wp_customize->add_section('dental_insight_theme_settings',array(
        'title' => __('Theme General Settings', 'dental-insight'),
        'priority' => 2
    ) );
	$wp_customize->add_setting( 'dental_insight_section_sticky_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_sticky_heading', array(
		'label'       => esc_html__( 'Sticky Header Settings', 'dental-insight' ),
		'section'     => 'dental_insight_theme_settings',
		'settings'    => 'dental_insight_section_sticky_heading',
	) ) );
    $wp_customize->add_setting(
		'dental_insight_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_sticky_header',
			array(
				'settings'        => 'dental_insight_sticky_header',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'Show Sticky Header', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'dental_insight_section_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_loader_heading', array(
		'label'       => esc_html__( 'Loader Settings', 'dental-insight' ),
		'section'     => 'dental_insight_theme_settings',
		'settings'    => 'dental_insight_section_loader_heading',
	) ) );
	$wp_customize->add_setting(
		'dental_insight_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_theme_loader',
			array(
				'settings'        => 'dental_insight_theme_loader',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'Show Site Loader', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_loader_style',array(
        'default' => 'style_one',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_loader_style',array(
        'type' => 'select',
        'label' => __('Select Loader Design','dental-insight'),
        'section' => 'dental_insight_theme_settings',
        'choices' => array(
            'style_one' => __('Circle','dental-insight'),
            'style_two' => __('Bar','dental-insight'),
        ),
	) );
	
	$wp_customize->add_setting( 'dental_insight_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_theme_width_heading', array(
		'label'       => esc_html__( 'Theme Width Setting', 'dental-insight' ),
		'section'     => 'dental_insight_theme_settings',
		'settings'    => 'dental_insight_theme_width_heading',
	) ) );
	$wp_customize->add_setting('dental_insight_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','dental-insight'),
        'section' => 'dental_insight_theme_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','dental-insight'),
            'container' => __('Container','dental-insight'),
            'container_fluid' => __('Container Fluid','dental-insight'),
        ),
	) );
	$wp_customize->add_setting( 'dental_insight_section_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Settings', 'dental-insight' ),
		'section'     => 'dental_insight_theme_settings',
		'settings'    => 'dental_insight_section_menu_heading',
	) ) );
	$wp_customize->add_setting('dental_insight_menu_text_transform',array(
        'default' => 'UPPERCASE',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','dental-insight'),
        'section' => 'dental_insight_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','dental-insight'),
            'UPPERCASE' => __('UPPERCASE','dental-insight'),
            'LOWERCASE' => __('LOWERCASE','dental-insight'),
        ),
	) );
	$wp_customize->add_setting('dental_insight_menu_fontsize',array(
		'default'=> 14,
		'transport' => 'refresh',
		'sanitize_callback' => 'dental_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Dental_Insight_Slider_Custom_Control( $wp_customize, 'dental_insight_menu_fontsize',array(
		'label' => esc_html__( 'menu font size','dental-insight' ),
		'section'=> 'dental_insight_theme_settings',
		'settings'=>'dental_insight_menu_fontsize',
		'input_attrs' => array(
			'reset'			   => 14,
            'step'             => 1,
			'min'              => 0,
			'max'              => 20,
        ),
	)));
	$wp_customize->add_setting( 'dental_insight_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Setting', 'dental-insight' ),
		'section'     => 'dental_insight_theme_settings',
		'settings'    => 'dental_insight_section_scroll_heading',
	) ) );
	$wp_customize->add_setting(
		'dental_insight_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_scroll_enable',
			array(
				'settings'        => 'dental_insight_scroll_enable',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'show Scroll Top', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('dental_insight_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_scroll_options',array(
		'type' => 'radio',
		'label'     => __('Scroll Top Alignment', 'dental-insight'),
		'section' => 'dental_insight_theme_settings',
		'type' => 'select',
		'choices' => array(
			'left_align' => __('LEFT','dental-insight'),
			'center_align' => __('CENTER','dental-insight'),
			'right_align' => __('RIGHT','dental-insight'),
		)
	) );
	$wp_customize->add_setting('dental_insight_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_theme_settings',
		'setting'	=> 'dental_insight_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'dental_insight_section_cursor_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_cursor_heading', array(
		'label'       => esc_html__( 'Cursor Setting', 'dental-insight' ),
		'section'     => 'dental_insight_theme_settings',
		'settings'    => 'dental_insight_section_cursor_heading',
	) ) );

	$wp_customize->add_setting(
		'dental_insight_enable_custom_cursor',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_enable_custom_cursor',
			array(
				'settings'        => 'dental_insight_enable_custom_cursor',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'show custom cursor', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'dental_insight_section_animation_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_animation_heading', array(
		'label'       => esc_html__( 'Animation Setting', 'dental-insight' ),
		'section'     => 'dental_insight_theme_settings',
		'settings'    => 'dental_insight_section_animation_heading',
	) ) );

	$wp_customize->add_setting(
		'dental_insight_animation_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_animation_enable',
			array(
				'settings'        => 'dental_insight_animation_enable',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'show/Hide Animation', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Post Layouts
	$wp_customize->add_panel( 'dental_insight_post_panel', array(
		'title' => esc_html__( 'Post Layout', 'dental-insight' ),
		'priority' => 4,
	));
	$wp_customize->add_section('dental_insight_blog_meta',array(
        'title' => __('Blog Meta', 'dental-insight'), 
        'panel' => 'dental_insight_post_panel',       
    ) );

    $wp_customize->add_setting( 'dental_insight_section_blog_meta_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_blog_meta_heading', array(
		'label'       => esc_html__( 'Blog Meta Settings', 'dental-insight' ),
		'section'     => 'dental_insight_blog_meta',
		'settings'    => 'dental_insight_section_blog_meta_heading',
	) ) );

	$wp_customize->add_setting('dental_insight_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_date',
			array(
				'settings'        => 'dental_insight_date',
				'section'         => 'dental_insight_blog_meta',
				'label'           => __( 'Show Date', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'dental_insight_date', array(
		'selector' => '.date-box',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_date',
	) );
	$wp_customize->add_setting('dental_insight_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_date_icon',array(
		'label'	=> __('date Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_blog_meta',
		'setting'	=> 'dental_insight_date_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dental_insight_date_type',array(
        'default' => 'published',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_date_type',array(
		'type' => 'radio',
		'label'     => __('Date Format', 'dental-insight'),
		'section' => 'dental_insight_blog_meta',
		'type' => 'select',
		'choices' => array(
			'published' => __('published date','dental-insight'),
            'modified' => __('modified date','dental-insight'),
		),
	) );



	$wp_customize->add_setting('dental_insight_sticky_icon',array(
		'default'	=> 'fas fa-thumb-tack',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_sticky_icon',array(
		'label'	=> __('Sticky Post Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_blog_meta',
		'setting'	=> 'dental_insight_sticky_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_admin',
			array(
				'settings'        => 'dental_insight_admin',
				'section'         => 'dental_insight_blog_meta',
				'label'           => __( 'Show Author/Admin', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'dental_insight_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_admin',
	) );
	$wp_customize->add_setting('dental_insight_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_author_icon',array(
		'label'	=> __('Author Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_blog_meta',
		'setting'	=> 'dental_insight_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_comment',
			array(
				'settings'        => 'dental_insight_comment',
				'section'         => 'dental_insight_blog_meta',
				'label'           => __( 'Show Comment', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'dental_insight_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_comment',
	) );
	$wp_customize->add_setting('dental_insight_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_comment_icon',array(
		'label'	=> __('comment Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_blog_meta',
		'setting'	=> 'dental_insight_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_tag',
			array(
				'settings'        => 'dental_insight_tag',
				'section'         => 'dental_insight_blog_meta',
				'label'           => __( 'Show tag count', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'dental_insight_tag', array(
		'selector' => '.tags',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_tag',
	) );
	$wp_customize->add_setting('dental_insight_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_tag_icon',array(
		'label'	=> __('tag Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_blog_meta',
		'setting'	=> 'dental_insight_tag_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_section('dental_insight_layout',array(
        'title' => __('Single-Post Layout', 'dental-insight'),
        'panel' => 'dental_insight_post_panel',
    ) );
    $wp_customize->add_setting( 'dental_insight_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_post_heading', array(
		'label'       => esc_html__( 'Single Post Structure', 'dental-insight' ),
		'section'     => 'dental_insight_layout',
		'settings'    => 'dental_insight_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'dental_insight_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Dental_Insight_Radio_Image_Control( $wp_customize, 'dental_insight_single_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Single Post Page Layout', 'dental-insight' ),
			'section' => 'dental_insight_layout',
			'choices' => array(

				'single_right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'dental-insight' )
				),
				'single_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'dental-insight' )
				),
				'single_full_width' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'dental-insight' )
				),
			)
		)
	) );
	$wp_customize->add_setting('dental_insight_single_post_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_single_post_tag',
			array(
				'settings'        => 'dental_insight_single_post_tag',
				'section'         => 'dental_insight_layout',
				'label'           => __( 'Show Tags', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'dental_insight_single_post_tag', array(
		'selector' => '.single-tags',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_single_post_tag',
	) );
	$wp_customize->add_setting('dental_insight_similar_post',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_similar_post',
			array(
				'settings'        => 'dental_insight_similar_post',
				'section'         => 'dental_insight_layout',
				'label'           => __( 'Show Similar post', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('dental_insight_similar_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('dental_insight_similar_text',array(
		'label' => esc_html__('Similar Post Heading','dental-insight'),
		'section' => 'dental_insight_layout',
		'setting' => 'dental_insight_similar_text',
		'type'    => 'text'
	));
	$wp_customize->add_section('dental_insight_archieve_post_layot',array(
        'title' => __('Archieve-Post Layout', 'dental-insight'),
        'panel' => 'dental_insight_post_panel',
    ) );
	$wp_customize->add_setting( 'dental_insight_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'dental-insight' ),
		'section'     => 'dental_insight_archieve_post_layot',
		'settings'    => 'dental_insight_section_archive_post_heading',
	) ) );
    $wp_customize->add_setting( 'dental_insight_post_option',
		array(
			'default' => 'right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Dental_Insight_Radio_Image_Control( $wp_customize, 'dental_insight_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Post Page Layout', 'dental-insight' ),
			'section' => 'dental_insight_archieve_post_layot',
			'choices' => array(
				'right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'dental-insight' )
				),
				'left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'dental-insight' )
				),
				'one_column' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'dental-insight' )
				),
				'three_column' => array(
					'image' => get_template_directory_uri().'/assets/images/3column.jpg',
					'name' => __( 'Three Column', 'dental-insight' )
				),
				'four_column' => array(
					'image' => get_template_directory_uri().'/assets/images/4column.jpg',
					'name' => __( 'Four Column', 'dental-insight' )
				),
				'grid_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
					'name' => __( 'Grid-Right-Sidebar Layout', 'dental-insight' )
				),
				'grid_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-left.png',
					'name' => __( 'Grid-Left-Sidebar Layout', 'dental-insight' )
				),
				'grid_post' => array(
					'image' => get_template_directory_uri().'/assets/images/grid.jpg',
					'name' => __( 'Grid Layout', 'dental-insight' )
				)
			)
		)
	) );
	$wp_customize->add_setting('dental_insight_grid_column',array(
        'default' => '3_column',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_grid_column',array(
		'type' => 'radio',
		'label'     => __('Grid Post Per Row', 'dental-insight'),
		'section' => 'dental_insight_archieve_post_layot',
		'type' => 'select',
		'choices' => array(
			'1_column' => __('1','dental-insight'),
            '2_column' => __('2','dental-insight'),
            '3_column' => __('3','dental-insight'),
            '4_column' => __('4','dental-insight'),
		)
	) );
	$wp_customize->add_setting('archieve_post_order', array(
        'default' => array('title', 'image', 'meta','excerpt','btn'),
        'sanitize_callback' => 'dental_insight_sanitize_sortable',
    ));
    $wp_customize->add_control(new Dental_Insight_Control_Sortable($wp_customize, 'archieve_post_order', array(
    	'label' => esc_html__('Post Order', 'dental-insight'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'dental-insight') ,
        'section' => 'dental_insight_archieve_post_layot',
        'choices' => array(
            'title' => __('title', 'dental-insight') ,
            'image' => __('media', 'dental-insight') ,
            'meta' => __('meta', 'dental-insight') ,
            'excerpt' => __('excerpt', 'dental-insight') ,
            'btn' => __('Read more', 'dental-insight') ,
        ) ,
    )));
	$wp_customize->add_setting('dental_insight_post_excerpt',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'dental_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Dental_Insight_Slider_Custom_Control( $wp_customize, 'dental_insight_post_excerpt',array(
		'label' => esc_html__( 'Excerpt Limit','dental-insight' ),
		'section'=> 'dental_insight_archieve_post_layot',
		'settings'=>'dental_insight_post_excerpt',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('dental_insight_read_more_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('dental_insight_read_more_text',array(
		'label' => esc_html__('Read More Text','dental-insight'),
		'section' => 'dental_insight_archieve_post_layot',
		'setting' => 'dental_insight_read_more_text',
		'type'    => 'text'
	));

	$wp_customize->add_section('dental_insight_blog_pagination',array(
        'title' => __('Pagination', 'dental-insight'), 
        'panel' => 'dental_insight_post_panel',       
    ) );

	$wp_customize->add_setting('dental_insight_pagination_type',array(
        'default' => 'numbered',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_pagination_type',array(
		'type' => 'radio',
		'label'     => __('Blog Pagination', 'dental-insight'),
		'section' => 'dental_insight_blog_pagination',
		'type' => 'select',
		'choices' => array(
			'default' => __('Previous/Next','dental-insight'),
            'numbered' => __('Numbered','dental-insight'),
		),
	) );

	$wp_customize->add_setting('dental_insight_single_post_pagination_type',array(
        'default' => 'default',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_single_post_pagination_type',array(
		'type' => 'radio',
		'label'     => __('Post Pagination', 'dental-insight'),
		'section' => 'dental_insight_blog_pagination',
		'type' => 'select',
		'choices' => array(
			'default' => __('Previous/Next','dental-insight'),
            'post-name' => __('Post Title','dental-insight'),
		),
	) );

	// header-image
	$wp_customize->add_setting( 'dental_insight_section_header_image_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_header_image_heading', array(
		'label'       => esc_html__( 'Header Image Settings', 'dental-insight' ),
		'section'     => 'header_image',
		'settings'    => 'dental_insight_section_header_image_heading',
		'priority'    =>'1',
	) ) );

	$wp_customize->add_setting('dental_insight_show_header_image',array(
        'default' => 'on',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_show_header_image',array(
        'type' => 'select',
        'label' => __('Select Option','dental-insight'),
        'section' => 'header_image',
        'choices' => array(
            'on' => __('With Header Image','dental-insight'),
            'off' => __('Without Header Image','dental-insight'),
        ),
	) );

	//breadcrumb
	$wp_customize->add_section('dental_insight_breadcrumb_settings',array(
        'title' => __('Breadcrumb Settings', 'dental-insight'),
        'priority' => 4
    ) );
	$wp_customize->add_setting( 'dental_insight_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'Theme Breadcrumb Settings', 'dental-insight' ),
		'section'     => 'dental_insight_breadcrumb_settings',
		'settings'    => 'dental_insight_section_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'dental_insight_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_enable_breadcrumb',
			array(
				'settings'        => 'dental_insight_enable_breadcrumb',
				'section'         => 'dental_insight_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('dental_insight_breadcrumb_separator', array(
        'default' => ' / ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('dental_insight_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'dental-insight'),
        'section' => 'dental_insight_breadcrumb_settings',
        'type' => 'text',
    ));
	$wp_customize->add_setting( 'dental_insight_single_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_single_breadcrumb_heading', array(
		'label'       => esc_html__( 'Single post & Page', 'dental-insight' ),
		'section'     => 'dental_insight_breadcrumb_settings',
		'settings'    => 'dental_insight_single_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'dental_insight_single_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_single_enable_breadcrumb',
			array(
				'settings'        => 'dental_insight_single_enable_breadcrumb',
				'section'         => 'dental_insight_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting( 'dental_insight_woocommerce_breadcrumb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_woocommerce_breadcrumb_heading', array(
			'label'       => esc_html__( 'Woocommerce Breadcrumb', 'dental-insight' ),
			'section'     => 'dental_insight_breadcrumb_settings',
			'settings'    => 'dental_insight_woocommerce_breadcrumb_heading',
		) ) );
		$wp_customize->add_setting(
			'dental_insight_woocommerce_enable_breadcrumb',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Dental_Insight_Customizer_Customcontrol_Switch(
				$wp_customize,
				'dental_insight_woocommerce_enable_breadcrumb',
				array(
					'settings'        => 'dental_insight_woocommerce_enable_breadcrumb',
					'section'         => 'dental_insight_breadcrumb_settings',
					'label'           => __( 'Show Breadcrumb', 'dental-insight' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'dental-insight' ),
						'off'    => __( 'Off', 'dental-insight' ),
					),
					'active_callback' => '',
				)
			)
		);
		$wp_customize->add_setting('woocommerce_breadcrumb_separator', array(
	        'default' => ' / ',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_breadcrumb_separator', array(
	        'label' => __('Breadcrumb Separator', 'dental-insight'),
	        'section' => 'dental_insight_breadcrumb_settings',
	        'type' => 'text',
	    ));
	}

	//woocommerce
	if ( class_exists( 'WooCommerce' ) ){	
		$wp_customize->add_section('dental_insight_woocoomerce_section',array(
	        'title' => __('Custom Woocommerce Settings', 'dental-insight'),
	        'panel' => 'woocommerce',
	        'priority' => 4,
	    ) );
		$wp_customize->add_setting( 'dental_insight_section_shoppage_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_shoppage_heading', array(
			'label'       => esc_html__( 'Sidebar Settings', 'dental-insight' ),
			'section'     => 'dental_insight_woocoomerce_section',
			'settings'    => 'dental_insight_section_shoppage_heading',
		) ) );
		$wp_customize->add_setting( 'dental_insight_shop_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Dental_Insight_Radio_Image_Control( $wp_customize, 'dental_insight_shop_page_sidebar',
			array(
				'type'=>'select',
				'label' => __( 'Show Shop Page Sidebar', 'dental-insight' ),
				'section'     => 'dental_insight_woocoomerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'dental-insight' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'dental-insight' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'dental-insight' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'dental_insight_wocommerce_single_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Dental_Insight_Radio_Image_Control( $wp_customize, 'dental_insight_wocommerce_single_page_sidebar',
			array(
				'type'=>'select',
				'label'           => __( 'Show Single Product Page Sidebar', 'dental-insight' ),
				'section'     => 'dental_insight_woocoomerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'dental-insight' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'dental-insight' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'dental-insight' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'dental_insight_section_archieve_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_archieve_product_heading', array(
			'label'       => esc_html__( 'Archieve Product Settings', 'dental-insight' ),
			'section'     => 'dental_insight_woocoomerce_section',
			'settings'    => 'dental_insight_section_archieve_product_heading',
		) ) );
		$wp_customize->add_setting('dental_insight_archieve_item_columns',array(
		    'default' => '3',
		    'sanitize_callback' => 'dental_insight_sanitize_choices'
		));
		$wp_customize->add_control('dental_insight_archieve_item_columns',array(
		    'type' => 'select',
		    'label' => __('Select No of Columns','dental-insight'),
		    'section' => 'dental_insight_woocoomerce_section',
		    'choices' => array(
		        '1' => __('One Column','dental-insight'),
		        '2' => __('Two Column','dental-insight'),
		        '3' => __('Three Column','dental-insight'),
		        '4' => __('four Column','dental-insight'),
		        '5' => __('Five Column','dental-insight'),
		        '6' => __('Six Column','dental-insight'),
		    ),
		) );
		$wp_customize->add_setting( 'dental_insight_archieve_shop_perpage', array(
			'default'              => 6,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'dental_insight_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'dental_insight_archieve_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','dental-insight' ),
			'section'     => 'dental_insight_woocoomerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 30,
			),
		) );
		$wp_customize->add_setting( 'dental_insight_section_related_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_related_heading', array(
			'label'       => esc_html__( 'Related Product Settings', 'dental-insight' ),
			'section'     => 'dental_insight_woocoomerce_section',
			'settings'    => 'dental_insight_section_related_heading',
		) ) );
		$wp_customize->add_setting('dental_insight_related_item_columns',array(
		    'default' => '3',
		    'sanitize_callback' => 'dental_insight_sanitize_choices'
		));
		$wp_customize->add_control('dental_insight_related_item_columns',array(
		    'type' => 'select',
		    'label' => __('Select No of Columns','dental-insight'),
		    'section' => 'dental_insight_woocoomerce_section',
		    'choices' => array(
		        '1' => __('One Column','dental-insight'),
		        '2' => __('Two Column','dental-insight'),
		        '3' => __('Three Column','dental-insight'),
		        '4' => __('four Column','dental-insight'),
		        '5' => __('Five Column','dental-insight'),
		        '6' => __('Six Column','dental-insight'),
		    ),
		) );
		$wp_customize->add_setting( 'dental_insight_related_shop_perpage', array(
			'default'              => 3,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'dental_insight_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'dental_insight_related_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','dental-insight' ),
			'section'     => 'dental_insight_woocoomerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 10,
			),
		) );
		$wp_customize->add_setting(
			'dental_insight_related_product',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch($wp_customize,'dental_insight_related_product',
			array(
				'settings'        => 'dental_insight_related_product',
				'section'         => 'dental_insight_woocoomerce_section',
				'label'           => __( 'Show Related Products', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		));
	}

	// mobile width
	$wp_customize->add_section('dental_insight_mobile_options',array(
        'title' => __('Mobile Media settings', 'dental-insight'),
        'priority' => 4,
    ) );
    $wp_customize->add_setting( 'dental_insight_section_mobile_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_mobile_heading', array(
		'label'       => esc_html__( 'Mobile Media settings', 'dental-insight' ),
		'section'     => 'dental_insight_mobile_options',
		'settings'    => 'dental_insight_section_mobile_heading',
	) ) );
	$wp_customize->add_setting('dental_insight_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_menu_icon',array(
		'label'	=> __('Menu Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_mobile_options',
		'setting'	=> 'dental_insight_menu_icon',
		'type'		=> 'icon'
	))); 
	$wp_customize->add_setting(
		'dental_insight_slider_button_mobile_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_slider_button_mobile_show_hide',
			array(
				'settings'        => 'dental_insight_slider_button_mobile_show_hide',
				'section'         => 'dental_insight_mobile_options',
				'label'           => __( 'Show Slider Button', 'dental-insight' ),
				'description' => __('Control wont function if the button is off in the main slider settings.', 'dental-insight') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'dental_insight_scroll_enable_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_scroll_enable_mobile',
			array(
				'settings'        => 'dental_insight_scroll_enable_mobile',
				'section'         => 'dental_insight_mobile_options',
				'label'           => __( 'Show Scroll Top', 'dental-insight' ),	
				'description' => __('Control wont function if scroll-top is off in the main settings.', 'dental-insight') ,			
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'dental_insight_section_mobile_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_mobile_breadcrumb_heading', array(
		'label'       => esc_html__( 'Mobile Breadcrumb settings', 'dental-insight' ),
		'description' => __('Controls wont function if the breadcrumb is off in the main breadcrumb settings.', 'dental-insight') ,
		'section'     => 'dental_insight_mobile_options',
		'settings'    => 'dental_insight_section_mobile_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'dental_insight_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_enable_breadcrumb_mobile',
			array(
				'settings'        => 'dental_insight_enable_breadcrumb_mobile',
				'section'         => 'dental_insight_mobile_options',
				'label'           => __( 'Theme Breadcrumb', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'dental_insight_single_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_single_enable_breadcrumb_mobile',
			array(
				'settings'        => 'dental_insight_single_enable_breadcrumb_mobile',
				'section'         => 'dental_insight_mobile_options',
				'label'           => __( 'Single Post & Page', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_setting(
			'dental_insight_woocommerce_enable_breadcrumb_mobile',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Dental_Insight_Customizer_Customcontrol_Switch(
				$wp_customize,
				'dental_insight_woocommerce_enable_breadcrumb_mobile',
				array(
					'settings'        => 'dental_insight_woocommerce_enable_breadcrumb_mobile',
					'section'         => 'dental_insight_mobile_options',
					'label'           => __( 'wooCommerce Breadcrumb', 'dental-insight' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'dental-insight' ),
						'off'    => __( 'Off', 'dental-insight' ),
					),
					'active_callback' => '',
				)
			)
		);
	}

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'dental_insight_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'dental_insight_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'dental_insight_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'dental_insight_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'dental-insight' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'dental-insight' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'dental_insight_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'dental_insight_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'dental_insight_customize_register' );

function dental_insight_customize_partial_blogname() {
	bloginfo( 'name' );
}
function dental_insight_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function dental_insight_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function dental_insight_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Dental_Insight_Pro_Control')):
    class Dental_Insight_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( DENTAL_INSIGHT_BUY_PRO ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE DENTAL PREMIUM','dental-insight');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="dental_insight_img_responsive " src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">

            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; font-size:12px; text-decoration:underline; color:#333;"><?php esc_html_e('DENTAL PREMIUM - Features', 'dental-insight'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'dental-insight');?> </li>
                   	<li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'dental-insight');?> </li>
                   	<li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'dental-insight');?> </li>
                   	<li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'dental-insight');?> </li>
                   	<li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'dental-insight');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( DENTAL_INSIGHT_BUNDLE_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('WP Theme Bundle (120+ Themes)','dental-insight');?> </a>
		    </div>
        </label>
    <?php } }
endif;
