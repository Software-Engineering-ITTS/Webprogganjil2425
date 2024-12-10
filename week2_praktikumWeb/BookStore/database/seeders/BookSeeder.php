<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => 'Laravel for Beginners',
                'author' => 'John Smith',
                'description' => 'A comprehensive guide to Laravel framework',
                'price' => 250000,
                'stock' => 10
            ],
            [
                'title' => 'PHP Mastery',
                'author' => 'Jane Johnson',
                'description' => 'Master PHP programming language',
                'price' => 300000,
                'stock' => 15
            ],
            [
                'title' => 'Web Development Basics',
                'author' => 'Mike Wilson',
                'description' => 'Learn the basics of web development',
                'price' => 200000,
                'stock' => 20
            ],
            [
                'title' => 'MySQL Database Design',
                'author' => 'Sarah Brown',
                'description' => 'Everything about MySQL database design',
                'price' => 275000,
                'stock' => 12
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}