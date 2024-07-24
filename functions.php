<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage movies-wp
 */

    add_action( 'wp_enqueue_scripts', 'movies_wp_scripts' );

    function movies_wp_scripts() {

        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css'  );
        wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/lib/bootstrap/bootstrap.min.css'  );

        wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js' );

        // переподключаем Query
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery',  '' );
        wp_enqueue_script( 'jquery', get_template_directory_uri() . '/jquery/jquery.min.js' );

        wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/lib/bootstrap/bootstrap.min.js' , array('jquery'), ' ', true);

    }

?>
