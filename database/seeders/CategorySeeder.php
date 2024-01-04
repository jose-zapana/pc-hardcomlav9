<?php
namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Smarthphone',
            'description' => 'Categoría de smarthphones.',
            'image' => 'smarthphone.png',
            'shop_id' => 1
        ]);
        Category::create([
            'name' => 'Laptops',
            'description' => 'Categoría de laptops.',
            'image' => 'laptops.png',
            'shop_id' => 1
        ]);
        Category::create([
            'name' => 'PCs de escritorio',
            'description' => 'Categoría de PCs de escritorio.',
            'image' => 'pc.png',
            'shop_id' => 1
        ]);
        Category::create([
            'name' => 'Zona Gamer',
            'description' => 'Categoría de Zona gamer.',
            'image' => 'gamer.png',
            'shop_id' => 1
        ]);
        Category::create([
            'name' => 'Almacenamiento',
            'description' => 'Categoría de almacenamiento.',
            'image' => 'almacenamiento.png',
            'shop_id' => 1
        ]);
        Category::create([
            'name' => 'Accesorios',
            'description' => 'Categoría de accesorios.',
            'image' => 'accesorios.png',
            'shop_id' => 1
        ]);
        Category::create([
            'name' => 'Impresoras',
            'description' => 'Categoría de impresoras.',
            'image' => 'impresoras.png',
            'shop_id' => 1
        ]);
    }
}
