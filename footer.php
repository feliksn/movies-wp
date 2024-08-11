<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage movies-wp
 */
?>
	<footer>
		<div class="container">
		</div>
	</footer>

	<?php	the_posts_pagination([
		'type'         => 'list',
		'prev_text'    => '<span aria-hidden="true">&laquo;</span>',
		'next_text'    => '<span aria-hidden="true">&raquo;</span>'
	]) ; ?>

	<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
</body>
</html>