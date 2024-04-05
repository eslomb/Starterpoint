<?php

// a partir de la versión 3.3, si no declaro el soporte se toma woocommerce.php o page.php como referencia
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<main id="cuerpo">
			<div class="container">
					<div id="contenido">';
}

function my_theme_wrapper_end() {
    echo '</div><!-- /#contenido -->
			</div><!-- /.container -->
		</main>';
}



// Pagina de la tienda ----------------

// No mostrar el breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// No mostrar el título de la tienda
add_filter( 'woocommerce_show_page_title' , null );

// No mostrar la cantidad de resultados 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// No mostrar el desplegable de orden
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// No mostrar la descripción de una categoria (si se agregó)
// remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);

// No mostrar la sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);






// Item de Producto (content-product.php) ----------------------------

// No mostrar el botón de "Agregar al carrito"
// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// No mostrar precios 
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); 

// Mostrar la descripcion corta
// add_action( 'woocommerce_after_shop_loop_item_title', 'short_description_product', 40 );

 




// Pagina de producto (content-single-product.php) -----------------------------

// encierro la imagen y la descripción en una div
add_action('woocommerce_before_single_product_summary', 'fn_woocommerce_before_single_product_summary', 5);
add_action('woocommerce_after_single_product_summary', 'fn_woocommerce_after_single_product_summary', 5);
function fn_woocommerce_before_single_product_summary(){
	echo '<div class="single-product-row">';
}

function fn_woocommerce_after_single_product_summary(){
	echo '<div class="clearfix"></div></div>';
}



// No mostrar el rating
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

// No mostrar el botón de "Agregar al carrito"
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

// No mostrar las categorias
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );  

// No mostrar las tabs con descripción, comentarios, reviews
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

// Agregar la descripción
// add_action('woocommerce_single_product_summary' , 'description_product', 25);


// No mostrar los productos relacionados
// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);






// OTRAS FUNCIONALIUDADES

// agregar thumbnail lightbox a la imagen del producto
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


// Ocultar precios en todos lados
// add_filter( 'woocommerce_variable_sale_price_html', 'remove_prices', 10, 2 );
// add_filter( 'woocommerce_variable_price_html', 'remove_prices', 10, 2 );
// add_filter( 'woocommerce_get_price_html', 'remove_prices', 10, 2 );

function remove_prices( $price, $product ) {
	return '';
}

function replace_add_to_cart() {
	/*ADD NEW BUTTON THAT LINKS TO PRODUCT PAGE FOR EACH PRODUCT*/
	global $product;
	$link = $product->get_permalink();
	echo sprintf('<p class="text-right"><a href="%s" class="btn btn-default btn-cta">%s</a></p>', esc_attr($link), __('ver más') );
}

function description_product(){
	global $product;
	echo sprintf('<div>%s</div>', $product->description);
}
function short_description_product() {
	global $product;
	echo sprintf('<div>%s</div>', $product->short_description);
}

// add_filter('loop_shop_columns', 'loop_columns'); // products per row
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 4; // products per row
	}
}



// traducciones adicionales

add_filter('gettext', 'x_translate_text' , 20, 3);
add_filter('ngettext', 'x_translate_text' , 20, 3);
function x_translate_text ( $translated_text, $text, $domain ) {

	$translation = array (
		'Billing ' => 'Facturación ',
		'Shipping' => 'Envío',
		'Street address' => 'Dirección',
		'Notes about your order, e.g. special notes for delivery.' => 'Notas adicionales del pedido',
		'Apartment, suite, unit etc. (optional)' => 'Departamento (opcional)',
		'House number and street name' => 'Calle y número',
		
	);

	if( isset( $translation[$text] ) ) {
		return $translation[$text];
	}

	return $translated_text;
}


// https://scottdeluzio.com/edit-woocommerce-checkout-fields/
// WooCommerce Checkout Fields Hook
add_filter( 'woocommerce_checkout_fields' , 'custom_wc_checkout_fields' );
// Change order comments placeholder and label, and set billing phone number to not required.
function custom_wc_checkout_fields( $fields ) {
    // $fields['order']['order_comments']['placeholder'] = 'Enter your placeholder text here.';
    // $fields['order']['order_comments']['label'] = 'Enter your label here.';
    // $fields['billing']['billing_phone']['required'] = false;
    return $fields;
}


add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
  return 'Envío';
}

add_filter('woocommerce_account_menu_items', 'custom_woocommerce_account_menu_items');
function custom_woocommerce_account_menu_items($items){
	$items['dashboard'] = 'Panel';
	return $items;
}