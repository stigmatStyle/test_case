<?php
$page = 1;
$per_page = 4;
$offset = ($page - 1) * $per_page;

$args = [
	'post_type' => 'portfolio',
	'posts_per_page' => $per_page,
	'offset' => $offset,
	'orderby' => 'id',
	'order' => 'desc',
];
$posts = get_posts($args);

?>
<?php if (!empty($posts)) { ?>
<div class="container-fluid">
	<div id="portfolio-posts" class="row uza-portfolio">
        <?php foreach ( $posts as $post ) { ?>
		<div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item ux-ui-design" data-post-id="<?php echo $post->ID?>">
			<div class="single-portfolio-slide">
				<?php echo get_the_post_thumbnail( $post->ID, 'full' )?>
				<div class="overlay-effect">
					<h4><?php echo $post->post_title?></h4>
					<?php echo $post->post_content?>
				</div>
				<div class="view-more-btn">
					<a href="<?php echo get_permalink($post->ID)?>"><i class="arrow_right"></i></a>
				</div>
			</div>
		</div>
        <? } ?>
	</div>
	<div class="row">
		<div class="col-12 text-center mt-30">
			<a href="javascript:void(0)" class="btn uza-btn btn-3 load-more" data-page="1">Load More</a>
		</div>
	</div>
</div>
<?php } ?>