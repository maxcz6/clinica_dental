<?php
/**
 * Additional features to allow styling of the templates
 *
 * @subpackage Dental Insight
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dental_insight_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'dental-insight-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'dental-insight-front-page';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	// Add class for one or two column page layouts.
	if ( is_page() || is_archive() ) {
		if ( 'one-column' === get_theme_mod( 'page_layout' ) ) {
			$classes[] = 'page-one-column';
		} else {
			$classes[] = 'page-two-column';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'dental_insight_body_classes' );

function dental_insight_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Pagination for blog post.
 */
function dental_insight_render_blog_pagination() {
	$dental_insight_pagination_type = get_theme_mod( 'dental_insight_pagination_type', 'numbered' );
	if ($dental_insight_pagination_type == 'default') {
		the_posts_navigation(array(
            'prev_text'          => __( 'Previous page', 'dental-insight' ),
            'next_text'          => __( 'Next page', 'dental-insight' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'dental-insight' ) . ' </span>',
        ) );
	}
	else if($dental_insight_pagination_type == 'numbered'){
		the_posts_pagination( array(
            'prev_text'          => __( 'Previous page', 'dental-insight' ),
            'next_text'          => __( 'Next page', 'dental-insight' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'dental-insight' ) . ' </span>',
        ) );
	}
}
add_action( 'dental_insight_blog_pagination', 'dental_insight_render_blog_pagination', 10 );

/**
 * Pagination for single post.
 */
function dental_insight_render_single_post_pagination() {
	$dental_insight_single_post_pagination_type = get_theme_mod( 'dental_insight_single_post_pagination_type', 'default' );
	if ($dental_insight_single_post_pagination_type == 'default') {
		the_post_navigation( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'dental-insight' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'dental-insight' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'dental-insight' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'dental-insight' ) . '</span> ',
		) );
	}
	else if($dental_insight_single_post_pagination_type == 'post-name'){
		the_post_navigation( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'dental-insight' ) . '</span><span class="nav-title">%title</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'dental-insight' ) . '</span><span class="nav-title">%title</span>',
		) );
	}
}
add_action( 'dental_insight_single_post_pagination', 'dental_insight_render_single_post_pagination', 10 );