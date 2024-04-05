
<?php
$query = new WP_Query( $args );


$html = '<div class="grilla">';
if($query->have_posts() ) : 

	$grid_item = '
	<article class="grilla-celda" id="grilla-celda-%s">
	    <a href="%s" style="background-image:url(%s)">
	        <h4>%s</h4>
	    </a>
	</article>
	';
    while ( $query->have_posts() ) : 
        $query->the_post();
        $html .= sprintf($grid_item,
            get_the_ID(),
            get_the_permalink(),
            get_the_post_thumbnail_url(),
            get_the_title()
        );
    endwhile;

endif;

$html .= '</div>';
wp_reset_postdata();

echo $html;
?>
