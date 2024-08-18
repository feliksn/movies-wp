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

<?php
   
   $film_data = get_the_category();
  
   $rss_mass = [];


   for($i = 0; $i<count($film_data); $i++){
		array_push($rss_mass, fetch_feed('http://movies-wp/genres/'. $film_data[$i]->slug . '/'));
   }


   $rss_items = [];

	foreach($rss_mass as $rss_genre) {
		array_push($rss_items, $rss_genre->get_items( 0, $rss_genre->get_item_quantity(4) ));
	}

?>
    <?php foreach($rss_items as $rss_key=>$rss_item) { ?>

		<h5> Other <a href="<?php echo 'http://movies-wp/genres/'. $film_data[$rss_key]->slug .'/' ?>"> <?php echo $film_data[$rss_key]->name ?> </a> movies</h5>
		
			<div id="movies-container" class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 mb-3 g-3">
				<?php  foreach ($rss_item as $item ) { ?>
					<div class="col">
						<div class="card border border-0 shadow-sm">
							<div class="card-body">
								<h5 class="card-title mb-3">
									<?php echo $item->get_title() ?>
								</h5>
								<p class="card-text"><?php echo cutString($item->get_content()); ?></p>
								<a href="<?php echo $item->get_permalink(); ?>" class="btn btn-primary">Read more...</a>
							</div>
						</div>
					</div>
				<?php  } ?>
			</div>

	<?php  } ?>
		


<?php get_footer(); // подключаем footer.php ?>
