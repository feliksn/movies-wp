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
			<?php the_custom_logo(); ?>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<?php 
			wp_nav_menu( array(								  
				'container_class'=> "collapse navbar-collapse",          
				'container_id'	=> "navbarSupportedContent",          
				'menu_class'	=> 'navbar-nav me-auto mb-2 mb-lg-0',          
			));
		?>
		<?php get_template_part('searchform') ?>
    </div>
</nav>