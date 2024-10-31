<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://technifyguru.com
 * @since      1.0.0
 *
 * @package    Product_Tab_Manager
 * @subpackage Product_Tab_Manager/admin/partials
 */

 // check user capabilities
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}
?>


<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
	<h2><?php echo esc_html(get_admin_page_title(), 'product-tab-manager'); ?></h2>
	<?php settings_errors(); ?>
	<form method="post" action="options.php"> 
		<div class="postbox">
			<div class="inside">
				<?php do_settings_sections( 'tgptm_default_tabs' ); ?>
				<?php settings_fields( 'tgptm_default_tabs' ); ?>
			</div>
		</div>
		
		<?php submit_button(); ?>
		
	</form>
</div>