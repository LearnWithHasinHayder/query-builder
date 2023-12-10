<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks
        InvoiceItem::truncate();
        Invoice::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks

        $faker = Faker::create();

        foreach(range(1, 10) as $index) {
            $invoice = Invoice::create([
                'user_id' => 1, // keeping user_id fixed as 11
                'client' => $faker->name,
                'total_price' => 0, // initial total price
                'paid' => $faker->boolean,
            ]);

            $totalPrice = 0;
            $itemsCount = $faker->numberBetween(1, 7); // number of items per invoice

            foreach(range(1, $itemsCount) as $itemIndex) {
                $totalItemPrice = $faker->randomFloat(2,100,1000);

                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'title' => $faker->sentence(5),
                    'total_price' => $totalItemPrice,
                ]);

                $totalPrice += $totalItemPrice;
            }

            $invoice->update(['total_price' => $totalPrice]);
        }
    }
}
