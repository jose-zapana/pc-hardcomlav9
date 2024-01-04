<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;


class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'name' => 'CompuTienda',
            'address' => 'Calle Caracas #123',
            'phone' => '+51 985412547'
        ]);
        
    }
}
