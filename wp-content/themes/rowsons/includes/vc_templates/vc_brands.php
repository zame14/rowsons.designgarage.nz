<?php
vc_map( array(
    "name" => __("Brand Logos"),
    "base" => "rk_logos",
    "category" => __('Content'),
    'icon' => 'icon-wpb-single-image',
    'description' => 'Logos of brands',
    'show_settings_on_create' => false,
));
add_shortcode('rk_logos', 'rkLogos');
function rkLogos($atts) {
    global $wpdb;
    $brands = rk_get_brand_logos();
    $html = '';
    $i = 1;
    $n = 1;
    if($brands->have_posts()) {
        //$r = $wpdb->get_results("SELECT count(ID) as clients FROM " . $wpdb->prefix . "posts WHERE post_type=\"logo\"");
        // print_r($r[0]->clients);
        $html .= '
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <ul class="item active">';
        while($brands->have_posts()) {
            $brands->the_post();
            $name = get_the_title();
            $logo_url = rk_get_custom_field($brands->post->ID, 'logo');
            if($i == 0) {
                $html .= '<ul class="item">';
                $i++;
            }
            $html .= '<li><img src="' . $logo_url[0] . '" alt="' . $name . '" /></li>';
            if(($i % 6) == 0) {
                $html .= '</ul>';
                $i = 0;
            }
            if($i <> 0) {
                $i++;
            }
            $n++;
        }
        $html .= '
                </div>
            </div>
        </div>';
    }
    return $html;
}

