<?php

use App\Stock;
use Illuminate\Database\Seeder;

class add_sample_products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create([
            'barcode' => '12345670',
            'item_desc' => 'ITEM A',
            'price' => 80.00,
            'supplier_code' => 'S1234'
        ]);

        Stock::create([
            'barcode' => '12345671',
            'item_desc' => 'ITEM b',
            'price' => 288.50,
            'supplier_code' => 'S1235'
        ]);

        Stock::create([
            'barcode' => '4902505088841',
            'item_desc' => 'WHITE BOARD MARKER',
            'price' => 48.50,
            'supplier_code' => 'S1235'
        ]);
    }
}
