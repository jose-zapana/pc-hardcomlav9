<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userA = User::create([
            'name' => 'Jose Zapana',
            'email' => 'jezs715@gmail.com',
            'password' => bcrypt('123456789'),
            'dni' => '44023065'
        ]);

        $userM = User::create([
            'name' => 'Juan Perez',
            'email' => 'juanperez@gmail.com',
            'password' => bcrypt('11111111'),
            'dni' => '11111111'
        ]);

        $userU = User::create([
            'name' => 'Luis Perez',
            'email' => 'luisperez@gmail.com',
            'password' => bcrypt('22222222'),
            'dni' => '22222222'
        ]);

        $userA->assignRole('admin');
        $userM->assignRole('mantenedor');
        $userU->assignRole('user');
    }
}
