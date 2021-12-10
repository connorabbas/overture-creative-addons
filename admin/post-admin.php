<?php 
error_reporting(E_ALL);
ini_set("display_errors", 0);
define( 'SHORTINIT', true );
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');

if(isset($_POST['saveOvertureSettings'])){

    $selected_options = array('cssTheme'=>$_POST['cssTheme'], 'menuType'=>$_POST['menuType']);

    $option_exists = get_option('overture-site-settings', array());
    if(!$option_exists){
        $changed = add_option('overture-site-settings', $selected_options, '', 'yes' );
    } else{
        $new_option = array_merge($option_exists,$selected_options);
        $changed = update_option('overture-site-settings', $new_option);
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;

}
else if(isset($_POST['saveOvertureContactSettings'])){

    $selected_options = array('contactRecipients'=>$_POST['recipients'], 'ccRecipients'=>$_POST['CCrecipients'], 'bccRecipients'=>$_POST['BCCrecipients']);

    $option_exists = get_option('overture-site-settings', array());
    if(!$option_exists){
        $changed = add_option('overture-site-settings', $selected_options, '', 'yes' );
    } else{
        $new_option = array_merge($option_exists,$selected_options);
        $changed = update_option('overture-site-settings', $new_option);
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;

} 
else if(isset($_POST['saveOvertureRecourceSettings'])){
    if(isset($_POST['aosAnimations'])){$_POST['aosAnimations']=$_POST['aosAnimations'];}else{$_POST['aosAnimations']=0;}
    if(isset($_POST['simpleAnimations'])){$_POST['simpleAnimations']=$_POST['simpleAnimations'];}else{$_POST['simpleAnimations']=0;}
    if(isset($_POST['photoSwipe'])){$_POST['photoSwipe']=$_POST['photoSwipe'];}else{$_POST['photoSwipe']=0;}
    if(isset($_POST['uniteCompact'])){$_POST['uniteCompact']=$_POST['uniteCompact'];}else{$_POST['uniteCompact']=0;}
    if(isset($_POST['parallaxie'])){$_POST['parallaxie']=$_POST['parallaxie'];}else{$_POST['parallaxie']=0;}

    $selected_options = array('aosAnimations'=>$_POST['aosAnimations'], 'simpleAnimations'=>$_POST['simpleAnimations'], 'photoSwipe'=>$_POST['photoSwipe'], 'uniteCompact'=>$_POST['uniteCompact'], 'parallaxie'=>$_POST['parallaxie']);

    $option_exists = get_option('overture-site-settings', array());
    if(!$option_exists){
        $changed = add_option('overture-site-settings', $selected_options, '', 'yes' );
    } else{
        $new_option = array_merge($option_exists,$selected_options);
        $changed = update_option('overture-site-settings', $new_option);
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;

}
else if(isset($_POST['saveOvertureLoaderSettings'])){
    if(isset($_POST['loaderType'])){$_POST['loaderType']=$_POST['loaderType'];}else{$_POST['loaderType']=1;}
    if(isset($_POST['loaderBackground'])){$_POST['loaderBackground']=$_POST['loaderBackground'];}else{$_POST['loaderBackground']='#262626';}
    if(isset($_POST['loaderColor'])){$_POST['loaderColor']=$_POST['loaderColor'];}else{$_POST['loaderColor']='#fff';}

    $selected_options = array('loaderType'=>$_POST['loaderType'], 'loaderColor'=>$_POST['loaderColor'], 'loaderBackground'=>$_POST['loaderBackground']);

    $option_exists = get_option('overture-site-settings', array());
    if(!$option_exists){
        $changed = add_option('overture-site-settings', $selected_options, '', 'yes' );
    } else{
        $new_option = array_merge($option_exists,$selected_options);
        $changed = update_option('overture-site-settings', $new_option);
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;

} 
else if(isset($_POST['icon_search'])){
    $keyword = $_POST['icon_search'];
    $ion_icons = '';
	$ion_icons = file_get_contents($_SERVER["DOCUMENT_ROOT"] .'/wp-content/plugins/overture-creative-addons/admin/ion-icons/admin-icons.txt');
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

    $notFound=0;
    foreach($ion_array as $index => $string) {
        if (strpos($string, $keyword) !== FALSE){
            echo '<icon data-icon-class="ion '.$string.'" class="admin-icon ion '.$string.'" style="font-size:50px;color: black;padding: 10px;"></icon>';
        } else{
            $notFound++;
        }
    }

    if($notFound == count($ion_array)){
        echo "No results found.";
    }

   /*  foreach($ion_array as $icon){
        echo '<icon class="ion '.$icon.'" style="font-size:50px;color: black;padding: 10px;"></icon>';
    } */
}
else{
    'You done goofed, nuthin here broh.';
}

?>