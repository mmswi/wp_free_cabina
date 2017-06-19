<?php function fw_css() {
	global $options;
	foreach ($options as $value) {
  	if ((isset($value['id'])) && (isset($value['std']))) {
   		if (FALSE === get_option( $value['id'])) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
  	}
} ?>
<style>
#header #logo {height: <?php echo $fw_logo_height; ?>px;} #header #logo img {height: <?php echo $fw_logo_height; ?>px;}
#header.small-header #logo {height: <?php echo $fw_logo_mini_height; ?>px;} #header.small-header #logo img {height: <?php echo $fw_logo_mini_height; ?>px;}
.scrolling-page .sidebar #bt-side-close {line-height: <?php echo $fw_logo_mini_height - 10 ?>px; }
#menu-wrapper .menu:before, #menu-wrapper .menu:after, .intro .intro-content .preloader, #infiniteLoader #preloader {background-color: <?php echo $fw_main_color; ?>; }
<?php if ( !wp_is_mobile() ) { ?>
#menu-wrapper li a:hover, #menu-desktop .sub-menu a:hover, .small-btn:hover, .common-content .comment-body .comment-reply-link:hover, .sidebar .widget a:hover, .next-stories-item a:hover h4 {color: <?php echo $fw_main_color; ?>!important; }
input[type="text"]:hover, input[type="email"]:hover, input[type="phone"]:hover, select:hover, textarea:hover, .share-btn  { border-color: <?php echo $fw_main_color; ?>; }
#footer .top-footer .top-footer-content .right-footer .social-footer li a:hover span i.fa-circle {color: <?php echo $fw_main_color; ?>;}
<?php } ?>
#menu-wrapper li.active > a, .mobile .social-btn-container a, .content p a {color: <?php echo $fw_main_color; ?>!important; }
/*#header #bt-menu:hover span, #header #bt-menu:hover span:before, #header #bt-menu:hover span:after {background-color: <?php echo $fw_main_color; ?>;}*/
.button, .submit, input[type="submit"] {background-color: <?php echo $fw_main_color; ?>; }
input[type="text"]:focus, input[type="email"]:focus, input[type="phone"]:focus, select:focus, textarea:focus { border-color: <?php echo $fw_main_color; ?>; }
</style>
<?php } ?>
<?php add_action('wp_head', 'fw_css'); ?>