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

<!-- навигационная панель -->
<nav class="navbar navbar-expand-lg bg-white border-bottom ">
    <div class="container">
		<a class="navbar-brand" href="/">
			<img src="./images/logo.svg" alt="Bootstrap" width="41.25" height="33">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<?php 
			wp_nav_menu( array(								  
				'container'       => false,           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
				'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',          // (string) class самого меню (ul тега)
				'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
			) );
			?>

			<?php get_template_part('searchform') ?>
			
        </div>
    </div>
</nav>