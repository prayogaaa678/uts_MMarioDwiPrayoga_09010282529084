<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['Teknologi', 'Belajar Laravel untuk Pemula', 'Budi Santoso',      'Informatika',       2022, 8],
            ['Teknologi', 'Dasar-Dasar Basis Data',       'Siti Rahmawati',    'Andi Offset',       2020, 5],
            ['Fiksi',     'Laskar Pelangi',               'Andrea Hirata',     'Bentang Pustaka',   2005, 12],
            ['Sains',     'Pengantar Fisika Dasar',       'Agus Wibowo',       'Erlangga',          2018, 6],
            ['Bisnis',    'Manajemen Startup Digital',    'Dewi Lestari',      'Gramedia',          2021, 4],
            ['Fiksi',     'Bumi Manusia',                 'Pramoedya A. Toer', 'Lentera Dipantara', 1980, 7],
        ];

        foreach ($books as [$categoryName, $title, $author, $publisher, $year, $stock]) {
            $category = Category::where('name', $categoryName)->first();

            Book::updateOrCreate(
                ['title' => $title],
                [
                    'category_id' => $category->id,
                    'author'      => $author,
                    'publisher'   => $publisher,
                    'year'        => $year,
                    'stock'       => $stock,
                ]
            );
        }
    }
}
