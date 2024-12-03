<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TransactionList;
use App\Models\Transaction;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionList>
 */
class TransactionListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TransactionList::class;

    public function definition()
    {
        return [
            'transaction_id' => Transaction::factory(), 
            'book_id' => Book::factory(), 
            'quantity' => $this->faker->numberBetween(1, 10),
            'total_price' => $this->faker->numberBetween(10000, 100000), 
        ];
    }
}
