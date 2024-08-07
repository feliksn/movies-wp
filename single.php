<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage movies-wp
 */
get_header(); // подключаем header.php ?>

<?php
	$thumbnailUrl	= get_the_post_thumbnail_url() ?: getDefaultThumbnailUrl();
	$title			= get_the_title() ?: "No title!";
	$year			= get_post_meta($post->ID, 'movie_year', true) ?: "No year!";
	$content 		= get_the_content() ?: "No content!";
?>

<section>
	<div class="container py-4">
		<div class="row">
			<div class="col-3 offset-1">
				<!-- вывод картинки отдельного фильма -->
				<img src="<?php echo $thumbnailUrl; ?>" alt="" class="d-block w-100">
			</div>
			<div class="col-7">
				<!-- Назавание фильма -->
				<h1><?php echo $title; ?></h1>
				<!--Вывод года фильма --> 
				<p class="fs-4 text-secondary">(<?php echo $year; ?>)</p>
				<!-- вывод жанров отдельного фильма -->
				<p class="fw-semibold">Genres: <?php if( !has_category( 'no-genres' ) ) the_category(' '); else echo "No genres!" ?></p>
				<!-- вывод актеров отдельного фильма -->
				<p class='fw-light'><em>Cast: <?php if( has_tag() ) the_tags('', ' ', ''); else echo "No actors!" ?></em></p>
				<!-- вывод описания/контента отдельного фильма -->
				<p><?php echo $content; ?></p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); // подключаем footer.php ?>
