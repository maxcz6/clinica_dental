<?php 

	$dental_insight_custom_style= "";

// sticky header

if (false === get_option('dental_insight_sticky_header')) {
    add_option('dental_insight_sticky_header', 'off');
}

// Define the custom CSS based on the 'dental_insight_sticky_header' option

if (get_option('dental_insight_sticky_header', 'off') !== 'on') {
    $dental_insight_custom_style .= '.menu_header.fixed {';
    $dental_insight_custom_style .= 'position: static;';
    $dental_insight_custom_style .= '}';
}

if (get_option('dental_insight_sticky_header', 'off') !== 'off') {
    $dental_insight_custom_style .= '.menu_header.fixed {';
    $dental_insight_custom_style .= 'position: fixed; background: #fff; box-shadow: 0px 3px 10px 2px #eee;';
    $dental_insight_custom_style .= '}';

    $dental_insight_custom_style .= '.admin-bar .fixed {';
    $dental_insight_custom_style .= ' margin-top: 32px;';
    $dental_insight_custom_style .= '}';
}

// logo max height

$dental_insight_logo_max_height = get_theme_mod('dental_insight_logo_max_height','100');

if($dental_insight_logo_max_height != false){

$dental_insight_custom_style .='.custom-logo-link img{';

	$dental_insight_custom_style .='max-height: '.esc_html($dental_insight_logo_max_height).'px;';
	
$dental_insight_custom_style .='}';
}

// theme-Width 

$dental_insight_theme_width = get_theme_mod( 'dental_insight_width_options','full_width');

if($dental_insight_theme_width == 'full_width'){

$dental_insight_custom_style .='body{';

	$dental_insight_custom_style .='max-width: 100%;';

$dental_insight_custom_style .='}';

}else if($dental_insight_theme_width == 'container'){

$dental_insight_custom_style .='body{';

	$dental_insight_custom_style .='width: 100%; padding-right: 15px; padding-left: 15px;  margin-right: auto !important; margin-left: auto !important;';

$dental_insight_custom_style .='}';

$dental_insight_custom_style .='@media screen and (min-width: 601px){';

$dental_insight_custom_style .='body{';

    $dental_insight_custom_style .='max-width: 720px;';
    
$dental_insight_custom_style .='} }';

$dental_insight_custom_style .='@media screen and (min-width: 992px){';

$dental_insight_custom_style .='body{';

    $dental_insight_custom_style .='max-width: 960px;';
    
$dental_insight_custom_style .='} }';

$dental_insight_custom_style .='@media screen and (min-width: 1200px){';

$dental_insight_custom_style .='body{';

    $dental_insight_custom_style .='max-width: 1140px;';
    
$dental_insight_custom_style .='} }';

$dental_insight_custom_style .='@media screen and (min-width: 1400px){';

$dental_insight_custom_style .='body{';

    $dental_insight_custom_style .='max-width: 1320px;';
    
$dental_insight_custom_style .='} }';

$dental_insight_custom_style .='@media screen and (max-width:600px){';

$dental_insight_custom_style .='body{';

    $dental_insight_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$dental_insight_custom_style .='} }';

}else if($dental_insight_theme_width == 'container_fluid'){

$dental_insight_custom_style .='body{';

	$dental_insight_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$dental_insight_custom_style .='}';

$dental_insight_custom_style .='@media screen and (max-width:600px){';

$dental_insight_custom_style .='body{';

    $dental_insight_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$dental_insight_custom_style .='} }';
}


// Scroll-top-position 

$dental_insight_scroll_options = get_theme_mod( 'dental_insight_scroll_options','right_align');

if($dental_insight_scroll_options == 'right_align'){

$dental_insight_custom_style .='.scroll-top button{';

	$dental_insight_custom_style .='';

$dental_insight_custom_style .='}';

}else if($dental_insight_scroll_options == 'center_align'){

$dental_insight_custom_style .='.scroll-top button{';

	$dental_insight_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

$dental_insight_custom_style .='}';

}else if($dental_insight_scroll_options == 'left_align'){

$dental_insight_custom_style .='.scroll-top button{';

	$dental_insight_custom_style .='right: auto; left:5%; margin: 0 auto';

$dental_insight_custom_style .='}';
}

// text-transform

$dental_insight_text_transform = get_theme_mod( 'dental_insight_menu_text_transform','UPPERCASE');
if($dental_insight_text_transform == 'CAPITALISE'){

$dental_insight_custom_style .='nav#top_gb_menu ul li a{';

	$dental_insight_custom_style .='text-transform: capitalize ;';

$dental_insight_custom_style .='}';

}else if($dental_insight_text_transform == 'UPPERCASE'){

$dental_insight_custom_style .='nav#top_gb_menu ul li a{';

	$dental_insight_custom_style .='text-transform: uppercase ;';

$dental_insight_custom_style .='}';

}else if($dental_insight_text_transform == 'LOWERCASE'){

$dental_insight_custom_style .='nav#top_gb_menu ul li a{';

	$dental_insight_custom_style .='text-transform: lowercase ;';

$dental_insight_custom_style .='}';
}

// Slider-content-alignment

$dental_insight_slider_content_alignment = get_theme_mod( 'dental_insight_slider_content_alignment','LEFT-ALIGN');

if($dental_insight_slider_content_alignment == 'LEFT-ALIGN'){

$dental_insight_custom_style .='#slider .carousel-caption{';

	$dental_insight_custom_style .='text-align:left; right: 60%; left: 15%;';

$dental_insight_custom_style .='}';

$dental_insight_custom_style .='@media screen and (max-width:1199px){';

$dental_insight_custom_style .='#slider .carousel-caption{';

    $dental_insight_custom_style .='right: 40%; left: 15%';
    
$dental_insight_custom_style .='} }';

$dental_insight_custom_style .='@media screen and (max-width:991px){';

$dental_insight_custom_style .='#slider .carousel-caption{';

    $dental_insight_custom_style .='right: 30%; left: 15%';
    
$dental_insight_custom_style .='} }';


}else if($dental_insight_slider_content_alignment == 'CENTER-ALIGN'){

$dental_insight_custom_style .='#slider .carousel-caption{';

	$dental_insight_custom_style .='text-align:center; right: 15%; left: 15%;';

$dental_insight_custom_style .='}';


}else if($dental_insight_slider_content_alignment == 'RIGHT-ALIGN'){

$dental_insight_custom_style .='#slider .carousel-caption{';

	$dental_insight_custom_style .='text-align:right; right: 15%; left: 60%;';

$dental_insight_custom_style .='}';

$dental_insight_custom_style .='@media screen and (max-width:1199px){';

$dental_insight_custom_style .='#slider .carousel-caption{';

    $dental_insight_custom_style .='left: 40%; right: 15%';
    
$dental_insight_custom_style .='} }';

$dental_insight_custom_style .='@media screen and (max-width:991px){';

$dental_insight_custom_style .='#slider .carousel-caption{';

    $dental_insight_custom_style .='left: 30%; right: 15%';
    
$dental_insight_custom_style .='} }';

}
//related products
if( get_option( 'dental_insight_related_product',true) != 'on') {

$dental_insight_custom_style .='.related.products{';

	$dental_insight_custom_style .='display: none;';
	
$dental_insight_custom_style .='}';
}

if( get_option( 'dental_insight_related_product',true) != 'off') {

$dental_insight_custom_style .='.related.products{';

	$dental_insight_custom_style .='display: block;';
	
$dental_insight_custom_style .='}';
}
// footer text alignment
$dental_insight_footer_content_alignment = get_theme_mod( 'dental_insight_footer_content_alignment','CENTER-ALIGN');

if($dental_insight_footer_content_alignment == 'LEFT-ALIGN'){

$dental_insight_custom_style .='.site-info{';

	$dental_insight_custom_style .='text-align:left; padding-left: 30px;';

$dental_insight_custom_style .='}';

$dental_insight_custom_style .='.site-info a{';

	$dental_insight_custom_style .='padding-left: 30px;';

$dental_insight_custom_style .='}';


}else if($dental_insight_footer_content_alignment == 'CENTER-ALIGN'){

$dental_insight_custom_style .='.site-info{';

	$dental_insight_custom_style .='text-align:center;';

$dental_insight_custom_style .='}';


}else if($dental_insight_footer_content_alignment == 'RIGHT-ALIGN'){

$dental_insight_custom_style .='.site-info{';

	$dental_insight_custom_style .='text-align:right; padding-right: 30px;';

$dental_insight_custom_style .='}';

$dental_insight_custom_style .='.site-info a{';

	$dental_insight_custom_style .='padding-right: 30px;';

$dental_insight_custom_style .='}';

}

// slider button
$mobile_button_setting = get_option('dental_insight_slider_button_mobile_show_hide', '1');
$main_button_setting = get_option('dental_insight_slider_button_show_hide', '1');

$dental_insight_custom_style .= '#slider .home-btn {';

if ($main_button_setting == 'off') {
    $dental_insight_custom_style .= 'display: none;';
}

$dental_insight_custom_style .= '}';

// Add media query for mobile devices
$dental_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_button_setting == 'off' || $mobile_button_setting == 'off') {
    $dental_insight_custom_style .= '#slider .home-btn { display: none; }';
}
$dental_insight_custom_style .= '}';


// scroll button
$mobile_scroll_setting = get_option('dental_insight_scroll_enable_mobile', '1');
$main_scroll_setting = get_option('dental_insight_scroll_enable', '1');

$dental_insight_custom_style .= '.scrollup {';

if ($main_scroll_setting == 'off') {
    $dental_insight_custom_style .= 'display: none;';
}

$dental_insight_custom_style .= '}';

// Add media query for mobile devices
$dental_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_scroll_setting == 'off' || $mobile_scroll_setting == 'off') {
    $dental_insight_custom_style .= '.scrollup { display: none; }';
}
$dental_insight_custom_style .= '}';

// theme breadcrumb
$mobile_breadcrumb_setting = get_option('dental_insight_enable_breadcrumb_mobile', '1');
$main_breadcrumb_setting = get_option('dental_insight_enable_breadcrumb', '1');

$dental_insight_custom_style .= '.archieve_breadcrumb {';

if ($main_breadcrumb_setting == 'off') {
    $dental_insight_custom_style .= 'display: none;';
}

$dental_insight_custom_style .= '}';

// Add media query for mobile devices
$dental_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_breadcrumb_setting == 'off' || $mobile_breadcrumb_setting == 'off') {
    $dental_insight_custom_style .= '.archieve_breadcrumb { display: none; }';
}
$dental_insight_custom_style .= '}';

// single post and page breadcrumb
$mobile_single_breadcrumb_setting = get_option('dental_insight_single_enable_breadcrumb_mobile', '1');
$main_single_breadcrumb_setting = get_option('dental_insight_single_enable_breadcrumb', '1');

$dental_insight_custom_style .= '.single_breadcrumb {';

if ($main_single_breadcrumb_setting == 'off') {
    $dental_insight_custom_style .= 'display: none;';
}

$dental_insight_custom_style .= '}';

// Add media query for mobile devices
$dental_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_single_breadcrumb_setting == 'off' || $mobile_single_breadcrumb_setting == 'off') {
    $dental_insight_custom_style .= '.single_breadcrumb { display: none; }';
}
$dental_insight_custom_style .= '}';

// woocommerce breadcrumb
$mobile_woo_breadcrumb_setting = get_option('dental_insight_woocommerce_enable_breadcrumb_mobile', '1');
$main_woo_breadcrumb_setting = get_option('dental_insight_woocommerce_enable_breadcrumb', '1');

$dental_insight_custom_style .= '.woocommerce-breadcrumb {';

if ($main_woo_breadcrumb_setting == 'off') {
    $dental_insight_custom_style .= 'display: none;';
}

$dental_insight_custom_style .= '}';

// Add media query for mobile devices
$dental_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_woo_breadcrumb_setting == 'off' || $mobile_woo_breadcrumb_setting == 'off') {
    $dental_insight_custom_style .= '.woocommerce-breadcrumb { display: none; }';
}
$dental_insight_custom_style .= '}';

//colors
$color = get_theme_mod('dental_insight_primary_color', '#fe8086');
$color_header_bg = get_theme_mod('dental_insight_header_bg_color', '#f3f4f9');
$color_heading = get_theme_mod('dental_insight_heading_color', '#02314f');
$color_text = get_theme_mod('dental_insight_text_color', '#858d92');
$color_fade = get_theme_mod('dental_insight_primary_fade', '#fff4f5');
$color_footer_bg = get_theme_mod('dental_insight_footer_bg', '#02314f');
$color_post_bg = get_theme_mod('dental_insight_post_bg', '#ffffff');
$slider_overlay = get_theme_mod( 'dental_insight_slider_overlay','#ffffff');

$dental_insight_custom_style .= ":root {";
    $dental_insight_custom_style .= "--theme-primary-color: {$color};";
    $dental_insight_custom_style .= "--theme-header-bg: {$color_header_bg};";
    $dental_insight_custom_style .= "--theme-heading-color: {$color_heading};";
    $dental_insight_custom_style .= "--theme-text-color: {$color_text};";
    $dental_insight_custom_style .= "--theme-primary-fade: {$color_fade};";
    $dental_insight_custom_style .= "--theme-footer-color: {$color_footer_bg};";
    $dental_insight_custom_style .= "--post-bg-color: {$color_post_bg};";
    $dental_insight_custom_style .= "--slider-overlay: {$slider_overlay};";
$dental_insight_custom_style .= "}";

$dental_insight_slider_opacity = get_theme_mod( 'dental_insight_slider_opacity','0.8');

if($dental_insight_slider_opacity == '0'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0';
$dental_insight_custom_style .='}';

}else if($dental_insight_slider_opacity == '0.1'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0.1';
$dental_insight_custom_style .='}';

}else if($dental_insight_slider_opacity == '0.2'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0.2';
$dental_insight_custom_style .='}';

}else if($dental_insight_slider_opacity == '0.3'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0.3';
$dental_insight_custom_style .='}';

}else if($dental_insight_slider_opacity == '0.4'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0.4';
$dental_insight_custom_style .='}';

}else if($dental_insight_slider_opacity == '0.5'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0.5';
$dental_insight_custom_style .='}';

}else if($dental_insight_slider_opacity == '0.6'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0.6';
$dental_insight_custom_style .='}';

}else if($dental_insight_slider_opacity == '0.7'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0.7';
$dental_insight_custom_style .='}';

}else if($dental_insight_slider_opacity == '0.8'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0.8';
$dental_insight_custom_style .='}';

}
else if($dental_insight_slider_opacity == '0.9'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 0.9';
$dental_insight_custom_style .='}';

}
else if($dental_insight_slider_opacity == '1'){
$dental_insight_custom_style .='#slider img {';
    $dental_insight_custom_style .='opacity: 1';
$dental_insight_custom_style .='}';

}
$dental_insight_slider_heading_color = get_theme_mod( 'dental_insight_slider_heading_color','#02314f');
$dental_insight_custom_style .='#slider .carousel-caption h2 {';
$dental_insight_custom_style .='color: '.esc_attr($dental_insight_slider_heading_color).';';
$dental_insight_custom_style .='}';

$dental_insight_slider_excerpt_color = get_theme_mod( 'dental_insight_slider_excerpt_color','#02314f');
$dental_insight_custom_style .='#slider .slider-excerpt {';
$dental_insight_custom_style .='color: '.esc_attr($dental_insight_slider_excerpt_color).';';
$dental_insight_custom_style .='}';

//-------------------title-font-size----//  
$dental_insight_site_title_fontsize = get_theme_mod('dental_insight_site_title_fontsize','25');

if($dental_insight_site_title_fontsize != false){

$dental_insight_custom_style .='.logo h1,.site-title,.site-title a,.logo h1 a{';

    $dental_insight_custom_style .='font-size: '.esc_html($dental_insight_site_title_fontsize).'px;';

$dental_insight_custom_style .='}';
}

//-------------------tagline-font-size----//  
$dental_insight_site_tagline_fontsize = get_theme_mod('dental_insight_site_tagline_fontsize','15');

if($dental_insight_site_tagline_fontsize != false){

$dental_insight_custom_style .='p.site-description{';

    $dental_insight_custom_style .='font-size: '.esc_html($dental_insight_site_tagline_fontsize).'px;';

$dental_insight_custom_style .='}';
}

//-------------------menu-font-size----//  
$dental_insight_menu_fontsize = get_theme_mod('dental_insight_menu_fontsize','14');

if($dental_insight_menu_fontsize != false){

$dental_insight_custom_style .='.gb_nav_menu li a{';

    $dental_insight_custom_style .='font-size: '.esc_html($dental_insight_menu_fontsize).'px;';

$dental_insight_custom_style .='}';
}