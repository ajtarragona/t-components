<?php

return [
	
	'theme' => 'bootstrap5',
	'prefix' => 't',
	'autopublish' => true,
	
	'components'=>[
		
	],
	'svg_paths' => [
		// base_path('resources/svg'),
		// base_path('resources/images'),
		base_path('public/'),
	],
	'gmaps'=>[
		"api_key" => env("GOOGLE_MAPS_API_KEY"),
		"default_zoom" => env("GOOGLE_MAPS_DEFAULT_ZOOM"),
		"tgn_coords" => env("GOOGLE_MAPS_TGN_COORDS")
	],
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


];

