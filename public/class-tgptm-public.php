<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://technifyguru.com/
 * @since      1.0.0
 *
 * @package    Tgptm
 * @subpackage Tgptm/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tgptm
 * @subpackage Tgptm/public
 * @author     Technify Guru <contact@technifyguru.com>
 */
class Tgptm_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tgptm_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tgptm_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tgptm-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tgptm_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tgptm_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tgptm-public.js', array( 'jquery' ), $this->version, false );

	}

	/**  */
	public function tgptm_default_product_tabs( $tabs ) { 
		
		
		/**
		 * =======================
		 * Default tabs
		 * =======================
		 */
		// Set default values for options that we are going to call below
		$tab_fields = ['description', 'reviews', 'additional_information'];

		// Get our options
		$options = get_option( 'tgptm_default_tabs' ); 
		foreach ($tab_fields as $tab) {
			if ( isset ( $options['tgptm_field_'.$tab.'_title'] )) {
				$tabs[$tab]['title'] = $options['tgptm_field_'.$tab.'_title'];              // Rename description tab
			}		
			if ( isset ( $options['tgptm_field_'.$tab.'_priority'] )) {
				$tabs[$tab]['priority'] = $options['tgptm_field_'.$tab.'_priority'];         // Change priority for description tab
			}		
			if ( isset ( $options['tgptm_field_'.$tab.'_hide'] )  && $options['tgptm_field_'.$tab.'_hide'] == 1) {
				unset( $tabs[$tab] );              									// Remove the description tab
			}
		}

		return $tabs;
	}
}
