<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = 'Archives'; 
    protected $primaryKey = 'ArchiveID'; 
    
    protected $fillable = ['row', 'shelf', 'shelf_position', 'document_capacity'];

    public function documents()
    {
        return $this->belongsToMany(Document::class, 'document_archive', 'document_id', 'archive_id');
    }
}