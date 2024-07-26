<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage movies-wp
 */
get_header(); // подключаем header.php ?>

<section>
	<div class="container">
		<?php the_title(); ?>
		<?php the_content(); ?>
	</div>
</section>

<?php get_footer(); // подключаем footer.php ?>
