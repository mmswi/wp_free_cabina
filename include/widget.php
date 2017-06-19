<?php
class fw_posts_same_cat extends WP_Widget
{
    function fw_posts_same_cat()
    {
		$widget_ops = array(
            'classname' => 'posts_same_cat',
            'description' => __( 'Posts in the same category')
        );

		$control_ops = array( 'id_base' => 'posts_same_cat' );

		$this->WP_Widget( 'posts_same_cat', __( 'Posts in the same category' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance )
	{
		if (is_single()) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );

		global $post_category;

		echo ('<div class="widget posts-same-category"><h2>'.$instance['title'].'</h2>');
		foreach ($post_category as $category) {
			$cat_to_show = $category->cat_name;
			echo ('<div class="posts-category"><h3>'.$instance['title'].' in '.$cat_to_show.'</h3><ul>');
			$number_of_posts = $instance['number'];
			global $post_id;
			$argsnew = array(
				'posts_per_page' => $number_of_posts,
				'orderby' => 'ID',
				'order' => 'DESC',
				'post__not_in' => array($post_id),
				'category_name' => $cat_to_show,
			);

			$the_query = new WP_Query( $argsnew ); ?>
			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			<?php
			endif;
			echo '</ul></div>';
		}
		echo $after_widget;
		}
	}



	function update( $new_instance, $old_instance )
    {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['number'] = preg_replace("/[^0-9,.]/", "0", $new_instance['number']);

		return $instance;
	}

	function form( $instance )
	{

        /* Default settings */

		$instance = wp_parse_args( (array) $instance);
		$title = $instance['title'];
		$number = $instance['number'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('number'); ?>">Number of posts to show (per category): <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo attribute_escape($number); ?>" /></label></p>

		<?php
	}
}

function fw_widgets_init() {
	register_widget('fw_posts_same_cat');
	do_action('widgets_init');
}
add_action('init', 'fw_widgets_init', 1);
?>