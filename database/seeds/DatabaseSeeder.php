<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // $this->call(UsersTableSeeder::class);

        factory(\App\Product::class)->create([
            'name' => 'Adata Memoria Ram Para Pc Ddr3 4gb 1333mhz Dimm',
            'description' => 'Suitable for Desktop PC
Module Specification 240Pin Unbuffered DIMM
Density 4GBIC Configuration 256 x 8, 512 x 8
CAS Latency 11
Working Voltage 1.35V (1.283V-1.45V)',
            'in_stock' => 100,
            'category_id' => function() {
                return factory(\App\Category::class)->create([
                    'name' => 'Memorias para PC'
                ])->id;
            },
        ])->each(function($p) {
            $p->prices()->create([
                'base' => '10.00',
                'expire_at' => '2018-03-30',
                'is_active' => true,
            ]);
            $p->discounts()->create([
                'value' => 10,
                'unit' => 'PERCENTAGE',
                'valid_from' => '2018-03-06',
                'valid_until' => '2018-03-30',
                'coupon_code' => 'TEST-COUPON',
                'minimum_order_value' => 0,
                'maximum_discount_amount' => 0,
            ]);
        });

        factory(\App\Product::class)->create([
            'name' => 'Memoria Corsair Vengeance Lpx Ddr4 4gb 2400',
            'description' => 'Diseñado para overclocking de alto rendimiento en placas base Intel X99',
            'in_stock' => 100,
            'category_id' => function() {
                return factory(\App\Category::class)->create([
                    'name' => 'Memorias para Lap'
                ])->id;
            },
        ])->each(function($p) {
            $p->prices()->create([
                'base' => '12.00',
                'expire_at' => '2018-03-30',
                'is_active' => true,
            ]);
            $p->discounts()->create([
                'value' => 10,
                'unit' => 'PERCENTAGE',
                'valid_from' => '2018-03-06',
                'valid_until' => '2018-03-30',
                'coupon_code' => 'TEST2-COUPON',
                'minimum_order_value' => 10,
                'maximum_discount_amount' => 0,
            ]);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
