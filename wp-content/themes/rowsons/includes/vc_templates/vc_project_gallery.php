<?php
vc_map( array(
    "name"                    => __( "Project Gallery" ),
    "base"                    => "rk_gallery",
    'icon'                    => 'icon-wpb-images-stack',
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'rk_gallery', 'projectGallery' );
function projectGallery( $atts ) {
    global $post;
    $featureSrc = rk_get_custom_field($post->ID, 'feature-image');
    $images = rk_get_custom_field($post->ID, 'project-images');
    $html = '
    <div class="grid">';
        //$html .= '<div class="grid-item"><img src="' . $featureSrc[0] . '" alt="" /></div>';
        foreach($images as $imgSrc) {
            $html .= '<div class="grid-item"><img src="' . $imgSrc . '" alt="" /></div>';
        }
    $html .= '    
    </div>';
    $id = $post->ID;
    $prev = displayPrevButton($id);
    $next = displayNextButton($id);
    $html .= '
    <div class="buttons-wrapper">
        ' . $prev . $next . '
    </div>';

    return $html;
}