<?php
/**
 * The template for displaying Author Archive pages
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

<?php if ( have_posts() ): the_post(); ?>

	<h2><?php _e('Author Archives', 'fw'); ?>: <?php echo get_the_author() ; ?></h2>

	<?php if ( get_the_author_meta( 'description' ) ) : ?>
	<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
	<h3><?php _e('About', 'fw'); ?> <?php echo get_the_author() ; ?></h3>
	<?php the_author_meta( 'description' ); ?>
	<?php endif; ?>

	<?php Starkers_Utilities::get_template_parts(array( 'parts/shared/grids' )); ?>

<?php else: ?>
<h2><?php _e('No posts to display for', 'fw'); ?> <?php echo get_the_author() ; ?></h2>	
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>