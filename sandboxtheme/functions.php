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
}
add_action( 'init', 'make_cpt' );
