<?php



$premiumname = "Abito Premium";
$shortname = "fw";
$premium_options = array (
    array( "name" => $premiumname." Features",
           "type" => "title"),
    array( "type" => "open"),

    /* General Settings */
    array( "name" => "Premium ",
    	   "id" => "sec-premium",
           "type" => "section"),

    array( "name" => "",
           "desc" => "",
           "id" => "",
           "type" => "premium",
           "std" => ""),

		array( "type" => "end-section"),
    array( "type" => "close"));


function mypremium_add_admin() {

	global $premiumname, $shortname, $premium_options;

	if (isset($_GET['page'])) {
		if ( $_GET['page'] == basename(__FILE__) ) {
			if ( 'save' == $_REQUEST['action'] ) {

			foreach ($premium_options as $value) {
			update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

			foreach ($premium_options as $value) {
			if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

			header("Location: themes.php?page=premium.php&saved=true");
			die;

			} else if( 'reset' == $_REQUEST['action'] ) {

			foreach ($premium_options as $value) {
			delete_option( $value['id'] ); }

			header("Location: themes.php?page=premium.php&reset=true");
			die;

			}
		}
	}
 	add_menu_page($premiumname, "$premiumname", 'edit_themes', basename(__FILE__), 'mypremium_admin');
}
function mypremium_add_init() {
	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("functions", $file_dir."/admin/css/theme-option.css", false, "1.0", "all");
}

function mypremium_admin() {

	global $themename, $shortname, $premium_options;

?>

	<div id="premium-box">
		<p class="box-title">Thanks for using ābito.<br/><br/><span>The Premium version will come really soon!</span></p>
		<ul>
			<li><span>Powerful and easy to use page builder, built from scratch</span></li>
			<li><span>E-commerce integration</span></li>
			<li><span>Ajax navigation</span></li>
			<li><span>More grid layouts</span></li>
			<li><span>More layouts for posts and pages</span></li>
			<li><span>Portfolio layout</span></li>
			<li><span>Google Fonts</span></li>
			<li><span>And more</span></li>
		</ul>
		<p id="when-ready">Would you like to know <strong>when</strong> the premium version <strong>is ready?</strong> Fill the form below!<br/>
			A <strong>big discount</strong> only for subscribers!
		</p>
		<div id="mc_embed_signup">
			<form action="//fedeweb.us7.list-manage.com/subscribe/post?u=d1b2ae4a2522ecb1883b26b71&amp;id=6e51315f46" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<fieldset>
					<input type="text" name="FNAME" class="" id="mce-FNAME" value="Your Name" onfocus="if (this.value=='Your Name') this.value='';" onblur="if (this.value=='') this.value='Your Name';">
					<input type="email" name="EMAIL" class="required email last" id="mce-EMAIL" value="Your Email" onfocus="if (this.value=='Your Email') this.value='';" onblur="if (this.value=='') this.value='Your Email';">
				</fieldset>
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>
				<div style="position: absolute; left: -5000px;"><input type="text" name="b_d1b2ae4a2522ecb1883b26b71_6e51315f46" tabindex="-1" value=""></div>
				<div class="clear"><input type="submit" value="I want the discount" name="subscribe" id="mc-embedded-subscribe"></div>
			</form>
		</div>

	</div>

<?php
}

add_action('admin_menu', 'mypremium_add_admin');
add_action('admin_init', 'mypremium_add_init');
?>