//Javacsript Document

(function($){

	$('.choose_logo').on('keyup',function(){
			
			 logoUrl = $('img',html).attr('src');
			 ext	 = logoUrl.split("/");
			 extLast	=	ext.last().split(".");
			 conosle.log(extLast);
			 if( (extLast[1] != 'jpg') || (extLast[1] != 'jpeg') || (extLast[1] != 'png') || (extLast[1] != 'gif') ){

			 	jQuery('#website_logo').val('');
			 	jQuery('.hide_settings').empty().html('Please Upload Image File Only').delay( 1000 ).fadeIn('slow');
			 
			 }else{

			 	jQuery('#website_logo').val(logoUrl);
			 }	

		});	
	
	
	$(document).ready(function(){

		$('.choose_logo').click(function(){

			var field = $('#wpss_upload_image').attr('name');
		    tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		    return false;
		});


		window.send_to_editor = function(html) {
		 logoUrl = $('img',html).attr('src');
		 jQuery('#website_logo').val(logoUrl);
		 tb_remove();
		}

		$('.hide_settings').delay( 1000 ).fadeOut('slow');

	});


}(jQuery));