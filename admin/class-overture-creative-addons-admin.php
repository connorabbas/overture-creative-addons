<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       conabbas.com
 * @since      1.0.0
 *
 * @package    Overture_Creative_Addons
 * @subpackage Overture_Creative_Addons/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Overture_Creative_Addons
 * @subpackage Overture_Creative_Addons/admin
 * @author     Connor Abbas <abbasconnor@gmail.com>
 */
class Overture_Creative_Addons_Admin {

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
		add_action( 'admin_menu', array($this, 'overture_settings'));

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
		 * defined in Overture_Creative_Addons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Overture_Creative_Addons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/overture-creative-addons-admin.css', array(), $this->version, 'all' );
		$current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$URL_PARTS = explode('/wp-admin/',$current_link);
		if($URL_PARTS[1] == 'options-general.php?page=overture-settings'){
			wp_enqueue_style( 'admin-md-bs-5-css',  '/wp-content/plugins/overture-creative-addons/admin/md-bootstrap/css/mdb.min.css', array(), '5.0' );
			wp_enqueue_style( 'ion-icons',  '/wp-content/plugins/overture-creative-addons/admin/ion-icons/css/ionicons.min.css', array(), null );
			//wp_enqueue_style( 'fa-5',  '/wp-content/plugins/overture-creative-addons/admin/font-awesome/fontawesome-web/css/all.min.css', array(), null );
		}
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
		 * defined in Overture_Creative_Addons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Overture_Creative_Addons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/overture-creative-addons-admin.js', array( 'jquery' ), $this->version, false );
		//wp_enqueue_script( 'bs-5-js', '/wp-content/plugins/overture-creative-addons/admin/md-bootstrap/js/bootstrap.bundle.min.js', array(), '5.0', true );
		$current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$URL_PARTS = explode('/wp-admin/',$current_link);
		if($URL_PARTS[1] == 'options-general.php?page=overture-settings'){
			wp_enqueue_script( 'admin-md-bs-5-js', '/wp-content/plugins/overture-creative-addons/admin/md-bootstrap/js/mdb.min.js', array(), '5.0', true );
		}

	}

	public function overture_settings(){

		// Main Page
		add_options_page('Overture Site Settings', 'Overture Site Settings', 'manage_options', 'overture-settings', array($this, 'main_options_page_overture'), 'dashicons-list-view');

	}

	/* public function array_search_partial($arr, $keyword) {
		foreach($arr as $index => $string) {
			if (strpos($string, $keyword) !== FALSE)
				return $index;
		}
	} */

	public function main_options_page_overture(){
		$option_exists = get_option('overture-site-settings', array());
		/* echo '<pre style="max-height:500px; overflow-y: scroll;">';
		var_dump($option_exists);
		echo '</pre>'; */
		if($option_exists){
			$cssTheme = $option_exists['cssTheme'];
			$menuType = $option_exists['menuType'];
			$contactRecipients = $option_exists['contactRecipients'];
			$ccRecipients = $option_exists['ccRecipients'];
			$bccRecipients = $option_exists['bccRecipients'];
		} else{
			$cssTheme = '';
			$menuType = '';
			$contactRecipients = '';
			$ccRecipients = '';
			$bccRecipients = '';
		}
		if(isset($option_exists['aosAnimations'])){$option_exists['aosAnimations'] = $option_exists['aosAnimations'];} else{$option_exists['aosAnimations']=0;}
		if(isset($option_exists['simpleAnimations'])){$option_exists['simpleAnimations'] = $option_exists['simpleAnimations'];} else{$option_exists['simpleAnimations']=0;}
		if(isset($option_exists['photoSwipe'])){$option_exists['photoSwipe'] = $option_exists['photoSwipe'];} else{$option_exists['photoSwipe']=0;}
		if(isset($option_exists['uniteCompact'])){$option_exists['uniteCompact'] = $option_exists['uniteCompact'];} else{$option_exists['uniteCompact']=0;}
		if(isset($option_exists['parallaxie'])){$option_exists['parallaxie'] = $option_exists['parallaxie'];} else{$option_exists['parallaxie']=0;}
		if(isset($option_exists['loaderType'])){$option_exists['loaderType'] = $option_exists['loaderType'];} else{$option_exists['loaderType']=1;}
		if(isset($option_exists['loaderBackground'])){$option_exists['loaderBackground'] = $option_exists['loaderBackground'];} else{$option_exists['loaderBackground']='#262626';}
		if(isset($option_exists['loaderColor'])){$option_exists['loaderColor'] = $option_exists['loaderColor'];} else{$option_exists['loaderColor']='#fff';}

		$ion_icons = '';
		$ion_icons = file_get_contents($_SERVER["DOCUMENT_ROOT"] .'/wp-content/plugins/overture-creative-addons/admin/ion-icons/admin-icons.txt');
		$fa_icons = file_get_contents($_SERVER["DOCUMENT_ROOT"] .'/wp-content/plugins/overture-creative-addons/admin/font-awesome/fontawesome-web/admin-icons.txt');

		$ion_array = [];
		$ion_icons = str_replace("\r", "", $ion_icons);
		$ion_icons = str_replace("\n", "", $ion_icons);
		$ion_first = explode('}', $ion_icons);
		if($ion_first){
			foreach($ion_first as $v){
				$ion_second = explode(':before{', $v);
				if(isset($ion_second[0]) && $ion_second[0] !== ''){
					$ion_array[] = str_replace(".","",trim($ion_second[0]));
				}
			}
		}
		$fa_array = [];
		$fa_icons = str_replace("\r", "", $fa_icons);
		$fa_icons = str_replace("\n", "", $fa_icons);
		$fa_first = explode('}', $fa_icons);
		if($fa_first){
			foreach($fa_first as $v){
				$fa_second = explode(':before{', $v);
				if(isset($fa_second[0]) && $fa_second[0] !== ''){
					$fa_array[] = str_replace(".","",trim($fa_second[0]));
				}
			}
		}

	?>
	<br>
	<div class="row">
		<div class="col-md-12">
			<h3><b>Overture Site Settings</b></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
				<li class="nav-item" role="presentation">
				<a
				class="nav-link active"
				id="ex1-tab-1"
				data-mdb-toggle="tab"
				href="#ex1-tabs-1"
				role="tab"
				aria-controls="ex1-tabs-1"
				aria-selected="true"
				>General</a>
				</li>
				<li class="nav-item" role="presentation">
				<a
				class="nav-link"
				id="ex1-tab-2"
				data-mdb-toggle="tab"
				href="#ex1-tabs-2"
				role="tab"
				aria-controls="ex1-tabs-2"
				aria-selected="false"
				>Email</a>
				</li>
				<li class="nav-item" role="presentation">
				<a
				class="nav-link"
				id="ex1-tab-3"
				data-mdb-toggle="tab"
				href="#ex1-tabs-3"
				role="tab"
				aria-controls="ex1-tabs-3"
				aria-selected="false"
				>Resources</a>
				</li>
				<li class="nav-item" role="presentation">
				<a
				class="nav-link"
				id="ex1-tab-4"
				data-mdb-toggle="tab"
				href="#ex1-tabs-4"
				role="tab"
				aria-controls="ex1-tabs-4"
				aria-selected="false"
				>Page Loader</a>
				</li>
				<li class="nav-item" role="presentation">
				<a
				class="nav-link"
				id="ex1-tab-5"
				data-mdb-toggle="tab"
				href="#ex1-tabs-5"
				role="tab"
				aria-controls="ex1-tabs-5"
				aria-selected="false"
				>Icons</a>
				</li>
			</ul>
			<!-- Tabs navs -->

			<!-- Tabs content -->
			<div class="tab-content" id="ex1-content">
				<div
				class="tab-pane fade show active"
				id="ex1-tabs-1"
				role="tabpanel"
				aria-labelledby="ex1-tab-1"
				>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">CSS Theme</h5>
							<form action="/wp-content/plugins/overture-creative-addons/admin/post-admin.php" method="post">
								<input type="hidden" name="saveOvertureSettings" value="true">
								<div class="">
									<input
										class=""
										type="radio"
										name="cssTheme"
										id="lightModeRad"
										value="light"
										checked
									/>
									<label class="form-check-label" for="lightModeRad">Light</label>
								</div>
								<div class="">
									<input
										class=""
										type="radio"
										name="cssTheme"
										id="darkModeRad"
										value="dark"
									/>
									<label class="form-check-label" for="darkModeRad">Dark Mode</label>
								</div>
								<br>
								<h5 class="card-title">Nav Menu Type</h5>
								<div class="">
									<input
										class=""
										type="radio"
										name="menuType"
										id="slideRad"
										value="slidedown"
										checked
									/>
									<label class="form-check-label" for="slideRad">Slidedown</label>
								</div>
								<div class="">
									<input
										class=""
										type="radio"
										name="menuType"
										id="pushRad"
										value="push"
									/>
									<label class="form-check-label" for="pushRad">Push</label>
								</div>
								<div class="">
									<input
										class=""
										type="radio"
										name="menuType"
										id="overRad"
										value="overlay"
									/>
									<label class="form-check-label" for="overRad">Overlay</label>
								</div>
								<br>
								<button id="saveSettingsBtn" type="submit" class="btn btn-success">Save Settings</button>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Contact Form</h5>
							<small>Sperate recipient emails by comma.</small><br><br>
							<form action="/wp-content/plugins/overture-creative-addons/admin/post-admin.php" method="post">
								<input type="hidden" name="saveOvertureContactSettings" value="true">
								<div class="form-outline mb-3">
									<div class="form-outline">
										<textarea class="form-control" id="recipients" name="recipients" rows="2"></textarea>
										<label class="form-label" for="recipients">Recipients</label>
									</div>
								</div>
								<div class="form-outline mb-3">
									<div class="form-outline">
										<textarea class="form-control" id="CCrecipients" name="CCrecipients" rows="2"></textarea>
										<label class="form-label" for="CCrecipients">CC'd Recipients</label>
									</div>
								</div>
								<div class="form-outline mb-3">
									<div class="form-outline">
										<textarea class="form-control" id="BCCrecipients" name="BCCrecipients" rows="2"></textarea>
										<label class="form-label" for="BCCrecipients">BCC'd Recipients</label>
									</div>
								</div>
								<button id="saveContactSettingsBtn" type="submit" class="btn btn-success">Save Settings</button>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Third Party Libraries</h5>
							<small>Select what resources are loaded onto your site.</small><br><br>
							<form action="/wp-content/plugins/overture-creative-addons/admin/post-admin.php" method="post">
								<input type="hidden" name="saveOvertureRecourceSettings" value="true">
								<div class="mb-2">
									<input type="checkbox" id="aosCheck" name="aosAnimations" value="1">
									<label for="aosCheck"> AOS animations</label>
									<br>
									<small style="padding-left: 25px;"><a href="https://github.com/michalsnik/aos">Documentation</a></small>
								</div>
								<div class="mb-2">
									<input type="checkbox" id="simpleAnimateCheck" name="simpleAnimations" value="1">
									<label for="simpleAnimateCheck"> Simple animations</label>
									<br>
									<small style="padding-left: 25px;"><a href="https://animate.style/">Documentation</a></small>
								</div>
								<div class="mb-2">
									<input type="checkbox" id="pSwipeCheck" name="photoSwipe" value="1">
									<label for="pSwipeCheck"> PhotoSwipe</label>
									<br>
									<small style="padding-left: 25px;"><a href="https://photoswipe.com/documentation/getting-started.html">Documentation</a></small>
								</div>
								<div class="mb-2">
									<input type="checkbox" id="uniteCompactCheck" name="uniteCompact" value="1">
									<label for="uniteCompactCheck"> Unite Gallery - Compact Theme</label>
									<br>
									<small style="padding-left: 25px;"><a href="https://unitegallery.net/index.php?page=compact-options">Documentation</a></small>
								</div>
								<div class="mb-2">
									<input type="checkbox" id="parallaxieCheck" name="parallaxie" value="1">
									<label for="parallaxieCheck"> Parallaxie</label>
									<br>
									<small style="padding-left: 25px;"><a href="https://github.com/theultrasoft/Parallaxie">Documentation</a></small>
								</div>
								<br>
								<button id="saveResourceSettingsBtn" type="submit" class="btn btn-success">Save Settings</button>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Page Loader</h5>
							<small>Select what loader is used on page load and it's styling.</small><br><br>
							<form action="/wp-content/plugins/overture-creative-addons/admin/post-admin.php" method="post">
								<input type="hidden" name="saveOvertureLoaderSettings" value="true">
								<div class="row" style="margin-bottom: 15px;">
									<div class="col text-center">
										<label for="loader1">
											<div class="lds-dual-ring"></div>
										</label>
										<br>
										<input type="radio" name="loaderType" id="loader1" value="1">
									</div>
									<div class="col text-center">
										<label for="loader2">
											<div class="lds-facebook"><div></div><div></div><div></div></div>
										</label>
										<br>
										<input type="radio" name="loaderType" id="loader2" value="2">
									</div>
									<div class="col text-center">
										<label for="loader3">
											<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
										</label>
										<br>
										<input type="radio" name="loaderType" id="loader3" value="3">
									</div>
								</div>
								<div class="row">
									<div class="col text-center">
										<label for="loader4">
											<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
										</label>
										<br>
										<input type="radio" name="loaderType" id="loader4" value="4">
									</div>
									<div class="col text-center">
										<label for="loader5">
											<div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
										</label>
										<br>
										<input type="radio" name="loaderType" id="loader5" value="5">
									</div>
									<div class="col text-center">
										<label for="loader6">
											<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
										</label>
										<br>
										<input type="radio" name="loaderType" id="loader6" value="6">
									</div>
								</div>
								<br>
								<div class="mb-3">
									<div class="row">
										<div class="col">
											<label for="">Loader background color</label>
											<input type="text" class="form-control" name="loaderBackground" >
										</div>
										<div class="col">
											<label for="">Loader color</label>
											<input type="text" class="form-control" name="loaderColor" >
										</div>
									</div>
								</div>
								<button id="saveLoaderSettingsBtn" type="submit" class="btn btn-success">Save Settings</button>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel" aria-labelledby="ex1-tab-5">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Search Icons</h5>
							<br>
							<div class="mb-3">
								<input type="text" class="form-control" name="icon_search" placeholder="Search by keyword">
							</div>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="selected_icon"
									aria-describedby="copyiconbtn" />
								<button class="btn btn-outline-primary" type="button" id="copyiconbtn" data-mdb-ripple-color="dark">
									Copy
								</button>
							</div>
							<!-- <div class="mb-3">
								<input type="text" class="form-control" name="selected_icon">
							</div> -->
							<!-- Tabs navs -->
							<ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
								<li class="nav-item" role="presentation">
									<a
									class="nav-link active"
									data-mdb-toggle="tab"
									href="#icon-tab-1"
									role="tab"
									aria-selected="true"
									>Ion Icons</a
									>
								</li>
								<li class="nav-item" role="presentation">
									<a
									class="nav-link "
									data-mdb-toggle="tab"
									href="#icon-tab-2"
									role="tab"
									aria-selected="false"
									>FA Icons</a
									>
								</li>
							</ul>
							<div class="tab-content" id="icon-tabs-content">
								<div class="tab-pane fade show active" id="icon-tab-1" role="tabpanel">
									<div id="ion_icon_box" style="max-height: 500px; overflow-y:auto;">
									<?php
									foreach($ion_array as $icon){
										echo '<icon data-icon-class="ion '.$icon.'" class="admin-icon ion '.$icon.'" style="font-size:50px;color: black;padding: 10px;"></icon>';
									}
									?>
									</div>
									<div id="ion_searched_icon_box" style="max-height: 500px; overflow-y:auto;"></div>
								</div>
								<div
									class="tab-pane fade"
									id="icon-tab-2"
									role="tabpanel"
								>
									<div id="fa_icon_box" style="max-height: 500px; overflow-y:auto;">
										<a target="_blank" href="https://fontawesome.com/icons?d=gallery&p=2&q=test">Search FA Icons</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- Tabs content -->
		</div>
	</div>
	<script>
		var cssTheme = '<?php echo $cssTheme;?>';
		var menuType = '<?php echo $menuType;?>';
		var contactRecipients = '<?php echo $contactRecipients;?>';
		var ccRecipients = '<?php echo $ccRecipients;?>';
		var bccRecipients = '<?php echo $bccRecipients;?>';

		var aosAnimations = '<?php echo $option_exists['aosAnimations'];?>';
		var simpleAnimations = '<?php echo $option_exists['simpleAnimations'];?>';
		var photoSwipe = '<?php echo $option_exists['photoSwipe'];?>';
		var uniteCompact = '<?php echo $option_exists['uniteCompact'];?>';
		var parallaxie = '<?php echo $option_exists['parallaxie'];?>';

		var loaderType = '<?php echo $option_exists['loaderType'];?>';
		var loaderBackground = '<?php echo $option_exists['loaderBackground'];?>';
		var loaderColor = '<?php echo $option_exists['loaderColor'];?>';

		if(cssTheme != ''){
			jQuery('input[name="cssTheme"][value="'+cssTheme+'"]').prop("checked", true);
		}
		if(menuType != ''){
			jQuery('input[name="menuType"][value="'+menuType+'"]').prop("checked", true);
		}
		if(contactRecipients != ''){
			jQuery('#recipients').val(contactRecipients);
		}
		if(ccRecipients != ''){
			jQuery('#CCrecipients').val(ccRecipients);
		}
		if(bccRecipients != ''){
			jQuery('#BCCrecipients').val(bccRecipients);
		}
		if(aosAnimations == 1){
			jQuery('input[type="checkbox"][name="aosAnimations"]').prop("checked", true);
		}
		if(simpleAnimations == 1){
			jQuery('input[type="checkbox"][name="simpleAnimations"]').prop("checked", true);
		}
		if(photoSwipe == 1){
			jQuery('input[type="checkbox"][name="photoSwipe"]').prop("checked", true);
		}
		if(uniteCompact == 1){
			jQuery('input[type="checkbox"][name="uniteCompact"]').prop("checked", true);
		}
		if(parallaxie == 1){
			jQuery('input[type="checkbox"][name="parallaxie"]').prop("checked", true);
		}
		jQuery('input[type="radio"][name="loaderType"][value="'+loaderType+'"]').prop("checked", true);
		jQuery('input[name="loaderBackground"]').val(loaderBackground);
		jQuery('input[name="loaderColor"]').val(loaderColor);

		function copyToClipboard(text) {
			var $temp = jQuery("<input>");
			jQuery("body").append($temp);
			$temp.val(jQuery('input[name="selected_icon"]').val()).select();
			document.execCommand("copy");
			$temp.remove();
		}

		//jQuery( ".admin-icon" ).click(function() {
		jQuery(document).on('click', '.admin-icon', function(){ 
			var iconClass = jQuery(this).attr('data-icon-class');
			var copiedIcon = '<i class="'+iconClass+'"></i>';
			jQuery('input[name="selected_icon"]').val(copiedIcon);
			//copyToClipboard(copiedIcon);
		});
		jQuery( "#copyiconbtn" ).click(function() {
			copyToClipboard();
		});

		// Icon Search
		jQuery('input[name="icon_search"]').keyup(function(){
			jQuery('#ion_icon_box').fadeOut('fast');
			var searched = jQuery(this).val();
			if(searched != ''){
				jQuery.ajax({
					type:'POST',
					url:'/wp-content/plugins/overture-creative-addons/admin/post-admin.php',
					data:{"icon_search":searched},
					success:function(html){
						jQuery('#ion_searched_icon_box').html(html);
					}
				})
			} else{
				jQuery('#ion_icon_box').fadeIn('fast');
				jQuery('#ion_searched_icon_box').html('');
			}
		});

	</script>
	<style>
	.admin-icon{
		/* font-family: 'Font Awesome 5 Free';
		font-family: 'Font Awesome 5 Brands'; */
		border-radius: 5px;
		-webkit-transition: all .3s ease;
		-moz-transition: all .3s ease;
		-ms-transition: all .3s ease;
		-o-transition: all .3s ease;
		transition: all .3s ease;
	}
	.admin-icon:hover{
		background: #EEEEEE;
		cursor: pointer;
	}
	.card{
		border: 1px solid #BDBDBD !important;
		padding: 0 !important;
	}
	.lds-dual-ring {
	display: inline-block;
	width: 80px;
	height: 80px;
	}
	.lds-dual-ring:after {
	content: " ";
	display: block;
	width: 64px;
	height: 64px;
	margin: 8px;
	border-radius: 50%;
	border: 6px solid #000;
	border-color: #000 transparent #000 transparent;
	animation: lds-dual-ring 1.2s linear infinite;
	}
	@keyframes lds-dual-ring {
	0% {
		transform: rotate(0deg);
	}
	100% {
		transform: rotate(360deg);
	}
	}

	.lds-facebook {
	display: inline-block;
	position: relative;
	width: 80px;
	height: 80px;
	}
	.lds-facebook div {
	display: inline-block;
	position: absolute;
	left: 8px;
	width: 16px;
	background: #000;
	animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
	}
	.lds-facebook div:nth-child(1) {
	left: 8px;
	animation-delay: -0.24s;
	}
	.lds-facebook div:nth-child(2) {
	left: 32px;
	animation-delay: -0.12s;
	}
	.lds-facebook div:nth-child(3) {
	left: 56px;
	animation-delay: 0;
	}
	@keyframes lds-facebook {
	0% {
		top: 8px;
		height: 64px;
	}
	50%, 100% {
		top: 24px;
		height: 32px;
	}
	}

	.lds-ring {
	display: inline-block;
	position: relative;
	width: 80px;
	height: 80px;
	}
	.lds-ring div {
	box-sizing: border-box;
	display: block;
	position: absolute;
	width: 64px;
	height: 64px;
	margin: 8px;
	border: 8px solid #000;
	border-radius: 50%;
	animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
	border-color: #000 transparent transparent transparent;
	}
	.lds-ring div:nth-child(1) {
	animation-delay: -0.45s;
	}
	.lds-ring div:nth-child(2) {
	animation-delay: -0.3s;
	}
	.lds-ring div:nth-child(3) {
	animation-delay: -0.15s;
	}
	@keyframes lds-ring {
	0% {
		transform: rotate(0deg);
	}
	100% {
		transform: rotate(360deg);
	}
	}

	.lds-roller {
	display: inline-block;
	position: relative;
	width: 80px;
	height: 80px;
	}
	.lds-roller div {
	animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
	transform-origin: 40px 40px;
	}
	.lds-roller div:after {
	content: " ";
	display: block;
	position: absolute;
	width: 7px;
	height: 7px;
	border-radius: 50%;
	background: #000;
	margin: -4px 0 0 -4px;
	}
	.lds-roller div:nth-child(1) {
	animation-delay: -0.036s;
	}
	.lds-roller div:nth-child(1):after {
	top: 63px;
	left: 63px;
	}
	.lds-roller div:nth-child(2) {
	animation-delay: -0.072s;
	}
	.lds-roller div:nth-child(2):after {
	top: 68px;
	left: 56px;
	}
	.lds-roller div:nth-child(3) {
	animation-delay: -0.108s;
	}
	.lds-roller div:nth-child(3):after {
	top: 71px;
	left: 48px;
	}
	.lds-roller div:nth-child(4) {
	animation-delay: -0.144s;
	}
	.lds-roller div:nth-child(4):after {
	top: 72px;
	left: 40px;
	}
	.lds-roller div:nth-child(5) {
	animation-delay: -0.18s;
	}
	.lds-roller div:nth-child(5):after {
	top: 71px;
	left: 32px;
	}
	.lds-roller div:nth-child(6) {
	animation-delay: -0.216s;
	}
	.lds-roller div:nth-child(6):after {
	top: 68px;
	left: 24px;
	}
	.lds-roller div:nth-child(7) {
	animation-delay: -0.252s;
	}
	.lds-roller div:nth-child(7):after {
	top: 63px;
	left: 17px;
	}
	.lds-roller div:nth-child(8) {
	animation-delay: -0.288s;
	}
	.lds-roller div:nth-child(8):after {
	top: 56px;
	left: 12px;
	}
	@keyframes lds-roller {
	0% {
		transform: rotate(0deg);
	}
	100% {
		transform: rotate(360deg);
	}
	}

	.lds-default {
	display: inline-block;
	position: relative;
	width: 80px;
	height: 80px;
	}
	.lds-default div {
	position: absolute;
	width: 6px;
	height: 6px;
	background: #000;
	border-radius: 50%;
	animation: lds-default 1.2s linear infinite;
	}
	.lds-default div:nth-child(1) {
	animation-delay: 0s;
	top: 37px;
	left: 66px;
	}
	.lds-default div:nth-child(2) {
	animation-delay: -0.1s;
	top: 22px;
	left: 62px;
	}
	.lds-default div:nth-child(3) {
	animation-delay: -0.2s;
	top: 11px;
	left: 52px;
	}
	.lds-default div:nth-child(4) {
	animation-delay: -0.3s;
	top: 7px;
	left: 37px;
	}
	.lds-default div:nth-child(5) {
	animation-delay: -0.4s;
	top: 11px;
	left: 22px;
	}
	.lds-default div:nth-child(6) {
	animation-delay: -0.5s;
	top: 22px;
	left: 11px;
	}
	.lds-default div:nth-child(7) {
	animation-delay: -0.6s;
	top: 37px;
	left: 7px;
	}
	.lds-default div:nth-child(8) {
	animation-delay: -0.7s;
	top: 52px;
	left: 11px;
	}
	.lds-default div:nth-child(9) {
	animation-delay: -0.8s;
	top: 62px;
	left: 22px;
	}
	.lds-default div:nth-child(10) {
	animation-delay: -0.9s;
	top: 66px;
	left: 37px;
	}
	.lds-default div:nth-child(11) {
	animation-delay: -1s;
	top: 62px;
	left: 52px;
	}
	.lds-default div:nth-child(12) {
	animation-delay: -1.1s;
	top: 52px;
	left: 62px;
	}
	@keyframes lds-default {
	0%, 20%, 80%, 100% {
		transform: scale(1);
	}
	50% {
		transform: scale(1.5);
	}
	}

	.lds-ellipsis {
	display: inline-block;
	position: relative;
	width: 80px;
	height: 80px;
	}
	.lds-ellipsis div {
	position: absolute;
	top: 33px;
	width: 13px;
	height: 13px;
	border-radius: 50%;
	background: #000;
	animation-timing-function: cubic-bezier(0, 1, 1, 0);
	}
	.lds-ellipsis div:nth-child(1) {
	left: 8px;
	animation: lds-ellipsis1 0.6s infinite;
	}
	.lds-ellipsis div:nth-child(2) {
	left: 8px;
	animation: lds-ellipsis2 0.6s infinite;
	}
	.lds-ellipsis div:nth-child(3) {
	left: 32px;
	animation: lds-ellipsis2 0.6s infinite;
	}
	.lds-ellipsis div:nth-child(4) {
	left: 56px;
	animation: lds-ellipsis3 0.6s infinite;
	}
	@keyframes lds-ellipsis1 {
	0% {
		transform: scale(0);
	}
	100% {
		transform: scale(1);
	}
	}
	@keyframes lds-ellipsis3 {
	0% {
		transform: scale(1);
	}
	100% {
		transform: scale(0);
	}
	}
	@keyframes lds-ellipsis2 {
	0% {
		transform: translate(0, 0);
	}
	100% {
		transform: translate(24px, 0);
	}
	}

	</style>
	<?php
	}

}
