<?php

return [
	
	'theme' => 'bootstrap5',
	'autopublish' => true,
	
	'components'=>[
		'modal' =>[
			'include_css' => false,
			'include_js' => true,
			'defaults' => [
				'modal_max_width' => '2xl',
				'close_modal_on_click_away' => true,
				'close_modal_on_escape' => true,
				'close_modal_on_escape_is_forceful' => true,
				'dispatch_close_event' => false,
				'destroy_on_close' => false,
			],
		]
	],
	'svg_paths' => [
		// base_path('resources/svg'),
		// base_path('resources/images'),
		base_path('public/'),
	],
];

