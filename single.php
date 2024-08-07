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
	
	// Формируем актеров для фильма
	$actors = '';
	// Проверяем актеров для фильма
	if (has_tag()) {
		$tags = get_the_tags();
		// Чтобы проверить, что записано в $tags, то можно вызвать функцию raw($tags);
		// raw($tags, "Актеры");
		// Если есть актеры, то формируем ссылки и добавляем по очереди в переменную актеров
		foreach ($tags as $tag) {
			$actors .= '<a href="' . get_tag_link($tag->term_id).'">' .  $tag->name . "</a> ";
		}
	} else {
		// Если нет актеров, то записываем в переменную актеров простой текст
		$actors = 'No actors!';
	}
	
	// Формируем жанры для фильма
	$genres = '';
	$categories = get_the_category();
	// Чтобы проверить что записано в $categories, то можно вызвать функцию raw($categories)
	// raw($categories, "Жанры");
	// Т.к. в WP жанр/рубрика есть всегда, то создаем жанр "No genres" для фильмов без жанров.
	// проходимся по каждому жанру для фильма
	foreach($categories as $category){
		// Создаем условие для жанра "No genres", чтобы фильтровать фильмы без жанров
		if($category->term_id == 8){
			// Если ловим id жанра "No genres" то записываем (не добавляем, а записываем  - не пишем ".=" а пишем "=" ) в переменную просто название жанра без каких-либо ссылок. 
			$genres = $category->name . "!";
			// После того как словили жанр "No genres", записываем в переменную только имя жанра и останавливаем цикл "break;", т.к. дальнейшая работа цикла безсмысленна. И даже если у фильма будут другие жанры, то данное условие и так не покажет другие жанры, т.к. есть жанр "No genres" и без смысла показывать другие жанры с жанром "No genres"
			break;
		} else {
			// Если условие не выполняется, т.е. фильм не содержит жанр "No genres", то формируем ссылки жанров и добавляем по очереди в переменную жанров
			$genres .= '<a href="' . get_category_link($category->term_id) .'">'.  $category->name . "</a> ";
		}
	};
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
				<p class="fw-semibold"><?php echo $genres; ?></p>
				<!-- вывод актеров отдельного фильма -->
				<p class='fw-light'><em><?php echo $actors; ?></em></p>
				<!-- вывод описания/контента отдельного фильма -->
				<p><?php echo $content; ?></p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); // подключаем footer.php ?>
