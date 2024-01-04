<?php
namespace Database\Seeders;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::create([
            'product_id' => 1,
            'image' =>'1laptop.webp',
            'alt' => ''
        ]);
        ProductImage::create([
            'product_id' => 2,
            'image' =>'2laptop.webp',
            'alt' => ''
        ]);
        ProductImage::create([
            'product_id' => 3,
            'image' =>'1gamer.webp',
            'alt' => ''
        ]);
        ProductImage::create([
            'product_id' => 4,
            'image' =>'2gamer.webp',
            'alt' => ''
        ]);
        ProductImage::create([
            'product_id' => 5,
            'image' =>'1pc.webp',
            'alt' => ''
        ]);
        ProductImage::create([
            'product_id' => 6,
            'image' =>'2pc.webp',
            'alt' => ''
        ]);

        ProductImage::create([
            'product_id' => 7,
            'image' =>'1almacenamiento.webp',
            'alt' => ''
        ]);
        ProductImage::create([
            'product_id' => 8,
            'image' =>'2almacenamiento.webp',
            'alt' => ''
        ]);

        ProductImage::create([
            'product_id' => 9,
            'image' =>'1accesorios.webp',
            'alt' => ''
        ]);
        ProductImage::create([
            'product_id' => 10,
            'image' =>'2accesorios.webp',
            'alt' => ''
        ]);

        ProductImage::create([
            'product_id' => 11,
            'image' =>'1impresoras.webp',
            'alt' => ''
        ]);
        ProductImage::create([
            'product_id' => 12,
            'image' =>'2impresoras.webp',
            'alt' => ''
        ]);
    }
}
