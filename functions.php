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

    // добавляем чтобы в админке при создании поста в правом меню появилось подмееню сознание миниатюры
    add_action( 'after_setup_theme', 'movies_wp_post_thumbnails' );
    function movies_wp_post_thumbnails()
    {
        add_theme_support('post-thumbnails');
    }

    // Удаляем страницу комментариев из админ панели (пока что нам не нужна)
    add_action('admin_menu', function () {
        remove_menu_page('edit-comments.php');
    });


