<?php
/**
 * Agregar items al menú de wp-admin 
 * 
 * Cada menú tiene las propiedades siguientes: 
 * 
 * page_title: Titulo de la página
 * menu_title: Rotulo del item
 * capability: Capacidad que permite mostrarlo. Ej: read, manage_options, etc.
 * menu_slug: la pagina que abre. Ej: index.php
 * callback: metodo que ejecuta
 * icon_url (opcional): icono que muestra. Puede ser un dashicon, un svg, una url de jpg. 
 * position (opcional): ubicación dentro del menú (opcional)
 * roles (opcional): nombre de los roles autorizados. Funciona en conjunto con capability
 * submenus: Array de submenus
 * 
 * Cada submenú tiene las propiedades siguientes:
 * page_title: Titulo de la página.
 * menu_title: Rotulo del item
 * capability (opcional): Si no se define, hereda el valor del parent
 * menu_slug: la pagina que abre. Ej: index.php
 * callback: metodo que ejecuta
 * position (opcional): ubicación dentro del menú (opcional)
 */
$menu_item = [
    'page_title' => '',
    'menu_title' => '',
    'capability' => 'read',
    'menu_slug' => '', 
    'callback' => null,
    'icon_url' => '' ,
    // 'position' => 2,
    // 'roles' => ['administrator', 'author'],
    // 'submenus' => [
    //     [
    //         'page_title' => '',
    //         'menu_title' => '',
    //         'capability' => 'manage_options',
    //         'menu_slug' => '',
    //         // 'menu_slug' => '',
    //         // 'callback' => null,
    //         // 'position' => 1
    //     ],       
    // ],
];
// $starterpoint->admin_settings->add_menu_item($menu_item);






/**
 * Eliminar los items que no deben mostrarse
 * Se hace a través del método remove_menu_item($key, (arr)$roles = null) 
 * $key: es el slug a ocultar
 * $roles: Si es null, no se toma en cuenta  
 */

 // para todos los roles:
 $starterpoint->admin_settings->remove_menu_item('edit-comments.php');
 // según roles:
 $starterpoint->admin_settings->remove_menu_item('tools.php', ['author']); 
 // otra forma:
 if(current_user_can('author')){
     $starterpoint->admin_settings->remove_menu_item('upload.php');
     $starterpoint->admin_settings->remove_menu_item('vc-welcome');
 }

 

/**
 * Eliminar los items de segundo nivel en el menú a través de remove_submenu_item($element) 
 * $elelemnt es un array donde el indice 0 es el item de primer nivel y el indice1 es el de segundo nivel.
 * Ej: Páginas > Añadir nueva
 * $element = ['edit.php?post_type=page', 'post-new.php?post_type=page']
 * Ej: plugin WPBakery
 * $element = ['vc-general', 'vc-welcome' ]
 */
// $starterpoint->admin_settings->remove_submenu_item(['edit.php?post_type=page', 'post-new.php?post_type=page']);
// $starterpoint->admin_settings->remove_submenu_item(['vc-general', 'vc-welcome']);
// $starterpoint->admin_settings->remove_submenu_item(['vc-general', 'vc-automapper']);






/**
 * Eliminar los items de la barra superior. Hay 2 formas: definiendo el array removed_node_items, o mediante el método remove_node_item  
 */

 $starterpoint->admin_settings->removed_node_items = ['wp-logo' ]; 
 if(current_user_can('author')){
    $starterpoint->admin_settings->remove_node_item('comments');
 }




 /**
  * Renombrar los items de menú nivel principal. 
  * Para mayor control usar un plugin
  */

  $starterpoint->admin_settings->renamed_menu_items = [
    'Ninja Forms' => 'Formularios'
  ];