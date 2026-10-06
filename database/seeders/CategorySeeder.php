<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Teknologi', 'description' => 'Buku seputar pemrograman, jaringan, dan sistem informasi.'],
            ['name' => 'Fiksi',     'description' => 'Novel dan kumpulan cerita pendek.'],
            ['name' => 'Sains',     'description' => 'Buku ilmu pengetahuan alam dan matematika.'],
            ['name' => 'Bisnis',    'description' => 'Buku manajemen, kewirausahaan, dan keuangan.'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}
