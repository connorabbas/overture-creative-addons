<?php

/**
 * Fired during plugin activation
 *
 * @link       conabbas.com
 * @since      1.0.0
 *
 * @package    Overture_Creative_Addons
 * @subpackage Overture_Creative_Addons/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Overture_Creative_Addons
 * @subpackage Overture_Creative_Addons/includes
 * @author     Connor Abbas <abbasconnor@gmail.com>
 */
class Overture_Creative_Addons_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		ob_start();
		$themeName = wp_get_theme()->template;
		echo 'Overture Files Activated for '.$themeName;

		$default_options = array('cssTheme'=>'light', 'menuType'=>'slidedown');
		$option_exists = get_option('overture-site-settings', array());
		if(!$option_exists){
			$changed = add_option('overture-site-settings', $default_options, '', 'yes' );
		}

		// Directories
        $nav_menu_dir = $_SERVER["DOCUMENT_ROOT"] . "/wp-content/themes/".$themeName."/overture-nav-menu/";
        $css_menu_dir = $_SERVER["DOCUMENT_ROOT"] . "/wp-content/themes/".$themeName."/overture-nav-menu/css/";
        $js_menu_dir = $_SERVER["DOCUMENT_ROOT"] . "/wp-content/themes/".$themeName."/overture-nav-menu/js/";
        $layouts_menu_dir = $_SERVER["DOCUMENT_ROOT"] . "/wp-content/themes/".$themeName."/overture-nav-menu/layouts/";

		// Files
		$menu_css = $_SERVER["DOCUMENT_ROOT"] . "/wp-content/plugins/overture-creative-addons/admin/navigation/css/overture-menu.css";
		$menu_js = $_SERVER["DOCUMENT_ROOT"] . "/wp-content/plugins/overture-creative-addons/admin/navigation/js/overture-menu.js";
		$files = array('overlay', 'push', 'slidedown');

		// Copy Files
        if (!is_dir($nav_menu_dir)) {
            mkdir($nav_menu_dir);
            mkdir($css_menu_dir);
            mkdir($js_menu_dir);
            mkdir($layouts_menu_dir);
			copy($menu_css, $css_menu_dir."overture-menu.css");
			copy($menu_js, $js_menu_dir."overture-menu.js");
            foreach($files as $menu_file){
				$plugin_path = '/wp-content/plugins/overture-creative-addons/admin/navigation/';
                $css_file_path = $_SERVER['DOCUMENT_ROOT'] . $plugin_path.'/css/'.$menu_file.'.css';
                $js_file_path = $_SERVER['DOCUMENT_ROOT'] . $plugin_path.'/js/'.$menu_file.'.js';
                $layout_file_path = $_SERVER['DOCUMENT_ROOT'] . $plugin_path.'/layouts/'.$menu_file.'.php';
                copy($css_file_path, $css_menu_dir.$menu_file.'.css');
                copy($js_file_path, $js_menu_dir.$menu_file.'.js');
                copy($layout_file_path, $layouts_menu_dir.$menu_file.'.php');
            }

        }
		$temp_dump = ob_get_clean();
		//mail("abbasconnor@gmail.com", "Email VarDump", $temp_dump);
	}

}
