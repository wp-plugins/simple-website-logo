<?php
/**
 * Plugin Name: Website Logo
 * Plugin URI: http://infogiants.com/
 * Description: A plugin to manage wordpress website logo, shortcode [WEBSITE_LOGO]
 * Version: 1.0
 * Author: Kapil yadav
 * Author URI: http://infogiants.com/
 */

if(! function_exists('websiteLogoPage')){

	function websiteLogoPage(){

		add_theme_page('Logo', 'Logo', 'edit_theme_options', 'website_logo', 'rednerWebsiteLogo');
	}
}

if(! function_exists('rednerWebsiteLogo')){


	function rednerWebsiteLogo(){

		wp_enqueue_style('thickbox');
		wp_enqueue_script('thickbox');
		wp_enqueue_script( 'media-upload'); 

		$logo_url	=	get_option('website_logo_unique');

		// Form
		$renderLogo	=	"<div class='wrap'><h2>Website Logo</h2>";

		if($_POST['is_web_logo'] == 'is_web_logo'){

			$renderLogo	.=	"<div id='setting-error-settings_updated' class='updated settings-error hide_settings'>
							<p><strong>Settings saved.</strong></p></div>";
		}
		
		$renderLogo	.=	"<form method='post'>
								<table class='form-table'>
									<tbody>
										<tr>
										<th scope='row'><label for='blogname'>Logo Url</label></th>
										<td><input name='website_logo' id='website_logo' value='".$logo_url."' class='regular-text' type='text'><a href='media-upload.php?type=image&TB_iframe=true' title='Choose Image' class='thickbox button'>Upload</a></td>
										</tr>
									</tbody>
								</table>
								<input type='hidden' name='is_web_logo' value='is_web_logo'>
								<p class='submit'><input name='submit' id='submit' class='button button-primary' value='Save Changes' type='submit'></p>
							</form>
							<p>Use shortcode: [WEBSITE_LOGO]</p>
						</div>";

		echo 	$renderLogo;
		
		//JS
		wp_enqueue_script('web',plugins_url( '/js/web.js' , __FILE__ ));				
	}
}

if(! function_exists('saveWebsiteLogo')){

	function saveWebsiteLogo(){

		if($_POST['is_web_logo']){
			$logo_url	=	sanitize_text_field($_POST['website_logo']);
			update_option('website_logo_unique', $logo_url);
		}
	}
}


if(! function_exists('getWebsiteLogo')){

	function getWebsiteLogo($height, $width){

		$logo = get_option('website_logo_unique');
		echo '<img src="'.$logo.'" width="'.$width.'" height="'.$height.'">';
	}


	// Add Logo Shortcode
	add_shortcode('WEBSITE_LOGO', 'getWebsiteLogo');
}



// Hooks
add_action('admin_menu', 'websiteLogoPage');
add_action('admin_init', 'saveWebsiteLogo');
?>