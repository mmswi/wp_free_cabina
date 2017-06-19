<?php
	/**
	 * Starkers include and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */



	$uploads = wp_upload_dir();

  require_once ('admin/required-plugins/plugins.php');
  require_once ('admin/theme-options.php');
	require_once ('admin/premium.php');
	require_once ('admin/metaboxes.php');
	require_once ('include/admin.php');
	require_once ('external/starkers-utilities.php');
	include("admin/update_notifier.php");

	/* ========================================================================================================================

	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

	======================================================================================================================== */

	add_theme_support('post-thumbnails');

	register_nav_menus(array('primary' => 'Primary Navigation'));
	register_nav_menus(array('footer' => 'Footer'));

	/* ========================================================================================================================

	Actions and Filters

	======================================================================================================================== */

	add_action('wp_enqueue_scripts', 'starkers_script_enqueuer');

	add_filter('body_class', array('Starkers_Utilities', 'add_slug_to_body_class'));

	/* ========================================================================================================================

	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

	======================================================================================================================== */



	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	require_once('include/script_enqueuer.php');

	/* ========================================================================================================================

	Comments

	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
	/*----------------STYLES----------------*/

	require_once('include/style.php');

	/*----------------SHORTCODES----------------*/

	require_once('include/shortcodes.php');


	/* --------------IMAGE SIZES----------------*/

	require_once('include/images_sizes.php');


	/* ----------------COMMENTS-----------------*/

	require_once('include/comments.php');


	/* --------------MAP OPTIONS----------------*/

	require_once('include/map.php');

	/* --------------LOADER SETTINGS----------------*/

	require_once('include/loader-settings.php');

	/* --------------SIDEBAR REGISTRATION----------------*/

	require_once('include/register-sidebar.php');

		/* --------------PAGINATION ----------------*/

	require_once('include/pagination.php');


  /* ----------- DISABLE WP EMOJICONS ------------------- */


  /* -------------- LANGUAGES ----------------------- */

  require_once('include/languages.php');

  /* ----------- GET WIDGETS ----------------------- */

  require_once('include/widget.php');

    /* ----------- SEARCH URL REWRITE ----------------------- */

  require_once('include/search_rewrite_url.php');

  //require_once('include/emojicons.php');
?>