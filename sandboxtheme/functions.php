<?php

function add_my_styles(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('main', get_template_directory_uri() . '/main.css');
}

add_action('wp_enqueue_scripts', 'add_my_styles');
