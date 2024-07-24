<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage movies-wp
 */
get_header(); // подключаем header.php ?> 

<!-- главный контейнер -->
<div class="container">
    <!-- Нзвание страницы -->
    <h3>Movies </h3>
    <!-- контейнер для фильмов -->
    <div id="movies-container" class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 mb-3 g-3">
        <?php get_template_part('loop') ?>
    </div>

</div>

<?php get_footer(); // подключаем footer.php ?>