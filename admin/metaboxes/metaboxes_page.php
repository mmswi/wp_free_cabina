<?php
$page_metaboxes = array(
	array(
		"label" => "General",
    "id" => "page_metabox_general",
    "type" => "section"
	),
	array(
		'label'=> 'Page style',
		'desc'  => 'Select the style of the page. Boxed layout works well only if is set a top image.',
		'id'    => $prefix.'page_style',
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
		'label' => 'Top Image Overlay',
		'desc' => "Use a dark overlay to add on top image",
		'id' => $prefix.'enable_page_top_image_overlay',
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
		"label" => "General End",
    "id" => "page_metabox_general_end",
		"type" => "end-section"
	),
	array(
		"label" => "Map",
    "id" => "page_metabox_map",
    "type" => "section"
	),
	array(
		'label' => 'Show Map',
		'desc' => "Show map on this page",
		'id' => $prefix.'enable_map',
		'type' => 'checkbox',
		'std'  => ""
	),
	array(
		'label'=> 'Latitude',
		'desc'  => 'Insert the latitude. You can get it here: http://www.gps-coordinates.net',
		'id'    => $prefix.'latitude',
		'type'  => 'text'
	),
	array(
		'label'=> 'Longitude',
		'desc'  => 'Insert the longitude. You can get it here: http://www.gps-coordinates.net',
		'id'    => $prefix.'longitude',
		'type'  => 'text'
	),
	array(
		'label' => 'Greyscale Map',
		'desc' => "Show map with a greyscale filter",
		'id' => $prefix.'map_greyscale',
		'type' => 'checkbox',
		'std'  => ""
	),
	array(
		'label'=> 'Location Name',
		'desc'  => 'Insert the location',
		'id'    => $prefix.'map_location',
		'type'  => 'text'
	),
	array(
		"label" => "Map End",
    "id" => "page_metabox_map_end",
		"type" => "end-section")
)
?>