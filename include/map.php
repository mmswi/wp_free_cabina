<?php
	function fw_map_data() {
		global $post; ?>
		<script type="text/javascript">
			var latitude = <?php echo ((get_post_meta($post->ID, 'fw_latitude', true)) ? (get_post_meta($post->ID, 'fw_latitude', true)) : 45.465422) ?>;
			var longitude = <?php echo ((get_post_meta($post->ID, 'fw_longitude', true)) ? (get_post_meta($post->ID, 'fw_longitude', true)) : 9.185924) ?>;
			var greyscaleMap = '<?php echo ((get_post_meta($post->ID, 'fw_map_greyscale', true)) ? (get_post_meta($post->ID, 'fw_map_greyscale', true)) : 0); ?>';
			var pinLocation = '<?php echo ((get_post_meta($post->ID, 'fw_map_location', true)) ? (get_post_meta($post->ID, 'fw_map_location', true)) : 'Milano'); ?>';
			var mapPin = '<?php echo get_option('fw_map_pin') ?>';
		</script>
	<?php
	}
?>