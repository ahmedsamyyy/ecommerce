<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['key' => 'default_locale' , 'value' => 'ar'],
            ['key' => 'default_timezone' , 'value' => 'africa/cairo'],
            ['key' =>  'reviews_enabled'  , 'value' => true],
            ['key' =>  'auto_approve_reviews'  , 'value'=> true],
            ['key' =>   'suppored_currencies'  , 'value'=> 'USD'],
            ['key' =>  'default_currency' , 'value' => 'USD'],
            ['key' =>  'store_email' , 'value'=>'admin@ecommerce.com'],
            ['key' =>  'search_engine' , 'value'=>'mysql'],
            ['key' =>   'local_shipping_cost' , 'value'=>0],
            ['key' =>  'outer_shipping_cost' , 'value'=>0],
            ['key' =>  'free_shipping_cost' , 'value'=>0],
            ['key' =>   'store_name' , 'value'=> 'ecommerce'],
            ['key' => 'local_shipping_label' , 'value'=>'local_shipping'],
            ['key' => 'outer_shipping_label' , 'value'=>'outer_shipping'],
            ['key' => 'free_shipping_label'  , 'value'=> 'free_shipping'],
        ]);
    }
}
