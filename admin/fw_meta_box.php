<?php
/**
 *	Class for the definition of new custom metaboxes
 *
 *	@version 	0.2
 */
class fw_meta_box {

	//Properties of a MetaBox
	private $id;
	private $title;
	private $post_type;
	private $context;
	private $priority;
	private $callback_args = array();

	private $fields = array();

	/**
	 *	Constructor: sets the properties for the metabox, registers the actions
	 *	for its creation and to save the fields
	 *
	 *	@since 	0.1
	 *	@var 	string 	$i 		id for the metabox
	 *	@var 	string 	$t 		title of the metabox
	 *	@var 	string 	$p 		post type related to the metabox
	 *	@var 	string 	$c 		context of the metabox
	 *	@var 	string 	$pr 	priority for the metabox
	 */
	public function __construct( $i, $t, $p = 'post', $c = 'normal', $pr = 'default', $cl = array() ) {
		$this->id = $i;
		$this->title = $t;
		$this->post_type = $p;
		$this->context = $c;
		$this->priority = $pr;
		$this->callback_args = $cl;

		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_custom_meta' ) );
	}

	/**
	 *	Method that creates the metabox with the help of the core funciton add_meta_box()
	 */
	public function add_meta_box() {
		add_meta_box(
			$this->id,
			$this->title,
			array( $this, 'display_meta_box' ),
			$this->post_type,
			$this->context,
			$this->priority,
			$this->callback_args
		);
	}

	/**
	 *	Method for display the metabox and its fields
	 *
	 *	@since 	0.1
	 *	@var 	array 	$post 	array that contain the current post
	 */
	public function display_meta_box( $post, $metabox ) {
		wp_nonce_field( basename( __FILE__ ), 'custom_meta_box_nonce' ); ?>
		<?php if ($this->id == 'page_metaboxes') { ?>
			<div class="wrap">
				<div class="wrap-settings-mbox">
					<div class="settings-container">
						<ul class="settings-btn-mbox">
							<li class="btn-mbox active">
								<a href="#page_metabox_general" id="general-btn">Settings</a>
							</li>
							<li class="btn-mbox">
								<a href="#page_metabox_map" id="header-btn">Google Map</a>
							</li>
						</ul>
						<div id="settings-tabs" class="meta-width"> <?php
		}
		else if ($this->id == 'single_metaboxes') { ?>
			<div class="wrap">
				<div class="wrap-settings-mbox">
					<div class="settings-container">
						<ul class="settings-btn-mbox">
							<li class="btn-mbox active">
								<a href="#post_metabox_single" id="general-btn">Settings</a>
							</li>
							<li class="btn-mbox">
								<a href="#post_metabox_grid" id="general-btn">Grid visualization</a>
							</li>
						</ul>
						<div id="settings-tabs" class="meta-width"> <?php
		}
		echo "<div class='group-field'>";
		foreach( $this->fields as $field ) {
			$meta = get_post_meta( $post->ID, $field[ 'id' ], true );
			if (($field[ 'type' ] != 'section') && ($field[ 'type' ] != 'end-section'))  {
				echo '<div class="inner-field">
					<div class="field-description">
						<label for="'.$field['id'].'">' .$field['label']. '</label>
						<small>'.$field['desc'].'</small>
					</div>
					<div class="metabox-content">';
			}
			switch( $field[ 'type' ] ) {
				case 'text':
					echo "<input type='text' name='" . $field[ 'id' ] . "' id='" . $field[ 'id' ] . "' value='" . $meta . "' size='30' />";
					break;
				case 'textarea':
					echo "<textarea name='" . $field[ 'id' ] . "' id='" . $field[ 'id' ] . "' cols='40' rows='4'>" . $meta . "</textarea>";

					break;
				case 'image':
				$image = get_template_directory_uri().'/admin/img/image.jpg';
				echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
				if ($meta) {
					$image = wp_get_attachment_image_src($meta, 'medium'); $image = $image[0]; }
				?>
				<div class="product-image">
					<input name="<?php echo $field['id'] ?>" type="hidden" class="custom_upload_image" value="<?php echo $meta; ?>" />
					<img src="<?php if ( $meta != "" ) { echo $meta; } else { echo $image; }  ?>" class="custom_preview_image" alt="" width="150" /><br />
					<input class="custom_upload_image_button upload_product_image button" type="button" value="Choose Image" />
					<small> <a href="#" class="custom_clear_image_button">Remove Image</a></small>
				</div>
				<?php	break;
				case 'section' :
				?>
					<div class="tab-pane" id="<?php echo $field['id']; ?>">
						<div id="options-<?php echo $field['id']; ?>" class="options">
				<?php break;
				case 'end-section' :
					?>
						</div>
					</div>
				<?php break;
				case 'checkbox':
					?>
						<div id="<?php echo $field['id']; ?>-container" class="check">
							<input type="checkbox" name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" class="on_off" <?php if( $meta == true ) { ?>checked="checked"<?php } ?> />
							<span></span>
							<div class="clearfix"></div>
						</div>
						<script type="text/javascript">
							jQuery( document ).ready( function( $ ) {
							$( '#<?php echo $field['id']; ?>-container span' ).click( function() {
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
					<?php
					break;
				case 'checkbox-show':
					?>
					<div id="<?php echo $field['id']; ?>-container" class="check">
						<input type="checkbox" name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" class="on_off" <?php if( $meta == true ) { ?>checked="checked"<?php } ?> />
						<span></span>
						<div class="clearfix"></div>
					</div>
					<script type="text/javascript">
						jQuery( document ).ready( function( $ ) {
							var input = $('#<?php echo $field['id']; ?>-container span' ).prev( 'input' );
              var checked = input.attr( 'checked' );
							$( '#<?php echo $field['id']; ?>-container span' ).click( function() {
								var input = $( '#<?php echo $field['id']; ?>-container span' ).prev( 'input' );
								var checked = input.attr( 'checked' );
								if( checked ) {
									input.attr( 'checked', false ).attr( 'value', 0 ).removeClass('onoffchecked');
									$('#home_link').removeClass('show');
								} else {
									input.attr( 'checked', true ).attr( 'value', 1 ).addClass('onoffchecked');
									$('#home_link').addClass('show');
								}
								input.change();
							} );
							if( checked ) {
                $('#home_link').addClass('show');
              } else {
                $('#home_link').removeClass('show');
              }
						});
						</script>
					<?php
					break;
				case 'select':
			    echo "<select name='" . $field[ 'id' ] . "' id='" . $field[ 'id' ] . "'>";
			    foreach ( $field[ 'options' ] as $option ) {
			    	echo "<option", $meta == $option[ 'value' ] ? " selected='selected'" : "", " value='" . $option[ 'value' ] . "'>" . $option[ 'label' ] . "</option>";
			    }
			    echo "</select>";
			    break;
				case 'wysiwyg':
			    wp_editor( $meta ? $meta : $field['std'], $field['id'], isset( $field['options'] ) ? $field['options'] : array() );
			    break;
			}
			if (($field[ 'type' ] != 'section') && ($field[ 'type' ] != 'end-section'))  {
				echo "</div></div>";
			}
		}
		echo "</div></div></div></div></div>";
	}
	/**
	 *	Metohd to save the fields
	 *
	 *	@since 	0.1
	 *	@var 	int 	$post_id 	id of the current post
	 */
	public function save_custom_meta( $post_id ) {

		if( !isset( $_POST[ 'custom_meta_box_nonce' ] ) || !wp_verify_nonce( $_POST[ 'custom_meta_box_nonce' ], basename( __FILE__ ) ) ) {
			return $post_id;
		}
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		if( 'page' == $_POST[ 'post_type' ] ) {
			if( !current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		foreach ( $this->fields as $field ) {
			$old = get_post_meta( $post_id, $field[ 'id' ], true );
			$new = $_POST[ $field[ 'id' ]];
			if( $new && $new != $old ) {
				update_post_meta( $post_id, $field[ 'id' ], $this->sanitize_custom_meta( $new, $field[ 'type' ] ) );
				//update_post_meta( $post_id, $field[ 'id' ], $new );
			} elseif ( '' == $new && $old ) {
				delete_post_meta( $post_id, $field[ 'id' ], $old );
			}
		}
	}

	/**
	 *	Method for the sanitization of the values of the fields before the save
	 *
	 *	@since 	0.1
	 *	@var 	$data 			the field to check
	 *	@var 	$type 	string 	the type of the field
	 */
	public function sanitize_custom_meta( $data, $type ) {
		$data_safe = null;
		switch( $type ) {
			case 'text':
				$data_safe = sanitize_text_field( $data );
				break;
			case 'link':
				$data_safe = esc_url( $data );
				break;
			case 'textarea':
				$data_safe = trim( $data );
    			$data_safe = esc_textarea( strip_tags( $data_safe ) );
				break;
			/*case 'color':
				if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $data ) ) {
					$date_safe = $data;
				}
				break;*/
			case 'color-test':
				$data_safe = sanitize_text_field( $data );
				break;
			default:
				return $data;
		}
		return $data_safe;
	}

	/**
	 *	Method for adding the fields to the metabox
	 *
	 *	@since 	0.1
	 *	@var 	array 	$args 	array of arguments that define a field
	 */
	public function add_fields( $args ) {
		foreach( $args as $arg ) {
			array_push( $this->fields, $arg );
		}
	}

	/**
	 *	Getter method for the retrieve of the fields
	 *
	 *	@since 	0.1
	 */
	public function get_fields() {
		print_r( $this->fields );
	}
}
?>