<?php get_header(); ?>

<?php 
$actors = get_tags();
$rowsLen = ceil(count($actors) / 4);
$actorsCols = array_chunk($actors, $rowsLen);
$colsOrderSM = [0, 2, 1, 3];
 ?>

<div class="container py-3">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">
        <?php foreach ($actorsCols as $colIndex => $actors) { ?>
            <div class="col <?php echo "order-sm-$colsOrderSM[$colIndex] order-lg-$colIndex" ?>">
                <?php foreach ($actors as $actor) { ?>
                    <a href="<?php echo $actor->slug; ?>" class="fs-5 link-offset-1 link-underline link-underline-opacity-25">
                        <?php echo $actor->name; ?>
                    </a><br>
                <?php  } ?>
            </div>
        <?php  } ?>
    </div>
</div>

<?php get_footer(); ?>