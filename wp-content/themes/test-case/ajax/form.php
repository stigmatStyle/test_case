<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';

$content = '';

foreach ( $_REQUEST as $key => $value ) {
	if ( $key != 'policy' ) {
		$content .= $key . ' — ' . $value . '<br>';
	}
}


// Создаем массив данных новой записи
$post_data = [
	'post_title'   => 'Feedback from - ' . date( 'd.m.Y H:i:s' ),
	'post_content' => $content,
	'post_type'    => 'feedback',
	'post_status'  => 'publish',
	'post_author'  => 1,
];

// Вставляем запись в базу данных
$post_id = wp_insert_post( $post_data );

echo json_encode( [ 'result' => $post_id ] );