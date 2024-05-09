<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Archive;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $this->createShelvesForRow(1);        
        $this->createShelvesForRow(2);
    }
    
    private function createShelvesForRow($row)
    {
        
        for ($shelf = 1; $shelf <= 3; $shelf++) {            
            for ($shelfPosition = 1; $shelfPosition <= 5; $shelfPosition++) {                
                Archive::create([
                    'Row' => $row,
                    'Shelf' => $shelf,
                    'ShelfPosition' => $shelfPosition,
                ]);
            }
        }
    }
}