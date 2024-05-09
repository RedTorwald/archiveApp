<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $fillable = ['name'];
   
    public function getStorageYears(): int
    {
        switch ($this->id) {
            case 1:
                return 7; 
                break;
            case 2:
                return 5; 
                break;
            case 3:
                return 4; 
                break;
            default:
                return 0; 
        }
    }
}