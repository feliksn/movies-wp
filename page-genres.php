<?php get_header(); ?>

<div class="container py-3">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">
       
            <div class="col">
                <ul>
                    <?php  wp_list_categories(array('exclude' => '1', 'hide_empty' => 0, 'style' => 'none')) ?>
                </ul>
            </div>
   
    </div>
</div>

<?php get_footer(); ?>