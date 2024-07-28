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
            <div class="col">
                <div class="card border border-0 shadow-sm">
                    <!-- вывод картинки -->
                    <?php the_post_thumbnail ();?>
                     <!-- вывод жанров, это есть в админке рубрики -->
                    <div class="card-header border border-0"><?php wp_list_categories(['style'=> 'none', 'separator'=> '']); ?></div>
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <!-- Назавание фильма -->
                            <span><?php the_title(); ?></span>
                               <!--Вывод года фильма, в админке это есть метки -->
                            <small class="text-body-tertiary"><?php the_tags('(', ' ', ')'); ?></small>
                        </h5>
                        <!--описание фильма и актеры в админке это есть ПРОИЗВОЛЬНые ПОЛя с именем cast и extract - где cast и extract классы h6 & p для вывода данных -->
                        <h6 class="cast card-text mb-3 text-secondary"><em><?php echo get_post_meta($post->ID, 'cast', true); ?></em></h6>
                        <p class="extract card-text"><?php echo get_post_meta($post->ID, 'extract', true); ?></p>
                        <!-- выводит веь контент страницы, в нашем случае в контенте только кнопка BTN --Read more... -->
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </article>
    <?php } ?>
    <!-- while пройдется по всем фильмам и прекратит работу -->
<?php } else {?> 
    <!-- если фильмов/записей не существует, тогда нужно проинформировать что не никаких фильмов/записей -->
    <p>Фильмов не найдено!</p>
<?php } ?>
