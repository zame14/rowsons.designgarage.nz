<?php
vc_map( array(
    "name" => __("Home Banner"),
    "base" => "rk_home_banner",
    "category" => __('Content'),
    'icon' => 'icon-wpb-single-image',
    'description' => 'Banner for the home page',
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => __("Logo"),
            "param_name" => "logo",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Slogan"),
            "param_name" => "slogan",
        ),
    )
));
add_shortcode('rk_home_banner', 'homeBanner');
function homeBanner($atts) {
    $args = shortcode_atts( array(
        'slogan' => '',
        'logo' => '',
    ), $atts);
    $slogan = $args['slogan'];
    $logo = intval($args['logo']);
    $logoImage = '';
    if($logo) {
        //$image = wp_get_attachment_image_src($banner, 'inside_banner');
        //$backgroundImage = $image[0];
        $logoImage = wp_get_attachment_image($logo,'');
    }
    $html = '
    <div class="home-banner-wrapper">
        ' . $logoImage . '
        <h1>' . $slogan . '</h1>
    </div>';
    return $html;
}