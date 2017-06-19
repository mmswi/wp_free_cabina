<?php
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'General Sidebar',
		'id' => 'general-sidebar',
		'description' => 'Sidebar for the home, archive, tag and category page',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>' ,
		));
	register_sidebar(array(
		'name' => 'Single post Sidebar',
		'id' => 'single-sidebar',
		'description' => 'Sidebar for the single post',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>' ,
		));
	}

	// Customize the search form
	function style_search_form($form) {
		$form = '<form method="get" id="searchform" action="' . get_option('home') . '/" >
		<div>';
			if (is_search()) {
				$form .='<input type="text" value="' . attribute_escape(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />';
			} else {
				$form .='<input type="text" value="Search and press enter" name="s" id="s"  onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;"/>';
			}
			$form .= '<input type="submit" id="searchsubmit" value="'.attribute_escape(__('Go')).'" />

		</div></form>';
		return $form;
	}
	add_filter('get_search_form', 'style_search_form');

	function SearchFilter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
	add_filter('pre_get_posts','SearchFilter');

	function exclude_widget_categories($args) {
		if ( !get_option('fw_exclude_cat') == array() ) {
			$catsId = implode( ',' , get_option('fw_exclude_cat'));
		}
		$exclude = $catsId; // The IDs of the excluding categories
		$args["exclude"] = $exclude;
		return $args;
	}
	function exclude_widget_posts($args) {
		if ( !get_option('fw_exclude_cat') == array() ) {
			$catsId = '-' . implode( ' ,-', get_option('fw_exclude_cat')); ?>
		<?php }
		 $exclude = $catsId; // The IDs of the excluding categories
		$args["cat"] = $exclude;
		return $args;
	}
	add_filter("widget_categories_args","exclude_widget_categories");
	add_filter("widget_posts_args","exclude_widget_posts");
?>