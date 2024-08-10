<?php
/**
 * tag template (tag.php)
 * @package WordPress
 * @subpackage movies-wp
 */
get_header(); // подключаем header.php ?> 

<section>
	<div class="container">
		<h3><?php single_cat_title(); ?></h3>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 mb-3 g-3">
			<?php get_template_part('loop'); ?>
		</div>
	</div>
</section>

<?php get_footer(); // подключаем footer.php ?>