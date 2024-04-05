<?php
namespace Starterpoint;
use Starterpoint\Base;
use Starterpoint\Utils;

class AdminSettings extends Base{

    public $extra_menu_items; // items de menú que se pueden agregar 
    public $removed_menu_items; // items del menú a ocultar
    public $removed_submenu_items; // items de segundo nivel del menú a ocultar
    public $removed_node_items; // items de la barra superior
    public $renamed_menu_items; // para una forma rápida de renombrar items de menú nivel principal

    public function __construct(){
        $this->extra_menu_items = [];
        $this->removed_menu_items = [];
        $this->removed_submenu_items = [];
        $this->removed_node_items = [];
        $this->renamed_menu_items = [];
    }

    public function register(){
        add_action('admin_menu', [$this, 'custom_admin_menu']);
        
        add_action( 'admin_bar_menu', [$this, 'customize_admin_bar'], 70);
    } 
    public function add_menu_item($menu_item){
        $this->extra_menu_items[] = $menu_item;
    }

    public function remove_menu_item($key, $roles = null){
        $this->removed_menu_items[$key] = $roles;
    }

    public function remove_submenu_item($elem){
        $this->removed_submenu_items[] = $elem;
    }

    public function customize_admin_bar( $wp_admin_bar ) {
        foreach ($this->removed_node_items as $nodeitem){
            $wp_admin_bar->remove_node( $nodeitem );  
        }
    }
    
    public function remove_node_item($key){
        $this->removed_node_items[] = $key;
    } 

    public function custom_admin_menu(){
        $this->add_menu_items();
        $this->remove_menu_items();
        $this->remove_submenu_items();
        $this->rename_menu_items();
    }

    private function add_menu_items(){
        foreach($this->extra_menu_items as $menu){
            $incluir = false;
            if(isset($menu['roles'])){
                foreach ($menu['roles'] as $rol) {
                    if (current_user_can($rol)){
                        $incluir = true ; break;
                    }
                }
            }else{
                $incluir = true;
            }
            if ($incluir){
                // agregar un nivel principal
                $position = isset($menu['callback']) ? $menu['callback'] : null;
                $position = isset($menu['icon_url']) ? $menu['icon_url'] : null;
                $position = isset($menu['position']) ? $menu['position'] : null;
                add_menu_page(
                    $menu['page_title'],
                    $menu['menu_title'],
                    $menu['capability'],
                    $menu['menu_slug'],
                    $callback,
                    $icon_url,
                    $position
                );
                
                $submenus = isset($menu['submenus']) ?  $menu['submenus'] : [];

                foreach($submenus as $submenu){
                    // agregar los submenues de segundo nivel anidados
                    $capability = isset($submenu['capability']) ? $submenu['capability']: $menu['capability'];
                    $callback = isset($submenu['callback']) ? $submenu['callback'] : null;
                    $position = isset($submenu['position']) ? $submenu['position'] : null;
                    add_submenu_page(
                        $menu['menu_slug'], 
                        $submenu['page_title'], 
                        $submenu['menu_title'],
                        $capability,
                        $submenu['menu_slug'], 
                        $callback,
                        $position
                    );
                }
            }
        }
    }

    private function remove_menu_items(){
        if(!empty($this->removed_menu_items)){
            foreach ($this->removed_menu_items as $key=>$roles){
                // pendiente retringir acceso directo
                if(empty($roles)){
                    remove_menu_page($key);
                }elseif(is_array($roles) && !empty($roles)){
                    foreach ($roles as $rol){
                        if (current_user_can($rol)){
                            remove_menu_page($key);
                        }
                    }
                }
            }
        }
    }

    private function remove_submenu_items(){
        foreach ($this->removed_submenu_items as $elem){
            remove_submenu_page( $elem[0], $elem[1] );
        }
    }

    private function rename_menu_items(){
        global $menu;
        if(!empty($this->renamed_menu_items)){
            foreach($this->renamed_menu_items as $kren=>$vren){
                foreach ($menu as $key=>$value){
                    if($menu[$key][0] == $kren){
                        $menu[$key][0] = $vren;
                    }
                }
            }
        }
    }
    

    
}