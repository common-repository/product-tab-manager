<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://technifyguru.com/
 * @since      1.0.0
 *
 * @package    Tgptm
 * @subpackage Tgptm/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tgptm
 * @subpackage Tgptm/admin
 * @author     Technify Guru <contact@technifyguru.com>
 */
class Tgptm_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tgptm-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tgptm-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Create admin menu for the plugin.
	 *
	 * @since    1.0.0
	 */
	public function tgptm_admin_menu() {
		
		/* // Add main menu */
		
		add_menu_page(
			__('Product Tab Manager Settings', $this->plugin_name),
			__('Tab Manager', $this->plugin_name),
			'manage_options',
			'tgptm',
			array($this, 'tgptm_plugin_general_page')
		);
		
		// Add sub menu for product default tab
		add_submenu_page(
			'tgptm',
			__('Manage Default Tabs', $this->plugin_name),
			__('Default Tabs', $this->plugin_name),
			'manage_options',
			$this->plugin_name . '-default-tabs',
			array($this, 'tgptm_plugin_default_tabs')
		);

		// Add sub menu for product custom tab
		add_submenu_page(
			'tgptm',
			__('Manage Custom Tabs', $this->plugin_name),
			__('Custom Tabs', $this->plugin_name),
			'manage_options',
			$this->plugin_name . '-custom-tabs',
			array($this, 'tgptm_plugin_custom_tabs')
		);

	}

	/**
	 * Display the general page content for the page we have created.
	 *
	 * @since    1.0.0
	 */
	public function tgptm_plugin_general_page() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/tgptm-general.php';

	}

	/**
	 * Display the default tab page content for the page we have created.
	 *
	 * @since    1.0.0
	 */
	public function tgptm_plugin_default_tabs() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/tgptm-default-tabs.php';

	}
	
	/**
	 * Display the default tab page content for the page we have created.
	 *
	 * @since    1.0.0
	 */
	public function tgptm_plugin_custom_tabs() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/tgptm-custom-tabs.php';

	}

	
	/**
	 * Register the settings for our settings page.
	 *
	 * @since    1.0.0
	 */
	public function tgptm_register_settings () {

		// Here we are going to register our setting for default tab.
		register_setting ('tgptm_default_tabs', 'tgptm_default_tabs');

		/** 
		 * Settings fields for left quantity button 
		 */
		add_settings_section('tgptm_section_tabs', '', '', 'tgptm_default_tabs');
        
        // Description fields
		add_settings_field('tgptm_field_description', 'Description', [$this, 'tgptm_render_default_tabs'], 'tgptm_default_tabs', 'tgptm_section_tabs', ['tab'=>'description', 'title'=>'Description', 'position'=>'10']);

		add_settings_field('tgptm_field_info', 'Additional Information', [$this, 'tgptm_render_default_tabs'], 'tgptm_default_tabs', 'tgptm_section_tabs', ['tab'=>'additional_information', 'title'=>'Additional Information', 'position'=>'20']);

		add_settings_field('tgptm_field_review', 'Reviews', [$this, 'tgptm_render_default_tabs'], 'tgptm_default_tabs', 'tgptm_section_tabs', ['tab'=>'reviews', 'title'=>'Reviews', 'position'=>'30']);        
       
	}
	
    /**
	 * ========================================================
	 * DEFAULT TABS
	 * ======================================================== 
	 * 
	 * @since    1.0.0
	 * 
     */
	public function tgptm_render_default_tabs ($args=[]) {
		// First, we read the options collection
		$options = get_option('tgptm_default_tabs');
		$tab = $args['tab'];
		$title = $args['title'];
		$position = $args['position'];
		?>
		<div class="form-field">
    		<label class="center">
				<input type="text" name="tgptm_default_tabs[tgptm_field_<?php echo $tab; ?>_title]"  value="<?php echo isset($options['tgptm_field_'.$tab.'_title']) ? $options['tgptm_field_'.$tab.'_title'] : $title;?>">
				<div><small>Enter new name for this tab</small></div>
    		</label>
		</div>
		<div class="form-field ">
    		<label class="center">
				<input type="number" name="tgptm_default_tabs[tgptm_field_<?php echo $tab; ?>_priority]"  value="<?php echo isset($options['tgptm_field_'.$tab.'_priority']) ? $options['tgptm_field_'.$tab.'_priority'] : $position;?>"  min='10' step='10'  >
				<div>
					<small>
					Values 10, 20, 30 etc
					Set the priority of the tab. Lower priority means tab will be rendered earlier. Higher priority means tab will be rendered late. Priority is set in multiples of 10					
					</small>
				</div>
    		</label>
		</div>
		<div class="form-field">
    		<label class="center">
				<input type="checkbox" name="tgptm_default_tabs[tgptm_field_<?php echo $tab; ?>_hide]"  value="1" <?php echo checked( 1, isset( $options['tgptm_field_'.$tab.'_hide'] ) ? esc_html($options['tgptm_field_'.$tab.'_hide']) : 0, false );?> > <span>Hide this tab and its content</span>
    		</label>
		</div>
		<?php
	}	
}
