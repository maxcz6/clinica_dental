<?php
/**
 * The header for our theme
 *
 * @subpackage Dental Insight
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dental-insight' ); ?></a>
	<?php if( get_option('dental_insight_theme_loader',true) != 'off'){ ?>
		<?php $dental_insight_loader_option = get_theme_mod( 'dental_insight_loader_style','style_one');
		if($dental_insight_loader_option == 'style_one'){ ?>
			<div id="preloader" class="circle">
				<div id="loader"></div>
			</div>
		<?php }
		else if($dental_insight_loader_option == 'style_two'){ ?>
			<div id="preloader">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		<?php }?>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<?php if( get_option('dental_insight_topbar_enable',false) != 'off'){ ?>
				<div class="wrap_figure wow slideInDown">
					<div class="top_bar py-2 text-center text-lg-start text-md-start">
						<div class="container">
							<div class="row">
								<div class="col-lg-7 col-md-9 top-links">
									<?php if( get_theme_mod('dental_insight_find_us_url') != '' || get_theme_mod('dental_insight_find_us') != '' ){ ?>
										<a href="<?php echo esc_url(get_theme_mod('dental_insight_find_us_url','')); ?>"><?php echo esc_html(get_theme_mod('dental_insight_find_us','')); ?></a>
									<?php }?>
									<?php if( get_theme_mod('dental_insight_feedback_url') != '' || get_theme_mod('dental_insight_feedback') != '' ){ ?>
									 <a href="<?php echo esc_url(get_theme_mod('dental_insight_feedback_url','')); ?>"><?php echo esc_html(get_theme_mod('dental_insight_feedback','')); ?></a>
									<?php }?>
									<?php if( get_theme_mod('dental_insight_email') != ''){ ?>
										<span class="ms-sm-5"><i class="<?php echo esc_html(get_theme_mod('dental_insight_email_icon','')); ?> me-2"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('dental_insight_email', '')); ?>"><?php echo esc_html(get_theme_mod('dental_insight_email', '')); ?></a></span>
									<?php }?>
								</div>
								<?php if (get_option('dental_insight_social_enable',false) !='off') { ?>
								<div class="col-lg-5 col-md-3">
									<?php
							            $dental_insight_header_twt_target = esc_attr(get_option('dental_insight_header_twt_target','true'));
							            $dental_insight_header_linkedin_target = esc_attr(get_option('dental_insight_header_linkedin_target','true'));
							            $dental_insight_header_youtube_target = esc_attr(get_option('dental_insight_header_youtube_target','true'));
							            $dental_insight_header_instagram_target = esc_attr(get_option('dental_insight_header_instagram_target','true'));
							        ?>
									<div class="links text-center text-lg-end text-md-end">
										 <?php if( get_theme_mod('dental_insight_twitter') != ''){ ?>
							            <a target="<?php echo $dental_insight_header_twt_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('dental_insight_twitter','')); ?>">
							              <i class="<?php echo esc_attr(get_theme_mod('dental_insight_twitter_icon','fab fa-x-twitter')); ?>"></i>
							            </a>
							          <?php }?>
							          <?php if( get_theme_mod('dental_insight_linkedin') != ''){ ?>
							            <a target="<?php echo $dental_insight_header_linkedin_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('dental_insight_linkedin','')); ?>">
							              <i class="<?php echo esc_attr(get_theme_mod('dental_insight_linkedin_icon','fab fa-linkedin-in')); ?>"></i>
							            </a>
							          <?php }?>
							          <?php if( get_theme_mod('dental_insight_youtube') != ''){ ?>
							            <a target="<?php echo $dental_insight_header_youtube_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('dental_insight_youtube','')); ?>">
							              <i class="<?php echo esc_attr(get_theme_mod('dental_insight_youtube_icon','fab fa-youtube')); ?>"></i>
							            </a>
							          <?php }?>
							          <?php if( get_theme_mod('dental_insight_instagram') != ''){ ?>
							            <a target="<?php echo $dental_insight_header_instagram_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('dental_insight_instagram','')); ?>">
							              <i class="<?php echo esc_attr(get_theme_mod('dental_insight_instagram_icon','fab fa-instagram')); ?>"></i>
							            </a>
							          <?php }?>
									</div>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
			<div class="menu_header py-3">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-5 col-7 box-center">
							<div class="logo">
						        <?php if ( has_custom_logo() ) : ?>
				            		<?php the_custom_logo(); ?>
					            <?php endif; ?>
				              	<?php $dental_insight_blog_info = get_bloginfo( 'name' ); ?>
						                <?php if ( ! empty( $dental_insight_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
												<?php if( get_option( 'dental_insight_logo_title',false) != 'off' ){ ?>
					                    			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
												<?php }?>
						                  	<?php else : ?>
												<?php if( get_option( 'dental_insight_logo_title',false) != 'off' ){ ?>
					                      			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
											<?php }?>
					                  		<?php endif; ?>
						                <?php endif; ?>

					                <?php
				                  		$dental_insight_description = get_bloginfo( 'description', 'display' );
					                  	if ( $dental_insight_description || is_customize_preview() ) :
					                ?>
					                <?php if( get_option( 'dental_insight_logo_text',true) != 'off' ){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($dental_insight_description); ?>
					                  	</p>
					                 <?php }?>
				              	<?php endif; ?>
						    </div>
						</div>
						<div class="col-lg-7 col-md-5 col-2 box-center">
								<div class="toggle-menu gb_menu text-center">
									<button onclick="dental_insight_gb_Menu_open()" class="gb_toggle"><i class="<?php echo esc_attr(get_theme_mod('dental_insight_menu_icon','fas fa-bars')); ?>"></i></button>
								</div>
			   				<?php get_template_part('template-parts/navigation/navigation'); ?>
						</div>
						<div class="col-lg-1 col-md-2 col-3 align-self-center">
							<div class="header-search">
	          					<div class="header-search-wrapper">
					                <span class="search-main">
					                    <i class="search-icon fas fa-search"></i>
					                </span>
					                <span class="search-close-icon"><i class="fas fa-xmark"></i>
					                </span>
					                <div class="search-form-main clearfix">
					                  <?php get_search_form(); ?>
					                </div>
	          					</div>
	        				</div>
						</div>
					</div>
				</div>
			</div>
			<?php if( get_option('dental_insight_tob_header_show_hide',false) != 'off'){ ?>
				<div class="top_header py-3 wow slideInUp">
					<div class="container">
						<div class="row">
							<div class="col-sm-3">
								<?php if( get_theme_mod('dental_insight_call_text') != '' || get_theme_mod('dental_insight_call') != ''){ ?>
									<div class="info-box mb-lg-0 mb-md-0 mb-3">
										<i class="<?php echo esc_html(get_theme_mod('dental_insight_call_icon','')); ?> me-md-0 me-lg-3 text-center"></i>
										<strong><?php echo esc_html(get_theme_mod('dental_insight_call_text','')); ?></strong>
										<span class=" ms-md-0 ms-md-3"><a href="tel:<?php echo esc_attr(get_theme_mod('dental_insight_call', '')); ?>"><?php echo esc_html(get_theme_mod('dental_insight_call', '')); ?></a></span>
									</div>
								<?php }?>
							</div>
							<div class="col-sm-5">
								<?php if( get_theme_mod('dental_insight_timing_text') != '' || get_theme_mod('dental_insight_timing') != ''){ ?>
									<div class="info-box mb-lg-0 mb-md-0 mb-3">
										<i class="<?php echo esc_html(get_theme_mod('dental_insight_timing_icon','')); ?> me-md-0 me-lg-3 text-center"></i>
										<strong><?php echo esc_html(get_theme_mod('dental_insight_timing_text','')); ?></strong>
										<span class=" ms-md-0 ms-md-3"><?php echo esc_html(get_theme_mod('dental_insight_timing','')); ?></span>
									</div>
								<?php }?>
							</div>
							<div class="col-sm-4">
								<?php if( get_theme_mod('dental_insight_address_text') != '' || get_theme_mod('dental_insight_address') != ''){ ?>
									<div class="info-box mb-lg-0 mb-md-0 mb-3 text-md-end address-box">
										<i class="<?php echo esc_html(get_theme_mod('dental_insight_address_icon','')); ?> me-md-0 me-lg-3 text-center"></i>
										<strong><?php echo esc_html(get_theme_mod('dental_insight_address_text','')); ?></strong>
										<span class=" ms-md-0 ms-md-3"><a href="<?php echo esc_html(get_theme_mod('dental_insight_address_url')); ?>">
											<?php echo esc_html(get_theme_mod('dental_insight_address','')); ?>
										</a></span>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
