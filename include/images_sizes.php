<?php

add_image_size('small',195,195,true);
add_image_size('square',455,455,true);
add_image_size('creative',400,400);
add_image_size('big',1600,9999);

add_image_size('vertical_rectangle',455,682,true);

add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
	$addsizes = array(
		"square" => __( "Square")
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}
function filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');
function responsive_wp_caption($x = NULL, $attr, $content) {
    extract( shortcode_atts(
        array(
         'id' => '',
         'align' => 'alignnone',
         'width' => '',
         'caption' => '',
        ),
        $attr
      )
    );

    if ( intval( $width ) < 1 || empty( $caption ) ) {
        return $content;
    }

    $id = $id ? ('id="' . $id . '" ') : '';

    $ret = '<div ' . $id . 'class="wp-caption ' . $align . '" style="max-width: ' . $width . 'px; width: 100%;">';
    $ret .= do_shortcode( $content );
    $ret .= '<div class="wp-caption-wrapper"><p class="wp-caption-text">' . $caption . '</p>';
    $ret .= '</div>';
    $ret .= '</div>';

    return $ret;
}

add_filter( 'img_caption_shortcode', 'responsive_wp_caption', 10, 3 );
?>