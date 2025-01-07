<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        $customer1 = Customer::first();
        if ($customer1) {
            $invoice1 = Invoice::create([
                'invoice_number' => 'INV-'.time().'-1',
                'customer_id' => $customer1->id,
                'invoice_date' => Carbon::now(),
                'due_date' => Carbon::now()->addDays(30),
                'total_amount' => 1000000,
                'tax' => 100000,
                'grand_total' => 1100000,
                'status' => 'unpaid',
                'notes' => 'Pembayaran pertama'
            ]);

            InvoiceItem::create([
                'invoice_id' => $invoice1->id,
                'item_name' => 'Item 1',
                'quantity' => 2,
                'unit_price' => 500000,
                'subtotal' => 1000000
            ]);
        }
    }
}