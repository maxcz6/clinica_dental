<?php 

$dental_insight_custom_style= "";

// Slider-content-alignment

$dental_insight_slider_content_alignment = get_theme_mod( 'dental_insight_slider_content_alignment','LEFT-ALIGN');

if($dental_insight_slider_content_alignment == 'LEFT-ALIGN'){

$dental_insight_custom_style .='#slider .carousel-caption{';

	$dental_insight_custom_style .='text-align:left; right: 45%; left: 15%;';

$dental_insight_custom_style .='}';

$dental_insight_custom_style .='@media screen and (max-width:1199px){';

$dental_insight_custom_style .='#slider .carousel-caption{';

    $dental_insight_custom_style .='right: 30%; left: 15%';
    
$dental_insight_custom_style .='} }';

$dental_insight_custom_style .='@media screen and (max-width:991px){';

$dental_insight_custom_style .='#slider .carousel-caption{';

    $dental_insight_custom_style .='right: 15%; left: 15%';
    
$dental_insight_custom_style .='} }';


}else if($dental_insight_slider_content_alignment == 'CENTER-ALIGN'){

$dental_insight_custom_style .='#slider .carousel-caption';

	$dental_insight_custom_style .='text-align:center; right: 15%; left: 15%;';

$dental_insight_custom_style .='}';


}else if($dental_insight_slider_content_alignment == 'RIGHT-ALIGN'){

$dental_insight_custom_style .='#slider .carousel-caption{';

	$dental_insight_custom_style .='text-align:right; right: 15%; left: 45%;';

$dental_insight_custom_style .='}';

$dental_insight_custom_style .='@media screen and (max-width:1199px){';

$dental_insight_custom_style .='#slider .carousel-caption{';

    $dental_insight_custom_style .='left: 30%; right: 15%';
    
$dental_insight_custom_style .='} }';

$dental_insight_custom_style .='@media screen and (max-width:991px){';

$dental_insight_custom_style .='#slider .carousel-caption{';

    $dental_insight_custom_style .='left: 15%; right: 15%';
    
$dental_insight_custom_style .='} }';

}


//colors
$color = get_theme_mod('dentistry_clinic_primary_color', '#00bcd5');
$color_light = get_theme_mod('dentistry_clinic_primary_light', '#aceefe');
$color_heading = get_theme_mod('dentistry_clinic_heading_color', '#343434');
$color_text = get_theme_mod('dentistry_clinic_text_color', '#959595');
$color_fade = get_theme_mod('dentistry_clinic_primary_fade', '#e8fcff');
$color_footer_bg = get_theme_mod('dentistry_clinic_footer_bg', '#343434');


$dental_insight_custom_style .= ":root {";
    $dental_insight_custom_style .= "--theme-primary-color: {$color};";
    $dental_insight_custom_style .= "--theme-primary-light: {$color_light};";
    $dental_insight_custom_style .= "--theme-heading-color: {$color_heading};";
    $dental_insight_custom_style .= "--theme-text-color: {$color_text};";
    $dental_insight_custom_style .= "--theme-primary-fade: {$color_fade};";
    $dental_insight_custom_style .= "--theme-footer-color: {$color_footer_bg};";
$dental_insight_custom_style .= "}";


$dentistry_clinic_slider_heading_color = get_theme_mod( 'dentistry_clinic_slider_heading_color','#343434');
$dental_insight_custom_style .='#slider .slider-color-span {';
$dental_insight_custom_style .='color: '.esc_attr($dentistry_clinic_slider_heading_color).';';
$dental_insight_custom_style .='}';

$dentistry_clinic_slider_excerpt_color = get_theme_mod( 'dentistry_clinic_slider_excerpt_color','#343434');
$dental_insight_custom_style .='#slider .slider-excerpt {';
$dental_insight_custom_style .='color: '.esc_attr($dentistry_clinic_slider_excerpt_color).';';
$dental_insight_custom_style .='}';