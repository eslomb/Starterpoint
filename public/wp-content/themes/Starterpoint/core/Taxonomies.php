<?php
namespace Starterpoint;


class Taxonomies{
    public $taxonomies_list;

    function __construct(){
        $this->taxonomies_list = array();
        $this->theme_taxonomies();
    }
    
    public function register(){
        foreach ($this->taxonomies_list as $taxonomy) {
            register_taxonomy($taxonomy['taxonomy'], $taxonomy['object_type'], $taxonomy['args']);
        }		
    }

    public function add($taxonomy){
        $this->taxonomies_list[] = $taxonomy;
    }

    public function delete($taxonomy_value){
        $this->taxonomies_list = array_filter($this->taxonomies_list, function($el) use ($taxonomy_value){ return $el['taxonomy']!=$taxonomy_value;});
        // foreach($this->taxonomies_list as $t=>$value){
        //     if ($this->taxonomies_list[$t]['taxonomy'] == $taxonomy_value){
        //         unset($this->taxonomies_list[$t]);
        //     }
        // }
    }


    public function theme_taxonomies(){
        $this->add(
            [
                'taxonomy' => 'page_category',
                'object_type' => ['page'], // definir para qué tipo de objeto aplica. Puede ser un CPT
                'args' => [
                    'labels' => [
                        'name' => _x( 'Categorías', 'taxonomy general name' ),
                        'singular_name' => _x( 'Categoría', 'taxonomy singular name' ),
                        'search_items' =>  __( 'Buscar categorías' ),
                        'all_items' => __( 'Todas las categorías' ),
                        'parent_item' => __( 'Categoría superior' ),
                        'parent_item_colon' => __( 'Categoría superior:' ),
                        'edit_item' => __( 'Editar categoría' ),
                        'update_item' => __( 'Actualizar categoría' ),
                        'add_new_item' => __( 'Agregar categoría' ),
                        'new_item_name' => __( 'Nombre de la nueva categoría' ),
                        'menu_name' => __( 'Categorías' ),
                    ]
                ],
                'rewrite' => array(
                    // 'slug' => 'categorias', // This controls the base slug that will display before each term
                    // 'with_front' => false, // Don't display the category base before "/categorias/"
                    'hierarchical' => true // This will allow URL's like "/categorias/boston/cambridge/"
                )
            ]
        );
        $this->add(
            [
                'taxonomy' => 'page_tag',
                'object_type' => ['page'], // definir para qué tipo de objeto aplica. Puede ser un CPT
                'args' => [
                    'labels' => [
                        'name' => _x( 'Etiquetas', 'taxonomy general name' ),
                        'singular_name' => _x( 'Etiqueta', 'taxonomy singular name' ),
                        'search_items' =>  __( 'Buscar Etiquetas' ),
                        'all_items' => __( 'Todas las Etiquetas' ),
                        'parent_item' => __( 'Etiqueta superior' ),
                        'parent_item_colon' => __( 'Etiqueta superior:' ),
                        'edit_item' => __( 'Editar Etiqueta' ),
                        'update_item' => __( 'Actualizar Etiqueta' ),
                        'add_new_item' => __( 'Agregar Etiqueta' ),
                        'new_item_name' => __( 'Nombre de la nueva Etiqueta' ),
                        'menu_name' => __( 'Etiquetas' ),
                    ]
                ],
                'rewrite' => array(
                    // 'slug' => 'categorias', // This controls the base slug that will display before each term
                    // 'with_front' => false, // Don't display the category base before "/etiquetas/"
                    'hierarchical' => false // This will allow URL's like "/etiquetas/boston/cambridge/"
                )
            ]
        );

    }
    
}