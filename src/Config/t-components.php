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
	'docs'=>[
		'main_nav'=>[
			"getting_started"=>[
				"name"=>"Getting Started",
				"icon"=>"bi-book-half",
				"items" =>[
					"overview"=>[
						"name"=>"Overview",
						"icon"=>null,
					],
					"alpine"=>[
						"name"=>"Alpine",
						"icon"=>null,
					],
				]
			],
			"components"=>[
				"name"=>"Components",
				"icon"=>"bi-boxes",
				'items'=>[
					"components_alerts"=>[
						"name"=>"Alerts",
						"icon"=>null,
					],
					"components_buttons"=>[
						"name"=>"Buttons",
						"icon"=>null,
					],
					"components_modals"=>[
						"name"=>"Modals",
						"icon"=>null,
					]
				]
			],
			"forms"=>[
				"name"=>"Forms",
				"icon"=>"bi-boxes",
				'items'=>[
					"forms_forms"=>[
						"name"=>"Forms",
						"icon"=>null,
					],
					"forms_fields"=>[
						"name"=>"Form Fields",
						"icon"=>null,
					],
					"forms_texts"=>[
						"name"=>"Text",
						"icon"=>"input-cursor",
					],
					"forms_textareas"=>[
						"name"=>"Textareas",
						"icon"=>"textarea-resize",
					],
					"forms_texteditors"=>[
						"name"=>"Rich Text Editors",
						"icon"=>"textarea-t",
					],
					"forms_numbers"=>[
						"name"=>"Numbers",
						"icon"=>"123",
					],
					"forms_selects"=>[
						"name"=>"Selects",
						"icon"=>'menu-down',
					
					],
					"forms_checkboxes"=>[
						"name"=>"Checks & radios",
						"icon"=>"ui-checks-grid",
					],
					"forms_ranges"=>[
						"name"=>"Ranges",
						"icon"=>"sliders",
					],
					"forms_dates"=>[
						"name"=>"Dates",
						"icon"=>'calendar',
					],
					"forms_files"=>[
						"name"=>"Files",
						"icon"=>"file-earmark",
					],
					"forms_colors"=>[
						"name"=>"Color pickers",
						"icon"=>"eyedropper",
					],
					"forms_icons"=>[
						"name"=>"Icon pickers",
						"icon"=>"eyedropper",
					]
				]
			]
		]
	]

];

