<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document::create([
            'Title' => 'Document 1',
            'DateReceived' => now(),
            'Type' => 'Type 1',
            'Status' => 'Status 1',
            'DisposableDate' => now()->addDays(30),  
        ]);

        Document::create([
            'Title' => 'Document 2',
            'DateReceived' => now(),
            'Type' => 'Type 2',
            'Status' => 'Status 2',
            'DisposableDate' => now()->addDays(45),       
        ]);
    }
}
