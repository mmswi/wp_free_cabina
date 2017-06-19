<?php
/**
 * The template used to display Tag Archive pages
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
<section class="archive-page">
<?php if ( have_posts() ): ?>
	<h1><?php _e('Tag', 'fw'); ?>: <?php echo single_tag_title( '', false ); ?></h1>
	<?php Starkers_Utilities::get_template_parts(array( 'parts/shared/grids' )); ?>
<?php else: ?>
<h2><?php _e('No posts to display in', 'fw'); ?> <?php echo single_tag_title( '', false ); ?></h2>
<?php endif; ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>