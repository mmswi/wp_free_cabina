<?php
/**
 * Search results page
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
	<h1><?php _e('Search Results for', 'fw'); ?>:<br/><?php echo get_search_query(); ?></h1>
		<?php Starkers_Utilities::get_template_parts(array( 'parts/shared/grids' )); ?>
	<?php else: ?>
	<h1><?php _e('No results found for', 'fw'); ?><br/><?php echo get_search_query(); ?></h1>
	<?php endif; ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>