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
        add_theme_support( 'custom-logo', [
            'height'      => 33,
            'width'       => 41,
            'flex-width'  => false,
            'flex-height' => false,
            'header-text' => '',
        ] );
    }

    // Удаляем страницу комментариев из админ панели (пока что нам не нужна)
    add_action('admin_menu', function () {
        remove_menu_page('edit-comments.php');
    });

    // Функция показывания данных переменной на экране
    function raw($data, $name=''){
        echo "$name (type: " . gettype($data) . ") = ";
        print("<pre style='margin-top:0;font-size:1rem'>" . print_r($data, true) . "</pre>");
    }

    // Фукнция обрезания строк по фиксированной длине
    function cutString($str, $len=90, $after='...'){
        if(strlen($str) > $len){
            return substr($str, 0, $len) . $after;
        } else {
            return $str;
        }
    }

    // Функция возвращает адрес картинки по умолчанию для фильма
    function getDefaultThumbnailUrl() {
        return wp_upload_dir()['baseurl'] . '/2024/07/movie-default-1.png';
    }

    // Регистрируем меню
    add_action( 'after_setup_theme', 'theme_register_nav_menu' );
    function theme_register_nav_menu() {
        register_nav_menu( 'header', 'Header Menu' );
    }


    // добавим класс nav-item ко всем пунктам меню li
    add_filter('nav_menu_css_class', 'custom_nav_menu_css_class');
    // получаем список сех классов меню
    function custom_nav_menu_css_class ($classes)
    {
        // добавляем к спику классов свой класс
        $classes[] = 'nav-item';
        //вернем список классов уже с нашим классом
        return $classes;
    }

    //повесим на все ссылки класс nav-link
    add_filter('nav_menu_link_attributes', 'custom_nav_menu_link_attributes');

    function custom_nav_menu_link_attributes ($atts)
    {
        $atts['class'] = 'nav-link';
        return $atts;
    }

    add_filter( 'navigation_markup_template', 'my_navigation_template', 10, 2);
    function my_navigation_template()
    {
        return '
        <nav aria-label="Page navigation example" id="navpag">
            %3$s
        </nav>    
        ';
    }