<?php include ('theme_options_loader.php'); ?>
<?php

// get uri to check if is a reply to comment page and remove animsition
$uri = $_SERVER["REQUEST_URI"];
$parts_url = parse_url($uri);
$pos = strpos($parts_url['query'], 'replytocom');
?>
<?php if ( $pos === false ) { ?>
	<div class="animsition">
<?php } else { ?>
	<div class="no-animsition">
<?php } ?>
<?php /*
$currentcat = get_queried_object();
$currentcatname = $currentcat->slug;
$args = array(
  "post_type" => "attachment",
  "post_status" => "inherit",
  "category_name" => $currentcatname,
);
$query = new WP_Query( $args ); */?>
	<?php
		global $wp_query;
		$postid = $wp_query->post->ID;
	?>
	<header id="header" <?php if ( $query->post->guid) { ?>class="white-header"<?php } ?> <?php if ( get_post_meta( $postid, 'fw_black_menu', true) ) { ?>class="dark-header"<?php } ?> >
	<?php wp_reset_query(); ?>
		<div id="header-content">
			<div class="header-left">
				<?php
				if ( has_nav_menu( 'primary' )) { ?>
					<a href="#" id="bt-menu" <?php if (!$fw_hm_desktop) { ?>class="hm-desktop"<?php } ?>>
						<span>Menu</span>
					</a>
				<?php } ?>
				<div id="logo">
					<a href="<?php echo home_url(); ?>" class="animsition-link logotype white-logo" alt="<?php bloginfo( 'name' ); ?>"><?php if ($fw_white_logo) { ?><img src="<?php echo $fw_white_logo; ?>" /><?php } ?></a>
					<a href="<?php echo home_url(); ?>" class="animsition-link logotype dark-logo" alt="<?php bloginfo( 'name' ); ?>"><?php if ($fw_logo) { ?><img src="<?php echo $fw_logo; ?>" /><?php } ?></a>
				</div>
			</div>
			<?php if ( !$fw_hm_desktop ) { ?>
				<div class="header-right <?php if ( ( !is_active_sidebar( 'general-sidebar' ) && !is_single() ) || ( is_single() && !is_active_sidebar( 'single-sidebar' ) ) ) { ?>no-sidebar<?php } ?>">
					<nav id="menu-desktop">
						<ul id="menu-main" class="menu">
							<?php wp_nav_menu( array( 'theme_location' => 'primary','items_wrap' => '%3$s','container' => 'false' ) ); ?>
						</ul>
					</nav>
					<?php if ( ( is_single() && is_active_sidebar( 'single-sidebar' ) ) || ( is_active_sidebar( 'general-sidebar' ) && !is_single() ) ) { ?>
						<a href="#" id="bt-side">
							<span class="triangle"></span>
							<span class="bar"></span>
						</a>
					<?php } ?>
				</div>
			<?php } else { ?>
				<a href="#" id="bt-side">
					<span class="triangle"></span>
					<span class="bar"></span>
				</a>
			<?php } ?>
		</div>
	</header>
	<?php
		if ( has_nav_menu( 'primary' ) && ( $fw_hm_desktop ) ) { ?>
			<nav id="menu-wrapper">
				<ul id="menu-main" class="menu">
					<?php wp_nav_menu( array( 'theme_location' => 'primary','items_wrap' => '%3$s','container' => 'false' ) ); ?>
				</ul>
			</nav>
		<?php } ?>
	<div id="container">