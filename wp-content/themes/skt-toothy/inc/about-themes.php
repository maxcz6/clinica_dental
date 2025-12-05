<?php
//about theme info
add_action( 'admin_menu', 'skt_toothy_abouttheme' );
function skt_toothy_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-toothy'), esc_html__('About Theme', 'skt-toothy'), 'edit_theme_options', 'skt_toothy_guide', 'skt_toothy_mostrar_guide');   
} 

//guidline for about theme
function skt_toothy_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_attr_e('About Theme Info', 'skt-toothy'); ?>
		   </div>
          <p><?php esc_html_e('SKT Toothy is a free simple dental WordPress theme which is responsive and can cater to medical, health care, hospital, dentists, clinics, lab, therapy, healing, pharma, nursing, dispensary and surgery websites. It can also be used for other multi purpose industries like business and corporate and is scalable. Compatible with qTranslate X and translation ready.','skt-toothy'); ?></p>
		  <a href="<?php echo esc_url(SKT_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo esc_url(SKT_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-toothy'); ?></a> | 
				<a href="<?php echo esc_url(SKT_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-toothy'); ?></a> | 
				<a href="<?php echo esc_url(SKT_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-toothy'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>