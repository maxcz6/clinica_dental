<?php
/**
 * Dental Insight: Customizer-home-page
 *
 * @subpackage Dental Insight
 * @since 1.0
 */
	
	//  Home Page Panel
	$wp_customize->add_panel( 'dental_insight_custompage_panel', array(
		'title' => esc_html__( 'Custom Page Settings', 'dental-insight' ),
		'priority' => 2,
	));
	// Top Header
    $wp_customize->add_section('dental_insight_top',array(
        'title' => __('Header Section', 'dental-insight'),        
        'priority' => 2,
        'panel' => 'dental_insight_custompage_panel',
    ) );
    $wp_customize->add_setting( 'dental_insight_section_contact_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_contact_heading', array(
		'label'       => esc_html__( 'Header Setting', 'dental-insight' ),			
		'section'     => 'dental_insight_top',
		'settings'    => 'dental_insight_section_contact_heading',
	) ) );
	$wp_customize->add_setting(
		'dental_insight_topbar_enable',
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
			'dental_insight_topbar_enable',
			array(
				'settings'        => 'dental_insight_topbar_enable',
				'section'         => 'dental_insight_top',
				'label'           => __( 'Check to show top bar', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
    $wp_customize->add_setting('dental_insight_find_us',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_find_us',array(
		'label' => esc_html__('Add Text','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_find_us',
		'type'    => 'text',
	));
	$wp_customize->add_setting('dental_insight_find_us_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_find_us_url',array(
		'label' => esc_html__('Add URL','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_find_us_url',
		'type'    => 'url',
	));
    $wp_customize->add_setting('dental_insight_feedback',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_feedback',array(
		'label' => esc_html__('Add Text 1','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_feedback',
		'type'    => 'text',
	));
	$wp_customize->add_setting('dental_insight_feedback_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_feedback_url',array(
		'label' => esc_html__('Add URL 1','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_feedback_url',
		'type'    => 'url',
	));
	$wp_customize->add_setting('dental_insight_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('dental_insight_email',array(
		'label' => esc_html__('Add Email Address','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_email',
		'type'    => 'text',
	));
	$wp_customize->add_setting('dental_insight_email_icon',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_email_icon',array(
		'label'	=> __('Add Email Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_top',
		'setting'	=> 'dental_insight_email_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting(
		'dental_insight_tob_header_show_hide',
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
			'dental_insight_tob_header_show_hide',
			array(
				'settings'        => 'dental_insight_tob_header_show_hide',
				'section'         => 'dental_insight_top',
				'label'           => __( 'Check to show contact bar', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('dental_insight_call_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_call_text',array(
		'label' => esc_html__('Add Text','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_call_text',
		'type'    => 'text',
	));
	$wp_customize->add_setting('dental_insight_call',array(
		'default' => '',
		'sanitize_callback' => 'dental_insight_sanitize_phone_number'
	));
	$wp_customize->add_control('dental_insight_call',array(
		'label' => esc_html__('Add Phone Number','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_call',
		'type'    => 'text',
	));
	$wp_customize->add_setting('dental_insight_call_icon',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_call_icon',array(
		'label'	=> __('Add  call Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_top',
		'setting'	=> 'dental_insight_call_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_timing_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_timing_text',array(
		'label' => esc_html__('Add Text','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_timing_text',
		'type'    => 'text',
	));
	$wp_customize->add_setting('dental_insight_timing',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_timing',array(
		'label' => esc_html__('Add Timing','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_timing',
		'type'    => 'text',
	));
	$wp_customize->add_setting('dental_insight_timing_icon',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_timing_icon',array(
		'label'	=> __('Add  Clock Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_top',
		'setting'	=> 'dental_insight_timing_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_address_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_address_text',array(
		'label' => esc_html__('Add Text','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_address_text',
		'type'    => 'text',
	));
	$wp_customize->add_setting('dental_insight_address_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_address_url',array(
		'label' => esc_html__('Add Map URL','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_address_url',
		'type'    => 'url'
	));
	$wp_customize->add_setting('dental_insight_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_address',array(
		'label' => esc_html__('Add Address','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_address',
		'type'    => 'text',
	));
	$wp_customize->add_setting('dental_insight_address_icon',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_address_icon',array(
		'label'	=> __('Add Address Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_top',
		'setting'	=> 'dental_insight_address_icon',
		'type'		=> 'icon'
	)));

	// Social Media
    $wp_customize->add_section('dental_insight_urls',array(
        'title' => __('Social Media', 'dental-insight'),        
        'priority' => 3,
        'panel' => 'dental_insight_custompage_panel',
    ) );
    $wp_customize->add_setting( 'dental_insight_section_social_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_social_heading', array(
		'label'       => esc_html__( 'Social Media Setting', 'dental-insight' ),
		'description' => __( 'Add social media links in the below feilds', 'dental-insight' ),			
		'section'     => 'dental_insight_urls',
		'settings'    => 'dental_insight_section_social_heading',
	) ) );
	$wp_customize->add_setting(
		'dental_insight_social_enable',
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
			'dental_insight_social_enable',
			array(
				'settings'        => 'dental_insight_social_enable',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Check to show social fields', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'dental_insight_section_twitter_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_twitter_heading', array(
		'label'       => esc_html__( 'Twitter Setting', 'dental-insight' ),		
		'section'     => 'dental_insight_urls',
		'settings'    => 'dental_insight_section_twitter_heading',
	) ) );
	$wp_customize->add_setting('dental_insight_twitter_icon',array(
		'default'	=> 'fab fa-x-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_twitter_icon',array(
		'label'	=> __('Add Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_urls',
		'setting'	=> 'dental_insight_twitter_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_twitter',array(
		'label' => esc_html__('Add URL','dental-insight'),
		'section' => 'dental_insight_urls',
		'setting' => 'dental_insight_twitter',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'dental_insight_header_twt_target',
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
			'dental_insight_header_twt_target',
			array(
				'settings'        => 'dental_insight_header_twt_target',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Open link in a new tab', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'dental_insight_section_linkedin_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_linkedin_heading', array(
		'label'       => esc_html__( 'Linkedin Setting', 'dental-insight' ),			
		'section'     => 'dental_insight_urls',
		'settings'    => 'dental_insight_section_linkedin_heading',
	) ) );
	$wp_customize->add_setting('dental_insight_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_linkedin_icon',array(
		'label'	=> __('Add Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_urls',
		'setting'	=> 'dental_insight_linkedin_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_linkedin',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_linkedin',array(
		'label' => esc_html__('Add URL','dental-insight'),
		'section' => 'dental_insight_urls',
		'setting' => 'dental_insight_linkedin',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'dental_insight_header_linkedin_target',
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
			'dental_insight_header_linkedin_target',
			array(
				'settings'        => 'dental_insight_header_linkedin_target',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Open link in a new tab', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'dental_insight_section_youtube_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_youtube_heading', array(
		'label'       => esc_html__( 'Youtube Setting', 'dental-insight' ),	
		'section'     => 'dental_insight_urls',
		'settings'    => 'dental_insight_section_youtube_heading',
	) ) );
	$wp_customize->add_setting('dental_insight_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_youtube_icon',array(
		'label'	=> __('Add Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_urls',
		'setting'	=> 'dental_insight_youtube_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_youtube',array(
		'label' => esc_html__('Add URL','dental-insight'),
		'section' => 'dental_insight_urls',
		'setting' => 'dental_insight_youtube',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'dental_insight_header_youtube_target',
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
			'dental_insight_header_youtube_target',
			array(
				'settings'        => 'dental_insight_header_youtube_target',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Open link in a new tab', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'dental_insight_section_instagram_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_instagram_heading', array(
		'label'       => esc_html__( 'Instagram Setting', 'dental-insight' ),	
		'section'     => 'dental_insight_urls',
		'settings'    => 'dental_insight_section_instagram_heading',
	) ) );
	$wp_customize->add_setting('dental_insight_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_instagram_icon',array(
		'label'	=> __('Add Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_urls',
		'setting'	=> 'dental_insight_instagram_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_instagram',array(
		'label' => esc_html__('Add URL','dental-insight'),
		'section' => 'dental_insight_urls',
		'setting' => 'dental_insight_instagram',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'dental_insight_header_instagram_target',
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
			'dental_insight_header_instagram_target',
			array(
				'settings'        => 'dental_insight_header_instagram_target',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Open link in a new tab', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'dental_insight_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'dental-insight' ),    	
		'priority'   => 4,
		'panel' => 'dental_insight_custompage_panel',
	) );
	$wp_customize->add_setting( 'dental_insight_section_slide_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Setting', 'dental-insight' ),
		'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'dental-insight' ),		
		'section'     => 'dental_insight_slider_section',
		'settings'    => 'dental_insight_section_slide_heading',
		'priority'   => 1,
	) ) );
	$wp_customize->add_setting(
		'dental_insight_slider_arrows',
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
			'dental_insight_slider_arrows',
			array(
				'settings'        => 'dental_insight_slider_arrows',
				'section'         => 'dental_insight_slider_section',
				'label'           => __( 'Check To show Slider', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
				'priority'   => 1,
			)
		)
	);

	$wp_customize->add_setting('dental_insight_slider_count',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_slider_count',array(
		'label'	=> esc_html__('Slider Count','dental-insight'),
		'section'	=> 'dental_insight_slider_section',
		'description' => __( 'After increasing/decreasing counter refresh site for changes to be applied.', 'dental-insight' ),
		'type'		=> 'number',
		'priority'   => 1,
	));

	$dental_insight_slider_count = get_theme_mod('dental_insight_slider_count');

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst_sls[]= __('Select','dental-insight');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= $dental_insight_slider_count; $i++ ) {
		$wp_customize->add_setting('dental_insight_post_setting'.$i,array(
			'sanitize_callback' => 'dental_insight_sanitize_select',
		));
		$wp_customize->add_control('dental_insight_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','dental-insight'),
			'section' => 'dental_insight_slider_section',
			'priority'   => 1,
		));
		$wp_customize->selective_refresh->add_partial( 'dental_insight_post_setting'.$i, array(
			'selector' => '.carousel-control-prev',
			'render_callback' => 'dental_insight_customize_partial_dental_insight_post_setting'.$i,
		) );
	}
	wp_reset_postdata();

	$wp_customize->add_setting('dental_insight_slider_heading_color', array(
	    'default' => '#02314f',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_slider_heading_color', array(
	    'section' => 'dental_insight_slider_section',
	    'label' => esc_html__('Slider Title Color', 'dental-insight'),
	 	'priority'    => 2,
	)));

	$wp_customize->add_setting(
		'dental_insight_slider_excerpt_show_hide',
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
			'dental_insight_slider_excerpt_show_hide',
			array(
				'settings'        => 'dental_insight_slider_excerpt_show_hide',
				'section'         => 'dental_insight_slider_section',
				'label'           => __( 'Show Hide excerpt', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'priority'    => 3,
			)
		)
	);
	$wp_customize->add_setting('dental_insight_slider_excerpt_count',array(
		'default'=> 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'dental_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Dental_Insight_Slider_Custom_Control( $wp_customize, 'dental_insight_slider_excerpt_count',array(
		'label' => esc_html__( 'Excerpt Limit','dental-insight' ),
		'section'=> 'dental_insight_slider_section',
		'settings'=>'dental_insight_slider_excerpt_count',
		'input_attrs' => array(
			'reset'			   => 20,
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'priority'    => 3,
	)));
	$wp_customize->add_setting('dental_insight_slider_excerpt_color', array(
	    'default' => '#02314f',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_slider_excerpt_color', array(
	    'section' => 'dental_insight_slider_section',
	    'label' => esc_html__('Slider Excerpt Color', 'dental-insight'),
	 	'priority'    => 4,
	)));
	$wp_customize->add_setting(
		'dental_insight_slider_button_show_hide',
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
			'dental_insight_slider_button_show_hide',
			array(
				'settings'        => 'dental_insight_slider_button_show_hide',
				'section'         => 'dental_insight_slider_section',
				'label'           => __( 'Show Hide Button', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'priority'    => 5,
			)
		)
	);
	$wp_customize->add_setting('dental_insight_slider_read_more',array(
		'default' => 'Make an Appointment',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('dental_insight_slider_read_more',array(
		'label' => esc_html__('Button Text','dental-insight'),
		'section' => 'dental_insight_slider_section',
		'setting' => 'dental_insight_slider_read_more',
		'type'    => 'text',
		'priority'    => 5,
	));

	$wp_customize->add_setting('dental_insight_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_slider_content_alignment',array(
		'type' => 'radio',
		'label'     => __('Slider Content Alignment', 'dental-insight'),
		'section' => 'dental_insight_slider_section',
		'type' => 'select',
		'choices' => array(
			'LEFT-ALIGN' => __('LEFT','dental-insight'),
            'CENTER-ALIGN' => __('CENTER','dental-insight'),
            'RIGHT-ALIGN' => __('RIGHT','dental-insight'),
		),
		'priority'    => 6,
	) );

	$wp_customize->add_setting('dental_insight_slider_overlay', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dental_insight_slider_overlay', array(
	    'section' => 'dental_insight_slider_section',
	    'label' => esc_html__('Slider Overlay Color', 'dental-insight'),
	 	'priority'    => 7,
	)));

	$wp_customize->add_setting('dental_insight_slider_opacity',array(
        'default' => '0.8',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_slider_opacity',array(
		'type' => 'radio',
		'label'     => __('Slider Opacity', 'dental-insight'),
		'section' => 'dental_insight_slider_section',
		'type' => 'select',
		'choices' => array(
			'0' => __('0','dental-insight'),
			'0.1' => __('0.1','dental-insight'),
			'0.2' => __('0.2','dental-insight'),
			'0.3' => __('0.3','dental-insight'),
			'0.4' => __('0.4','dental-insight'),
			'0.5' => __('0.5','dental-insight'),
			'0.6' => __('0.6','dental-insight'),
			'0.7' => __('0.7','dental-insight'),
			'0.8' => __('0.8','dental-insight'),
			'0.9' => __('0.9','dental-insight'),
			'1' => __('1','dental-insight')
		),
	) );

	// Services Section
	$wp_customize->add_section( 'dental_insight_service_box_section' , array(
    	'title'      => __( 'Services Settings', 'dental-insight' ),
		'priority'   => 5,
		'panel' => 'dental_insight_custompage_panel',
	) );
	$wp_customize->add_setting( 'dental_insight_section_service_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_service_heading', array(
		'label'       => esc_html__( 'Services Settings', 'dental-insight' ),	
		'section'     => 'dental_insight_service_box_section',
		'settings'    => 'dental_insight_section_service_heading',
		'priority'   => 1,
	) ) );
	$wp_customize->add_setting(
		'dental_insight_services_enable',
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
			'dental_insight_services_enable',
			array(
				'settings'        => 'dental_insight_services_enable',
				'section'         => 'dental_insight_service_box_section',
				'label'           => __( 'Check to show services settings', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('dental_insight_services_section_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_services_section_title',array(
		'label' => esc_html__('Section Title','dental-insight'),
		'section' => 'dental_insight_service_box_section',
		'setting' => 'dental_insight_services_section_title',
		'type'    => 'text',
	));

	$wp_customize->selective_refresh->add_partial( 'dental_insight_services_section_title', array(
		'selector' => '#services-box h3',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_services_section_title',
	) );


	$wp_customize->add_setting('dental_insight_category_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('dental_insight_category_number',array(
		'label'	=> __('Number of posts to show in a category','dental-insight'),
		'section' => 'dental_insight_service_box_section',
		'type'	  => 'number',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('dental_insight_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'dental_insight_sanitize_select',
	));
	$wp_customize->add_control('dental_insight_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_pst,
		'label' => esc_html__('Select Category to display Post','dental-insight'),
		'section' => 'dental_insight_service_box_section',
	));

	$dental_insight_category_number = get_theme_mod('dental_insight_category_number','');
	for ($i=1; $i <= $dental_insight_category_number; $i++) {
	    
	    $wp_customize->add_setting('dental_insight_service_icon'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
	        $wp_customize,'dental_insight_service_icon'.$i,array(
			'label'	=> __('Icon','dental-insight').$i,
			'transport' => 'refresh',
			'section'	=> 'dental_insight_service_box_section',
			'setting'	=> 'dental_insight_service_icon',
			'type'		=> 'icon',
		)));
	}
	//Footer
    $wp_customize->add_section( 'dental_insight_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'dental-insight' ),
    	'priority' => 6,
    	'panel' => 'dental_insight_custompage_panel',
	) );
	$wp_customize->add_setting( 'dental_insight_section_footer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'dental_insight_section_footer_heading', array(
		'label'       => esc_html__( 'Footer Setting', 'dental-insight' ),		
		'section'     => 'dental_insight_footer_copyright',
		'settings'    => 'dental_insight_section_footer_heading',
		'priority' => 1,
	) ) );
    $wp_customize->add_setting('dental_insight_footer_text',array(
		'default'	=> 'Dental WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_footer_text',array(
		'label'	=> esc_html__('Copyright Text','dental-insight'),
		'section'	=> 'dental_insight_footer_copyright',
		'type'		=> 'textarea'
	));
	$wp_customize->selective_refresh->add_partial( 'dental_insight_footer_text', array(
		'selector' => '.site-info a',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_footer_text',
	) );
	$wp_customize->add_setting('dental_insight_footer_content_alignment',array(
        'default' => 'CENTER-ALIGN',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_footer_content_alignment',array(
		'type' => 'radio',
		'label'     => __('Footer Content Alignment', 'dental-insight'),
		'section' => 'dental_insight_footer_copyright',
		'type' => 'select',
		'choices' => array(
			'LEFT-ALIGN' => __('LEFT','dental-insight'),
            'CENTER-ALIGN' => __('CENTER','dental-insight'),
            'RIGHT-ALIGN' => __('RIGHT','dental-insight'),
		),
	) );

	$wp_customize->add_setting(
		'dental_insight_footer_widgets_show_hide',
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
			'dental_insight_footer_widgets_show_hide',
			array(
				'settings'        => 'dental_insight_footer_widgets_show_hide',
				'section'         => 'dental_insight_footer_copyright',
				'label'           => __( 'Check To show Footer Widgets', 'dental-insight' ),
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_footer_widget',array(
        'default' => '4',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_footer_widget',array(
		'type' => 'radio',
		'label'     => __('Footer Per Column', 'dental-insight'),
		'section' => 'dental_insight_footer_copyright',
		'type' => 'select',
		'choices' => array(
			'1' => __('1','dental-insight'),
            '2' => __('2','dental-insight'),
            '3' => __('3','dental-insight'),
            '4' => __('4','dental-insight'),
		)
	) );
	