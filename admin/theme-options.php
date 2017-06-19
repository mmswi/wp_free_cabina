<?php

$themename = "Abito";
$shortname = "fw";
$options = array (
    array( "name" => $themename." Options",
           "type" => "title"),
    array( "type" => "open"),

    /* BEGIN General Settings */

    array( "name" => "General Settings",
		   		 "id" => "sec-general",
           "type" => "section"),

    array( "name" => "Main color",
           "desc" => "Set the main color of your site",
           "id" => $shortname."_main_color",
           "type" => "color",
           "std" => '#009EE0'),

    array( "name" => "Favicon",
           "desc" => "Upload the image or copy and paste the image url in the field.",
           "id" => $shortname."_favicon",
           "type" => "image",
           "std" => ''.get_bloginfo('template_directory').'/img/favicon.ico'),

    array( "name" => "Home page top image",
           "desc" => "Upload the image that goes on the top of the Homepage",
           "id" => $shortname."_home_big_image",
           "type" => "image",
           "std" => ''.get_bloginfo('template_directory').'/img/home-big-image.jpg'),

    array( "name" => "Home page top image overlay",
           "desc" => "Add a dark overlay on the top image in home page.",
           "id" => $shortname."_onoff_home_big_image_overlay",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Slogan",
           "desc" => "Enter text used as slogan over the image in the homepage.",
           "id" => $shortname."_home_slogan",
           "type" => "textarea",
           "std" => ""),

    array( "name" => "White slogan",
           "desc" => "Use white color for the slogan instead of the default one (black).",
           "id" => $shortname."_onoff_white_slogan",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Map pin icon",
           "desc" => "Upload the image used as pin in the map",
           "id" => $shortname."_map_pin",
           "type" => "image",
           "std" => ''.get_bloginfo('template_directory').'/img/pin.png'),

    array( "type" => "submit"),

    array( "type" => "end-section"),

    /* END General Settings */
    /* BEGIN Header Settings */

    array( "name" => "Header Settings",
           "id" => "sec-header",
           "type" => "section"),

    array( "name" => "Black Logo",
           "desc" => "Upload your logo image or copy and paste its image url if you have just uploaded it. <br/>Optimal logo height: 33px.",
           "id" => $shortname."_logo",
           "type" => "image",
           "std" => ''.get_bloginfo('template_directory').'/img/black-logo.png'),

    array( "name" => "White Logo",
           "desc" => "Upload your logo imagefor white headers or copy and paste its image url if you have just uploaded it. <br/>Optimal logo height: 33px.",
           "id" => $shortname."_white_logo",
           "type" => "image",
           "std" => ''.get_bloginfo('template_directory').'/img/white-logo.png'),

    array( "name" => "Logo Image Height",
           "desc" => "Set the height of logo image. Default 33px",
           "id" => $shortname."_logo_height",
           "type" => "select-size",
           "std" => '33'),

    array( "name" => "Logo Image Height Smaller Header",
           "desc" => "Set the height of the logo when there is the smaller header. Default 27px",
           "id" => $shortname."_logo_mini_height",
           "type" => "select-size",
           "std" => '27'),

    array( "name" => "Hamburger Menu on Desktop",
           "desc" => "Use Hamburger Menu also on desktop Website",
           "id" => $shortname."_hm_desktop",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Dark Menu on Home Page",
           "desc" => "Set the hamburger dark menu for the home page",
           "id" => $shortname."_home_dark_menu",
           "type" => "checkbox",
           "std" => ''),

    array( "type" => "submit"),

    array( "type" => "end-section"),
    /* END Header Settings */
    /* BEGIN Grid Settings */

    array( "name" => "Grid Settings",
           "id" => "sec-grid",
           "type" => "section"),

    array( 'name' => 'Select the grid',
           'desc'  => 'Select grid you want to use (default "Masonry")',
           'id'    => $shortname.'_grid_select',
           'type'  => 'select-grid',
           'std'   => 'creative',
           'options' => array (
             'two' => array (
               'label' => 'Creative',
               'value' => 'creative'
             ),
             'one' => array (
               'label' => 'Masonry',
               'value' => 'standard'
             )
           )
         ),

    array( "name" => "Enable infinite scroll",
           "desc" => "Use infinite scroll to load posts in the grid.",
           "id" => $shortname."_on_infinite_scroll",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Masonry Grid 3 Columns",
       "desc" => "Expand Masonry Grid to 3 Columns (for a resolution greater than 1640px)",
       "id" => $shortname."_masonry_expand",
       "type" => "checkbox",
       "std" => ''),

    array( "name" => "Enable images desaturation",
           "desc" => "Enable the desaturation effect .",
           "id" => $shortname."_onoff_desaturate",
           "type" => "checkbox",
           "std" => ''),

    array( 'name' => 'Show Date / Category',
           'desc'  => 'Select what do you want to show on grid items (date or category)',
           'id'    => $shortname.'_grid_select_date_category',
           'type'  => 'select',
           'std'   => 'date',
           'options' => array (
             'one' => array (
               'label' => 'None',
               'value' => 'none'
             ),
             'two' => array (
               'label' => 'Date',
               'value' => 'date'
             ),
             'three' => array (
               'label' => 'Category',
               'value' => 'category'
             )
           )
         ),

    array( "type" => "submit"),
    array( "type" => "end-section"),


    /* END Grid Settings */
    /* BEGIN Post Settings */

    array( "name" => "Post Settings",
           "id" => "sec-post",
           "type" => "section"),

    array( "name" => "Exclude categories",
           "desc" => "Select which categories you want to exclude from blog and category widget in the sidebar",
           "id" => $shortname."_exclude_cat",
           "type" => "checkbox-group",
           "std" => ''),

    array( "name" => "Categories top image overlay",
           "desc" => "Add a dark overlay on the top image in categories.",
           "id" => $shortname."_onoff_category_image_overlay",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Disable post date",
           "desc" => "If checked, it doesn't show the date of publication",
           "id" => $shortname."_disable_date",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Disable post meta",
           "desc" => "If checked, it doesn't show the post meta box (author, category, tags, social)",
           "id" => $shortname."_disable_post_meta",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Disable author",
           "desc" => "If checked, it doesn't show the post author",
           "id" => $shortname."_disable_author",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Disable category",
           "desc" => "If checked it doesn't show the post categories",
           "id" => $shortname."_disable_category",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Disable tags",
           "desc" => "If checked it doesn't show the tags",
           "id" => $shortname."_disable_tags",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Disable social",
           "desc" => "Disable the post sharing",
           "id" => $shortname."_disable_social",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Enable share on faceBook",
           "desc" => "Enable Facebook share button in the articles",
           "id" => $shortname."_enable_facebook_share",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Enable share on twitter",
           "desc" => "Enable Twitter share button in the articles",
           "id" => $shortname."_enable_twitter_share",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Enable share on google plus",
           "desc" => "Enable Google Plus share button in the articles",
           "id" => $shortname."_enable_googleplus_share",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Enable share on pinterest",
           "desc" => "Enable Pinterest share button in the articles",
           "id" => $shortname."_enable_pinterest_share",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Disable next posts section",
           "desc" => "Disable 'next posts' section in a single post",
           "id" => $shortname."_disable_next_posts",
           "type" => "checkbox",
           "std" => ''),

    array( "type" => "submit"),

    array( "type" => "end-section"),


    /* END Post Settings */
    /* BEGIN Preloader Settings */

    array( "name" => "Preloader Settings",
           "id" => "sec-preloader",
           "type" => "section"),

    array( "name" => "Enable Preloader",
           "desc" => "Enable page preloading",
           "id" => $shortname."_enable_page_preloading",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Remove animated preloader bar",
           "desc" => "Remove the animated preloader bar",
           "id" => $shortname."_disable_preloader",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Preloading title",
           "desc" => "Insert the title used in the preloading page",
           "id" => $shortname."_preloading_title",
           "type" => "textarea",
           "std" => 'ābito'),

    array( "name" => "Preloading text",
           "desc" => "Insert the text used in the preloading page",
           "id" => $shortname."_preloading_text",
           "type" => "textarea",
           "std" => 'sewing your page'),

    array( "type" => "submit"),

    array( "type" => "end-section"),


    /* END Preloader Settings */
    /* BEGIN Social Settings */

    array( "name" => "Social Settings",
           "id" => "sec-social",
           "type" => "section"),

    array( "name" => "Open links in a new window",
           "desc" => "Open social links in a new window",
           "id" => $shortname."_onoff_social_blank",
           "type" => "checkbox",
           "std" => 'checked'),

    array( "name" => "Disable social on footer",
           "desc" => "Disable social links on footer",
           "id" => $shortname."_disable_social_footer",
           "type" => "checkbox",
           "std" => ''),

    array( "name" => "Facebook link",
           "desc" => "Enter the URL of your facebook page or profile.",
           "id" => $shortname."_facebook_link",
           "type" => "text",
           "std" => ""),

    array( "name" => "Twitter link",
             "desc" => "Enter the URL of your twitter profile.",
             "id" => $shortname."_twitter_link",
             "type" => "text",
             "std" => ""),

    array( "name" => "Google Plus link",
             "desc" => "Enter the URL of your google plus profile.",
             "id" => $shortname."_googleplus_link",
             "type" => "text",
             "std" => ""),

    array( "name" => "Instagram link",
             "desc" => "Enter the URL of your instagram profile.",
             "id" => $shortname."_instagram_link",
             "type" => "text",
             "std" => ""),

    array( "name" => "Pinterest link",
             "desc" => "Enter the URL of your pinterest page.",
             "id" => $shortname."_pinterest_link",
             "type" => "text",
             "std" => ""),

    array( "name" => "Linkedin link",
             "desc" => "Enter the URL of your linkedin profile.",
             "id" => $shortname."_linkedin_link",
             "type" => "text",
             "std" => ""),

    array( "name" => "Flickr link",
             "desc" => "Enter the URL of your flickr profile.",
             "id" => $shortname."_flickr_link",
             "type" => "text",
             "std" => ""),

    array( "name" => "YouTube link",
             "desc" => "Enter the URL of your youtube channel.",
             "id" => $shortname."_youtube_link",
             "type" => "text",
             "std" => ""),

    array( "name" => "Tumblr link",
             "desc" => "Enter the URL of your tumblr page.",
             "id" => $shortname."_tumblr_link",
             "type" => "text",
             "std" => ""),

    array( "name" => "VK link",
             "desc" => "Enter the URL of your VK page.",
             "id" => $shortname."_vk_link",
             "type" => "text",
             "std" => ""),

    array( "type" => "submit"),

    array( "type" => "end-section"),


    /* END Social Settings */
    /* BEGIN Footer Settings */

    array( "name" => "Footer Settings",
           "id" => "sec-footer",
           "type" => "section"),

    array( "name" => "Footer title",
           "desc" => "Insert the footer title",
           "id" => $shortname."_footer_title",
           "type" => "text",
           "std" => 'ābito'),

    array( "name" => "Footer description",
           "desc" => "Insert the description used in the footer",
           "id" => $shortname."_footer_description",
           "type" => "textarea",
           "std" => 'Insert here the description'),

    array( "name" => "Footer copyright",
           "desc" => "Insert the text used as copyright",
           "id" => $shortname."_footer_copy",
           "type" => "textarea",
           "std" => 'Insert here the copyright'),

    array( "name" => "Google Analytics code",
           "desc" => "Paste your Google Analytics or other tracking code in this box.",
           "id" => $shortname."_ga_code",
           "type" => "textarea",
           "std" => ""),
    array( "type" => "submit"),

    array( "type" => "end-section"),


    /* END Footer Settings */
    /* BEGIN 404 Settings */

    array( "name" => "404 Settings",
           "id" => "sec-404",
           "type" => "section"),

    array( "name" => "404 big image",
           "desc" => "Upload the image used as background when a page/post isn't found",
           "id" => $shortname."_404_background",
           "type" => "image",
           "std" => ''.get_bloginfo('template_directory').'/img/home-big-image.jpg'),

    array( "name" => "404 text",
           "desc" => "Insert the text used as description in the 404 page",
           "id" => $shortname."_404_text",
           "type" => "textarea",
           "std" => 'Sorry page not found'),

    array( "name" => "404 Button",
           "desc" => "Insert the text used on the button in the 404 page",
           "id" => $shortname."_404_button",
           "type" => "text",
           "std" => 'Home'),

    array( "type" => "submit"),

    array( "type" => "end-section"),


    /* END 404 Settings */

    array( "type" => "close"));


function mytheme_add_admin() {

	global $themename, $shortname, $options;

	if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) {
    if ( !empty( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {
		  if ( 'save' == $_REQUEST['action'] ) {

    		foreach ($options as $value) {
          if ( array_key_exists('id', $value) ) {
    		    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
          }

    		header("Location: themes.php?page=theme-options.php&saved=true");
    		die;

    		} else if( 'reset' == $_REQUEST['action'] ) {

    		foreach ($options as $value) {
    		delete_option( $value['id'] ); }

    		header("Location: themes.php?page=theme-options.php&reset=true");
    		die;
      }
		}
	}
 	add_menu_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_add_init() {
	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("functions", $file_dir."/admin/css/theme-option.css", false, "1.0", "all");
}

function mytheme_admin() {

	global $themename, $shortname, $options;

	if(isset($_REQUEST['saved'])) {
		if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	}
	if(isset($_REQUEST['reset'])) {
		if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	}

?>

	<div class="wrap">
		<h2><?php echo $themename; ?> Settings</h2>
		<p class="read-documentation">Need help? View the <a href="http://abito.fedeweb.net/docs" target="_blank">documentation</a> or send us an email to <a href="mailto:abito@fedeweb.net" target="_blank">abito@fedeweb.net</a> </p>
		<div class="wrap-settings">
			<div class="settings-container">
				<ul class="settings-btn">
					<li class="btn active">
						<a href="#sec-general" id="general-btn">General</a>
					</li>
          <li class="btn">
            <a href="#sec-header" id="header-btn">Header</a>
          </li>
					<li class="btn">
						<a href="#sec-grid" id="grid-btn">Grid</a>
					</li>
					<li class="btn">
						<a href="#sec-post" id="post-btn">Post</a>
					</li>
					<li class="btn">
						<a href="#sec-preloader" id="preloader-btn">Preloader</a>
					</li>
					<li class="btn">
						<a href="#sec-social" id="social-btn">Social</a>
					</li>
          <li class="btn">
            <a href="#sec-footer" id="footer-btn">Footer</a>
          </li>
          <li class="btn">
            <a href="#sec-404" id="notfound-btn">404</a>
          </li>
				</ul>
				<div id="settings-tabs">
				 	<form method="post">
					<?php foreach ($options as $value) {
						switch ( $value['type'] ) {


					case "section" :
					?>
						<div class="tab-pane" id="<?php echo $value['id']; ?>">
							<div class="section-header">
								<h3 class="title-section"><?php echo $value['name']; ?></h3>
								<input name="save" type="submit" value="Save changes" class="save-btn"/>
								<input type="hidden" name="action" value="save" />
							</div>
							<div id="options-<?php echo $value['id']; ?>" class="options">
					<?php break;

					case "end-section" :
					?>
							</div>
						</div>
					<?php break;

					case "subsection" :
					?>
						<div class="subsection">
							<h4><?php echo $value['name']; ?></h4>
					<?php break;
					case "end-subsection" : ?>
					</div>
					<?php break;
					case 'text':
					?>
						<div class="text <?php echo $value['id']; ?>">
							<div class="field-description">
								<h4><?php echo $value['name']; ?></h4>
								<small><?php echo $value['desc']; ?></small>
							</div>
							<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( stripslashes(esc_attr(get_option($value['id']))) != "") { echo stripslashes(esc_attr(get_option((esc_attr($value['id']) )))); } else { echo $value['std']; } ?>" /><br/>

						</div>
					<?php
					break;
					case 'color':
					?>
						<div class="changecolor" id="<?php echo $value['id']; ?>-pick">
							<div class="field-description">
								<h4><?php echo $value['name']; ?></h4>
								<small><?php echo $value['desc']; ?></small>
							</div>

							<input type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
							<input type='button' class='pickcolor button-secondary' value='Select Color' />
							<div class='colorpicker'></div>

						</div>
						<script type="text/javascript">
							jQuery(document).ready(function($) {
								$('#<?php echo $value['id']; ?>-pick').each(function() {
									var divPicker = $(this).find('.colorpicker');
									var inputPicker = $(this).find('input[type=text]');
									divPicker.farbtastic(inputPicker);
									divPicker.hide();
						        $('.pickcolor', this).click(function(){
						           divPicker.fadeToggle('fast');
						        });
								});
							});
						</script>
						<?php
					break;
					case 'image' :
          ?>
            <div class="fw_upload">
              <div class="field-description">
                  <h4><?php echo $value['name']; ?></h4>
                  <small><?php echo $value['desc']; ?></small>
              </div>
              <input style="width:317px;" class="upload_image" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
              <input class="upload_image_button" type="button" value="Upload Image" />
              <div class="upload-image-container">
                <img src="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" alt="" title="" />
              </div><!-- #featured-footer-image-container -->
            </div>
          <?php
          break;
					case 'textarea':
					?>
						<div class="textarea <?php echo $value['id']; ?>">
							<div class="field-description">
								<h4><?php echo $value['name']; ?></h4>
								<small><?php echo $value['desc']; ?></small>
							</div>
							<textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( stripslashes(get_option( $value['id'] )) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea><br/>
						</div>
					<?php
					break;
					case 'checkbox'
					?>
						<div id="<?php echo $value['id']; ?>-container" class="check">
							<div class="field-description">
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
								<small><?php echo $value['desc']; ?></small>
							</div>

							<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="on_off" value="1" <?php checked( get_option( $value['id'] ), true ); ?> />
							<span></span>

						</div>
						<script type="text/javascript">
							jQuery( document ).ready( function( $ ) {
								$( '#<?php echo $value['id']; ?>-container span' ).click( function() {
									var input = $( this ).prev( 'input' );
									var checked = input.attr( 'checked' );
									if( checked ) {
										input.attr( 'checked', false ).attr( 'value', 0 ).removeClass('onoffchecked');
									} else {
										input.attr( 'checked', true ).attr( 'value', 1 ).addClass('onoffchecked');
									}
									input.change();
								} );
							} );
					</script>
          <?php break;
          case 'checkbox-group':?>
          <?php $checked_items = get_option($value['id']); ?>
          <div id="<?php echo $value['id']; ?>-container">
            <div class="field-description">
              <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
              <small><?php echo $value['desc']; ?></small>
            </div>

              <?php
              $cats = get_categories( 'orderby=name&use_desc_for_title=1&hierarchical=1&style=0&hide_empty=0' );
              $names = wp_get_object_terms($post->ID, 'category');
              ?>
              <ul id="category-list">
              <?php
              $c = 0;
              foreach($cats as $cat) {
                $checked = isset( $checked_items ) ? $checked_items : '';
                 ?>
                <li>
                  <input type="checkbox" class="checkbox" name="<?php echo $value['id']; ?>[]" value="<?php echo $cat->cat_ID; ?>" <?php if ($checked)  { checked( in_array( $cat->cat_ID, $checked ), true ); } ?> id="<?php echo $value['id']; ?>-<?php echo $c ?>" />
                  <label><?php echo $cat->name ?></label>
                </li>
              <?php $c++; } ?>
              </ul>
          </div>
          <?php break;
					case 'select-grid'?>
					<div class="radio-button-tabs">
  					<div class="field-description">
  						<h4><?php echo $value['name']; ?></h4>
  						<small><?php echo $value['desc']; ?></small>
  					</div>
					<?php
		    		foreach ( $value['options'] as $option ) {?>
			        	<input type="radio" name="<?php echo $value['id'] ?>" id="<?php echo $option['value'] ?>" value="<?php echo $option['value'] ?>"  <?php checked(get_option($value['id']),$option['value']); ?>/>
		                <label for="<?php echo $option['value'] ?>"><?php echo $option['label'] ?></label>
				    <?php }?>

			    </div>
					<?php break;
          case 'select'?>
          <div class="select-date-cat">
            <div class="field-description">
              <h4><?php echo $value['name']; ?></h4>
              <small><?php echo $value['desc']; ?></small>
            </div>
            <select class="select" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'];?>">
            <?php
              foreach ( $value['options'] as $option ) {?>

                  <option value="<?php echo $option['value'] ?>" <?php echo selected( get_option( $value['id'] ), $option['value'], false ); ?>><?php echo $option["label"] ?></option>

              <?php }?>
              </select>
          </div>
          <?php break;
          case 'select-size'
          ?>
          <div class="size-container">
            <div class="field-description">
                <h4><?php echo $value['name']; ?></h4>
                <small><?php echo $value['desc']; ?></small>
            </div>
            <div class="spinner_container">
              <input class="number" type="text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] ?>-size" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
              <div class="input-controls">
                <a href="#" id="<?php echo $value['id']; ?>-up" class="inc">+</a>
                <a href="#" id="<?php echo $value['id']; ?>-down" class="dec">-</a>
              </div>
            </div>
          </div>

          <script type="text/javascript">
            jQuery(document).ready( function($) {
              var el = $('#<?php echo $value['id'] ?>-size');
              function change( amt ) {
                el.val( parseInt( el.val(), 10 ) + amt );
              }
              $('#<?php echo $value['id']; ?>-up').click( function(e) {
                change( 1 );
                e.preventDefault();
              } );
              $('#<?php echo $value['id']; ?>-down').click( function(e) {
                change( -1 );
                e.preventDefault();
              } );
            } );
          </script>
          <?php
          break;
					case 'submit':
					?>
						<p class="submit">
							<input name="save" type="submit" value="Save changes" class="save-btn"/>
							<input type="hidden" name="action" value="save" />
						</p>

					<?php
					break;
					}
				}
			?>
				</form>
			</div>
		</div>
	</div>
	<form method="post">
		<p class="submit">
			<input name="reset" type="submit" value="Reset" />
			<input type="hidden" name="action" value="reset" />
		</p>
	</form>
</div>

<?php
}

add_action('admin_menu', 'mytheme_add_admin');
add_action('admin_init', 'mytheme_add_init');
?>