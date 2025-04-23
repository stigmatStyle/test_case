<?php
add_action( 'wp_enqueue_scripts', 'assets' );

function assets() {
	//enqueue Local scripts and styles
	wp_enqueue_script( 'jq-lib', get_template_directory_uri() . '/js/jquery.min.js', '', '', true );
	wp_enqueue_script( 'popper-lib', get_template_directory_uri() . '/js/popper.min.js', '', '', true );
	wp_enqueue_script( 'bootstrap-lib', get_template_directory_uri() . '/js/bootstrap.min.js', '', '', true );
	wp_enqueue_script( 'uza-lib', get_template_directory_uri() . '/js/uza.bundle.js', '', '', true );
	wp_enqueue_script( 'active-lib', get_template_directory_uri() . '/js/default-assets/active.js', '', '', true );
	wp_register_style( 'global', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'global' );
}

function theme_enqueue_scripts() {
	wp_enqueue_script('custom-ajax', get_template_directory_uri() . '/js/custom.js', ['jquery'], null, true);

	wp_localize_script('custom-ajax', 'custom_ajax_params', [
		'ajax_url' => admin_url('admin-ajax.php')
	]);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');