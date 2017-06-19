<?php

function starkers_script_enqueuer() {
	wp_register_script( 'plugins', get_template_directory_uri().'/js/plugins.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'plugins' );

	wp_register_script( 'map-plugin', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false', array( 'jquery' ), null, true );
	wp_enqueue_script( 'map-plugin' );

	wp_register_script( 'site', get_template_directory_uri().'/js/site.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'site' );

	wp_register_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,500,500italic,700,700italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext', '', null, 'screen' );
  wp_enqueue_style( 'roboto' );

	wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '',  null, 'screen' );
  wp_enqueue_style( 'screen' );

}

?>