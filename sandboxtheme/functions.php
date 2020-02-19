<?php

function add_my_styles(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('main', get_template_directory_uri() . '/main.css');
    wp_enqueue_style('bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
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

//specific to Client Approval
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

// specific to Revisions
function acf_conditional_revisions($valid, $value, $field, $input){
    //checks that current user role is Author
    if(!current_user_can('edit_pages')){
        if(!$value){
            $valid = 'You must select Revisions round.';
        }
    }
    return $valid;
}

add_filter('acf/validate_value/key=field_5e4b19bb2ff1c', 'acf_conditional_revisions', 10, 4);


//add functionality to hide choice once it has been selected (thereby only allowing each choice once).
// COMING SOON


//make sure each Client can only see their own items in the Media Library
function current_user_media($query){
    //pull user id for current user
    $user_id = get_current_user_id();

    //conditional - if current user is unable to perform admin/editor role tasks, then current user can only see their own materials in media library.
    if($user_id &&
        //check for Admin:
        !current_user_can('activate_plugins') &&
        //check for Editor
        !current_user_can('delete_others_pages')
    ){
        //only display the author's attachments.  author is denoted by $user_id
        //**note: 'author' is this context DOES NOT refer to WP user roles
        $query['author'] = $user_id;
    }
    return $query;
}

?>
