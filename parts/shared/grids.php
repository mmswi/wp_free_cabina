<?php
	if (get_option('fw_grid_select') == 'standard') { ?>
		<!-- GRID STANDARD (all posts have the same width) -->
		<?php Starkers_Utilities::get_template_parts(array( 'parts/shared/grids/standard-grid' )); ?>
	<?php
	}
	elseif (get_option('fw_grid_select') == 'creative') { ?>
		<!-- GRID MIXED (posts have different width, based on a fixed grid) -->
		<?php Starkers_Utilities::get_template_parts(array( 'parts/shared/grids/creative-grid' )); ?>
	<?php
	}
	else { ?>
		<!-- IN NOTHING IS SET > GRID STANDARD (all posts have the same width) -->
		<?php Starkers_Utilities::get_template_parts(array( 'parts/shared/grids/standard-grid' )); ?>
	<?php
	}
?>