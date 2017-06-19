<?php

function fw_big_image_opening( $atts, $content = null ) {
	extract(shortcode_atts(array(
  	"h" => '',
  	"v" => '',
  	"caption" => ''
  	), $atts));
	if ((isset($atts["h"])) && (isset($atts["v"])) && isset($atts["caption"])) {
  	return '</div><div class="big-image"><div class="caption-container pos-'.$atts["v"].'"><span class="caption pos-'.$atts["v"].' pos-'.$atts["h"].'">'.$atts["caption"].'</span></div>'.$content.'</div><div class="content">';
	}
	elseif (isset($atts["caption"])) {
		if (isset($atts["h"])) {
			return '</div><div class="big-image"><div class="caption-container pos-top"><span class="caption pos-top pos-'.$atts["h"].'">'.$atts["caption"].'</span></div>'.$content.'</div><div class="content">';
		}
		elseif (isset($atts["v"])) {
			return '</div><div class="big-image"><div class="caption-container pos-'.$atts["v"].'"><span class="caption pos-'.$atts["v"].' pos-right">'.$atts["caption"].'</span></div>'.$content.'</div><div class="content">';
		}
		else {
			return '</div><div class="big-image"><div class="caption-container pos-top"><span class="caption pos-top pos-right">'.$atts["caption"].'</span></div>'.$content.'</div><div class="content">';
		}
	}
	elseif ((isset($atts["h"])) || (isset($atts["v"]))) {
		return '</div><div class="big-image">'.$content.'</div><div class="content">';
	}	
	else {
		return '</div><div class="big-image">'.$content.'</div><div class="content">';
	}
}
add_shortcode('big_image', 'fw_big_image_opening');


function fw_color($atts, $content = null) {
	extract(shortcode_atts(array(
  	"value" => ''
  	), $atts));
	if (isset($atts['value'])) {
  	return '<span class='.$atts["value"].'>'.$content.'</span>';
	}
	else {
		return '<span>'.$content.'</span>';
	}
 }
 add_shortcode("color", "fw_color");


// add categories to attachments  
function wptp_add_categories_to_attachments() {
   register_taxonomy_for_object_type( 'category', 'attachment' );  
}  
add_action( 'init' , 'wptp_add_categories_to_attachments' ); 

?>