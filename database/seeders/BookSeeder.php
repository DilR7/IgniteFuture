<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'book_name' => 'Sample Book',
            'book_desc' => 'This is a sample book description.',
            'book_content' => 'path/to/sample.pdf', // Adjust this path as necessary
            'moduleID' => 1, // Replace with an actual module ID from your modules table
        ]);
        Book::create([
            'book_name' => 'Laporan Keuangan BBRI',
            'book_desc' => 'This annual report for BBRI 2024 Performance.',
            'book_content' => 'pdfs/bbri.pdf', // Adjust this path as necessary
            'moduleID' => 1, // Replace with an actual module ID from your modules table
        ]);
    }
}
