<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

	<?php if ( is_day() ) : ?>
	<h1><?php _e('Archive', 'fw'); ?>: <?php echo  get_the_date( 'D M Y' ); ?></h1>							
	<?php elseif ( is_month() ) : ?>
	<h1><?php _e('Archive', 'fw'); ?>: <?php echo  get_the_date( 'M Y' ); ?></h1>	
	<?php elseif ( is_year() ) : ?>
	<h1><?php _e('Archive', 'fw'); ?>: <?php echo  get_the_date( 'Y' ); ?></h1>								
	<?php else : ?>
	<h1><?php _e('Archive', 'fw'); ?></h1>	
	<?php endif; ?>

	<?php Starkers_Utilities::get_template_parts(array( 'parts/shared/grids' )); ?>
	
<?php else: ?>
<h1><?php _e('No posts to display', 'fw'); ?></h1>	
<?php endif; ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>