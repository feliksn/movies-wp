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
        <!-- подобная конструкция для показывания записей/фильмов -->
        
        <!-- Везде где есть слово "the" в названии функции WP, это означает, что функция получает данные для той отдельной записи/фильма, в цикле или в другом месте, например на отдельной странице. Так запрограмирован WP))) -->
        <?php the_post(); ?>
        
        <?php
            // Формируем строку жанров для отдельного фильма в цикле
            // get_the_category() - "..._the_..." указывает нам на то, что функция получает категории/жанры только отдельной записи/фильма в цикле.
            $categories = get_the_category();
            $categoriesString = '';
            foreach($categories as $category){ $categoriesString .= $category->name . ", "; }
            $categoriesStringCutLastComma = substr($categoriesString, 0, strlen($categoriesString) - 2);
            $genres = cutString($categoriesStringCutLastComma, 30);

            // Формируем строку актеров для отдельного фильма
            // get_the_tags() - "..._the_..." указывает нам на то, что функция получает метки/актеров только отдельной записи/фильма в цикле.
            $tags = get_the_tags();
            if($tags == false){
                $actors = 'No actors!';
            }else{
                $tagsString = '';
                foreach($tags as $tag){ $tagsString .= $tag->name . ", "; }
                $tagsStringCutLastComma = substr($tagsString, 0, strlen($tagsString) - 2);
                $actors = cutString($tagsStringCutLastComma, 30);
            }

            // Формируем отрывок описания для отдельного фильма
            $fragment = get_the_excerpt();
            if($fragment == ""){
                $extract = 'No extract!';
            }else{
                $extract = cutString($fragment);
            }

            // Формируем название, заголовок для отдельного фильма
            $heading = get_the_title(); 
            if($heading == ""){
                $title = 'No title!';
            }else{
                $title = $heading;
            }
            // Формируем год, для отдельного фильма
            $arbitraryField = get_post_meta($post->ID, 'movie_year', true);
            if($arbitraryField == ""){
                $year = 'No year!';
            }else{
                $year = $arbitraryField;
            }
            // Формируем картинку, для отдельного фильма
            $thumbnailUrl = get_the_post_thumbnail_url();
            if($thumbnailUrl == ""){
                $thumbnail = 'http://movies-wp/wp-content/uploads/2024/07/movie-default-1.png';
            }else{
                $thumbnail = $thumbnailUrl;
            }
           
        ?>
        
        <div class="col">
            <div class="card border border-0 shadow-sm">
                <!-- вывод картинки -->
                <img src="<?php echo $thumbnail; ?>" alt="Movie thumbnail" class="card-img-top">    
                <!-- вывод жанров, это есть в админке рубрики -->
                <div class="card-header border border-0"><?php echo $genres; ?></div>
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        <!-- Назавание фильма -->
                        <!-- "the..." - указывает нам на получение названия отдельной записи/фильма в цикле -->
                        <?php echo $title; ?>
                        <!--Год фильма -->
                        <small class="text-body-tertiary">
                            (<?php echo $year; ?>)
                        </small>
                    </h5>
                    <!-- Актеры фильма -->
                    <h6 class="card-text mb-3 text-secondary"><em><?php echo $actors; ?></em> </h6>
                    <!-- Описание фильма -->
                    <!-- get_the_excerpt() - это функция получения отрывка записи. Можно найти в админ панеле под картинкой записи/фильма. Это тектстовое поле, содержащее краткое описание записи. -->
                    <p class="card-text"><?php echo $extract; ?></p>
                    <a href="<?php the_permalink();?>" class="btn btn-primary">Read more...</a>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- while пройдется по всем фильмам и прекратит работу -->
<?php } else {?> 
    <!-- если фильмов/записей не существует, тогда нужно проинформировать что не никаких фильмов/записей -->
    <p>Фильмов не найдено!</p>
<?php } ?>
