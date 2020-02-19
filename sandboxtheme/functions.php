<?php

function add_my_styles(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('main', get_template_directory_uri() . '/main.css');
    wp_enqueue_style('bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
}

add_action('wp_enqueue_scripts', 'add_my_styles');


//add custom post types

function make_cpt(){

    register_post_type('clients',
        //options
        array(
            'labels' => array(
                'name' => __( 'Clients' ),
                'singular_name' => __( 'Client' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-businessman',
            'supports' => array(
                'title',
                'custom-fields'
            )
        )
    );

    register_post_type('sitecontent',
        //options
        array(
            'labels' => array(
                'name' => __( 'Site Content' ),
                'singular_name' => __( 'Site Content' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-media-document',
            'supports' => array(
                'title',
                'custom-fields'
            )
        )
    );

    register_post_type('sitedesign',
        //options
        array(
            'labels' => array(
                'name' => __( 'Site Design' ),
                'singular_name' => __( 'Site Design' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-image-crop',
            'supports' => array(
                'title',
                'custom-fields'
            )
        )
    );

    register_post_type('timeline',
        //options
        array(
            'labels' => array(
                'name' => __( 'Timelines' ),
                'singular_name' => __( 'Timeline' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-calendar-alt',
            'supports' => array(
                'title',
                'custom-fields'
            )
        )
    );

    register_post_type('development',
        //options
        array(
            'labels' => array(
                'name' => __( 'Development' ),
                'singular_name' => __( 'Development' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-site-alt3',
            'supports' => array(
                'title',
                'custom-fields'
            )
        )
    );



}
add_action( 'init', 'make_cpt' );




?>


<?php
//style admin areas in back end to make a little easier to read.
function my_acf_admin_head(){
?>
  <style type="text/css">
      .adminfields{background-color:#cce5e5;}
  </style>
<?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');
  ?>

<?php
//set conditional requires on certain fields.  Mainly, only make required if user role is author (Client).  This allows employees to interact directly with dashboard.

function acf_conditional_user_role($valid, $value, $field, $input){
    //check that current user is only an author
    if(current_user_can('author')){
        if(!$value){
            $valid = 'You must accept Client Approval before submitting.';
        }
    }
    return $valid;
}

add_filter('acf/validate_value/key=field_5e4c5a0648025', 'acf_conditional_user_role', 10, 4);


?>
