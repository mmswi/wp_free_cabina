<?php
/**
 *	Refactory metaboxes for Minimable
 *
 *	@ver: 0.1
 */

require_once( 'fw_meta_box.php' );



global $ffg_one_options;

$prefix = 'fw_';
$themename = 'Abito';

//$tax2='carousel-categories';

//require_once('metaboxes/metaboxes_home.php');
//require_once('metaboxes/metaboxes_gallery.php');
//require_once('metaboxes/metaboxes_staff.php');
//require_once('metaboxes/metaboxes_contact.php');
//require_once('metaboxes/metaboxes_portfolio.php');
//require_once('metaboxes/metaboxes_common.php');
require_once('metaboxes/metaboxes_single.php');
require_once('metaboxes/metaboxes_page.php');

$single_metaboxes_var = new fw_meta_box( 'single_metaboxes', 'Post Settings', 'post', 'normal', 'high' );
$page_metaboxes_var = new fw_meta_box( 'page_metaboxes', 'Page Settings', 'page', 'normal', 'high' );


$single_metaboxes_var->add_fields( $single_metaboxes );
$page_metaboxes_var->add_fields( $page_metaboxes );

?>