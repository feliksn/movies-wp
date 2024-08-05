<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage movies-wp
 */
get_header(); // подключаем header.php ?>

<?php
	$thumbnailUrl_single = get_the_post_thumbnail_url() ?: getDefaultThumbnailUrl();
	$title_single = the_title('', '', false) ?: "No title!";
	$year_single = get_post_meta($post->ID, 'movie_year', true) ?: "No year!";
	$extract_single = get_the_excerpt() ?: '<u><b> No extract! </u></b>';
	
?>

<section>
	<div class="container py-4">
		<div class="row">
			<div class="col-3 offset-1">
				<!-- вывод картинки отдельного фильма -->
				<img src="<?php echo $thumbnailUrl_single; ?>" alt="" class="d-block w-100">
			</div>
			<div class="col-7">
				<!-- Назавание фильма -->
				<h1><?php echo $title_single; ?><br></h1>
				<p class="fs-4 text-secondary"> 
					<!--Вывод года фильма --> 
					(<?php echo $year_single; ?>)
				</p>
				<p class="fw-semibold">
					<!-- вывод жанров отдельного фильма -->
					<!-- Функция wp_list_categories() - показывает все существующие категории, а не отдельного фильма
					На странице отдельного фильма нужно использовать the_category() - эта фукнция получает категории/жарны только для отдельного взятого фильма -->
					Genres: 
					<?php if( has_category(array(1, 'No genres!'))) { ?>
						<u>No genres!</u>
					<?php }else{ 
						 the_category(' '); } 
					?>
				</p>
				<!-- вывод актеров отдельного фильма -->
				<?php if(has_tag()){ ?>
					<p class='fw-light'><em> <?php the_tags('Cast: ', ' ', ''); ?></em></p>
				<?php }else{ ?>
					<p class='fw-light'><em> Cast: <u><b> No casts! </b></u> </em></p>
				<?php } ?>

				<!-- вывод описания/контента отдельного фильма -->
				<p>
					<?php if(has_excerpt()){ 
								echo get_the_excerpt();
						  }else{
					?>
						  <u><b> No extract! </u></b>
					<?php }?>
				</p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); // подключаем footer.php ?>
