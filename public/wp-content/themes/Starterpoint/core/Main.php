<?php
namespace Starterpoint;


class Main{
    private $core_version = '3.2.1';
    
    //instancias de Classes
    public $options;
    public $assets;
    public $menus;
    public $sidebars;
    public $shortcodes;
    public $cpt;
    public $taxonomies;
    public $posts;
    public $admin_settings;

    public $setup_values;


    function __construct(){        
        $this->options = new Options();
        $this->assets = new Assets();
        $this->menus = new Menus();
        $this->sidebars = new Sidebars();
        $this->shortcodes = new Shortcodes();
        $this->cpt = new CPT();
        $this->taxonomies = new Taxonomies();
        $this->posts = new Posts();
        $this->admin_settings = new Adminsettings();

        
        $this->setup_values = array(
            'theme_support_menus' => true,
            'theme_support_post_thumbnails' => true,
            'rsd_link' => false,
            'wp_generator' => false,
            'feed_links' => false,
            'index_rel_link' => false,
            'wlwmanifest_link' => false,
            'feed_links_extra' => false,
            'start_post_rel_link' => false,
            'parent_post_rel_link' => false,
            'adjacent_posts_rel_link' => false,
            'print_emoji_detection_script' => false,
            'print_emoji_styles' => false,
            'wp_staticize_emoji' => false,
            'wp_staticize_emoji_for_email' => false,
            'widget_text_shortcode_unautop' => true,
            'widget_text_do_shortcode' => true,
        );
    }
    
    // getters y setters
    function get_core_version(){
        return $this->core_version;
    }
    function get_theme_version(){
        return Utils::themeVersion();
    }
    function get_stylesheet_uri(){
        return Utils::styleSheetUri();
    }
    function get_assets_folder(){
        return THEME_ASSETS_FOLDER;
    }
    

    function init(){
        
        $this->setup();

        $this->menus->register();
        $this->sidebars->register();
        $this->shortcodes->register();
        $this->cpt->register();
        $this->taxonomies->register();
        $this->admin_settings->register();
    }
    
    function setup(){        
        // setup inicial con todas las funciones necesarias
        if($this->setup_values['theme_support_menus'])
            add_theme_support( 'menus' );
        if($this->setup_values['theme_support_post_thumbnails'])
            add_theme_support( 'post-thumbnails' );
        
            // remove junk from head
        if(!$this->setup_values['rsd_link'])
            remove_action('wp_head', 'rsd_link');
        if(!$this->setup_values['wp_generator'])
            remove_action('wp_head', 'wp_generator');
        if(!$this->setup_values['feed_links'])
            remove_action('wp_head', 'feed_links', 2);
        if(!$this->setup_values['index_rel_link'])
            remove_action('wp_head', 'index_rel_link');
        if(!$this->setup_values['wlwmanifest_link'])
            remove_action('wp_head', 'wlwmanifest_link');
        if(!$this->setup_values['feed_links_extra'])
            remove_action('wp_head', 'feed_links_extra', 3);
        if(!$this->setup_values['start_post_rel_link'])
            remove_action('wp_head', 'start_post_rel_link', 10, 0);
        if(!$this->setup_values['parent_post_rel_link'])
            remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        if(!$this->setup_values['adjacent_posts_rel_link'])
            remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        
        // disable emojis
        if(!$this->setup_values['print_emoji_detection_script']){
            remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
            remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        }
        if(!$this->setup_values['print_emoji_styles']){
            remove_action( 'wp_print_styles', 'print_emoji_styles' );
            remove_action( 'admin_print_styles', 'print_emoji_styles' );
        }
        if(!$this->setup_values['wp_staticize_emoji']){
            remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
            remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        }
        if(!$this->setup_values['wp_staticize_emoji_for_email'])
            remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );


        // deshabilita los parrafos automáticos en los widgets
        if($this->setup_values['widget_text_shortcode_unautop'])
            add_filter('widget_text', 'shortcode_unautop');
        if($this->setup_values['widget_text_do_shortcode'])
            add_filter('widget_text', 'do_shortcode');

    }
}