<?php
vc_map( array(
    "name" => __("Projects"),
    "base" => "rk_projects",
    "category" => __('Content'),
    'icon' => 'icon-wpb-images-stack',
    'description' => 'Rowson Kitchens projects',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Display"),
            "param_name" => "limit",
            "description" => "Select display type.  Default will display all projects, Featured will display six",
            "value" => Array('Default', 'Featured')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Sorting"),
            "param_name" => "sorting",
            "description" => "Select sorting type.  Default will projects in ASC order, DESC will sort in desc order",
            "value" => Array('Default', 'DESC')
        )
    )
));
add_shortcode('rk_projects', 'projects');
function projects($atts) {
    $args = vc_map_get_attributes('rk_projects', $atts);
    $sort = $args['sorting'];
    $limit = $args['limit'];
    $projects = rk_get_projects($sort);
    $i = 1;
    $html = '
    <div class="row">';
    if($projects->have_posts()) {
        while ($projects->have_posts()) {
            $projects->the_post();
            $id = $projects->post->ID;
            $imgSrc = rk_get_custom_field($id, 'feature-image');
            $title = get_the_title();
            $snippet = rk_get_custom_field($id, 'snippet');
           // echo 'id ' . $projects->post->ID;
            // check if we are only diplaying six projects
            if ($limit == "Featured" && $i == 6) {
                break;
            }
            $html .= '
            <div class="col-xs-12 col-md-4 project">
                <a href="' . esc_url( get_permalink() ) . '">
                    <div class="image-wrapper">
                        <img src="' . $imgSrc[0] . '" alt="" />
                    </div>
                    <div class="content-wrapper">
                        <h3>' . $title . '</h3>
                        <p>' . $snippet[0] . '</p>
                    </div>
                    <div class="read-more-overlay">
                        <span>read more</span>
                    </div>
                </a>
            </div>';
            $i++;
        }
    }
    $html .= '    
    </div>';
   //echo count($projects);

   return $html;
}