<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       conabbas.com
 * @since      1.0.0
 *
 * @package    Overture_Creative_Addons
 * @subpackage Overture_Creative_Addons/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Overture_Creative_Addons
 * @subpackage Overture_Creative_Addons/includes
 * @author     Connor Abbas <abbasconnor@gmail.com>
 */
class Overture_Creative_Addons_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'overture-creative-addons',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
