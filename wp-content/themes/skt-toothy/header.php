<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Toothy
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="header">
  <div class="container">
    <div class="logo">
		<?php skt_toothy_the_custom_logo(); ?>
        <div class="clear"></div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo( 'description' ); ?></p>                          
        </a>
    </div>
     <!-- logo -->

<div class="widget-right">
	 <?php if ( ! dynamic_sidebar( 'header-right-widget' ) ) : ?>
        <?php
			$appointment_text = get_theme_mod('appointment_text'); 
			$appointment_link = get_theme_mod('appointment_link');
		?>
        <?php if (!empty($appointment_link) || !empty($appointment_text)) { ?>
          <div class="getaquote">
             <a href="<?php echo esc_url($appointment_link); ?>"><?php echo esc_html($appointment_text); ?></a>
          </div>
        <?php } ?>
        
       <div class="header-social-icons">      
        <?php $contact_no = get_theme_mod('contact_no'); ?>  
        <?php if(!empty($contact_no)){?>     
          <span class="phoneno"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-phone.png" alt="" /> 
          <?php echo esc_html($contact_no); ?></span>
        <?php } ?> 
        
		<?php 
		$fb_link = get_theme_mod('fb_link'); 
		if (!empty($fb_link)) { ?>
        <a title="facebook" class="fb" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a> 
        <?php } ?>       
        
        <?php
		$twitt_link = get_theme_mod('twitt_link');
		if (!empty($twitt_link)) { ?>
        <a title="twitter" class="tw" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
        <?php } ?>     
        
        <?php
		$insta_link = get_theme_mod('insta_link');
		if (!empty($insta_link)) { ?>
        <a title="instagram" class="gp" target="_blank" href="<?php echo esc_url($insta_link); ?>"></a>
        <?php } ?>        
        
        <?php
		$linked_link = get_theme_mod('linked_link');
		 if (!empty($linked_link)) { ?> 
        <a title="linkedin" class="in" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
        <?php } ?>                   
      </div>            
    <?php endif; // end sidebar widget area ?>	
</div><!--.widget-right-->
 <div class="clear"></div>
         
  </div> <!-- container -->
  
  <div id="menubar">
    <div class="container menuwrapper">
         <div class="toggle"><a class="toggleMenu" href="#" style="display:none;"><?php esc_html_e('Menu','skt-toothy'); ?></a></div> 
        <div class="sitenav">
          <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>         
        </div><!-- .sitenav--> 
        <div class="clear"></div> 
      </div> <!-- container -->    
   </div> <!-- #menubar -->    
  
</div><!--.header -->