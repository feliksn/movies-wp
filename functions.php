<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage movies-wp
 */

    add_action( 'wp_enqueue_scripts', 'movies_wp_scripts' );

    function movies_wp_scripts() {
        // Styles
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/lib/bootstrap/bootstrap.min.css');
        wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');

        // Scripts
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_template_directory_uri() . '/lib/jquery/jquery.min.js', array(), false, true);
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/lib/bootstrap/bootstrap.min.js' , array(), false, true);
        wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), false, true);

    }  
 
?>
