<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage movies-wp
 */
get_header(); // подключаем header.php ?>

<section>
	<div class="container py-4">
		<div class="row">
			<div class="col-3 offset-1">
				<!-- вывод картинки отдельного фильма -->
				<img src="<?php the_post_thumbnail_url() ?>" alt="" class="d-block w-100">
			</div>
			<div class="col-7">
				<!-- Назавание фильма -->
				<h1><?php the_title(); ?><br></h1>
				<p class="fs-4 text-secondary"> 
					<!--Вывод года фильма --> 
					(<?php echo get_post_meta($post->ID, 'movie_year', true); ?>)
				</p>
				<p class="fw-semibold">
					<!-- вывод жанров отдельного фильма -->
					<!-- Функция wp_list_categories() - показывает все существующие категории, а не отдельного фильма
					На странице отдельного фильма нужно использовать the_category() - эта фукнция получает категории/жарны только для отдельного взятого фильма -->
					Genres: <?php the_category(' '); ?>
				</p>
				<!-- вывод актеров отдельного фильма -->
				<p class="fw-light"><em><?php the_tags('Cast: ', ' ', ''); ?></em></p>
				<!-- вывод описания/контента отдельного фильма -->
				<p><?php echo get_the_excerpt() ?></p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); // подключаем footer.php ?>
