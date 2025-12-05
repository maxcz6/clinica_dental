<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Toothy
 */
get_header(); ?>

<?php
$hideslide = get_theme_mod('hide_slides', 1);
$hidewelcome = get_theme_mod('hide_welcomesection', 1);
$hidepagefourboxes = get_theme_mod('hide_pagefourboxes', 1);
?>
<?php if (!is_home() && is_front_page()) { ?>
<?php if( $hideslide == '') { ?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
	<?php if( get_theme_mod('page-setting'.$sld)) { ?>
     <?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
		<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
        $img_arr[] = $image;
        $id_arr[] = $post->ID;
        endwhile;
  	  }
	  wp_reset_postdata();
    }
?>
<?php if(!empty($id_arr)){ ?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php 
	$i=1;
	foreach($img_arr as $url){ ?>
      <img src="<?php echo esc_url($url); ?>" title="#slidecaption<?php echo esc_attr($i); ?>" />
      <?php $i++; }  ?>
    </div>
		<?php 
        $i=1;
        foreach($id_arr as $id){ // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
        $title = get_the_title( $id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
        $post = get_post($id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
        $content = esc_html(wp_trim_words( $post->post_content, 35, '' ) );
        ?>
    <div id="slidecaption<?php echo esc_attr($i); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo wp_kses_post($title); ?></h2>
        <p><?php echo wp_kses_post($content); ?></p>
        <div class="clear"></div>
        <a class="slide_more" href="<?php the_permalink(); ?>">
          <?php esc_html_e('Read More', 'skt-toothy');?>
          </a>
      </div>
    </div>
    <?php $i++; } ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } } ?>
<?php if (!is_home() && is_front_page()) { ?>
<?php if($hidewelcome == ''){ ?>
<section id="wrapfirst">
  <div class="container">
    <div class="welcomewrap">    
      <?php if( get_theme_mod('page-setting1')) { ?>
      <?php $queryvar = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); ?>
      <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?>
     
      <h2 class="section-title">
        <?php the_title(); ?>
      </h2>      
      <p><?php the_excerpt(); ?></p>      
      <div class="clear"></div>
      <?php endwhile; wp_reset_postdata(); } ?>
    </div> <!-- welcomewrap-->
    <div class="clear"></div>
  </div><!-- container -->
</section>
<div class="clear"></div>
<?php } ?>

<?php if( $hidepagefourboxes == '') { ?>
<section id="pagearea">
  <div class="container">   
      <?php for($p=1; $p<5; $p++) { ?>
      <?php if( get_theme_mod('page-column'.$p,false)) { ?>
      <?php $querypagefourboxes = new WP_query('page_id='.get_theme_mod('page-column'.$p,true)); ?>
      <?php while( $querypagefourboxes->have_posts() ) : $querypagefourboxes->the_post(); ?>
      <div class="fourbox <?php if($p % 4 == 0) { echo "last_column"; } ?>">
     	<a href="<?php echo esc_url( get_permalink() ); ?>">
		 <?php if( has_post_thumbnail() ) { ?>
			<div class="thumbbx"><?php the_post_thumbnail();?></div>
          <?php } else { ?>
           <div class="thumbbx"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img_404.jpg" alt="" /></div>
          <?php } ?>  
            <h3><?php the_title(); ?></h3>
        </a> 
		<?php the_excerpt(); ?>
      </div>
      <?php endwhile;
       wp_reset_postdata(); ?>
      <?php }} ?>
      <div class="clear"></div> 
  </div><!-- container -->
</section><!-- #pagearea -->
<div class="clear"></div>
<?php } } ?>

<div class="container">
     <div class="page_content">
        <section class="site-main">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-toothy' ),
							'next_text' => esc_html__( 'Next', 'skt-toothy' ),
						) );
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results');
                    
                    endif;
                    ?>
                    </div><!-- blog-post -->
             </section>
        <?php get_sidebar();?>     
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>