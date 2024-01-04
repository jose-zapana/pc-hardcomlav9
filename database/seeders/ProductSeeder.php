<?php
namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Laptop Aspire 3 A315-23-R9TH 15.6 FHD Ryzen 5 3500U 12GB 256GB Acer A315-23-R9Th-Plata',
            'description' => 'Laptop de ultima generación',
            'stock' => 10,
            'unit_price' => 2399.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'Hp 15-Dy1071 Intel I7 10Th 24GB RAM (8GB DDR4+16GB OPTANE) 256Gb Disk 15 Hd Windows 10 Open Box',
            'description' => 'Open-box son modelos de vitrina o productos devueltos profesionalmente verificados garantizando su funcionalidad se ven y se sienten increíbles algunos pueden mostrar imperfecciones cosméticas pero su funcionalidad está a la par de los nuevos',
            'stock' => 10,
            'unit_price' => 3029.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'SILLA GAMER XION MODELO RAVEN RGB 2021 135 GRADOS',
            'description' => 'Construcción robusta, cuerina de primera calidad y materiales resistentes garantizan máxima estabilidad y durabilidad',
            'stock' => 10,
            'unit_price' => 549.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'Teclado Gamer Mecanico Silencioso Primus Ballista 90T',
            'description' => 'Diseñado para los combates más extremos, tecnología anti-ghosting, para vencer los desafíos más extremos. LIBERA TODO EL PODER DE LOS JUEGOS DE VIDEO Con el avanzado interruptor mecánico rojo de Primus- LINEAL Y SILENCIOSO',
            'stock' => 10,
            'unit_price' => 199.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'MONITOR 27 GIGABYTE G27QC 2K 1MS 165HZ',
            'description' => 'El Gigabyte G27QC cuenta con un panel de 27 pulgadas en una configuración con curvatura a 1500R.',
            'stock' => 10,
            'unit_price' => 1990.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'Computadora Pc Intel Core i7 3.4 Ghz RAM 16GB 1TB SSD 240GB MONITOR 24¨ FHD',
            'description' => 'Esta Computadora ha sido diseñado para trabajos en oficina,empresas y trabajos cotidianos. Esta PC tiene un procesador Intel Core I7 para que tu computadora tenga un funcionamiento más rápido y eficaz que te permitirá aprovechar todas sus funcionalidades sin disminuir su capacidad y rendimiento. Esta CPU tiene una memoria RAM de 16GB y un disco duro de 1TB y SSD de 240GB para que puedas utilizar los programas y hacer tareas sin ningún problema.También viene con Monitor LG de 24”FHD, teclado y mouse óptico .',
            'stock' => 10,
            'unit_price' => 2680.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'Disco Duro Externo Toshiba 2TB 3.0 Canvio Basics Portátil',
            'description' => 'Disco Duro Externo Toshiba HD EXT 2TB 3.0 CANVIO BASIC',
            'stock' => 10,
            'unit_price' => 329.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'DMEMORIA FLASH USB KINGSTON DT100G3 128GB DT100 G3',
            'description' => 'La unidad de memoria Flash USB DataTraveler 100 G3 es práctica, fácil de llevar e ideal para almacenar y transportar tu información de forma fácil, cómoda y segura. El DT100G3 cumple con las especificaciones USB 3.0 de la próxima generación, por lo que la transferencia de archivos es mucho más rápida. Es más rápido y más fácil que nunca el almacenamiento y transferencia de documentos, presentaciones, música, vídeo y mucho más. ',
            'stock' => 10,
            'unit_price' => 75.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'Cámara Web/Webcam 1080p FHD Redragon GW800 Hitman',
            'description' => 'Graba videos o transmite en vivo con el Redragon Webcam HITMAN GW800 1080P con clip en el soporte. Cuenta con una cámara FHD 1080p para una imagen más clara que las cámaras web de definición estándar. Puede grabar videos a 30 FPS y viene con una lente de enfoque fijo. Para su comodidad, también tiene un clip en el soporte que se puede ajustar para satisfacer sus necesidades, ya sea que esté parado sobre un escritorio o colgado en un monitor, no se perderá una foto con esta cámara web.',
            'stock' => 10,
            'unit_price' => 209.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'Microfono Condensador Bm800 Brazo Soporte Antipop Estudio Pc',
            'description' => '¡Conexión sin complicaciones! Cuenta con un brazo ajustable para que se pueda colocar en diversos lugares, así como una entrada universal tipo Jack de 3.5mm e interfaz XLR que garantiza un audio perfecto.',
            'stock' => 10,
            'unit_price' => 96.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'Impresora Multifuncional HP LaserJet Pro M428fdw - Blanco',
            'description' => 'Capacidad de impresión móvil: Aplicación HP Eprint, Apple AirPrint. Tamaño de papel: A4,A4,A5,A6,JIS B5,JIS B6,Oficio,Sobre B5,Sobre C5,Sobre DL, Sobre Monarca, Sobre N10. Tipos de Soportes: Papel (común, EcoEFFICIENT, liviano, pesado, grueso, color, membretado, preimpreso, pre perforado, reciclado, rugoso);sobres; etiquetas. ',
            'stock' => 10,
            'unit_price' => 1600.00,
            'shop_id' => 1
        ]);

        Product::create([
            'name' => 'Impresora Multifuncional Ink Tank 410 con Wifi - HP',
            'description' => 'Los avances tecnológicos son parte esencial en nuestra vida diaria, ya que permiten al ser humano resolver un problema, adaptarse al medio ambiente, satisfacer sus necesidades y sus deseos. Los nuevos aparatos electrónicos, permiten realizar tareas que se hacían de forma manual de una forma más ágil y eficaz. Por ello, se han convertido en la herramienta más importante en los últimos años, herramientas que nos acompañan en todo momento y en todo lugar y que podemos personalizar a nuestro gusto.',
            'stock' => 10,
            'unit_price' => 600.00,
            'shop_id' => 1
        ]);
    }
}
