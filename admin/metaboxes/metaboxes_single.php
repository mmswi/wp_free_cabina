<?php
$single_metaboxes = array(
	array(
		"label" => "Single",
    "id" => "post_metabox_single",
    "type" => "section"
	),
	array(
		'label'=> 'Post style',
		'desc'  => 'Select the style of the post. Boxed layout works well only if is set a top image.',
		'id'    => $prefix.'post_style',
		'type'  => 'select',
		'options' => array(
			'value1' => array(
				'label' => 'Full Width',
				'value' => 'full_width'
			),
			'value2' => array(
				'label' => 'Boxed',
				'value' => 'boxed'
			)
		)
	),
	array(
		'label' => 'Dark Menu',
		'desc' => "If the top image is light, check it to have a black color header",
		'id' => $prefix.'black_menu',
		'type' => 'checkbox'
	),
	array(
		'label'=> 'Top Image',
		'desc'  => 'Insert the image that goes on the top of the page',
		'id'    => $prefix.'top_image',
		'type'  => 'image'
	),
	array(
		'label' => 'Top Image Overlay',
		'desc' => "Use a dark overlay to add on top image",
		'id' => $prefix.'enable_post_top_image_overlay',
		'type' => 'checkbox'
	),
	array(
		'label'=> 'Title Over Top Image',
		'desc'  => 'This part of title will go over the top image (you can use the color shortcode [color] [/color] for having white titles)',
		'id'    => $prefix.'title_top',
		'type'  => 'textarea'
	),
	array(
		'label'=> 'Bottom title',
		'desc'  => 'This part of title will go on white background',
		'id'    => $prefix.'title_bottom',
		'type'  => 'textarea'
	),
	array(
		'label'=> 'Secondary Title',
		'desc'  => 'Insert a secondary title (you can leave it blank)',
		'id'    => $prefix.'secondary_title',
		'type'  => 'textarea'
	),
	array(
		"label" => "Single End",
    "id" => "post_metabox_single_end",
		"type" => "end-section"
	),
	array(
		"label" => "Grid",
    "id" => "post_metabox_grid",
    "type" => "section"
	),
	array(
		'label' => 'Title white background',
		'desc' => "Use a white backgroud for the title",
		'id' => $prefix.'enable_title_white_background',
		'type' => 'checkbox'
	),
	array(
		'label'=> 'Do not show image (only for Masonry Grid)',
		'desc'  => 'Show only text in the pages that use the grid layout',
		'id'    => $prefix.'hide_image_in_grid',
		'type'  => 'checkbox'
	),
	array(
		'label' => 'Use rectangular image (only for Masonry Grid)',
		'desc' => "Use a portrait image in index/archive page",
		'id' => $prefix.'enable_portrait_image',
		'type' => 'checkbox'
	),
	array(
		"label" => "Grid End",
    "id" => "post_metabox_grid_end",
		"type" => "end-section"
	)

)
?>