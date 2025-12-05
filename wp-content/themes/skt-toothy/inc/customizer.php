<?php
/**
 * SKT Toothy Theme Customizer
 *
 * @package SKT Toothy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_toothy_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class skt_toothy_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#f08b08',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','skt-toothy'),			
			 'description'	=> esc_html__('More color options in PRO Version','skt-toothy'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	
	// Slider Section		
	$wp_customize->add_section( 'slider_section', array(
            'title' => esc_html__('Slider Settings', 'skt-toothy'),
            'priority' => null,
            'description'	=> esc_html__('Featured Image Size Should be ( 1400x591 ) More slider settings available in PRO Version','skt-toothy'),		
        )
    );
	
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_toothy_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide one:','skt-toothy'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',			
			'sanitize_callback'	=> 'skt_toothy_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide two:','skt-toothy'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_toothy_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide three:','skt-toothy'),
			'section'	=> 'slider_section'
	));	
	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'skt_toothy_sanitize_checkbox',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_slides', array(
    	   'section'   => 'slider_section',    	 
		   'label'	=> esc_html__('Uncheck To Show Slider','skt-toothy'),
    	   'type'      => 'checkbox'
     )); // Slider Section	
	 
	// Home Welcome/Services Section 	
	$wp_customize->add_section('section_first',array(
		'title'	=> esc_html__('Homepage Services Section','skt-toothy'),
		'description'	=> esc_html__('Select Page from the dropdown for first section','skt-toothy'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_toothy_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-setting1',array('type' => 'dropdown-pages',
			'section' => 'section_first',
	));
	
	//Hide Welcome Section
	$wp_customize->add_setting('hide_welcomesection',array(
			'sanitize_callback' => 'skt_toothy_sanitize_checkbox',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_welcomesection', array(
    	   'section'   => 'section_first',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-toothy'),
    	   'type'      => 'checkbox'
     )); // Welcome Section	
	
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> esc_html__('Homepage Four Boxes Section','skt-toothy'),
		'description'	=> esc_html__('Select Pages from the dropdown for homepage four boxes section','skt-toothy'),
		'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_toothy_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_toothy_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_toothy_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column4',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_toothy_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column4',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));	//end three column part
	
	//Hide Page Boxes Column Section
	$wp_customize->add_setting('hide_pagefourboxes',array(
			'sanitize_callback' => 'skt_toothy_sanitize_checkbox',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_pagefourboxes', array(
    	   'section'   => 'section_second',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-toothy'),
    	   'type'      => 'checkbox'
     )); // Hide Page Boxes Column Section
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> esc_html__('Social Settings','skt-toothy'),				
			'description'	=> esc_html__('More social icon available in PRO Version','skt-toothy'),		
			'priority'		=> null
	));
	
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> esc_html__('Add facebook link here','skt-toothy'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> esc_html__('Add twitter link here','skt-toothy'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('insta_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('insta_link',array(
			'label'	=> esc_html__('Add instagram link here','skt-toothy'),
			'section'	=> 'social_sec',
			'setting'	=> 'insta_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> esc_html__('Add linkedin link here','skt-toothy'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	$wp_customize->add_section('footer_area',array(
			'title'	=> esc_html__('Footer Area','skt-toothy'),
			'priority'	=> null,
	));
	$wp_customize->add_setting('skt_toothy_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_toothy_Info( $wp_customize, 'cred_section', array(
        'section' => 'footer_area',
        'settings' => 'skt_toothy_options[credit-info]'
        ) )
    );
	
	$wp_customize->add_setting('newsfeed_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('newsfeed_title',array(
			'label'	=> esc_html__('Add title for latest news feed','skt-toothy'),
			'section'	=> 'footer_area',
			'setting'	=> 'newsfeed_title'
	));	
	
	$wp_customize->add_setting('about_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> esc_html__('Add title for about us','skt-toothy'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));	
		
	$wp_customize->add_setting( 'about_description', array(
			'default'	=> null,				
			'sanitize_callback' => 'esc_textarea',
	) );

	$wp_customize->add_control( 'about_description', array(
			'type' => 'textarea',
			'label' => esc_html__( 'About Description', 'skt-toothy' ),   
			'section' => 'footer_area',   
			'setting'	=> 'about_description',
	) );
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> esc_html__('Add title for footer contact info','skt-toothy'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));
	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> esc_html__('Contact Details','skt-toothy'),
			'description'	=> esc_html__('Add you contact details here','skt-toothy'),
			'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_textarea',
	));
	
	$wp_customize->add_control(	'contact_add', array(
				'type' => 'textarea',
				'label'	=> esc_html__('Add contact address here','skt-toothy'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
	));
	$wp_customize->add_setting('contact_no',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> esc_html__('Add contact number here.','skt-toothy'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> esc_html__('Add you email here','skt-toothy'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));
	
	$wp_customize->add_setting('appointment_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_text',array(
			'label'	=> esc_html__('Add text for button on header','skt-toothy'),
			'section'	=> 'contact_sec',
			'setting'	=> 'appointment_text'
	));	
	
	
	
	$wp_customize->add_setting('appointment_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('appointment_link',array(
			'label'	=> esc_html__('Add link for button on header','skt-toothy'),
			'section'	=> 'contact_sec',
			'setting'	=> 'appointment_link'
	));
	
	 
    $wp_customize->add_setting('skt_toothy_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_toothy_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'skt_toothy_options[layout-info]',
        'priority' => null
        ) )
    );
	  
    $wp_customize->add_setting('skt_toothy_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_toothy_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'skt_toothy_options[font-info]',
        'priority' => null
        ) )
    );	
	  
    $wp_customize->add_setting('skt_toothy_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_toothy_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'skt_toothy_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'skt_toothy_customize_register' );

//Integer
function skt_toothy_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function skt_toothy_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function skt_toothy_custom_css(){
		$header_text_color = get_header_textcolor();
		?>
        	<style type="text/css"> 					
 
					#sidebar ul li a:hover,
					.fourbox:hover h3,
					.cols-3 ul li a:hover, .cols-3 ul li.current_page_item a,					
					.phone-no strong,					
					.left a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.postmeta a:hover,
					.recent-post .morebtn:hover
					{ color:<?php echo esc_attr(get_theme_mod('color_scheme','#f08b08')); ?>;
					}
					
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.slide_info .slide_more:hover,							
					.nivo-controlNav a.active,				
					h3.widget-title,				
					.wpcf7 input[type='submit'],					
					.social-icons a:hover,
					a.ReadMore:hover,
					input.search-submit,
					.menuwrapper
					{ background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#f08b08')); ?> !important;}
					
						
					#menubar,
					h2.section-title::after,
					h2.section-title
					{ border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#f08b08')); ?>;}
					
					.getaquote a, .logo h1, .logo p, .phoneno{color: #<?php echo esc_attr( $header_text_color ); ?>;}
					
			</style> 
<?php     
} 

add_action('wp_head','skt_toothy_custom_css');	         

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_toothy_customize_preview_js() {
	wp_enqueue_script( 'skt_toothy_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_toothy_customize_preview_js' );