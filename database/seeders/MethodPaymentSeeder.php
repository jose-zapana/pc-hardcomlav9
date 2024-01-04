<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\MethodsPayment;
use App\Models\MethodsPayment_Shops;

class MethodPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MethodsPayment::create([
            'name' => 'paypal',
            'image' => 'paypal.jpg',
        ]);
        MethodsPayment::create([
            'name' => 'stripe',
            'image' => 'stripe.jpg',
        ]);
        MethodsPayment::create([
            'name' => 'visa',
            'image' => 'visa.png',
        ]);
        MethodsPayment::create([
            'name' => 'american-express',
            'image' => 'american.png',
        ]);

        MethodsPayment_Shops::create([
            'shop_id' => 1,
            'method_payments_id' => 1
        ]);
        MethodsPayment_Shops::create([
            'shop_id' => 1,
            'method_payments_id' => 2
        ]);
        MethodsPayment_Shops::create([
            'shop_id' => 1,
            'method_payments_id' => 3
        ]);
        MethodsPayment_Shops::create([
            'shop_id' => 1,
            'method_payments_id' => 4
        ]);
    }
}
