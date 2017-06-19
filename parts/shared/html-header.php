<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js <?php if (wp_is_mobile()) { ?>mobile<?php } else { ?>no-mobile <?php } ?>" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<?php
			global $options;
		  foreach ($options as $value) {
		  	if ((isset($value['id'])) && (isset($value['std']))) {
		   		if (FALSE === get_option( $value['id'])) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
		  	}
		 	}
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo $fw_favicon; ?>"/>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<div class="content-overlay"></div>