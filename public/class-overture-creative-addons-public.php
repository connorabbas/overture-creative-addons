<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       conabbas.com
 * @since      1.0.0
 *
 * @package    Overture_Creative_Addons
 * @subpackage Overture_Creative_Addons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Overture_Creative_Addons
 * @subpackage Overture_Creative_Addons/public
 * @author     Connor Abbas <abbasconnor@gmail.com>
 */
class Overture_Creative_Addons_Public {

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
		 * defined in Overture_Creative_Addons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Overture_Creative_Addons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 
		$themeName = wp_get_theme()->template;
		$overture_dir = "/wp-content/plugins/overture-creative-addons/admin/";
		
		wp_enqueue_style( 'fa-5',  $overture_dir.'font-awesome/fontawesome-web/css/all.min.css', array(), null );
		wp_enqueue_style( 'ion-icons',  $overture_dir.'ion-icons/css/ionicons.min.css', array(), null );
		wp_enqueue_style( 'overture-menu',  '/wp-content/themes/'.$themeName.'/overture-nav-menu/css/overture-menu.css', array(), null );

		$themeName = wp_get_theme()->template;
		$option_exists = get_option('overture-site-settings', array());
		if($option_exists){
			$cssTheme = $option_exists['cssTheme'];
			$menuType = $option_exists['menuType'];
			if($cssTheme == 'dark'){
				wp_enqueue_style( 'mdb-5-css',  $overture_dir.'md-bootstrap/css/mdb.dark.min.css', array(), null );
			} else{
				wp_enqueue_style( 'mdb-5-css',  $overture_dir.'md-bootstrap/css/mdb.min.css', array(), null );
			}
			wp_enqueue_style( 'overture-menu-mobile',  '/wp-content/themes/'.$themeName.'/overture-nav-menu/css/'.$menuType.'.css', array('overture-menu'), null );

			if(isset($option_exists['aosAnimations'])){$option_exists['aosAnimations'] = $option_exists['aosAnimations'];} else{$option_exists['aosAnimations']=0;}
			if(isset($option_exists['simpleAnimations'])){$option_exists['simpleAnimations'] = $option_exists['simpleAnimations'];} else{$option_exists['simpleAnimations']=0;}
			if(isset($option_exists['photoSwipe'])){$option_exists['photoSwipe'] = $option_exists['photoSwipe'];} else{$option_exists['photoSwipe']=0;}
			if(isset($option_exists['uniteCompact'])){$option_exists['uniteCompact'] = $option_exists['uniteCompact'];} else{$option_exists['uniteCompact']=0;}

			if($option_exists['aosAnimations'] == 1){
				wp_enqueue_style( 'aos-animate',  $overture_dir.'animations/aos-animations/aos.css', array(), null );
			}
			if($option_exists['simpleAnimations'] == 1){
				wp_enqueue_style( 'simple-animate',  $overture_dir.'animations/animate.min.css', array(), null );
			}
			if($option_exists['photoSwipe'] == 1){
				wp_enqueue_style( 'photoSwipe',  $overture_dir.'PhotoSwipe/photoswipe.css', array(), null );
				wp_enqueue_style( 'photoSwipe-skin',  $overture_dir.'PhotoSwipe/default-skin/default-skin.css', array(), null );
			}
			if($option_exists['uniteCompact'] == 1){
				wp_enqueue_script( 'unite-gallery', $overture_dir.'unite-gallery/unite-gallery-master/dist/js/unitegallery.min.js', array(), null, false );
				wp_enqueue_style( 'unite-gallery',  $overture_dir.'unite-gallery/unite-gallery-master/dist/css/unite-gallery.css', array(), null );
				wp_enqueue_script( 'unite-gallery-compact', $overture_dir.'unite-gallery/unite-gallery-master/dist/themes/compact/ug-theme-compact.js', array(), null, false );
			}

		} else{
			wp_enqueue_style( 'mdb-5-css',  $overture_dir.'md-bootstrap/css/mdb.min.css', array(), null );
			wp_enqueue_style( 'overture-menu-mobile',  '/wp-content/themes/'.$themeName.'/overture-nav-menu/css/slidedown.css', array('overture-menu'), null );
		}
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
		 * defined in Overture_Creative_Addons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Overture_Creative_Addons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$themeName = wp_get_theme()->template;
		$overture_dir = "/wp-content/plugins/overture-creative-addons/admin/";

		wp_enqueue_script( 'mdb-5-bundle-js', $overture_dir.'md-bootstrap/js/bootstrap.bundle.min.js', array(), null, true );
		wp_enqueue_script( 'mdb-5-js', $overture_dir.'md-bootstrap/js/mdb.min.js', array(), null, true );
	
		$option_exists = get_option('overture-site-settings', array());
		if($option_exists){
			$menuType = $option_exists['menuType'];
			wp_enqueue_script( 'overture-menu', '/wp-content/themes/'.$themeName.'/overture-nav-menu/js/'.$menuType.'.js', array('jquery'), null, true );

			if(isset($option_exists['aosAnimations'])){$option_exists['aosAnimations'] = $option_exists['aosAnimations'];} else{$option_exists['aosAnimations']=0;}
			if(isset($option_exists['photoSwipe'])){$option_exists['photoSwipe'] = $option_exists['photoSwipe'];} else{$option_exists['photoSwipe']=0;}
			if(isset($option_exists['parallaxie'])){$option_exists['parallaxie'] = $option_exists['parallaxie'];} else{$option_exists['parallaxie']=0;}

			if($option_exists['aosAnimations'] == 1){
				wp_enqueue_script( 'aos-animate', $overture_dir.'animations/aos-animations/aos.js', array(), null, true );
				wp_enqueue_script( 'aos-animate-init', $overture_dir.'animations/aos-animations/initiate-aos.js', array(), null, true );
			}
			if($option_exists['photoSwipe'] == 1){
				wp_enqueue_script( 'photoSwipe', $overture_dir.'PhotoSwipe/photoswipe.min.js', array(), null, true );
				wp_enqueue_script( 'photoSwipe-UI', $overture_dir.'PhotoSwipe/photoswipe-ui-default.min.js', array(), null, true );
			}
			if($option_exists['parallaxie'] == 1){
				wp_enqueue_script( 'parallaxie', $overture_dir.'parallaxie/parallaxie.js', array(), null, false );
			}

		} else{
			wp_enqueue_script( 'overture-menu', '/wp-content/themes/'.$themeName.'/overture-nav-menu/js/slidedown.js', array('jquery'), null, true );
		}

	}

}
