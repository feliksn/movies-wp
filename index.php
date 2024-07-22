<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage movies-wp
 */
get_header(); // подключаем header.php ?> 

<section>
	<div class="container">
		<!-- используем файл loop для показания записей/фильмов в цикле -->
		<?php get_template_part('loop') ?>
	</div>
</section>

<?php get_footer(); // подключаем footer.php ?>