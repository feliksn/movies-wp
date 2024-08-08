<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage movies-wp
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php /* Все скрипты и стили теперь подключаются в functions.php */ ?>
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class('bg-light'); // все классы для body ?>>

<a href="http://movies-wp/genres/">Жанры</a>
