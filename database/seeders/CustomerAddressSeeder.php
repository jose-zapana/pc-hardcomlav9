<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Database\Seeder;


class CustomerAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 2 customers
        $user1 = User::create([
            'name' => 'Dennys Yutaro',
            'email' => 'dennys@gmail.com',
            'password' => bcrypt('12345678'),
            'dni' => '72786332'
        ]);
        $user2 = User::create([
            'name' => 'Adriana Valdez',
            'email' => 'adriana@gmail.com',
            'password' => bcrypt('87654321'),
            'dni' => '24949124'
        ]);
        Customer::create([
            'user_id' => $user1->id,
            'phone' => '938863181',
        ]);
        Customer::create([
            'user_id' => $user2->id,
            'phone' => '984643002',
        ]);
        //Crear una direccion
        CustomerAddress::create([
            'customer_id' => 1,
            'address' => 'Ricardo Palma',
            'country' => 'Peru',
            'city' => 'Cusco',
            'province' => 'Quillabamba'
        ]);
        // En su table mostrar un boton por cada cliente para agregar
        // sus direcciones
    }
}
