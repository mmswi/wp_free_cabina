<?php
/**
 * The template for displaying Category Archive pages
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
<section class="archive-page category-page">
	<?php if ( have_posts() ): ?>
		<!-- top image based on category -->
		<?php
		$currentcat = get_queried_object();
		$currentcatname = $currentcat->slug;
		$args = array(
		    "post_type" => "attachment",
		    "post_status" => "inherit",
		    "category_name" => $currentcatname,
		  );
		  $query = new WP_Query( $args );
		?>
		<?php if ($query->post->guid) {?>
		<section class="top-image" style="background: url('<?php echo $query->post->guid; ?>') no-repeat center center; background-size: cover;">
			<?php if ($fw_onoff_category_image_overlay) { ?><div class="color-overlay"></div><?php } ?>
			<div id="top-content">
				<h1><?php _e('Category', 'fw'); ?>: <?php echo single_cat_title( '', false ); ?></h1>
			</div>
		</section>
		<?php } else { ?>
			<h1> <?php _e('Category', 'fw'); ?>: <?php echo single_cat_title( '', false ); ?></h1>
		<?php } ?>
	  <?php wp_reset_postdata(); ?>
		<?php Starkers_Utilities::get_template_parts(array( 'parts/shared/grids' )); ?>
	<?php else: ?>
	<h2><?php _e('No posts to display in', 'fw'); ?> <?php echo single_cat_title( '', false ); ?></h2>
	<?php endif; ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>