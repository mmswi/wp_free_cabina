<?php global $options;
  foreach ($options as $value) {
  	if ((isset($value['id'])) && (isset($value['std']))) {
   		if (FALSE === get_option( $value['id'])) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
  	}
 	} 
?>