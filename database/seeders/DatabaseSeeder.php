<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Order;
use App\Models\Pickup;
use App\Models\Delivery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        User::create([
            'name' => 'Owner Linen & Lather',
            'email' => 'owner@linen.id',
            'password' => Hash::make('password'),
        ]);

        $services = [
            Service::create(['name' => 'Cuci Kiloan Reguler', 'description' => 'Cuci harian biasa 3 hari selesai', 'price_per_kg' => 8000, 'estimated_days' => 3, 'is_active' => true]),
            Service::create(['name' => 'Cuci Premium Bundle', 'description' => 'Parfum grade A selesai 24 jam', 'price_per_kg' => 12000, 'estimated_days' => 1, 'is_active' => true]),
            Service::create(['name' => 'Super Express', 'description' => 'Selesai 6-12 jam', 'price_per_kg' => 20000, 'estimated_days' => 1, 'is_active' => true]),
            Service::create(['name' => 'Dry Cleaning Jas', 'description' => 'Perawatan kain khusus', 'price_per_kg' => 45000, 'estimated_days' => 4, 'is_active' => true]),
        ];

        $customers = [];
        for ($i = 0; $i < 15; $i++) {
            $customers[] = Customer::create([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
        }

        $statuses = ['order_masuk', 'menunggu_pickup', 'sedang_dicuci', 'sedang_dikeringkan', 'sedang_disetrika', 'siap_diantar', 'selesai', 'dibatalkan'];
        $paymentStatuses = ['pending', 'paid', 'failed'];
        $logisticsOptions = ['pickup', 'delivery'];

        for ($i = 0; $i < 60; $i++) {
            $customer = $faker->randomElement($customers);
            $service = $faker->randomElement($services);
            $weight = $faker->numberBetween(2, 10);
            
            $createdAt = Carbon::now()->subDays(rand(0, 20));
            $laundryStatus = $faker->randomElement($statuses);
            $serviceOrder = $faker->randomElement($logisticsOptions);
            
            $order = Order::create([
                'invoice_code' => 'INV-' . strtoupper($faker->unique()->lexify('????')) . $faker->unique()->numerify('####'),
                'customer_id' => $customer->id,
                'service_id' => $service->id,
                'pickup_address' => $customer->address,
                'weight' => $weight,
                'subtotal' => $service->price_per_kg * $weight,
                'discount' => 0,
                'total_price' => $service->price_per_kg * $weight,
                'payment_method' => $faker->randomElement(['cod', 'transfer', 'qris', 'ewallet']),
                'payment_status' => $laundryStatus == 'selesai' ? 'paid' : $faker->randomElement(['pending', 'paid']),
                'laundry_status' => $laundryStatus,
                'service_order' => $serviceOrder,
                'pickup_date' => $serviceOrder == 'pickup' ? $createdAt->copy()->addHours(2) : null,
                'estimated_finish_date' => $createdAt->copy()->addDays($service->estimated_days),
                'created_at' => $createdAt,
                'updated_at' => $createdAt->copy()->addDays(rand(0, 3)),
            ]);

            if ($serviceOrder == 'pickup') {
                Pickup::create([
                    'order_id' => $order->id,
                    'pickup_date' => $order->pickup_date,
                    'pickup_status' => in_array($laundryStatus, ['order_masuk', 'menunggu_pickup']) ? 'pending' : 'selesai',
                ]);
            }

            if ($serviceOrder == 'delivery') {
                Delivery::create([
                    'order_id' => $order->id,
                    'delivery_date' => $laundryStatus == 'siap_diantar' ? Carbon::now()->addHours(2) : null,
                    'delivery_status' => $laundryStatus == 'selesai' ? 'selesai' : ($laundryStatus == 'siap_diantar' ? 'sedang_diantar' : 'pending'),
                ]);
            }
        }
    }
}
