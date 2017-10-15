<?php 

return [


	'post_urls' => [
		[
			'url' => 'add-product',
			'handler' => 'AdminController@add_product'
		]
	],

	'get_urls' => [
		[
			'url' => 'logout',
			'handler' => 'AdminController@logout'
		]
	],

	/**
	Array for links in admin's-panel nav. For developers!
	*/

	"page_urls" => [
		[
			"url" => "welcome",
			"name" => "Главная",
			'view' => 'admin.modules.main'
		],

		[
			"url" => "settings",
			"name" => "Настройки",
			'view' => 'admin.modules.settings',
			"childs" => [
				[
					"url" => "config",
					"name" => "Конфигурация",
					'view' => 'admin.modules.config'
				],
				[
					'url' => 'customize',
					'name' => 'Внешние настройки',
					'view' => 'admin.modules.customize'
				]
			]
		]

	]

];