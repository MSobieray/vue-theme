<?php

/*==============================================================================
Image Support
==============================================================================*/

if( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

/*==============================================================================
Image Sizes
==============================================================================*/

if( function_exists( 'add_image_size' ) ) {
	add_image_size( '1-1-md', 600, 600, true );
	add_image_size( '4-1-lg', 1200, 300, true );
}

/*==============================================================================
Thumbnail Scale
==============================================================================*/

function alx_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
	if ( !$crop ) return null;

	$aspect_ratio = $orig_w / $orig_h;
	$size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

	$crop_w = round($new_w / $size_ratio);
	$crop_h = round($new_h / $size_ratio);

	$s_x = floor( ($orig_w - $crop_w) / 2 );
	$s_y = floor( ($orig_h - $crop_h) / 2 );

	if(is_array($crop)) {
		//Handles left, right and center (no change)
		if($crop[ 0 ] === 'left') {
			$s_x = 0;
		} else if($crop[ 0 ] === 'right') {
			$s_x = $orig_w - $crop_w;
		}
		//Handles top, bottom and center (no change)
		if($crop[ 1 ] === 'top') {
			$s_y = 0;
		} else if($crop[ 1 ] === 'bottom') {
			$s_y = $orig_h - $crop_h;
		}
	}

	return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'alx_thumbnail_upscale', 10, 6 );