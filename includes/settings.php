<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Admin menu
add_action( 'admin_menu', 'frontwp_add_admin_menu' ); // Add Admin Menu
if(!function_exists('frontwp_add_admin_menu')){
	function frontwp_add_admin_menu() { 
		add_options_page( 'Front Software Options', 'Front Software Options', 'manage_options', 'frontwp-options', 'frontwp_options_page' );
	}
}

//Register settings for custom log in logo 
function frontwp_register_settings() 
{
    $args = array(
            'type' => 'string', 
            'sanitize_callback' => 'sanitize_text_field',
            'default' => NULL,
   );
   register_setting( 'change_login_logo_options_group', 'frontwp_logo_url', $args);
   register_setting( 'change_login_logo_options_group', 'frontwp_logo_height', $args);
   register_setting( 'change_login_logo_options_group', 'frontwp_logo_width', $args);
}
add_action( 'admin_init', 'frontwp_register_settings' );

function frontwp_options_page() { 
    wp_enqueue_script('jquery');
	wp_enqueue_media();
    ?>
	<div class="wrap">
		<h1>Front Software Settings</h1>
		<h3>Login logo</h3>
        <p>Change the logo on the login page.</p>
		<form method="post" action="options.php">
			<?php settings_fields( 'change_login_logo_options_group' ); ?>
			<?php do_settings_sections( 'change_login_logo_options_group' ); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Login Logo</th>
					<td>
						<input type="text" id="frontwp_logo_url" name="frontwp_logo_url" value="<?php echo esc_attr( get_option('frontwp_logo_url') ); ?>" />
						<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Logo">
						<p class="description"><i>To use default logo, keep field empty.</i></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Height</th>
					<td>
						<input type="number" name="frontwp_logo_height" value="<?php echo esc_attr( get_option('frontwp_logo_height') ); ?>" />					
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Width</th>
					<td>
						<input type="number" name="frontwp_logo_width" value="<?php echo esc_attr( get_option('frontwp_logo_width') ); ?>" />
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
		<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#upload-btn').click(function(e) {
			e.preventDefault();
			var image = wp.media({ 
				title: 'Upload Logo',
				multiple: false
			}).open()
			.on('select', function(e){
				var uploaded_image = image.state().get('selection').first();
				console.log(uploaded_image);
				var image_url = uploaded_image.toJSON().url;
				$('#frontwp_logo_url').val(image_url);
			});
		});
	});
	</script>
	</div>
	<?php
}

