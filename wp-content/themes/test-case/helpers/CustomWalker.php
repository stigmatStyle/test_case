<?php

class CustomWalker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n{$indent}<ul class=\"dropdown\">\n";
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat("\t", $depth);
		$output .= "{$indent}</ul>\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = str_repeat("\t", $depth);

		// Классы — не из админки, а вручную:
		$classes = [];

		// Добавим класс current-item если пункт активный
		if (in_array('current-menu-item', (array)$item->classes)) {
			$classes[] = 'current-item';
		}

		$class_names = $classes ? ' class="' . esc_attr(join(' ', $classes)) . '"' : '';

		$output .= "{$indent}<li{$class_names}>";

		$attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

		// Можно добавить дефис перед заголовком, если хочется визуального соответствия
		$title_prefix = ($depth > 0) ? '- ' : '';

		$title = $title_prefix . apply_filters('the_title', $item->title, $item->ID);

		$output .= "<a{$attributes}>{$title}</a>";
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}
}



