<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
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

<?php if ( have_posts() ): ?>
	<section class="top-image home-posts" style="background: url('<?php echo $fw_home_big_image; ?>') no-repeat center center; background-size: cover;">
		<?php if ($fw_onoff_home_big_image_overlay == true) { ?><div class="color-overlay"></div><?php } ?>
		<div id="top-content">
			<?php if ($fw_home_slogan) { ?>
				<h1 <?php if ($fw_onoff_white_slogan == true) { ?>class="white-text"<?php } ?> > <?php echo stripslashes(nl2br($fw_home_slogan)); ?></h1>
			<?php } ?>
		</div>
	</section>
	<?php Starkers_Utilities::get_template_parts(array( 'parts/shared/grids' )); ?>
<?php else: ?>
<h2>No posts to display</h2>
<?php endif; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>