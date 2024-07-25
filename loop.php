<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage movies-wp
 */ 
?>

<!-- создаем условие для проверки существуют какие-либо фильмы -->
<?php if(have_posts()){ ?>
    <!-- если записи/фильмы существуют запускаем цикл while -->
    <?php while(have_posts()){ ?>
        <article> 
            <!-- подобная конструкция для показывания записей/фильмов -->
            <?php the_post(); ?>
            <!-- Я удалил the_title() здесь чтобы  ->> в постах в админке остается, а на странице не выводиться. то что мне нужно!!! -->
            <?php the_content(); ?>
        </article>
    <?php } ?>
    <!-- while пройдется по всем фильмам и прекратит работу -->
<?php } else {?> 
    <!-- если фильмов/записей не существует, тогда нужно проинформировать что не никаких фильмов/записей -->
    <p>Фильмов не найдено!</p>
<?php } ?>
