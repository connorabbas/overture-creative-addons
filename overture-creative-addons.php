<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              conabbas.com
 * @since             1.0.0
 * @package           Overture_Creative_Addons
 *
 * @wordpress-plugin
 * Plugin Name:       Overture Creature Addons
 * Plugin URI:        conabbas.com
 * Description:       Choose options for your site created by Overture Creative.
 * Version:           1.0.0
 * Author:            Connor Abbas
 * Author URI:        conabbas.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       overture-creative-addons
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'OVERTURE_CREATIVE_ADDONS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-overture-creative-addons-activator.php
 */
function activate_overture_creative_addons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-overture-creative-addons-activator.php';
	Overture_Creative_Addons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-overture-creative-addons-deactivator.php
 */
function deactivate_overture_creative_addons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-overture-creative-addons-deactivator.php';
	Overture_Creative_Addons_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_overture_creative_addons' );
register_deactivation_hook( __FILE__, 'deactivate_overture_creative_addons' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-overture-creative-addons.php';

/* Enqueue Libraries */
/* wp_enqueue_style( 'md-bs-5-css',  '//wp-content/plugins/overture-creative-addons/admin/md-bootstrap/css/mdb.min.css', array(), null );
wp_enqueue_script( 'bs-5-js', '//wp-content/plugins/overture-creative-addons/admin/md-bootstrap/js/bootstrap.bundle.min.js', array(), null, true );
wp_enqueue_script( 'md-bs-5-js', '//wp-content/plugins/overture-creative-addons/admin/md-bootstrap/js/mdb.min.js', array(), null, true ); */





/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_overture_creative_addons() {

	$plugin = new Overture_Creative_Addons();
	$plugin->run();

}
run_overture_creative_addons();
