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
	$content 		= get_the_content() ?: "No extract!";
?>

<section>
	<div class="container py-4">
		<div class="row mb-3">
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

		<!-- Показываем другие фильмы в подобных жанрах для главного фильма -->
		<?php $categories = wp_get_post_categories(get_the_ID(), ['fields' => 'id=>name']); ?>  
		<?php foreach($categories as $cat_id => $cat_name){ ?>
			<?php $cat_link = get_category_link($cat_id); ?>
			<?php $query = new WP_Query('cat=' . $cat_id . '&posts_per_page=4'); ?>
			<?php if($query->have_posts()) { ?>
				<h5>Other <a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a> movies</h5>
				<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 mb-3 g-3">
					<?php while($query->have_posts() ) { ?>
						<?php $query->the_post(); ?>
						<div class="col">
							<div class="card border border-0 shadow-sm">
								<div class="card-body">
									<h5 class="card-title mb-3"><?php the_title(); ?></h5>
									<p class="card-text"><?php echo cutString(get_the_excerpt()); ?></p>
									<a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more...</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php wp_reset_postdata() ?>
		<?php } ?>
	</div>
</section>

<?php get_footer(); // подключаем footer.php ?>
