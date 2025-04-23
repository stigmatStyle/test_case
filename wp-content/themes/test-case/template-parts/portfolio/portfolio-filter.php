<?php

$terms = get_terms( [
	'taxonomy'   => 'portfolio_category',
	'hide_empty' => true,
	'orderby'    => 'id',
	'order'      => 'ASC',
] );

?>

<div class="portfolio-menu text-center mb-80">
    <button class="btn active filter-btn" data-filter="all">All Portfolio</button>
	<?php foreach ( $terms as $term ) {  ?>
        <button class="btn filter-btn" data-filter="<?php echo $term->slug?>"><?php echo $term->name ?></button>
    <?php } ?>
</div>