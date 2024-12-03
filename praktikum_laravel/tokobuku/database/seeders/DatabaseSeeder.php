<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\TransactionList;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        Book::factory()->count(20)->create();
        Transaction::factory()
            ->count(10)
            ->has(TransactionList::factory()->count(3), 'transactionLists') 
            ->create();
        // BookSeeder::class;
        // TransactionSeeder::class;
        
    }
}
