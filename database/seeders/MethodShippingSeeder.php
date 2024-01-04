<?php
namespace Database\Seeders;
use App\Models\MethodShipping;
use Illuminate\Database\Seeder;


class MethodShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MethodShipping::create([
            'name' => 'Fredex',
            'image' => 'fedex.jpg',
            'shop_id' => 1
        ]);
        MethodShipping::create([
            'name' => 'Ups',
            'image' => 'ups.jpg',
            'shop_id' => 1
        ]);
        MethodShipping::create([
            'name' => 'EMS',
            'image' => 'ems.jpg',
            'shop_id' => 1
        ]);
        MethodShipping::create([
            'name' => 'Dhl',
            'image' => 'dhl.jpg',
            'shop_id' => 1
        ]);
    }
}
