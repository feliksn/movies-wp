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
			<!-- вывод картинки films-->
			<?php the_post_thumbnail ();?>
        </div>
        <div class="col-7">
			<!-- Назавание фильма -->
            <h1>
				<!-- Назавание фильма -->
				<?php the_title(); ?>
			<br>
			</h1>
			
            <p class="fs-4 text-secondary">
 				<!--Вывод года фильма -->
				 (<?php echo get_post_meta($post->ID, 'year', true); ?>)
			</p>
            <p>
				<!-- вывод жанров films -->
				<?php wp_list_categories(['style'=> 'none', 'separator'=> '']); ?>
            </p>
            <p>
				<!-- вывод cast films -->
				<?php the_tags('', ' ', ''); ?>
            </p>
            <p>
				<!-- вывод описания films -->
				<?php echo get_post_meta($post->ID, 'extract', true); ?>
			</p>
        </div>
    </div>
</div>

</section>

<?php get_footer(); // подключаем footer.php ?>
