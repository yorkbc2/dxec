<?php

use Illuminate\Database\Seeder;
use App\Setting;
use App\Language;
use App\Currency;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$insertData = [
    		['setting_name' => 'store_title', 'setting_value' => null],
    		['setting_name' => 'store_description', 'setting_value' => null],
    		['setting_name' => 'store_main_currency', 'setting_value' => null],
    		['setting_name' => 'store_main_language', 'setting_value' => null],
    		['setting_name' => 'store_email', 'setting_value' => null],
    		['setting_name' => 'admin_theme', 'setting_value' => 'default'],
    		['setting_name' => 'admin_language', 'setting_value' => 'ua']
    	];

        Setting::insert($insertData);

        $insertData = [
        	['language_name' => 'Українська', 'language_symbol' => 'UA', 'language_icon' => '/config-images/ua.png', 'status' => 0, 'created_at' => date('Y-m-d H:i:s')],
        	['language_name' => 'Русский', 'language_symbol' => 'RU', 'language_icon' => '/config-images/ru.png', 'status' => 0, 'created_at' => date('Y-m-d H:i:s')],
        	['language_name' => 'English', 'language_symbol' => 'US', 'language_icon' => '/config-images/us.png', 'status' => 0, 'created_at' => date('Y-m-d H:i:s')],
        ];

        Language::insert($insertData);

        $insertData = [
        	['currency_name' => "UAH", 'currency_value' => 1, 'currency_coeff' => 1, 'currency_symbol' => null, 'status' => 0],
        	['currency_name' => "EUR", 'currency_value' => 1, 'currency_coeff' => 1, 'currency_symbol' => null, 'status' => 0],
        	['currency_name' => "USD", 'currency_value' => 1, 'currency_coeff' => 1, 'currency_symbol' => '$', 'status' => 0]
        ];

        Currency::insert($insertData);

    }
}
