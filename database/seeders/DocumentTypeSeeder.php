<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DocumentType;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DocumentType::create(['name' => 'Финансовая отчетность']);
        DocumentType::create(['name' => 'Организационные и административные документы']);
        DocumentType::create(['name' => 'Техническая и проектная документация']);
    }
}
