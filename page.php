<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php include ('parts/shared/theme_options_loader.php'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post();
$titleTop = get_post_meta($post->ID, 'fw_title_top', true);
$titleBottom = get_post_meta($post->ID, 'fw_title_bottom', true);

if (get_post_meta($post->ID, 'fw_page_style', true) == 'boxed') { ?>
<section class="common-content page-content boxed-content">
	<!-- top image -->
	<?php
		$post_image_id = get_post_thumbnail_id($post->ID);
		$bgimage = wp_get_attachment_image_src( $post_image_id, 'big', false) ?>
	<?php if ($bgimage) { ?>
	<div class="bg-image" style="background: url(<?php echo $bgimage[0] ?>) no-repeat center center; background-size: cover;">
		<?php if (get_post_meta($post->ID, 'fw_enable_page_top_image_overlay', true)) { ?><div class="color-overlay"></div><?php } ?>
	</div>
	<!-- content -->
	<div class="boxed-bg">
		<div class="content">
		<h1 class="post-title-container <?php if(!$titleTop) { ?>no-top-title<?php }?> <?php if(!$titleBottom) { ?>no-bottom-title<?php }?>">
			<?php if ($titleTop) { ?>
			<span class="post-title">
				<span class="top-title"><?php echo stripslashes(nl2br(do_shortcode(get_post_meta($post->ID, 'fw_title_top', true)))) ; ?></span>
			</span>
			<?php } ?>
			<?php if ($titleBottom) { ?>
			<span class="bottom-title"><?php echo stripslashes(nl2br(do_shortcode(get_post_meta($post->ID, 'fw_title_bottom', true)))) ; ?></span>
			<?php } ?>
			<?php if ( !$titleTop && !$titleBottom) { ?>
			<span class="bottom-title"><?php the_title(); ?></span>
			<?php } ?>
		</h1>
		<?php if (get_post_meta($post->ID, 'fw_secondary_title', true) ) { ?>
			<h2 class="sub-title"><?php echo stripslashes(nl2br((get_post_meta($post->ID, 'fw_secondary_title', true)))); ?></h2>
		<?php } ?>

		</div>
		<?php the_content() ?>
	</div>
	<?php if ((get_post_meta($post->ID, 'fw_enable_map', true)) == true) { ?>
		<div id="map"></div>
	<?php } ?>
	<?php } ?>
</section>
<?php } else { ?>
<section class="common-content page-content full-width-content <?php if ( !(has_post_thumbnail()) ) { ?>no-top-image<?php } ?>">
	<!-- top image -->
	<?php if (has_post_thumbnail()) { ?>
	<div class="bg-image" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>') no-repeat center center; background-size: cover;">
		<?php if (get_post_meta($post->ID, 'fw_enable_page_top_image_overlay', true)) { ?><div class="color-overlay"></div><?php } ?>
		<?php if (get_post_meta($post->ID, 'fw_page_style', true) == 'boxed') { echo '<div class="white-bg"></div>'; } ?>
	</div>
	<?php } ?>
	<!-- content -->
	<div class="content">
		<h1 class="post-title-container <?php if(!$titleTop) { ?>no-top-title<?php }?> <?php if(!$titleBottom) { ?>no-bottom-title<?php }?>">
			<?php if ($titleTop) { ?>
			<span class="post-title">
				<span class="top-title"><?php echo stripslashes(nl2br(do_shortcode(get_post_meta($post->ID, 'fw_title_top', true)))) ; ?></span>
			</span>
			<?php } ?>
			<?php if ($titleBottom) { ?>
			<span class="bottom-title"><?php echo stripslashes(nl2br(do_shortcode(get_post_meta($post->ID, 'fw_title_bottom', true)))) ; ?></span>
			<?php } ?>
			<?php if ( !$titleTop && !$titleBottom) { ?>
			<span class="bottom-title"><?php the_title(); ?></span>
			<?php } ?>
		</h1>
		<?php if (get_post_meta($post->ID, 'fw_secondary_title', true) ) { ?>
			<h2 class="sub-title"><?php echo stripslashes(nl2br((get_post_meta($post->ID, 'fw_secondary_title', true)))); ?></h2>
		<?php } ?>
		<?php the_content() ?>
	</div>
	<?php if ((get_post_meta($post->ID, 'fw_enable_map', true)) == true) { ?>
		<div id="map"></div>
	<?php } ?>
</section>
<?php } ?>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>