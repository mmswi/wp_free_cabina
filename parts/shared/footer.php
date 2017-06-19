<?php include ('theme_options_loader.php'); ?>
		</div>
		<div class="sidebar">
			<a href="#" id="bt-side-close">
				<span class="triangle"></span>
				<span class="bar"></span>
			</a>
			<div class="sidebar-container">
				<div class="sidebar-content">
				<?php if ( !is_single() ) {
					dynamic_sidebar('general-sidebar');
				} else {
					dynamic_sidebar('single-sidebar');
				}
				?>
				</div>
			</div>
		</div>
		<footer id="footer">
			<section class="top-footer">
				<?php if ($fw_footer_title) { ?>
					<h4 class="top-footer-title"><?php echo $fw_footer_title; ?></h4>
				<?php } ?>
				<div class="top-footer-content">
					<div class="left-footer">
						<?php if ($fw_footer_description) { ?>
							<div class="footer-description">
								<p><?php echo stripslashes($fw_footer_description); ?></p>
							</div>
						<?php } ?>
						<?php if ( has_nav_menu( 'footer' )) { ?>
							<nav class="footer-menu">
								<ul id="menu-main" class="menu">
									<?php wp_nav_menu( array( 'theme_location' => 'footer','items_wrap' => '%3$s','container' => 'false' ) ); ?>
								</ul>
							</nav>
						<?php } ?>
					</div>
					<div class="right-footer">
						<?php if ($fw_disable_social_footer == false) { ?>
							<ul class="social-footer">
								<?php if ($fw_facebook_link) { ?>
									<li>
										<a href="<?php echo $fw_facebook_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-facebook fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
								<?php if ($fw_twitter_link) { ?>
									<li>
										<a href="<?php echo $fw_twitter_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-twitter fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
								<?php if ($fw_googleplus_link) { ?>
									<li>
										<a href="<?php echo $fw_googleplus_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-google-plus fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
								<?php if ($fw_instagram_link) { ?>
									<li>
										<a href="<?php echo $fw_instagram_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-instagram fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
								<?php if ($fw_pinterest_link) { ?>
									<li>
										<a href="<?php echo $fw_pinterest_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-pinterest fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
								<?php if ($fw_linkedin_link) { ?>
									<li>
										<a href="<?php echo $fw_linkedin_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-linkedin fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
								<?php if ($fw_flickr_link) { ?>
									<li>
										<a href="<?php echo $fw_flickr_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-flickr fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
								<?php if ($fw_youtube_link) { ?>
									<li>
										<a href="<?php echo $fw_youtube_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-youtube fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
								<?php if ($fw_tumblr_link) { ?>
									<li>
										<a href="<?php echo $fw_tumblr_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-tumblr fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
								<?php if ($fw_vk_link) { ?>
									<li>
										<a href="<?php echo $fw_vk_link; ?>" class="social-icon" <?php if ($fw_onoff_social_blank) { ?>target="_blank"<?php }?>>
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
			  								<i class="fa fa-vk fa-stack-1x"></i>
											</span>
										</a>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>
				</div>
			</section>
			<?php if ($fw_footer_copy) { ?>
				<section class="bottom-footer">
					<p><?php echo stripslashes($fw_footer_copy); ?></p>
				</section>
			<?php } ?>
		</footer>
		</div>
	</div>
<?php
	$uri = $_SERVER["REQUEST_URI"];
	$parts_url = parse_url($uri);
	$pos = strpos($parts_url['query'], 'replytocom');
	?>
<?php
if ( ( $pos === false ) && ( $fw_enable_page_preloading ) ) { ?>
	<section class="animsition-loading intro">
		<div class="intro-content">
			<h2><?php echo stripslashes(nl2br($fw_preloading_title)); ?></h2>
			<p><?php echo stripslashes(nl2br($fw_preloading_text)); ?></p>
			<?php if ($fw_disable_preloader == false) { ?>
				<span class="preloader"></span>
			<?php } ?>
		</div>
	</section>
<?php } ?>
<?php if ($fw_on_infinite_scroll) {
	include ('infinite_scroll.php');
}
if ( is_page() ) {
	add_action('wp_footer', 'fw_map_data',100);
}
?>
<?php echo stripslashes($fw_ga_code) ?>