<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentArchive extends Model
{
    protected $table = 'document_archive';
    protected $fillable = ['document_id', 'archive_id'];

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id', 'DocumentID');
    }
    
    public function archive()
    {
        return $this->belongsTo(Archive::class, 'archive_id', 'ArchiveID');
    }
}
