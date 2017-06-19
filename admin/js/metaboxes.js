jQuery(document).ready(function($) {

	$('.settings-btn-mbox .btn-mbox a').click(function(e) {
		$('.tab-pane').hide();
   		$(this.hash).show();
   		$('.settings-btn-mbox .btn-mbox').removeClass('active');
   		$(this).parent().addClass('active');
   		e.preventDefault();
	});

	var $template_select = jQuery('select#page_template'),
		$template_box = jQuery('#normal-sortables');

	$template_select.change(function() {
		var this_value = jQuery(this).val();
		$('#mini_description').css('display','none');
		$('#home_link_enabler').css('display','none');
		$('#home_link').css('display','none');
		$('#staff_content').css('display','none');
		$('#contact_information').css('display','none');
		$('#social_link').css('display','none');
		$('#postdivrich').css('display','none');
		$('#subtitle').css('display','none');
		$('#taxonomy_selector').css('display','none');
		$('#page_gallery').css('display','none');
		$('#carousel_fields').css('display','none');
		$('#carousel_selector').css('display','none');

		switch ( this_value ) {
			case 'default':
				$('#postdivrich').css('display','block');
				$('#contact_information').css('display','none');
				break;
			case 'templates/template-home.php':
				$('#mini_description').css('display','block');
				$('#home_link_enabler').css('display','block');
				break;
			case 'templates/template-carousel.php':
				$('#page_content').css('display','block');
				$('#carousel_selector').css('display','block');
				break;
			case 'templates/template-contact.php':
				$('#contact_information').css('display','block');
				$('#social_link').css('display','block');
				break;
			case 'templates/template-gallery.php':
				$('#page_content').css('display','block');
				$('#page_gallery').css('display','block');
				break;
			case 'templates/template-portfolio.php':
				$('#page_content').css('display','block');
				$('#taxonomy_selector').css('display','block');
				break;
			case 'templates/template-fullwidth.php':
				$('#page_content').css('display','block');
		}
	});

	$template_select.trigger('change');
	$( '.cd-select-page' ).each(function() {
		$(this).dropdown( {});
	});

	$('.icon-select').each(function() {
		$(this).find('.cd-select').dropdown( {
			stack: false
		});
        var spanContent = $(this).find('.cd-dropdown span').html();
        $(this).find('.cd-dropdown > span').prepend('<span class="fa '+spanContent+'"></span>');
	});

  jQuery('.custom_clear_image_button').click(function() {
      var defaultImage = jQuery(this).parent().parent().siblings('.custom_default_image').text();
      jQuery(this).parent().siblings('.custom_upload_image').val('');
      jQuery(this).parent().siblings('.custom_preview_image').attr('src', defaultImage);
      jQuery(this).parent().parent().removeClass('image-added');
      return false;
  });
});
