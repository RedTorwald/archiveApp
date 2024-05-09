<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Archive;

class ArchivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Archive::create([
            'Row' => '3',
            'Shelf' => '1',
            'ShelfPosition' => '2',
        ]);

        Archive::create([
            'Row' => '2',
            'Shelf' => '1',
            'ShelfPosition' => '3',
        ]);

        Archive::create([
            'Row' => '1',
            'Shelf' => '2',
            'ShelfPosition' => '1',
        ]);
        
    }
}
