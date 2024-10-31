<?php

/**
 * Fired during plugin activation
 *
 * @link       https://technifyguru.com/
 * @since      1.0.0
 *
 * @package    Tgptm
 * @subpackage Tgptm/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Tgptm
 * @subpackage Tgptm/includes
 * @author     Technify Guru <contact@technifyguru.com>
 */
class Tgptm_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$path = 'tg-product-tab-manager-pro/tg-product-tab-manager-pro.php';

		if ( function_exists('is_plugin_active') && is_plugin_active($path)) {
			wp_die( sprintf(__( 'You have already installed the pro version of this plugin. If you still want to use the free version, you need to %sdeactivate%s and delete the pro version from the plugins page', 'product-tab-manager' ), '<a href="' . wp_nonce_url( 'plugins.php?action=deactivate&amp;plugin=tg-product-tab-manager-pro%2Ftg-product-tab-manager-pro.php&amp;plugin_status=all&amp;paged=1&amp;s=', 'deactivate-plugin_tg-product-tab-manager-pro/tg-product-tab-manager-pro.php' ) . '">', '</a>') );
		}

	}

}
