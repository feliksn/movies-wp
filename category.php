<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage movies-wp
 */
get_header(); // подключаем header.php ?> 


<div class="container">
	<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 mb-3 g-3">

		<?php if ( have_posts() ) { query_posts(array('posts_per_page' => -1, 'cat' => get_query_var( 'cat' ))); ?>
			<?php while (have_posts()){  ?>

				<?php
					// the_post - Вызываем/активируем данные записи/фильма
					the_post();

					// Формируем строку жанров для отдельного фильма в цикле
					$categories = get_the_category();
					$categoriesString = '';
					foreach($categories as $category){ $categoriesString .= $category->name . ", "; }
					$categoriesStringCutLastComma = substr($categoriesString, 0, strlen($categoriesString) - 2);
					$genres = cutString($categoriesStringCutLastComma, 30);

					// Формируем строку актеров для отдельного фильма
					if(has_tag()){
						$tags = get_the_tags();
						$tagsString = '';
						foreach($tags as $tag){ $tagsString .= $tag->name . ", "; }
						$tagsStringCutLastComma = substr($tagsString, 0, strlen($tagsString) - 2);
						$actors = cutString($tagsStringCutLastComma, 30);
					} else {
						$actors = 'No actors!';
					}

					// Формируем отрывок описания для отдельного фильма
					$extract = has_excerpt() ? cutString(get_the_excerpt()) : 'No extract!';
					
					// Формируем название, заголовок для отдельного фильма
					$title = get_the_title() ?: "No title!";
					
					// Формируем год, для отдельного фильма
					$year = get_post_meta($post->ID, 'movie_year', true) ?: 'No year!';
					
					// Формируем картинку, для отдельного фильма
					$thumbnailUrl = get_the_post_thumbnail_url() ?: getDefaultThumbnailUrl();
        		?>

				<div class="col">
					<div class="card border border-0 shadow-sm">
				
						<!-- вывод картинки -->
						<img src="<?php echo $thumbnailUrl; ?>" alt="Movie thumbnail" class="card-img-top">   
						<div class="card-header border border-0"><?php echo $genres; ?></div>

						<div class="card-body">
							<h5 class="card-title mb-3">
								<?php echo $title; ?>
								<small class="text-body-tertiary">(<?php echo $year; ?>)</small>
							</h5>
							<h6 class="card-text mb-3 text-secondary"><em><?php echo $actors; ?></em></h6>
							<p class="card-text"><?php echo $extract; ?></p>
							<a href="<?php the_permalink();?>" class="btn btn-primary">Read more...</a>
						</div>

					</div>
				</div>

					
			<?php }; ?>
			<?php }else{  ?>
			<?php wp_reset_query(); echo 'В данный момент фильмов с таким жанром не найдено! '?>
		<?php }?>

	</div>
</div>

<?php get_footer(); // подключаем footer.php ?>