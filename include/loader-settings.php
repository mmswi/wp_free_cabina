<?php
	function fw_loader_data() { ?>
		<script type="text/javascript">
			var preloader_on_off = <?php if (get_option('fw_enable_page_preloading'))  { echo 'true'; } else { echo 'false'; }  ?>
		</script>
	<?php
	}
	add_action('wp_footer', 'fw_loader_data',100);
?>