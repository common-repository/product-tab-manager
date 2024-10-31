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
    <div class="tgqb-d-flex">
        <div class="tgqb-card">
            <h3>Upgrade To TG Product Tab Manager Pro</h3>
            <p>
                This plugin allows you to create custom tabs for your woocommerce product pages. Create unlimited tabs. Tabs can be renamed, removed and re-ordered on the product page.
            </p>
            <div class="tgqb-d-flex">
                <a href="https://technifyguru.com/plugins/product-tab-manager/" target="_blank" class="button">Get Pro Version</a>
            </div>
        </div>
    </div>

	<?php include_once( ( __DIR__ ) . '/tgptm-footer.php' ); ?>

</div>