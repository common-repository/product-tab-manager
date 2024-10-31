<?php 
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://http://www.technifyguru.com/
 * @since      1.0.0
 *
 * @package    Tgwt
 * @subpackage Tgwt/admin/partials
 */

// check user capabilities
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">    

    <h2><?php echo esc_html(get_admin_page_title(), 'product-tab-manager'); ?></h2>
    <p><i>Nothing here</i></p>
	<?php include_once( ( __DIR__ ) . '/tgptm-footer.php' ); ?>

</div>