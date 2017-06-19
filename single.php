<?php
/**
 * The Template for displaying all single posts
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

<?php if ( have_posts() ) :
while ( have_posts() ) : the_post();

$titleTop = get_post_meta($post->ID, 'fw_title_top', true);
$titleBottom = get_post_meta($post->ID, 'fw_title_bottom', true);
?>

<?php $post_id = get_the_ID(); ?>
<?php
$post_category = get_the_category($post->ID); ?>

<?php $post_meta_data = get_post_custom($post->ID); ?>
<?php
$custom_image = $post_meta_data['fw_top_image'][0];
?>
<?php if (get_post_meta($post->ID, 'fw_post_style', true) == 'boxed') { ?>
	<article class="common-content single-post boxed-content">
	<!-- top image -->
		<?php if ($custom_image) { ?>
		<div class="bg-image" style="background: url('<?php if ( is_array( $custom_image_url ) ) { echo $custom_image_url[0]; } else { echo $custom_image; } ?>') no-repeat center center; background-size: cover;">
			<?php if (get_post_meta($post->ID, 'fw_enable_post_top_image_overlay', true)) { ?><div class="color-overlay"></div><?php } ?>
		</div>
		<?php } ?>
		<!-- content -->
		<div class="boxed-bg">
		<?php } else { ?>

	<article class="common-content single-post full-width-content <?php if (!$custom_image) { ?>no-top-image<?php } ?>">
		<?php if ($custom_image) { ?>
		<div class="bg-image" style="background: url('<?php if ( is_array( $custom_image_url ) ) { echo $custom_image_url[0]; } else { echo $custom_image; } ?>') no-repeat center center; background-size: cover;">
			<?php if (get_post_meta($post->ID, 'fw_enable_post_top_image_overlay', true)) { ?><div class="color-overlay"></div><?php } ?>
		</div>
		<?php } ?>
		<?php } ?>
		<div class="content">
			<!--<?php if (get_post_meta($post->ID, 'fw_title', true) ) { ?>
				<h1 class="post-title"><?php echo stripslashes(nl2br(do_shortcode(get_post_meta($post->ID, 'fw_title', true)))) ; ?></h1>
			<?php } ?>-->
			<h1 class="post-title-container <?php if(!$titleTop) { ?>no-top-title<?php }?> <?php if(!$titleBottom) { ?>no-bottom-title<?php }?> <?php if ( $fw_disable_date ) {?>no-post-date<?php } ?>">
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
			<?php if ($fw_disable_date == false) { ?>
				<p class="single-post-date"><?php the_date(); ?></p>
			<?php } ?>
			<?php if ( (get_post_meta($post->ID, 'fw_secondary_title', true)) ) { ?>
				<h2 class="sub-title"><?php echo stripslashes(nl2br(get_post_meta($post->ID, 'fw_secondary_title', true))); ?></h2>
			<?php } ?>
		<?php if (get_post_meta($post->ID, 'fw_post_style', true) == 'boxed') { ?>
		</div>
		<?php } ?>
			<?php the_content() ?>
		</div>

	<?php if ( !$fw_disable_post_meta  ) { ?>
		<!-- author, share, category, tag -->
	<div class="post-meta">
		<div class="author-cat">
			<div class="author-box">
			<?php if (!$fw_disable_author) { ?>
				<div class="avatar">
					<?php echo get_avatar(get_the_author_meta( 'ID' )); ?>
				</div>
				<div class="author">
					<?php echo ('<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a>'); ?>
				</div>
			<?php } ?>
		</div>
		<?php if (!$fw_disable_category) { ?>
			<div class="category-container">
				<span class="label-category"><?php _e('Category', 'fw'); ?>:</span>
				<ul class="category-post">
					<?php
						$categories = get_the_category();
						$output = '';
						if($categories){
							foreach($categories as $category) {
								$output .= '<li><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" class="small-btn">'.$category->cat_name.'</a></li>';
							}
						echo trim($output);
						}
					?>
				</ul>
			</div>
		<?php } ?>
		</div>
		<div class="tag-share">
		<?php
			$postTags = get_the_tags();
			if ($postTags && !$fw_disable_tags) { ?>
			<div class="tags-container">
				<span class="label-tags"><?php _e('Tag', 'fw'); ?>:</span>
				<ul class="post-tags">
				<?php
				  foreach($postTags as $tag) {
				    echo ('<li><a href="'.get_tag_link($tag->term_id).'" class="small-btn">'.$tag->name.'</a></li>');
				  } ?>
				</ul>
			</div>
		<?php } ?>
		<?php if (!$fw_disable_social) { ?>
			<div class="share-box <?php if ( wp_is_mobile() ) { ?>mobile-share<?php } ?>">
				<?php if ( wp_is_mobile() ) { ?>
					<span class="label-share"><?php _e('Share', 'fw'); ?>:</span>
				<?php } else { ?>
					<a href="#" class="share-btn small-btn"><?php _e('Share', 'fw'); ?></a>
				<?php } ?>
				<ul class="social-btn-container <?php if ( $fw_disable_tags || !$postTags ) { ?>social-btn-container-notags<?php } ?>">
					<?php if ($fw_enable_facebook_share == true) { ?>
					<li>
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>&amp;t=<?php the_title() ?>" target="_blank" class="social-icon">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-facebook fa-stack-1x"></i>
							</span>
						</a>
					</li>
					<?php }
					if ($fw_enable_twitter_share == true) { ?>
					<li>
						<a href="http://twitter.com/home?status=<?php the_title() ?> <?php the_permalink() ?>" target="_blank" class="social-icon">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-twitter fa-stack-1x"></i>
							</span>
						</a>
					</li>
					<?php }
					if ($fw_enable_googleplus_share == true) { ?>
					<li>
						<a href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=<?php the_permalink() ?>&amp;title=<?php the_title() ?>" target="_blank" class="social-icon">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-google-plus fa-stack-1x"></i>
							</span>
						</a>
					</li>
					<?php }
					if ($fw_enable_pinterest_share == true) { ?>
					<li>
						<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button social-icon" count-layout="vertical">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-pinterest fa-stack-1x"></i>
							</span>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
		</div>
	</div>
	<?php } ?>
	<?php if ( comments_open() ) { ?>
	<div class="comments-container">
		<?php comments_template( '/comments.php'); ?>
	</div>
	<?php } ?>
	<!-- calculate number of posts to offset (next posts) and print them -->
	<?php
	if ($fw_disable_next_posts == false) {
		$args = array(
			'posts_per_page' => -1,
			'orderby' => 'ID',
			'order' => 'DESC'
		);
		$offset = 0;

		$the_query = new WP_Query( $args ); ?>
		<?php $offset_inc = 0; ?>
		<?php if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post();
				if (($post->ID) >= ($post_id) ) {
					$offset++;
				}
			endwhile;
		endif;

		wp_reset_query();
		$args = array(
			'posts_per_page' => 3,
			'offset' => $offset,
			'orderby' => 'ID',
			'order' => 'DESC',
		);
		$the_query = new WP_Query( $args ); ?>
		<?php $offset_inc = 0; ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<section class="next-stories">
				<div class="next-stories-container">
					<h3><?php _e('Next Stories', 'fw'); ?></h3>
					<div class="next-stories-content">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="next-stories-item">
								<a href="<?php the_permalink(); ?>" class="animsition-link">
									<?php
									$post_thumb_id = get_post_thumbnail_id($post->ID);
									$post_preview_image = wp_get_attachment_image_src($post_thumb_id, 'small');
									?>
									<?php if ($post_preview_image) { ?>
										<img class="item-image" src="<?php echo $post_preview_image[0]; ?>"/>
									<?php } ?>
									<div class="item-content">
										<h4><?php the_title(); ?></h4>
										<p><?php echo (substr(get_the_excerpt(), 0,230).' ...'); ?></p>
									</div>
								</a>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</section>
		<?php
		endif;
	}
	?>
</article>


<?php endwhile;
endif; ?>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>