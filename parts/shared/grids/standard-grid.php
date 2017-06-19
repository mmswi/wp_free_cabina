<?php
	global $options;
  foreach ($options as $value) {
  	if ((isset($value['id'])) && (isset($value['std']))) {
   		if (FALSE === get_option( $value['id'])) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
  	}
 	}
?>
<?php
	$paged = get_query_var('paged');
	$offset = 0;
	if ($paged != 0 ) {
	    //$paged -1 because there is no page 1, just 0 and 2 And page 0 is skipped
	    $offset = ($paged-1) * get_query_var('posts_per_page') ;
	}
	if ( !$fw_exclude_cat == array() ) {
		$catsId = '-' . implode( ' ,-', $fw_exclude_cat);
	}

	if ( !is_category() ) {
		$args = array(
			'cat'      => $catsId,
			'offset'     => $offset
		);
		global $query_string;
		query_posts($query_string . '&cat='.$catsId.'&offset='.$offset.'');
	}

?>

<div class="grid-container">
	<?php if ( have_posts() ): ?>
	<div class="grid grid-standard <?php if ($fw_onoff_desaturate) { ?>desaturate<?php } ?> <?php if ($fw_masonry_expand) { ?>grid-3-columns<?php } ?>">
		<div class="grid-sizer"></div>
		<div class="gutter-sizer"></div>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="grid-item <?php if (get_post_meta($post->ID, 'fw_enable_title_white_background', true)) { ?>white-title<?php } if ( get_post_meta($post->ID, 'fw_hide_image_in_grid', true) || !has_post_thumbnail() ) { ?> no-post-image<?php } ?> ">
			 	<a href="<?php the_permalink();?>" class="animsition-link">
					<article class="post">
						<div class="info-item">
							<h1 class="title-item"><?php the_title(); ?></h1>
							<?php if ( $fw_grid_select_date_category == 'date' ) { ?>
							<span class="grid-meta-container date-post">
								<time class="grid-meta" datetime="<?php the_time('M j, Y'); ?>" pubdate><?php the_time('M j, Y'); ?></time>
							</span>
							<?php } ?>
							<?php
							if ( $fw_grid_select_date_category == 'category' ) { ?>
							<div class="grid-meta-container">
							<?php
								$categories = get_the_category();
								$output = '';
								if($categories) {
									foreach($categories as $category) {
										$output .= '<span class="grid-meta category-meta">'.$category->cat_name.'</span>';
								}
								echo trim($output);
							} ?>
							</div>
							<?php } ?>
							<span class="excerpt"><?php echo (substr(get_the_excerpt(), 0,200).' ...'); ?></span>
						</div>
						<span class="no-fill-btn"><?php _e('More', 'fw'); ?></span>
						<?php
							$post_thumb_id = get_post_thumbnail_id($post->ID);
							if (get_post_meta($post->ID, 'fw_enable_portrait_image', true)) {
								$post_preview_image = wp_get_attachment_image_src($post_thumb_id, 'vertical_rectangle');
							}
							else {
								$post_preview_image = wp_get_attachment_image_src($post_thumb_id, 'square');
							}
						?>
						<?php if ( ($post_preview_image) && (!get_post_meta($post->ID, 'fw_hide_image_in_grid', true)) ) { ?>
							<img src="<?php echo $post_preview_image[0]; ?>"/>
						<?php } ?>
					</article>
				</a>
			</div>
			<?php endwhile; ?>
	</div>
	<?php if ($fw_on_infinite_scroll) { ?>
		<?php if (wp_is_mobile()) { ?>
		<a href="#" id="loading-btn" class="button">More content</a>
		<?php } ?>
		<a id="infiniteLoader"><span id="preloader"></span><span id="loading-label"><?php _e('Loading more content...', 'fw'); ?></span></a>
	<?php } else if (function_exists("pagination")) {
  pagination($additional_loop->max_num_pages);
	} ?>
	<?php else: ?>
		<h2>No posts to display</h2>
	<?php endif; ?>
</div>