<?php 

defined('ABSPATH') or die('Access denied');

define('THEME_ASSETS_FOLDER', 'assets');

if (!function_exists('add_action')) {
	echo 'No access to this file';
	exit;
}
if (file_exists(dirname(__FILE__) . '/../vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/../vendor/autoload.php';
}

if (class_exists('Starterpoint\\Main')) {
	$starterpoint = new Starterpoint\Main();
} else {
	echo 'Main class not found.';
	die();
}
$theme_directory = trailingslashit(get_stylesheet_directory());



// -================================ OPTION TREE CONFIG. =================================-
// Si este theme se declara como Child, tiene errores al usar la integración en modo THEME.
// En ese caso mover la carpeta option-tree a la de plugins y usarlo en modo PLUGIN
if(OPTION_TREE_MODE==='THEME'){
	add_filter('ot_theme_mode', '__return_true');  
	require($theme_directory . 'custom/option-tree/ot-loader.php');
}
add_filter( 'ot_show_pages', '__return_false' ); // oculta las opciones y documentación en el menú del administrador
require($theme_directory . 'custom/config/theme-options.php'); // opciones en archivo de configuración
// ================================= END OPTION TREE CONFIG. ==================================


require($theme_directory . 'custom/filters.php');

if(!is_admin()){
	// CUSTOM CONFIGS.

	require($theme_directory . 'custom/config/assets.php');
	require($theme_directory . 'custom/config/menus.php');
	require($theme_directory . 'custom/config/sidebars.php');
	require($theme_directory . 'custom/config/shortcodes.php');
	require($theme_directory . 'custom/config/cpt.php');
	require($theme_directory . 'custom/config/taxonomies.php');
	require($theme_directory . 'custom/config/customizer.php');
	require($theme_directory . 'custom/config/admin-settings.php');
	if (class_exists( 'WooCommerce' )){require($theme_directory . 'custom/config/woocommerce.php');}

	add_action('init', array($starterpoint, 'init'));
	add_action('init', 'register_custom_assets');	
	add_action('wp_enqueue_scripts', 'enqueue_custom_assets');
}