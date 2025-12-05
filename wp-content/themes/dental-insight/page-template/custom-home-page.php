<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('dental_insight_slider_arrows', false) !== 'off'){ ?>
    <section id="slider">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <?php $dental_insight_slider_count = get_theme_mod('dental_insight_slider_count'); ?>
              <?php
                for ( $i = 1; $i <= $dental_insight_slider_count; $i++ ) {
            $mod =  get_theme_mod( 'dental_insight_post_setting' . $i );
            if ( 'page-none-selected' != $mod ) {
              $dental_insight_slide_post[] = $mod;
            }
          }
           if( !empty($dental_insight_slide_post) ) :
          $args = array(
            'post_type' =>array('post'),
            'post__in' => $dental_insight_slide_post,
            'ignore_sticky_posts'  => true, // Exclude sticky posts by default
          );

          // Check if specific posts are selected
          if (empty($dental_insight_slide_post) && is_sticky()) {
              $args['post__in'] = get_option('sticky_posts');
          }

          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <?php }else{?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/header-img.png" alt="" />
            <?php } ?>
            <div class="carousel-caption slider-inner">
              <h2 class="slid-head"><?php the_title();?></h2>
              <?php if( get_option('dental_insight_slider_excerpt_show_hide',false) != 'off'){ ?>
                <p class="slider-excerpt mb-0"><?php echo wp_trim_words(get_the_content(), get_theme_mod('dental_insight_slider_excerpt_count',20) );?></p>
              <?php } ?>
              <div class="home-btn my-4">
                <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('dental_insight_slider_read_more',__('Make an Appointment','dental-insight'))); ?></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
          </a>
          <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>


  <?php if( get_option('dental_insight_services_enable', false) !== 'off'){ ?>
    <?php if( get_theme_mod('dental_insight_category_setting') != '' || get_theme_mod('dental_insight_services_section_title') != ''){ ?>
      <section id="services-box" class="py-5">
        <div class="container">
          <h3 class="text-center mb-5"><?php echo esc_html( get_theme_mod( 'dental_insight_services_section_title','') ); ?></h3>
          <div class="row">
            <?php $dental_insight_catData1 =  get_theme_mod('dental_insight_category_setting');
            if($dental_insight_catData1){ 
              $args = array(
              'post_type' => 'post',
              'category_name' => esc_html($dental_insight_catData1 ,'dental-insight'),
              'posts_per_page' => get_theme_mod('dental_insight_category_number')
                );
              $i=1; ?>
              <?php $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                while( $query->have_posts() ) : $query->the_post(); ?>
                  <div class="col-lg-4 col-md-4 wow zoomIn">
                    <div class="box mb-5 text-center p-3">
                      <div class="icon-box mb-3">
                        <i class="<?php echo esc_html(get_theme_mod('dental_insight_service_icon'.$i)); ?> mb-2"></i>
                      </div>
                      <a href="<?php the_permalink(); ?>"><h4><?php the_title();?></h4></a>
                      <p><?php echo esc_html(wp_trim_words(get_the_content(),'15') );?></p>
                      <div class="box-button my-4">
                        <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','dental-insight');?></a>
                      </div>
                    </div>
                  </div>
                <?php $i++; endwhile; 
                wp_reset_postdata(); ?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php endif; ?>
            <?php }?>
          </div>
        </div>
      </section>
    <?php }?>
  <?php }?>

  <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
