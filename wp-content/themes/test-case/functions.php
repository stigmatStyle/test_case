<?php

require get_template_directory() . '/helpers/assets.php';
require get_template_directory() . '/helpers/CustomWalker.php';

add_theme_support('post-thumbnails');

register_nav_menus([
	'main-menu' => 'Меню в шапке'
]);

register_post_type( 'portfolio',
	array(
		'labels'          => [
			'name'          => __( 'Портфолио' ),
			'singular_name' => __( 'Портфолио' ),
			'add_new' => __('Добавить элемент портфолио'),
			'add_new_item' => __('Добавить новый элемент портфолио'),
			'edit_item' => __('Редактировать элемент портфолио'),
			'new_item' => __('Новый элемент портфолио'),
			'view_item' => __('Посмотреть элемент портфолио'),
			'search_items' => __('Поиск элементов портфолио'),
			'not_found' => __('Элементы портфолио не найдены'),
			'not_found_in_trash' =>  __('В корзине элементов портфолио не найдено'),
			'all_items' => __('Все элементы портфолио'),
		],
		'public'          => true,
		'show_in_menu'    => true,
		'menu_icon'       => 'dashicons-portfolio',
		'capability_type' => 'post',
		'capabilities'    => [ 'create_posts' => true, ],
		'supports' => ['title', 'editor', 'thumbnail'],
		'has_archive' => true,
		'map_meta_cap'    => true,
		'rewrite' => ['slug' => 'portfolio'],
		'show_in_rest' => true,
	)
);
register_taxonomy('portfolio_category', ['portfolio'], [
	'label' => 'Категории портфолио',
	'hierarchical' => true,
	'public' => true,
	'rewrite' => ['slug' => 'portfolio_category'],
	'show_in_rest' => true,
]);

//Portfolio pagination
function load_more_portfolio() {

	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

	$filter = isset($_POST['filter']) ? sanitize_text_field($_POST['filter']) : 'all';

	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => 4,
		'paged' => $paged,
		'orderby' => 'id',
		'order' => 'asc',
	);

	if ($filter !== 'all') {
		$args['tax_query'] = [
			[
				'taxonomy' => 'portfolio_category',
				'field'    => 'slug',
				'terms'    => $filter,
				'operator' => 'IN',
			],
        ];
	}

	$query = new WP_Query($args);

	if ($query->have_posts())  {
		while ($query->have_posts()) {
            $query->the_post();
			?>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item">
                <div class="single-portfolio-slide">
					<?php the_post_thumbnail('full'); ?>
                    <div class="overlay-effect">
                        <h4><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
                    </div>
                    <div class="view-more-btn">
                        <a href="<?php the_permalink(); ?>"><i class="arrow_right"></i></a>
                    </div>
                </div>
            </div>
		<?php
		}
	}

	wp_die();
}
add_action('wp_ajax_load_more_portfolio', 'load_more_portfolio');
add_action('wp_ajax_nopriv_load_more_portfolio', 'load_more_portfolio');


add_filter( 'wp_get_attachment_image_attributes', 'remove_lazy_loading_for_featured_image', 10, 3 );

function remove_lazy_loading_for_featured_image( $attr, $attachment, $size ) {
	if ( $size === 'full' ) {
		$attr['loading'] = 'eager';
	}
	return $attr;
}