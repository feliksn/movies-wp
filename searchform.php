<?php
/**
 * Шаблон формы поиска (searchform.php)
 * @package WordPress
 * @subpackage movies-wp
 */
?>

<form class="d-flex" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<label class="screen-reader-text" for="s">Поиск: </label>
	<input class="form-control me-2" type="search" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Search" aria-label="Search"/>
	<input class="btn btn-outline-success" type="submit" id="searchsubmit" value="Search" />
</form>

