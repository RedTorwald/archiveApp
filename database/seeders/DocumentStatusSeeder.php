<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DocumentStatus;

class DocumentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = [
            ['name' => 'На хранении'],
            ['name' => 'Занят'],
            ['name' => 'Утилизирован'],
        ];

        foreach ($statuses as $status) {
            DocumentStatus::create($status);
        }
    }
}
