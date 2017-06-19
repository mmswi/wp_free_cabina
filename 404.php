<?php
/**
 * The template for displaying 404 pages (Not Found)
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

<section class="common-content not-found">   
	<div class="bg-image" style="background: url('<?php echo $fw_404_background; ?>') no-repeat center center; background-size: cover;">
		<div class="content">
			<h1 class="post-title">404</h1>
			<h1 class="post-title message"><?php echo stripslashes(nl2br($fw_404_text)); ?></h1>
			<a href="<?php echo home_url(); ?>" class="button"><?php echo stripslashes($fw_404_button); ?></a>
		</div>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>