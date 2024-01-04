<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'title' => 'Servicio Técnico a Domicilio',
            'content' => 'Computadoras y Laptops',
            'link' => 'http://pchadcompev9.test/contacto',
            'image' => 'sevicotecnico.png'
        ]);
        Banner::create([
            'title' => 'Arma tu PC',
            'content' => 'Diseña tu Pc con Pc-Hard',
            'link' => 'http://pchadcompev9.test/contacto',
            'image' => 'pcgaming.png'
        ]);
        Banner::create([
            'title' => 'Personaliza tu equipo',
            'content' => 'A tus necesidades.',
            'link' => 'http://pchadcompev9.test/contacto',
            'image' => 'pc-personalizada.png'
        ]);
    }
}
