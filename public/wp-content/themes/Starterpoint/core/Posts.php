<?php
namespace Starterpoint;

class Posts{


    public function getSocialImg(){
        global $post;
        $social_img_og = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
        return has_post_thumbnail($post->ID) ? $social_img_og[0] : sprintf('%s/images/logo.jpg', get_stylesheet_directory_uri());
    }

    function getPostDescription(){
        // se puede definir un campo personalizado "metadescription" para agregr una descripción en el meta tag de <head>
        global $post;
        if ((is_home()) || (is_front_page())) {
            return get_bloginfo('description');
        } else {
            return get_post_meta($post->ID, 'metadescription', true);
        }
    }

    public function pageBySlug($page_slug, $output = OBJECT, $post_type = 'page'){
	    // dado un slug devuelve la página correspondiente
        global $wpdb;
        $page = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s AND post_status = 'publish'", $page_slug, $post_type));
        if ($page) {
            return get_post($page, $output);
        } else {
            return null;
        }
    }


    public function parentPage(){
	    // para una pagina anidada devuelve la pagina madre
        global $post;
        if ($post->post_parent == 0) return '';
        $post_data = get_post($post->post_parent);
        return $post_data;
    }

    public function topLevelPage($post){
	    // devuelve el nombre de la página de primer nivel donde está la página actual
        global $post;
        $parents = get_post_ancestors($post->ID);
        /* Get the top Level page->ID count base 1, array base 0 so -1 */
        $id = ($parents) ? $parents[count($parents) - 1] : $post->ID;
	    /* Get the parent and set the $class with the page slug (post_name) */
        $parent = get_post($id);
        return ($parent) ? $parent->post_name : '';
    }

    public function relatedPagesByTags(){
	    // http://www.wpbeginner.com/wp-tutorials/how-to-show-related-pages-in-wordpress/
        global $post;
        $orig_post = $post;
        $tags = wp_get_post_tags($post->ID);
        $rel_div = '';
        if ($tags) {
            $tag_ids = array();
            foreach ($tags as $individual_tag) {
                $tag_ids[] = $individual_tag->term_id;
            }

            $args = array(
                'post_type' => 'page',
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page' => 10
            );
            $my_query = new WP_Query($args);
            if ($my_query->have_posts()) {
                $rel_div = '<div id="relatedpages"><h3>Paginas relacionadas</h3><ul>';
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    $rel_div .= '<li>';
                    $rel_div .= sprintf(
                        '<h3><a href="%s" title="%s">%s</a></h3>',
                        get_the_permalink(),
                        get_the_title(),
                        get_the_title()
                    );
                    $rel_div .= '</li>';
                }
                $rel_div .= '</ul></div>';
            } else {
                $rel_div = "<p>No se encontraron páginas relacionadas</p>";
            }
        }
        $post = $orig_post;
        wp_reset_query();
        return $rel_div;
    }
}