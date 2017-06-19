jQuery(document).ready(function($) {

	$('.settings-btn .btn a').click(function(e) {
		$('.tab-pane').hide();
   		$(this.hash).show();
   		$('.settings-btn .btn').removeClass('active');
   		$(this).parent().addClass('active');
   		e.preventDefault();
	});

	// Preloading on/off
	var inputPrealoading = $('#fw_enable_page_preloading-container span' ).prev( 'input' );
	var checkedPreloading = inputPrealoading.attr( 'checked' );
	$('#fw_enable_page_preloading-container span').click(function() {
		var inputPrealoading = $('#fw_enable_page_preloading-container span').prev( 'input' );
		var checkedPreloading = inputPrealoading.attr( 'checked' );
		if ( checkedPreloading ) {
			inputPrealoading.addClass('onoffchecked');
			$('#fw_disable_preloader-container').css('display','none');
			$('.fw_preloading_title').css('display','none');
			$('.fw_preloading_text').css('display','none');

		}
		else {
			inputPrealoading.removeClass('onoffchecked');
			$('#fw_disable_preloader-container').css('display','block');
			$('.fw_preloading_title').css('display','block');
			$('.fw_preloading_text').css('display','block');
		}
		inputPrealoading.change();
	});
	if ( checkedPreloading ) {
		$('#fw_disable_preloader-container').css('display','block');
		$('.fw_preloading_title').css('display','block');
		$('.fw_preloading_text').css('display','block');
	}
	else {
		$('#fw_disable_preloader-container').css('display','none');
		$('.fw_preloading_title').css('display','none');
		$('.fw_preloading_text').css('display','none');
	}

	//Post meta on/off

	var inputMeta = $('#fw_disable_post_meta-container span' ).prev( 'input' );
	var checkedMeta = inputMeta.attr( 'checked' );

	$('#fw_disable_post_meta-container span').click(function(){
		var inputMeta = $('#fw_disable_post_meta-container span' ).prev( 'input' );
		var checkedMeta = inputMeta.attr( 'checked' );
		if ( checkedMeta ) {
			inputMeta.addClass('onoffchecked');
			$('#fw_disable_author-container').css('display','block');
			$('#fw_disable_category-container').css('display','block');
			$('#fw_disable_tags-container').css('display','block');
			$('#fw_disable_social-container').css('display','block');
		}
		else {
			inputMeta.removeClass('onoffchecked');
			$('#fw_disable_author-container').css('display','none');
			$('#fw_disable_category-container').css('display','none');
			$('#fw_disable_tags-container').css('display','none');
			$('#fw_disable_social-container').css('display','none');
		}
		inputMeta.change();
	});

	if ( checkedMeta ) {
		$('#fw_disable_author-container').css('display','none');
		$('#fw_disable_category-container').css('display','none');
		$('#fw_disable_tags-container').css('display','none');
		$('#fw_disable_social-container').css('display','none');
	}
	else {
		$('#fw_disable_author-container').css('display','block');
		$('#fw_disable_category-container').css('display','block');
		$('#fw_disable_tags-container').css('display','block');
		$('#fw_disable_social-container').css('display','block');
	}

	//Social on/off

	var inputSocial = $('#fw_disable_social-container span' ).prev( 'input' );
	var checkedSocial = inputSocial.attr( 'checked' );

	$('#fw_disable_social-container span').click(function(){
		var inputSocial = $('#fw_disable_social-container span' ).prev( 'input' );
		var checkedSocial = inputSocial.attr( 'checked' );
		if ( checkedSocial ) {
			inputSocial.addClass('onoffchecked');
			$('#fw_enable_facebook_share-container').css('display','block');
			$('#fw_enable_twitter_share-container').css('display','block');
			$('#fw_enable_googleplus_share-container').css('display','block');
			$('#fw_enable_pinterest_share-container').css('display','block');
		}
		else {
			inputSocial.removeClass('onoffchecked');
			$('#fw_enable_facebook_share-container').css('display','none');
			$('#fw_enable_twitter_share-container').css('display','none');
			$('#fw_enable_googleplus_share-container').css('display','none');
			$('#fw_enable_pinterest_share-container').css('display','none');
		}
		inputSocial.change();
	});

	if ( checkedSocial ) {
		$('#fw_enable_facebook_share-container').css('display','none');
		$('#fw_enable_twitter_share-container').css('display','none');
		$('#fw_enable_googleplus_share-container').css('display','none');
		$('#fw_enable_pinterest_share-container').css('display','none');
	}
	else {
		$('#fw_enable_facebook_share-container').css('display','block');
		$('#fw_enable_twitter_share-container').css('display','block');
		$('#fw_enable_googleplus_share-container').css('display','block');
		$('#fw_enable_pinterest_share-container').css('display','block');
	}
});

